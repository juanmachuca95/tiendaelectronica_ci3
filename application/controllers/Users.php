<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    private $view = "users";

    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('Autorizacion');
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
        
        if(!$this->Autorizacion->registrar($data)){
            return $this->template->load('app', $this->view.'/create', [
                'error' => 'Intente nuevamente ha ocurrido un error en el proceso de Registro' 
            ]);  
        } 
        $data['msj'] = "Registro exitoso, ya podes logearte en Souvenir ZN";
        return $this->template->load('app', 'login/index', $data);
    }

}