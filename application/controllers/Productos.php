<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    private $view = "productos";

    public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('Autorizacion');
    }

    public function index(){
        return $this->template->load('app', $this->view.'/index', [
            ''
        ]);
    }
}