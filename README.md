## Tiendaelectronica 

Desarrollo de tienda electrónica con codeigniter 3.1.4

### Librerias creadas:
- Template.php
- Configpagination.php

### SDK MercadoPago
- Las ordenes realizadas con mercado pago generan un payment_id que es guardado en la tabla orden. 
- Link de comprobacion de pagos a traves de la api de mercadopago
    https://api.mercadopago.com/v1/payments/".$payment_id."?access_token=".$this->access_token->mercadopago_key