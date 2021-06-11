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
        $this->load->model(array('Orden', 'Producto'));
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
            'title' => 'Productos',
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

        if($this->session->id){
            $data = [
                'users_id' => $this->session->id,
            ];
        }

        $items = $this->session->items();
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