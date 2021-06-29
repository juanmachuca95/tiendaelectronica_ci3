<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $view = 'home';
	private $comercio;

	public function __construct(){
		parent::__construct();
		$this->load->model(array('Producto', 'Comercio'));
		$this->load->library(array('session', 'template'));	
		$this->comercio = $this->Comercio->find(1);
	}

	public function index(){
		return $this->template->load('app', $this->view.'/index', [
			'comercio' => $this->comercio,
			'productos' => $this->Producto->get_productos_activos()
		]);
	}
}