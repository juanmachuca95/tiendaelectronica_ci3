<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once 'vendor/autoload.php'; 


class Ordenes extends CI_Controller {
    private $view = 'ordenes';
    private $perPage;
    private $mercadopago;

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation'
        ));
        $this->load->model(array('Orden', 'Detalle', 'Producto', 'User', 'Comercio'));
        $this->mercadopago = $this->Comercio->get_mercadopago(1);
        $this->perPage = 6;
    }

    public function index($offset = 0){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status) { return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('ordenes/index'), 
            count($this->Orden->get_ordenes()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Ordenes de compra',
            'ordenes' => $this->Orden->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function show($id){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status) { return show_404(); }

        return $this->template->load('dashboard', $this->view.'/show',[
            'orden' => $this->Orden->get_orden($id),
            'detalles' => $this->Detalle->get_detalles($id)
        ]);

    }

    public function create(){    
        $items = $this->session->userdata('items');
        if(empty($items)){ return show_404(); }

        $productos_ids = array_keys($items);
        $productos = $this->Producto->get_productos_carrito($productos_ids); 
        
        return $this->template->load('app', $this->view.'/create', [
            'total' => $this->get_total_productos($productos),
        ]);
    }

    public function store(){
        $this->form_validation->set_rules('nombre', 'Nombre', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('apellido', 'Apellido', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('email', 'Email', 
            'required|max_length[255]|valid_email'
        );
        $this->form_validation->set_rules('direccion', 'Dirección', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('telefono', 'Telefono',
        'required');
        
        if(!$this->form_validation->run()){
            return $this->create();
        }

        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $email = $this->input->post('email');
        $direccion = $this->input->post('direccion');
        $telefono = $this->input->post('telefono');
        $tipopago = $this->input->post('tipopago');

        if($this->session->users_id){ // USUARIO REGISTRADO
            $user_id = $this->session->users_id;
            $user = $this->User->find($user_id);
            $auth_update = ($user->direccion != $direccion || $user->telefono != $telefono) ? true  : false;
            
            if($auth_update){
                $this->User->update($user_id, [
                    'direccion' => $direccion, 'telefono' => $telefono,
                ]);
            }
        }else{ // USUARIO NO REGISTRADO
            $user_id = $this->User->create_user([
                'nombre' => $nombre, 'apellido' => $apellido,
                'direccion' => $direccion, 'telefono' => $telefono,
                'email' => $email,
                'roles_id' => 2
            ]);
        }

        if($tipopago == 1){
            $this->pago_contraentrega($user_id);
        }else{
            $this->pago_mercadopago($user_id);
        }
    
    }

    public function pago_contraentrega($user_id){
        echo "VA A PAGAR CONTRA ENTREGA";
        $items = $this->session->items;
        $productos_ids = array_keys($items);
        $productos = $this->Producto->get_productos_carrito($productos_ids); 
        $order_data = [
            'users_id' => $user_id,
            'total' => $this->get_total_productos($productos),
            'tipopago' => 'contraentrega'
        ];
        
        if($orden_id = $this->Orden->create($order_data)){ 
            $this->Producto->update_stock_productos_vendidos($items);
            $this->create_detalles($productos, $order_data, $orden_id);
            $this->session->set_userdata('items', array());
            $this->session->set_userdata('carrito', 0);
            $this->session->set_flashdata('success', '&#x1f38a; Su compra ha sido registrada exitosamente. En los proximos días recibira su producto. ¡Muchas gracias! &#x1f38a;');
            return redirect('home');
        }
        $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado, intentelo de nuevo más tarde.');
        return $this->create();  
    }   

    public function pago_mercadopago($user_id){
        echo "VA A PAGAR CON MERCADO PAGO";
        $items = $this->session->items;
        $productos_ids = array_keys($items);
        $productos = $this->Producto->get_productos_carrito($productos_ids); 
        $order_data = [
            'users_id' => $user_id,
            'total' => $this->get_total_productos($productos),
            'tipopago' => 'online'
        ];

        if($orden_id = $this->Orden->create($order_data)){ 
            $this->Producto->update_stock_productos_vendidos($items);
            $this->create_detalles($productos, $order_data, $orden_id);
            MercadoPago\SDK::setAccessToken($this->mercadopago->mercadopago_key);

            $preference = new MercadoPago\Preference();
            $preference->external_reference = $orden_id;
            $preference->back_urls = array(
                "success" => base_url('mercadopago/success'),
                "failure" => base_url('mercadopago/failure'),
                "pending" => base_url('mercadopago/pending')
            );
            $preference->auto_return = "approved";
            
            $user = $this->User->find($user_id);
            $payer = new MercadoPago\Payer();
            $payer->name = $user->nombre;
            $payer->surname = $user->apellido;
            $payer->email = $user->email;
            $payer->date_created = $user->created_at;
            $payer->phone = array(
                "area_code" => "",
                "number" => $user->telefono
            );
            
            /* $payer->identification = array(
                "type" => "DNI",
                "number" => "12345678"
            ); */
            
            $payer->address = array(
                "street_name" => $user->direccion,
               /*  "street_number" => 1004,
                "zip_code" => "11020" */
            );

            $preference->payer = $payer;

            $orden_detalles = $this->Detalle->get_detalles($orden_id);
            foreach ($orden_detalles as $detalle) {
                # Create an item object28
                $item = new MercadoPago\Item();
                $item->id = $detalle->id;
                $item->title = $detalle->producto;
                $item->quantity = $detalle->cantidad;
                $item->currency_id = 'ARS';
                $item->unit_price = $detalle->precio_unitario;

                $itemsdetalle[] = $item;
            }
            
            $preference->items = $itemsdetalle;
            $preference->notification_url = base_url('mercadopago/ipn');
            $preference->save();


           /*  echo "<pre>";
            print_r($preference); */
            return redirect($preference->sandbox_init_point);
        }
    }
    
    public function get_total_productos($productos){
        $items = $this->session->items;
        $total = 0;
        foreach($productos as $row){
            //echo 'cantidad: '.intVal($items[$row->id]).' x precio: '.$row->precio.' total: '.(intVal($items[$row->id]) * $row->precio).'<br>';
            $total = $total + intVal($items[$row->id]) * $row->precio;
        }
        return $total;
    }

    public function create_detalles($productos, $order_data, $orden_id){
        $items = $this->session->items;
        foreach ($productos as $row) {
            if($items[$row->id]){
                $this->Detalle->create([
                    'orden_id' => $orden_id,
                    'productos_id' => $row->id,
                    'cantidad' => $items[$row->id],
                    'precio_unitario' => $row->precio,
                    'total' => $row->precio * intVal($items[$row->id])
                ]);
            }
        }
    }
    
}