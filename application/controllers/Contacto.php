<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->library(array('session'));	
        $data = $this->getTemplate();       
        $this->load->view('contacto',$data);
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
    
    
}