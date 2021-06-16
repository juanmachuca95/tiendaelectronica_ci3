## Tiendaelectronica 

Desarrollo de tienda electrónica con codeigniter 3.1.4
Boostrap Admin https://adminlte.io/
Boostrap Theme https://themes.getbootstrap.com/

### Librerias creadas:
- Template.php
- Configpagination.php

### SDK MercadoPago
- Las ordenes realizadas con mercado pago generan un payment_id que es guardado en la tabla orden. 
- Link de comprobacion de pagos a traves de la api de mercadopago
    https://api.mercadopago.com/v1/payments/".$payment_id."?access_token=".$this->access_token->mercadopago_key

- Tarjeta de prueba: Nro: 5031 7557 3453 0604 Codigo: 123 Vecimiento: 11/25

### Usuarios 

-Usuario de la aplicación: usuario@gmail.com password: Machuca12
-Administrador de la aplicación: admin@gmail.com password: Machuca12
