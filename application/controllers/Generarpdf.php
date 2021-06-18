<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Generarpdf extends CI_Controller{
    private $view = 'generarpdf';
    private $comercio;

    public function __construct(){
        parent::__construct();
        $this->load->model(array('Orden', 'Detalle', 'Comercio'));
        $this->comercio = $this->Comercio->find(1);
    }

    public function index($id){
        $orden = $this->Orden->get_orden($id);
        $detalle = $this->Detalle->get_detalles($orden->id);
        $data = ['detalles' => $detalle, 'orden' => $orden, 'comercio' => $this->comercio];
        $dompdf = new Dompdf();
        
        $html = $this->load->view('generarpdf/ordencompra',$data,true);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream();
    }

}