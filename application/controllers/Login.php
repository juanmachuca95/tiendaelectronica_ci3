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
            return $this->load->view($this->view.'/index', $this->getTemplate());
        }
        $correo = $this->input->post('correo');
        $password = $this->input->post('password');
        if($resultado = $this->Autorizacion->login($correo, $password)){
            echo "roles: ".$resultado->roles_id;
            $role_admin = ($resultado->roles_id == 1) ? true : false;
            if(!$role_admin){
                $data = $this->getTemplate();
                $data = array(
                    'id_cliente' => $resultado->id,
                    'usuario' => $resultado->nombre,
                    'correo' => $resultado->correo,
                    'items' => array(),
                    'is_logged_user' => true,
                );
                $this->session->set_userdata($data);
                return redirect('home');
            }else{
                $data = array(
                    'admin' => $resultado->nombre,
                    'correo' => $resultado->email,
                    'is_logged' => true,
                );
                $this->session->set_userdata($data);
                $data = $this->getTemplate();
                $this->load->view('login',$data);
            }

        }
        $data = $this->getTemplate();
        $data['error'] = "Los datos ingresados no tienen permisos de acceso.";
        $this->load->view('login',$data);
    }
    
	public function getTemplate(){
		$data = array(
			'html' => $this->load->view('layout/html','', TRUE),
            'head' => $this->load->view('layout/head','',TRUE),	
            'nav' => $this->load->view('layout/nav','', TRUE),	
            'footer' => $this->load->view('layout/footer','', TRUE),
		);
		return $data;	
	}


    public function logout(){
        $data = array('admin','correo','is_logged');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        redirect('login','refresh');
    }



    public function registro(){
        $data = $this->getTemplate();
        $data['form_registro'] = $this->load->view('forms/form_registro','',true);
        $this->load->view('registro', $data); 
    }

    public function registrar(){
        $data = array(
            'nombre'    => $this->input->post('nombre', true),
            'apellido'  => $this->input->post('apellido', true),
            'correo'     => $this->input->post('correo',true),
            'password'  => $this->input->post('password', true),
            'roles_id' => 2, // Cliente
        );

        if($this->Autorizacion->registrar($data)){
            $data = $this->getTemplate();
            $data['msj'] = "Registro exitoso, ya podes logearte en Souvenir ZN";
            $this->load->view('login', $data);
        }else{
            $data['error'] = "Intente nuevamente ha ocurrido un error en el proceso de Registro";
            $data = $this->getTemplate();
            $this->load->view('registro', $data);
        }
    }
}

?>