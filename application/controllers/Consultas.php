<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {
    private $view = 'consultas';
    private $perPage = 10;

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation',
        ));	
        $this->load->model('Consulta');
    }

    public function index( $offset = 0 ){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $config = $this->configpagination->config(
            base_url('consultas/index'), 
            count($this->Consulta->get_consultas()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Consultas',
            'consultas' => $this->Consulta->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        return $this->template->load('app', $this->view.'/create');
    }

    public function store(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[255]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[1000]');

        if (!$this->form_validation->run()){
            return $this->template->load('app', $this->view.'/create');
        }

        if(!$this->Consulta->create([
            'nombre'        => $this->input->post('nombre'),
            'email'         => $this->input->post('email'),
            'descripcion'   => $this->input->post('descripcion')
        ])){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('app', $this->view.'/create');
        }
        $this->session->set_flashdata('success', 'Hemos recibido correctamente tu consulta. Muy pronto recibirás noticias nuestras.');
        return redirect('consultas/crear');
    }
}