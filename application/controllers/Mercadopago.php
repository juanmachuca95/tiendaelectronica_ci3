<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php'; 

class Mercadopago extends CI_Controller{
    
    private $access_token;

    public function __construct(){
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('Comercio');
        $this->load->model('Orden');
        $this->access_token = $this->Comercio->get_mercadopago(1);
    }


    public function ipn(){
        if($_GET['topic'] == 'payment'){
            $id = $_GET['id'];

            $link = "https://api.mercadopago.com/v1/payments/".$id."?access_token=".$this->access_token->mercadopago_key;
            $json = file_get_contents($link);
            $data = json_decode($json);
            
            if ($data->status == 'approved') { //Aprobado
                $orden = $this->Orden->update_pagado($data->external_reference, $id);
                http_response_code(200);
            }
            if ($data->status == 'rejected') { // Rechazado
                $orden = $this->Orden->update_pagado($data->external_reference, id);
                http_response_code(200);
            }
        }
    }

    public function success(){
        //echo "SE HA PAGADO CORECTAMENTE";
        $id = $_GET['payment_id'];
        $link = "https://api.mercadopago.com/v1/payments/".$id."?access_token=".$this->access_token->mercadopago_key;
        $json = file_get_contents($link);
        $data = json_decode($json);
        $orden = $this->Orden->set_payment_id($data->external_reference, $id);
        $this->session->set_userdata('items', array());
        $this->session->set_userdata('carrito', 0);
        $this->session->set_flashdata('success', '¡Muchas gracias! Tu pago se ha registrado correctamente. En los proximos días te llegara tu pedido.');
        return redirect('home');
    }

    public function failure(){
        //echo "HA FALLADO LA COMPRA";
        $this->session->set_flashdata('error', 'Ha ocurrido un error, no se ha podido registrar el pago. Intentelo de nuevo más tarde.');
        return redirect('home');  
    }

    public function pending(){
        //echo "LA COMPRA ESTA PENDIENTE";
        $this->session->set_flashdata('error', 'La compra esta pendiente a pagarse. Una vez hayas realizado el pago puedes realizar el seguimiento de tu compra con tu número de orden.');
        return redirect('home'); 
    }

}


?>