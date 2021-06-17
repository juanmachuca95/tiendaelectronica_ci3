<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* date_default_timezone_set('America/Argentina/Buenos_Aires');
 */
class Test extends CI_Controller {

    private $view = "comercios";
    private $comercio;

    public function __construct(){
        parent::__construct();
        $this->load->model('Producto');
        $this->load->model('Comercio');
        $this->comercio = $this->Comercio->find(1);
        $this->perPage = 6;
    }

    public function index(){
        echo "TEST PARA BORRAR IMAGENES";
        
        $imagen_old = str_replace(base_url('/'), "", $this->comercio->imagen);
        unlink($imagen_old);

    }

}