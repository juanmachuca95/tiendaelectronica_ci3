<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $view = 'home';

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto');
		$this->load->library(array('session', 'template'));	
	}

	public function index(){
		return $this->template->load('app', $this->view.'/index');
	}
}