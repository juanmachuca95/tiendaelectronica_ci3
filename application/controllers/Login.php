<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private $view = 'login';
    private $route = 'login';

	public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->library(array('session'));	
        $this->load->model('Autorizacion');
	}

	public function index(){
        return $this->template->load('app', $this->view.'/index');
    }

    public function login(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('correo', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE){
            return $this->template->load('app', $this->view.'/index');
        }
        $correo = $this->input->post('correo');
        $password = $this->input->post('password');
        /*echo "<pre>";
        print_r($this->Autorizacion->login($correo, $password));
        */if($resultado = $this->Autorizacion->login($correo, $password)){
            $role_admin = ($resultado->roles_id == 1) ? true : false;
            if(!$role_admin){
                $data = array(
                    'users_id'      => $resultado->id,
                    'nombre'        => $resultado->nombre,
                    'apellido'      => $resultado->apellido,
                    'direccion'     => $resultado->direccion,
                    'telefono'      => $resultado->telefono,
                    'email'         => $resultado->email,
                    'carrito'       => 0,
                    'items'         => array(),
                    'is_logged_user' => true,
                );
                $this->session->set_userdata($data);
                return redirect('home');
            }else{
                $data = array(
                    'admin' => $resultado->nombre,
                    'email' => $resultado->email,
                    'is_logged' => true,
                );
                $this->session->set_userdata($data);
                return redirect('admin');
            }

        };
        return $this->template->load('app', $this->view.'/index', [
            'error' => "Los datos ingresados no tienen permisos de acceso."
        ]);
    }


    public function logout(){
        $data = array('admin','correo','is_logged');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        redirect('login','refresh');
    }
}

?>