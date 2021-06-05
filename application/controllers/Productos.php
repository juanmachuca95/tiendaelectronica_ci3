<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    private $view = "productos";

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination'
        ));
        $this->load->model('Autorizacion');
        $this->load->model('Producto');
        $this->perPage = 6;
    }

    public function index( $offset = 0 ){
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