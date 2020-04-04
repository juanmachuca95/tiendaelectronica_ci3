<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Autorizacion');
        $this->load->library(array('session'));	
	}

	public function index()
	{
		$data = $this->getTemplate();
		$this->load->view('login', $data);
		
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

    public function login(){
        $email = $this->input->post('correo',true);
        $contrasenia = $this->input->post('password',true); 
        
        if($resultado = $this->Autorizacion->login_admin($email, $contrasenia)){
            //echo "datos correctos";
            $data = array(
                'admin' => $resultado->nombre_admin,
                'correo' => $resultado->email,
                'is_logged' => true,
            );
            $this->session->set_userdata($data);
            redirect('admin','refresh');

        }else if($resultado = $this->Autorizacion->login_usuario($email, $contrasenia))  {
            
            $data = $this->getTemplate();
            $data = array(
                'id_cliente' => $resultado->id_cliente,
                'usuario' => $resultado->nombre,
                'correo' => $resultado->correo,
                //Agregar info de Pedidos de Usuario
                'items' => array(),
                'is_logged_user' => true,
            );
            $this->session->set_userdata($data);
            redirect('home','refresh');

        }else{
            $data = $this->getTemplate();
            $data['error'] = "Los datos ingresados no tienen permisos de acceso.";
            $this->load->view('login',$data);
        }
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

    public function registrarCliente(){
        $data = array(
            'nombre'    => $this->input->post('nombre', true),
            'apellido'  => $this->input->post('apellido', true),
            'correo'     => $this->input->post('correo',true),
            'password'  => $this->input->post('password', true),
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