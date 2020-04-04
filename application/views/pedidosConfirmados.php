<?= $html ?>
    <?= $head ?>

    <?= $nav ?>
    
    <body>
    <?= $nav_cliente;?>
        <!--info de pedidos de la base de datos -->
        <?php if (isset($resumen)) { ?>
            <div class="container mb-3 bg-light">
                <div class="col-md-12">
                    <p class="display-3"> Tienes un total de  <b class="text-info"><?=count($resumen)?> &#x1f6d2;</b> pedidos. </p>
                    <p class="lead">Selecciona el pedido para ver sus detalles de compra.</p>
                    <?php foreach ($resumen as $row) { ?>
                    <a class="btn btn-info"  href="<?=base_url('cliente/mostrarItems/'.$row->id_pedido)?>" role="button">
                        Pedido codigo: <?=$row->id_pedido?>
                    </a>
                    <?php } ?>
                </div>
            <br>
            <?php if (isset($productos) && isset($info_items)){ $subtotal = 0; ?>
                <div class="col-md-12">
                <h2 class="font-weight-bold">Estado del Pedido:</h2>
                <P class="lead">
                    <?php if($estado->entregado == 1) { //echo $estado->entregado; ?>
                    El envio pedido <strong><?=$id_pedido?> &#x1f69a;. ¡Esta Confirmado!</strong> Gracias por tu compra.
                    <a class="text-info" href="<?=base_url('cliente/cancelarPedido/'.$id_pedido)?>">Eliminar pedido del Historal ?</a>
                    <?php } else { ?>
                    El pedido <strong><?=$id_pedido?></strong> est&aacute en espera. Aguarda un poco mas, Pronto llegara. 
                </P>
                    <?php } ?>
                <p class="lead">
                    <a class="text-decoration-none text-dark" href="https://wa.me/5493757570174">Consultar sobre este Pedido al: 
                        <img src="<?=base_url('assets/img/icons/w.png')?>"width="28px;" alt="">
                         03757 57-0174
                    </a>
                </p>
                <div class="table-responsive">
                <table class="table table-bordered table-hover">
                <thead>
                    <th scope="col">Cod. Producto descripci&oacuten</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </thead>
                <tbody>
                <?php
                while ($dato = current($info_items)){
                    $llave = key($info_items);
                    
                    //echo $llave;
                    //var_dump($llave);

                    foreach($productos as $row){
                        if($row->id == $llave){ ?>
                        <tr>
                            <td><p class="font-weight-light"> <?=$row->id." ".$row->descripcion;?> </p></td>
                            <td><p class="font-weight-light"> <?=$row->precio?></p></td>
                            <td><p class="font-weight-light"> <?= $cantidad = $info_items[$llave]?></p></td>
                            <td><p class="font-weight-light"><?=$cantidad * $row->precio; $subtotal = $subtotal + $cantidad * $row->precio;?></p></td>
                        </tr>
                        <?php }
                    }
                    
                    next($info_items);
                } ?>
                <tr>
                    <td colspan="3"><p class="font-weight-light">Total del Pedido: </p></td>
                    <td><p class="font-weight-light"><?=$subtotal?></p></td>
                </tr>
                </tbody>
                </table>
                </div>
                </div> 
            <?php } ?>
               
                
                
            </div>
        <?php } ?>
    <?= $footer ?>