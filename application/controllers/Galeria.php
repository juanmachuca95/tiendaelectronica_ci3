<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria extends CI_Controller{

    public function __construct(){
		parent ::__construct();
		$this->load->library(array('session'));
        $this->load->model('Producto');
        $this->perPage = 6;
    }

    public function index( $offset = 0 ){
    	$productos = $this->Producto->getProductos();
		$this->load->library('pagination');

		$config['base_url'] = base_url('galeria/index');
		$config['total_rows'] = count($productos);
		$config['per_page'] = 6;

		//Estilos
		$config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination m-0 px-1 pb-4">';
		$config['full_tag_close'] 	= '</ul></nav></div>';
		$config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';
		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span></li>'; 
		$config['first_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span></li>';
		$config['last_tag_open']	= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close'] = '</span></li>';


		$this->pagination->initialize($config);

		$lista = $this->Producto->getPaginacion($config['per_page'], $offset);
		$data = $this->getTemplate();
		$data['lista'] = $lista;
		//print_r($lista);

		$this->load->view('galeria', $data);
    }

    public function getTemplate(){ 
        //si el usuario cargo items.. habra que mostrar

		$data = array (
			'html' => $this->load->view('layout/html','', TRUE ),
			'head' => $this->load->view('layout/head','',TRUE ),
            'nav' => $this->load->view('layout/nav','', TRUE ),	
            'footer' => $this->load->view('layout/footer','', TRUE ),	
		);
		return $data;	
    }

	function detalleProducto($codigo = 0){
		$producto = $this->Producto->datosProducto($codigo);
		$data = $this->getTemplate();
		$data['producto'] = $producto;
		$this->load->view('detalle_producto',$data);
	}

}



?>