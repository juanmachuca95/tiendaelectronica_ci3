<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* date_default_timezone_set('America/Argentina/Buenos_Aires');
 */
class Comercios extends CI_Controller {

    private $view = "comercios";

    public function __construct(){
        parent::__construct();
        $this->load->library(array(
            'template','session','pagination','configpagination',
            'form_validation', 'upload'
        ));
        $this->load->model('Producto');
        $this->load->model('Comercio');
        $this->perPage = 6;
    }

    public function index($offset = 0){
        $status = ($this->session->is_logged) ? true : false;
		if(!$status){ return show_404(); }

        /** Pagination */
        $config = $this->configpagination->config(
            base_url('productos/index'), 
            count($this->Comercio->get_comercios()), 
            $this->perPage
        );

		$this->pagination->initialize($config);
        return $this->template->load('dashboard', $this->view.'/index', [
            'title' => 'Comercios',
            'comercios' => $this->Comercio->get_pagination($config['per_page'], $offset)
        ]);
    }
}
