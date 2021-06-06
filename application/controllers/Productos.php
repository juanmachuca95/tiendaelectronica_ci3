<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    private $view = "productos";

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation'
        ));
        $this->load->model('Autorizacion');
        $this->load->model('Producto');
        $this->perPage = 6;
    }

    public function index( $offset = 0 ){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('productos/index'), 
            count($this->Producto->getProductos()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Productos',
            'productos' => $this->Producto->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/create', [
            'title' => 'Productos'
        ]);
    }

    public function store(){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $this->form_validation->set_rules('producto', 'Producto', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('descripcion', 'Descripción', 
            'required|max_length[255]'
        );
        $this->form_validation->set_rules('precio', 'Precio',
             'required|numeric');

       
        if (!$this->form_validation->run()){
            return $this->template->load('dashboard', $this->view.'/create', [
                'title' => 'Productos'
            ]);
        }

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('imagen')){
            $error = array('error' => $this->upload->display_errors());
            return $this->template->load('dashboard', $this->view.'/create', [
                'title' => 'Productos',
                'error' => $error
            ]);
        }

        echo $this->upload->data('file_name');


    }

    public function catalogo( $offset = 0 ){
        /** Pagination */
        $config = $this->configpagination->config(
            base_url('catalogo'), 
            count($this->Producto->getProductos()), 
            $this->perPage
        );
		$this->pagination->initialize($config);
        return $this->template->load('app', $this->view.'/catalogo', [
            'productos' => $this->Producto->getPaginacion($config['per_page'], $offset)
        ]);
    }
}