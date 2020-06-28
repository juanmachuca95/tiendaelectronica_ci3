<form action="<?=base_url('pagos/procesar_pagos')?>" method="POST">  
<?php
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken('TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140');

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
 
    // Crea un ítem en la preferencia
    $item = new MercadoPago\Item();
    $item->title = 'Mi producto';
    $item->quantity = 1;
    $item->unit_price = 75.56;
    $preference->items = array($item);
    $preference->save();
?> 
    <script
    src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
    data-preference-id="<?php echo $preference->id; ?>">
    </script>
</form>