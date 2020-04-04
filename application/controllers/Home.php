<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto');
		$this->load->library(array('session'));	
	}

	public function index()
	{
		$data = $this->getTemplate();
		$this->load->view('home', $data);
	}
	
	public function getTemplate(){
		
		$data = array(
			'categorias' => $this->getCategorias(),
			'html' => $this->load->view('layout/html','', TRUE),
			'head' => $this->load->view('layout/head','',TRUE),
			'nav' => $this->load->view('layout/nav','', TRUE),	
			'footer' => $this->load->view('layout/footer','', TRUE),		
		);
		return $data;	
	}

	public function galeria(){
		$datos = $this->Producto->getProductos();
		$data = $this->getTemplate();
		$data['lista'] = $datos;
		$this->load->view('galeria', $data);
	}

	public function galeriaCategoria(){
		$categoria = $this->input->post('categoria', true);
		if($categoria == "Todos"){
			$data = $this->getTemplate();
			$data['lista'] = $this->Producto->getProductos();
			$this->load->view('galeria',$data);
		}else{
			$this->galeriaPorCategoria($categoria);
		}
	}

	public function galeriaPorCategoria($categoria){
		$datos = $this->Producto->getProductosCategoria($categoria);
		$data = $this->getTemplate();
		$data['lista'] = $datos;
		$this->load->view('galeria', $data);
	}

	public function getCategorias(){
		if($lista = $this->Producto->getCategorias()){
			return $lista;
		}else{
			return false;
		}
	}
}