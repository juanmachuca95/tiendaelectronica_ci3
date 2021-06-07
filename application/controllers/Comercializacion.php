<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comercializacion extends CI_Controller {
    private $view = 'comercializacion';

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session', 'template'));	
    }

    public function index(){
        return $this->template->load('app', $this->view.'/index');
    }
}