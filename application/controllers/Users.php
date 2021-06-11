<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    private $view = "users";

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation', 'upload'
        ));
        $this->load->model('User');
        $this->load->model('Producto');
        $this->perPage = 6;
    }

    public function index($offset = 0){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('users/index'), 
            count($this->User->get_users()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Usuarios',
            'users' => $this->User->get_pagination($config['per_page'], $offset)
        ]);
    }

    public function create(){
        return $this->template->load('app', $this->view.'/create'); //optional data
    }

    public function store(){
        // falta validar en algún momento
        $data = array(
            'nombre'    => $this->input->post('nombre'),
            'apellido'  => $this->input->post('apellido'),
            'email'     => $this->input->post('correo'),
            'password'  => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'roles_id' => 2, // Cliente
        );
        
        if(!$this->User->create($data)){
            return $this->template->load('app', $this->view.'/create', [
                'error' => 'Intente nuevamente ha ocurrido un error en el proceso de Registro' 
            ]);  
        } 
        $data['msj'] = "Registro exitoso, ya podes logearte en Souvenir ZN";
        return $this->template->load('app', 'login/index', $data);
    }

    public function active($id, $active){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }
        
        $active = ($active == 0) ? true : false;
        $this->User->active($id, $active);
        redirect('users');
    }

    public function destroy($id){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        $user = $this->User->find($id);
        if(!$this->User->delete($id)){
            $this->session->set_flashdata('error', 'Ha ocurrido un error inesperado');
            return $this->template->load('dashboard', $this->view.'/index', ['title' => 'Usuarios']); 
        }
        $this->session->set_flashdata('success', 'Se ha eliminado un usuario.');
        return redirect('users');
    }
}