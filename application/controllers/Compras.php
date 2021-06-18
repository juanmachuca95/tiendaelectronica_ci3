<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller{
    private $view = 'compras';
    private $comercio;

    public function __construct(){
        parent:: __construct();
        $this->load->library('session', 'template');
        $this->load->model(array('Producto', 'Comercio'));
        $this->comercio = $this->Comercio->find(1);
    }

    /**
     * Disponible para usuarios no registrado
     */
    public function index(){
        $data = $this->session->userdata('items');
        if(!empty($data)){
            $productos_ids = array_keys($data);
            $productos = $this->Producto->get_productos_carrito($productos_ids); 
            $total =  $this->get_total_productos($productos);
        }
        return $this->template->load('app', $this->view.'/index', [
            'productos' => $productos ?? null,
            'comercio' => $this->comercio,
            'total' => $total ?? 0
        ]);
    }

    /**
     * Disponible para usuarios no registrado
     */
    public function store($id){
        if(!$this->session->carrito){
            $this->session->set_userdata('carrito', 0);
        }
        $count = $this->session->carrito;
        $items = $this->session->items ?? array();
        if(!empty($items) && array_key_exists($id, $items)){ 
            $auth_saved = $this->Producto->get_valid_stock($id, $items[$id]);
            if($auth_saved){
                $items[$id] = intVal($items[$id]) + 1;
                $this->session->set_userdata('items', $items);
                $this->session->set_userdata('carrito', intVal($count)+1);
                return redirect('compras');
            }else{
                $this->session->set_flashdata('error', 'Lo sentimos, no hay stock disponible para este producto.');
                return redirect('catalogo');
            }
        }else{
            $items[$id] = 1;
            $auth_saved = $this->Producto->get_valid_stock($id, $items[$id]);
            if($auth_saved){
                $this->session->set_userdata('items', $items);
                $this->session->set_userdata('carrito', intVal($count)+1);
                return redirect('compras');
            }else{
                $this->session->set_flashdata('error', 'Lo sentimos, no hay stock disponible para este producto.');
                return redirect('catalogo');
            }
        }
    }

    public function quitar($id){
        $items = $this->session->items;
        $count = $this->session->carrito;

        if($items[$id] == 1){
            unset($items[$id]);
            if($count == 1){
                $this->session->set_userdata('items', []);
                $this->session->set_userdata('carrito', 0);
                return redirect('compras');
            }
            $count = intVal($count) - 1;
            $this->session->set_userdata('carrito', $count);
            $this->session->set_userdata('items', $items);
            return redirect('compras');
        }
        $items[$id] = (intVal($items[$id])-1);
        $count = intVal($count) - 1;
        $this->session->set_userdata('carrito', $count);
        $this->session->set_userdata('items', $items);
        return redirect('compras');
    }

    public function sumar($id){
        $items = $this->session->items;
        $count = $this->session->carrito;
        $auth_saved = $this->Producto->get_valid_stock($id, $items[$id]+1 );
        if($auth_saved){
            $items[$id] = intVal($items[$id]) + 1; 
            $this->session->set_userdata('items', $items);
            $this->session->set_userdata('carrito', intVal($count)+1);
            return redirect('compras');
        }
        $this->session->set_flashdata('error', 'Lo sentimos, no se pueden agregar más unidades a este producto.');
        return redirect('compras');
    }

    public function quitarproducto($id){
        $items = $this->session->items;
        $count = $this->session->carrito;

        $productos_quitados = $items[$id];
        $count = intVal($count) - intVal($productos_quitados);
        if($count == 0){
            $this->session->set_userdata('items', array());
            $this->session->set_userdata('carrito', 0);
            return redirect('compras', 'refresh');
        }else{
            unset($items[$id]);
            $this->session->set_userdata('items', $items);
            $this->session->set_userdata('carrito', $count);
            return redirect('compras', 'refresh');
        }        
    }

    public function vaciar(){
        $this->session->set_userdata('items', array());
        $this->session->set_userdata('carrito', 0);
        return redirect('compras', 'refresh');
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
 