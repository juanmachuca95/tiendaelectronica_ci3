<?= $html ?>
<?= $head ?>
<?= $nav ?>
    <body>
        <?=$nav_cliente;?> 
            <?php if(isset($msj)){ ?>
            <p><?=$msj?></p>
            <?php } ?>

            <?php if ($this->session->userdata('items') > 0 && isset($carrito) ) { echo $carrito; }?>
            <div class="row m-0">
                
                
                
                 
           
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