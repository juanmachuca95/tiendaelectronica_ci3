<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactos extends CI_Controller {
    private $view = 'contactos';
    private $perPage = 10;
    private $comercio;


    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation',
        )); 
        $this->load->model(array('Comercio', 'Contacto'));	
        $this->comercio = $this->Comercio->find(1);
    }

    public function index( $offset = 0 ){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }

        $config = $this->configpagination->config(
            base_url('contactos/index'), 
            count($this->Contacto->get_contactos()), 
            $this->perPage
        );

        $this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Contactos',
            'contactos' => $this->Contacto->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        return $this->template->load('app', $this->view.'/create',[
            'comercio' => $this->comercio,
        ]);
    }

    public function store(){
        $this->form_validation->set_rules('users_id', 'Usuario', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required|max_length[1000]');

        if (!$this->form_validation->run()){
            return $this->create();
        }

        if(!$this->Contacto->create([
            'users_id'        => $this->input->post('users_id'),
            'descripcion'   => $this->input->post('descripcion')
        ])){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return redirect('contactos/crear');
        }
        $this->session->set_flashdata('success', 'Hemos recibido correctamente tu contacto. Muy pronto recibirás noticias nuestras.');
        return redirect('contactos/crear');
    }


    public function show($id){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }

        return $this->template->load('dashboard', $this->view.'/show',[
            'contacto' => $this->Contacto->find($id)
        ]);
    }

    public function leido($id, $active){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }
        
        $active = ($active == 0) ? true : false;
        $this->Contacto->active($id, $active);
        redirect('contactos');
    }

    public function destroy($id){
        $status = ($this->session->is_logged) ? true : false;
        if(!$status){ return show_404(); }

        $producto = $this->Contacto->find($id);
        if(!$this->Contacto->delete($id)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/index', ['title' => 'Contactos']); 
        }
        $this->session->set_flashdata('success', 'Se ha eliminado una contacto.');
        return redirect('contactos');
    }
}
