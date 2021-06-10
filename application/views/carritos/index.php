
    <body>
    <div class="container pb-4 pt-0 px-0">

    <?php if(isset($error)){ ?>
        <p><?=$error?></p>
    <?php } ?>

        <div class="row m-0">
            <div class="bg-light col-sm-12 col-md-7 p-0">
            <?php if(isset($listaPedidos)){  ?>
                <div class="table-responsive">
                    <table class="table table-striper">
                        <thead>
                            <th scope="col">id</th><th scope="col">Producto</th><th scope="col">Precio</th><th scope="col">Cantidad</th><th scope="col">SubTotal</th><th scope="col">Acciones</th>
                        </thead>
                        <tbody>
                        <?php 
                            $subtotales = 0;
                                foreach($listaPedidos as $row){ $cantidad = array_count_values($this->session->userdata('items')); ?>
                            <tr>
                                <td><?=$row->id?></td><td><?=$row->descripcion?></td><td><?=$row->precio?></td>
                                <td>
                                    <input class="form-control" type="text" name="cantidad" id="cantidad" min="1" max="<?=$row->stock?>" 
                                    placeholder="Cantidad" value="<?=$cantidad[$row->id]?>" readonly>
                                </td>
                                <td>
                                    <?php $subtotales = $subtotales + ( $valor = ($cantidad[$row->id] * $row->precio) ); 
                                        echo " ".$valor; 
                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('cliente/eliminarItem/'.$row->id)?>">
                                    Quitar
                                    </a>
                                </td>
                            </tr>
                            
                            <?php } ?>                
                            <tr>
                                <td colspan="1"></td><td colspan="3"><strong> Total de su Pedido: </strong></td><td><?="$".$subtotales;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="p-4">
                <h3 class="font-weight-bold">¡Confirma tu Pedido!</h3>
                    <p class="font-weight-light">
                        Se reservara y la administracion se pondra en contacto contigo dentro de las 24 hs. para definir puntos de entrega o tipos envios
                        
                    <form action="<?=base_url('cliente/cargarPedido/')?>" method="post">

                    <input class="form-control mb-2" type="tel" id="celular" name="celular" 
                    placeholder="Ejemplo: 03794-69-0474 (11 digitos con guiones)" 
                    pattern="[0-9]*{4}-[0-9]*{2}-[0-9]*{4}" required>
                    <small><?php if(isset($fallo) ) { echo $fallo; }?></small>
                        <button class="btn btn-warning " type="submit" role="button">Confirmar </button> 
                    </form>
                        
                    </p>
                </div>
            <?php
            }else { 
                ?>
                <div class="p-4 text-center">
                    <h3 class="display-3">No tenes nuevos pedidos todavia.</h3>
                    <p class="lead">
                        Empeza ahora consegu&iacute lo que necesitas y te lo mandamos a tu casa!.&#x1f69a;                               
                    </p>
                    <h4 class="font-weight-bold text-warning">¡¿Que Esperas?!</h4>
                </div>

            <?php } ?>               
            
            </div>
            
            
            <div class="col-sm-12 col-md-5 p-0">
                <div class="card p-5">
                    <h1 class="font-weight-bold">¡Selecciona tu producto!</h1>
                    <hr>
                    <p class="lead">Solo tenes que elegir lo que te gusta, "Agregarlo a Pedidos"&#x1f6d2;.</p>
                    <p class="lead">¡Luego venis a tu Panel de Pedidos, elegis la cantidad y reserva tu Pedido!</p>
                    <p class="lead">Tan simple como eso ;=)</p>
                </div>
            </div><!--Cierre de fila-->
        </div>
    
    </div>