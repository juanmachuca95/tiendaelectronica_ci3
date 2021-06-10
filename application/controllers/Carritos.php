<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carritos extends CI_Controller{
    private $view = 'carritos';

    public function __construct(){
        parent:: __construct();
        $this->load->library('session', 'template');
        $this->load->model('Producto');
    }

    public function index(){
        $status = ($this->session->is_logged_user) ? true : false;
        if(!$status) { return show_404(); }

        $data = $this->session->userdata('items');
        if(!empty($data)){
            $productos_ids = array_keys($data);
            $productos = $this->Producto->get_productos_carrito($productos_ids); 
        }
        return $this->template->load('app', $this->view.'/index', [
            'productos' => $productos ?? null
        ]);
    }
    
    public function store(){
        $status = ($this->session->is_logged_user) ? true : false;
        if(!$status) { return false; }
        
        if($this->input->post('productos_id')){
            $response = [];
            $productos_id = $this->input->post('productos_id');
            $items = $this->session->userdata('items');
            
            if(!empty($items) && array_key_exists($productos_id, $items)){ // Entra si ya existe el producto en el carrito
                //echo "El carrito ya tiene este producto ".$items[$productos_id];
                $auth_saved = $this->Producto->get_valid_stock($productos_id, $items[$productos_id]);
                if($auth_saved){
                    $items[$productos_id] = intVal($items[$productos_id]) + 1; // Sumo un producto más al existente
                    $this->session->set_userdata('items', $items);//Recargo el la variable de session
                    //echo "Hay stock disponible para este producto - ACTUALIZADO: ".$items[$productos_id];
                    echo json_encode([
                        'cantidad' => $items[$productos_id],
                        'cargado' => true, 'carrito' => $this->get_carrito_count()
                    ]);
                }else{
                    //echo "No hay stock disponible para este producto";
                    echo json_encode([
                        'cantidad' => $items[$productos_id],
                        'cargado' => false, 'carrito' => $this->get_carrito_count()
                    ]);
                }
            }else{
                //echo "Se agregara un nuevo producto al carrito";
                $items[$productos_id] = 1;

                $auth_saved = $this->Producto->get_valid_stock($productos_id, $items[$productos_id]);
                if($auth_saved){
                    $this->session->set_userdata('items', $items);//Recargo el la variable de session
                    //echo "Hay stock disponible para este producto ";
                    $data = ['cantidad' => 1,'cargado' => true, 'carrito' => $this->get_carrito_count()];
                    echo json_encode($data);
                }else{
                    //echo "No hay stock disponible para este producto ";
                    $data = ['cantidad' => 0, 'cargado' => false, 'carrito' => $this->get_carrito_count()];
                    echo json_encode($data);
                }
            }
        }
    }

    public function get_carrito_count(){
        $items = $this->session->items;
        $count = 0;
        if(!empty($items)){
            foreach ($items as $key => $value) {
                $count = $count + $value;
            }
            $this->session->set_userdata('carrito', $count);
            return $count;
        }
        return $count;
    }

    public function quitar($id){
        $status = ($this->session->is_logged_user) ? true : false;
        if(!$status) { return false; }

        $items = $this->session->items;
        $count = $this->session->carrito;

        if($items[$id] == 1){
            unset($items[$id]);
            if($count == 1){
                $this->session->set_userdata('items', []);
                $this->session->set_userdata('carrito', 0);
                return redirect('carritos');
            }
            $count = intVal($count) - 1;
            $this->session->set_userdata('carrito', $count);
            $this->session->set_userdata('items', $items);
            return redirect('carritos');
        }
        $items[$id] = (intVal($items[$id])-1);
        $count = intVal($count) - 1;
        $this->session->set_userdata('carrito', $count);
        $this->session->set_userdata('items', $items);
        return redirect('carritos');
    }

    public function sumar($id){
        $status = ($this->session->is_logged_user) ? true : false;
        if(!$status) { return false; }

        $items = $this->session->items;
        $count = $this->session->carrito;
        $auth_saved = $this->Producto->get_valid_stock($id, $items[$id]+1 );
        if($auth_saved){
            $items[$id] = intVal($items[$id]) + 1; 
            $this->session->set_userdata('items', $items);
            $this->session->set_userdata('carrito', intVal($count)+1);
            return redirect('carritos');
        }
        $this->session->set_flashdata('error', 'Lo sentimos, no se pueden agregar más unidades a este producto.');
        return redirect('carritos');
    }
}