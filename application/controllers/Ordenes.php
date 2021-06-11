<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordenes extends CI_Controller {
    private $view = 'ordenes';
    private $perPage;

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation',
        ));
        $this->load->model(array('Orden', 'Detalle', 'Producto', 'User'));
        $this->perPage = 6;
    }

    public function index(){
        $status = ($this->session->is_logged_user) ? true : false;
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
            'productos' => $this->Producto->get_pagination($config['per_page'], $offset)
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
        $direccion = $this->input->post('direccion');
        $telefono = $this->input->post('telefono');

        if($this->session->users_id){
            $user_id = $this->session->users_id;
            $user = $this->User->find($user_id);
            $auth_update = ($user->direccion != $direccion || $user->telefono != $telefono) ? true  : false;
            
            if($auth_update){
                $this->User->update($user_id, [
                    'direccion' => $direccion, 'telefono' => $telefono
                ]);
            }
        }else{
            $user_id = $this->User->create_user([
                'nombre' => $nombre, 'apellido' => $apellido,
                'direccion' => $direccion, 'telefono' => $telefono,
                'roles_id' => 2
            ]);
        }

        $items = $this->session->items;
        $productos_ids = array_keys($items);
        $productos = $this->Producto->get_productos_carrito($productos_ids); 
        $order_data = [
            'users_id' => $user_id,
            'total' => $this->get_total_productos($productos)
        ];

        if($orden_id = $this->Orden->create($order_data)){
            $this->Producto->update_stock_productos_vendidos($items);
            foreach ($productos as $row) {
                if($items[$row->id]){
                    $this->Detalle->create([
                        'orden_id' => $orden_id,
                        'productos_id' => $row->id,
                        'cantidad' => $items[$row->id],
                        'precio_unitario' => $row->precio,
                        'total' => $order_data['total'] 
                    ]);
                }
            }

            $this->session->set_userdata('items', array());
            $this->session->set_userdata('carrito', 0);
            $this->session->set_flashdata('success', '&#x1f38a; Su compra ha sido registrada exitosamente. En los proximos días recibira su producto. ¡Muchas gracias! &#x1f38a;');
            return redirect('home');
        }
        $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado, intentelo de nuevo más tarde.');
        return $this->create();
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
    
}