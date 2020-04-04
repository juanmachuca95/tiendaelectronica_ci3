<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->library('session');
        $this->load->model('Producto');
    }

    public function index(){
        $data = $this->getTemplate();
        $this->load->view('busqueda',$data);
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
    
    public function buscar(){

        $dato = $this->input->post('buscar', true);
        //echo "el dato a buscar es $dato";
        $dato_preparado = strtolower($dato);

        if($resultado = $this->Producto->buscar($dato_preparado)){
            //echo $resultado[0]->descripcion;
            $data = $this->getTemplate();
            $data['resultado'] = $resultado;
            $this->load->view('busqueda',$data);
        }else{
            $data = $this->getTemplate();
            $data['error'] = "No se ha encontrado : $dato";
            $this->load->view('busqueda',$data);
        }
        
        
    }
}

?>