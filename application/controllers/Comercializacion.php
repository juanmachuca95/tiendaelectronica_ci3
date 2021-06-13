<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercializacion extends CI_Controller {
    private $view = 'comercializacion';
    private $comercio;

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session', 'template'));	
        $this->load->model(array('Comercio'));
        $this->comercio = $this->Comercio->find(1);
    }

    public function index(){
        return $this->template->load('app', $this->view.'/index',[
            'comercio' => $this->comercio
        ]);
    }
}