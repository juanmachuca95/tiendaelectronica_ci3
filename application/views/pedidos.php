<?= $html ?>
<?= $head ?>
<body style="background-image: none">
    <div class="container-fluid bg-dark text-white p-0 h-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="py-5 font-weight-bold">Pedidos: 
                        <?=(isset($cantidad_pedidos))? $cantidad_pedidos : ''; ?>
                    </h2>
                    <?=(null !== ($msj = $this->session->flashdata('msj')))?  $msj : ''; ?>
                    <p class="font-weight-light">
                        Pedidos pendientes : <?=(isset($cantidad_pedidos)) ? $cantidad_pedidos : 'Sin Pedidos.' ?> 
                        / 
                        Total de Pedidos Entregados: <?=(isset($entregados)) ? $entregados : 'Sin entregas Actuales.';?>
                    </p>
                    <p class="text-warning font-weight-light">Comunicate con tu cliente en caso de algun problema por Email o Celular.</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <h5 class="font-weight-bold">Informe de Pedidos: </h5>
                    <?php if(isset($mensaje)) : ?> 
                        <p class='lead text-warning'><?=$mensaje?></p> 
                    <?php else: ?>
                    <p class="lead">Sin reportes.  &#x1f514;</p>
                    <?php endif; ?>
                    <?php if(isset($faltante)) : foreach ($faltante as $row) : ?>
                            <small class="text-primaty">
                                Cod. de Producto faltante: <?=$row?>
                            </small>
                    <?php  endforeach; endif;?>
                </div>
                
                <div class="col-md-9">
                    <?php if (isset($productos) && isset($info_items)) : $subtotal = 0; ?>
                        
                        <h4>Detalle del Pedido : <?=$pedido?></h4>
                        <div class="table-responsive p-2">
                            <table class="table table-light table-hover">
                                <thead>
                                    <th scope="col">Cod. Producto descripci&oacuten</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </thead>
                            <tbody>
                            <?php while ($dato = current($info_items)){ $llave = key($info_items); ?>
                                
                                <?php foreach($productos as $row): if($row->id == $llave): ?>
                                    <tr>
                                        <td>
                                            <p class="font-weight-light"> <?=$row->id." ".$row->descripcion;?> </p>
                                        </td>
                                        <td>
                                            <p class="font-weight-light"> <?=$row->precio?></p>
                                        </td>
                                        <td>
                                            <p class="font-weight-light"> <?= $cantidad = $info_items[$llave]?></p>
                                        </td>
                                        <td>
                                            <p class="font-weight-light"><?=$cantidad * $row->precio; $subtotal = $subtotal + $cantidad * $row->precio;?></p>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                
                            <?php next($info_items); } ?>
                                <tr>
                                    <td colspan="3"><p class="font-weight-light">Total del Pedido: </p></td>
                                    <td><p class="font-weight-light"><?=$subtotal?></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            <!--Pedidos-->
            <?php elseif(isset($todos_los_pedidos)): ?>
            <div class="row m-0">
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead>
                            <th>Id_pedido</th>
                            <th>Cliente</th>
                            <th>items</th>
                            <th>Celular</th>
                            <th>Acciones</th>    
                        </thead>
                        <tbody>

                            <?php foreach ($todos_los_pedidos as $row) :

                                //if($row->entregado == false){ //solo pedidos que no se  halla entregado
                                $data = array(
                                    'id_cliente'=>$row->id_cliente,
                                    'id_pedido'=>$row->id_pedido,
                                ); ?>
                                <tr>
                                    <td><?=$row->id_pedido?></td>
                                    <td><?=$row->nombre." ".$row->apellido?></td>
                                    <td>
                                    <a href="<?php  echo base_url('admin/detalle/'.$row->id_pedido); ?>" >
                                        Detalle
                                    </a>
                                    </td>
                                    <td><?=$row->correo?></td>
                                    <td><?=$row->celular?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?=base_url('admin/confirmarPedido/'.$data['id_pedido'])?>">Confirmar</a>
                                        <a class="btn btn-danger" href="<?=base_url('admin/eliminarPedido/'.$data['id_pedido'])?>">Eliminar</a>
                                    </td>
                                </tr>

                                
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <?php
                            $next = $current_page + 1;
                            $prev = $current_page - 1;

                            if($prev < 0){
                                $prev = 0;
                            }
                            if($next > $last_page){
                                $next = $last_page;
                            }
                        ?>
                            <li class="page-item"><a class="page-link" href="<?=base_url('admin/pedidos/'.$prev)?>">Previous</a></li>
                            
                            <?php for($i = 1; $i <= $last_page; $i++) { ?>
                            
                            <li class="page-item"><a class="page-link" href="<?=base_url('admin/pedidos/'.$i)?>"><?=$i?></a></li>
                            
                            <?php } ?>
                            <li class="page-item"><a class="page-link" href="<?=base_url('admin/pedidos/'.$next)?>">Next</a></li>
                        </ul>
                    </nav>        
                </div>
                <?php endif;  ?>
            </div> 
        </div> <!--Cierre de div container-->
    <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.js"></script>
    <script src="<?=base_url()?>/assets/js/myJQuery.js"></script>
    <script src="<?=base_url()?>/assets/js/validation.js"></script>
</body>
