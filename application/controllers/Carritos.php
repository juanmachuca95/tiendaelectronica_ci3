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
        return $this->template->load('app', $this->view.'/index', [
            'listaPedidos' => $this->Producto->productosPedidos($data)
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
                        'cargado' => true
                    ]);
                }else{
                    //echo "No hay stock disponible para este producto";
                    echo json_encode([
                        'cantidad' => $items[$productos_id],
                        'cargado' => false
                    ]);
                }
            }else{
                //echo "Se agregara un nuevo producto al carrito";
                $items[$productos_id] = 1;

                $auth_saved = $this->Producto->get_valid_stock($productos_id, $items[$productos_id]);
                if($auth_saved){
                    $this->session->set_userdata('items', $items);//Recargo el la variable de session
                    //echo "Hay stock disponible para este producto ";
                    $data = ['cantidad' => 1,'cargado' => true];
                    echo json_encode($data);
                }else{
                    //echo "No hay stock disponible para este producto ";
                    $data = ['cantidad' => 0, 'cargado' => false];
                    echo json_encode($data);
                }
            }
        }


    }
}