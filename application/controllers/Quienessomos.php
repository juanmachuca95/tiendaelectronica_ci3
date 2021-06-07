<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quienessomos extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library(array('session'));	
        
    }

    public function index(){
       
        $data = $this->getTemplate();       
        $this->load->view('quienessomos',$data);
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