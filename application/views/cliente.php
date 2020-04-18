<?= $html ?>
<?= $head ?>
<?= $nav ?>
    <body>
        <?=$nav_cliente;?> 
            <?php if(isset($msj)){ ?>
            <p><?=$msj?></p>
            <?php } ?>

            <?php if ($this->session->userdata('items') > 0 && isset($carrito) ) { echo $carrito; }?>
            <div class="container bg-light">
            <div class="row m-0">
                
                <div class="col-md-6 p-4 m-0">
                    <img class="img-fluid" src="<?=base_url('assets/img/comercializacion.jpg')?>" alt="">
                    <p class="lead text-center p-4">
                        ¡Carga tu carrito, llenalo de regalos!. Hace tu pedio y lo mandamos a tu casa!
                    </p>
                    <h3 class="text-center"> &#x1f389;&#x1f381; &#x1f6d2;&#x1f38a;</h3>

                </div>

                <div class="col-md-6 m-0 p-0">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container p-0">
                        <h2 class="font-weight-light px-4 py-4">Comercializaci&oacuten</h2>
                        <p class="lead px-4">
                            Souvenirs ZN le provee al usuario muchisimas herramientas de interaccion, con la empresa. 
                            Whattsapp, email, o simplemente a traves de la pagina web. 
                        </p>
                        <p class="lead px-4">
                            La manera mas comun de comercializacion o la mas sencilla es a traves del boton de compra, que proporciona cada producto para comprar un producto, siempre es recomendable llamar a souvenir ZN para corroborar que se ha realizado o se va a realizar dicha compra del producto. 
                            Otra forma de obtener tu producto es a traves de pedidos que lo hacen en la misma pagina. Importante que empezar a hacer pedido tenes que <strong>Registrate para poder Usar el Panel de Pedidos.</strong>
                        </p>
                    </div>
                    </div>
                </div>
            
            </div>
                 
           
        </div>
    <?= $footer ?>
































    <!--
        <div class="col-sm-12 col-md-5 p-0">
                    <div class="card p-5">
                    <?php if($this->session->userdata('pedidos_confirmados') > 0) { ?>
                        <h3 class="font-weight-bold">Informes y/o Modificaciones de Pedidos</h3>
                        <p class="lead">Pedidos Totales: <strong><?=$this->session->userdata('pedidos_confirmados') ?> </strong> | 
                        <a class="text-decoration-none text-danger" href="<?=base_url('cliente/eliminarPedido')?>">Cancelar Pedido</a></p>
                        <hr>

                        <h4 class="text-info font-weight-bold"> Pedido pendiente de entrega: </h4>
                        <p class="lead">Para realizar m&aacutes pedidos o consultas, escribenos a:  <a class="text-decoration-none text-dark" href="https://wa.me/5493757570174"><img src="<?=base_url('assets/img/icons/w.png')?>" width="28px;" alt=""> 03757 57-0174</a></p>
                    <?php } else {  ?>
                        <h1 class="font-weight-bold">¡Selecciona tu producto!</h1>
                        <hr>
                        <p class="lead">Solo tenes que elegir lo que te gusta, "Agregarlo a Pedidos"&#x1f6d2;.</p>
                        <p class="lead">¡Luego venis a tu Panel de Pedidos, elegis la cantidad y reserva tu Pedido!</p>
                        <p class="lead">Tan simple como eso ;=)</p>
                    <?php }  ?>
                    </div>
                </div>
    -->