<?php 

class Pagos extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    function index(){

    }

    function procesar_pagos(){
        
        MercadoPago\SDK::setAccessToken("TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140");
    
        $merchant_order = null;
        if(isset($_GET["topic"])){
        var_dump($_GET["topic"]);    
        
        switch($_GET["topic"]) {
            case "payment":
                $payment = MercadoPago\Payment::find_by_id($_GET["id"]);
                // Get the payment and the corresponding merchant_order reported by the IPN.
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($payment->order->id);
                break;
            case "merchant_order":
                $merchant_order = MercadoPago\MerchantOrder::find_by_id($_GET["id"]);
                break;
        }
    

        $paid_amount = 0;
        foreach ($merchant_order->payments as $payment) {
            if ($payment['status'] == 'approved'){
                $paid_amount += $payment['transaction_amount'];
            }
        }
    
        // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items
        if($paid_amount >= $merchant_order->total_amount){
            if (count($merchant_order->shipments)>0) { // The merchant_order has shipments
                if($merchant_order->shipments[0]->status == "ready_to_ship") {
                    print_r("Totally paid. Print the label and release your item.");
                }
            } else { // The merchant_order don't has any shipments
                print_r("Totally paid. Release your item.");
            }
        } else {
            print_r("Not paid yet. Do not release your item.");
        }
    
        }
    }

}

?>