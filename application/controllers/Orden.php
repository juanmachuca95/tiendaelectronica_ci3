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
        $this->load->model('Orden');
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

    public function create($id){
        $status = ($this->session->is_logged_user) ? true : false;
        if(!$status) { return show_404(); }

        return $this->template->load('app', $this->view.'/create', [
            'producto' => $this->Producto->find($id),
            
        ]);
    }

    
}