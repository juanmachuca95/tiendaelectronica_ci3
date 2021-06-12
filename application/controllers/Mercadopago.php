<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php'; 

class Mercadopago extends CI_Controller{
    
    private $access_token;

    public function __construct(){
        parent::__construct();
        $this->load->model('Comercio');
        $this->access_token = $this->Comercio->get_mercadopago(1);
    }

    public function index(){

        echo "<pre>";
         // Agrega credenciales
        MercadoPago\SDK::setAccessToken($this->access_token->mercadopago_key);

         // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
      
         // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Mi producto';
        $item->quantity = 1;
        $item->unit_price = 75.56;
        $preference->items = array($item);

        //$preference->items = array($item1,$item2);
        # Guardar y postear la preferencia
        $preference->save();

        $link_btn = $preference->init_point;
        print_r($link_btn);

    }   


    public function success(){
        echo "SE HA PAGADO CORECTAMENTE";
    }

    public function failure(){
        echo "HA FALLADO LA COMPRA";
    }

    public function pending(){
        echo "LA COMPRA ESTA PENDIENTE";
    }

}


?>