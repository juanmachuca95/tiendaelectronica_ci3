<?= $html ?>
    <?= $head ?>
        <?= $nav ?>
    <body>
        <!-- Modal Imagen-->
        <div class="modal fade" id="modalImagen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-image"></i> Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                <img id="verImagen" class="img-fluid w-100" src="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        <!--Modal Imagen -->

        <?php if(isset($mensaje)){ ?>
            <p class=" bg-info text-center text-white"><?=$mensaje?></p>
        <?php } ?>
        <?php if(isset($error)){ ?>
            <p class=" bg-info text-center text-white"><?=$error?></p>
        <?php  $error =null; } ?>
        
    <div class="container-fluid bg-white p-0">
        <div class="container p-0">
            <div class="row m-0">
                <div class="col-md-12 d-flex justify-content-center pb-4 pt-5">
                    <h4 class="font-weight-bold">Tus Productos <i class="fas fa-gift text-dark"></i>
                    </h4>
                </div>
                <!-- </div>
                    <?php if(isset($lista)){ foreach ($lista as $row){
                            ?>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-5 p-0 bg-light" >
                                
                                <div class="p-3 rounded">    
                                    <a href="#" >
                                        <img id="imagen" src="<?=base_url($row->imagen)?>" class="img-fluid p-1" style="background-size:cover;" alt="imagen">
                                    </a>
                                    <div class="px-3">
                                        <h5 class="font-weight-bold lead pt-4"><?=$row->categoria?></h5>
                                        <p class="lead"><?=$row->descripcion?></p>
                                        <p class="font-weight-bold text-warning"><?='&#x1f6d2; $'.$row->precio?></p>
                                        <p>
                                            <a class="btn btn-warning" href="<?=$row->boton_compra;?>">Compra</a>
                                            <a class="btn btn-primary" href="<?=base_url('cliente/items/'.$row->id)?>">Haz un Pedido</a>
                                        </p>
                                         
                                            <?php
                                                // Agrega credenciales
                                                MercadoPago\SDK::setAccessToken('TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140');

                                                // Crea un objeto de preferencia
                                                $preference = new MercadoPago\Preference();

                                                // Crea un ítem en la preferencia
                                                $item = new MercadoPago\Item();
                                                $item->title = $row->categoria;
                                                $item->quantity = 1;
                                                $item->unit_price = $row->precio;
                                                $preference->items = array($item);
                                                $preference->save();
                                            ?> 
                                            <form action="<?=base_url()?>/procesar-pago" method="POST">
                                                <script
                                                src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                                                data-preference-id="<?php echo $preference->id; ?>"
                                                data-button-label= "Pagar con MercadoPago">
                                                </script>
                                            </form>
                                    </div>
                                </div> 
                            </div>
                            
                            <?php
                        }
                    } ?>
                </div> -->

                </div>
                <!--lista de Productos Nueva-->
                <div class="row m-0 d-flex justify content-center">
                <?php if(isset($lista) && !empty($lista)): foreach($lista as $row) : ?>
                
                    <div class="col-12 col-sm-6 col-md-4 p-1">
                        <div class="card shadow-lg mb-5 bg-white rounded">
                            
                            <a href="#" id="ver"><img class="w-100 img-fluid" src="<?=base_url($row->imagen)?>" alt=""></a>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold mifont"> 
                                   <i class="fas fa-tag"></i> <?=$row->categoria?>
                                </h5>
                                <p class="card-text font-weight-lighter">
                                    <?=$row->descripcion?>
                                </p>
                                <p class="font-weight-light">
                                    Precio <?=$row->precio?>
                                </p>
                                <?php
                                    // Agrega credenciales
                                    MercadoPago\SDK::setAccessToken('TEST-4090271750620604-060403-e7a5c21fc7bdb369d779393cee8f4109-536258140');

                                    // Crea un objeto de preferencia
                                    $preference = new MercadoPago\Preference();

                                    // Crea un ítem en la preferencia
                                    $item = new MercadoPago\Item();
                                    $item->title = $row->categoria;
                                    $item->quantity = 1;
                                    $item->unit_price = $row->precio;
                                    $preference->items = array($item);
                                    $preference->save();
                                ?>
                                <div class="d-flex">
                                <form action="<?=base_url()?>/procesar-pago" method="POST">
                                    <script
                                    src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                                    data-preference-id="<?php echo $preference->id; ?>"
                                    data-button-label= "COMPRAR">
                                    </script>
                                </form>
                                <a href="<?=base_url('galeria/detalleProducto/'.$row->id)?>" class="btn btn-warning text-uppercase mx-1"> Detalles </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif;?>
                </div>

                <?php echo $this->pagination->create_links();?>
                


            </div>
        </div>
    </div>
    <?= $footer ?>
    