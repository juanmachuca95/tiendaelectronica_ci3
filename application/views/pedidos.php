<?= $html ?>
    <?= $head ?>

    <body id="fondo_admin">
        <?= $nav_admin ?>
        <div class="container bg-dark text-white p-0 m-0">
            <div class="row">
                <div class="col-md-12 p-4">
                    <h2 class="px-3 font-weight-bold">Clientes Totales: 
                        <?php if(isset($clientes)){ echo count($clientes); } ?></h2>
                    <p class="lead px-3">
                        Tabla de pedidos para Confirmar o Eliminar. Cuando confirmes un envio observa 
                        la tabla de "Informes de Pedidos" que te permite si el mismo se realizo correctamente 
                        o si ha ocurrido algun error.
                    </p>
                    <p class="px-3">Comunicate con tu cliente en caso de algun problema por Email o Celular.</p>
                </div>
            </div>
        
            <div class="row p-2">
                <div class="col-md-3">
                    <h4 class="font-weight-bold px-4">Informe de Pedidos: </h4>
                    <?php if(isset($mensaje)){ 
                        echo "<p class='lead text-warning pl-4'>".$mensaje. "</p>"; 
                    }else{ ?>
                    <p class="lead pl-4">Sin reportes.  &#x1f514;</p>
                    <?php } ?>
                    <?php if(isset($faltante)){ 
                        foreach ($faltante as $row) { ?>
                            <p class="text-primaty px-3">-> Cod. de Producto faltante: <?=$row?></p>
                    <?php } 
                        } ?>
                </div>
                <div class="col-md-9">
                        <p class="lead px-4">
                            Total de pedidos : <?php if ( isset($cantidad_pedidos) ) { echo $cantidad_pedidos;  }?> 
                            / Total de Pedidos Entregados: <?php if ( isset($entregados) ) { echo count($entregados);  }?>
                        </p>
                        <?php if (isset($productos) && isset($info_items)){ $subtotal = 0; ?>
                        <h4>Detalle del Pedido : <?=$pedido?></h4>
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
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
                    </div>>
                </div> 
            </div>
            <?php } ?>
    <?php if (isset($todos_los_pedidos)) { ?>
    <div class="table-responsive">
        <table class="table table-light table-hover">
        <thead>
        <th>Id_pedido</th>
        <th>Cliente</th>
        <th>items</th>
        <th>Correo</th>
        <th>Celular</th>
        <th>Acciones</th>
        
        </thead>
        <?php foreach ($todos_los_pedidos as $row):

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
                <td><?=$row->correo ?></td>
                <td><?=$row->celular?></td>
                <td>
                    <a class="btn btn-warning" href="<?=base_url('admin/confirmarPedido/'.$data['id_pedido'])?>">Confirmar</a>
                    <a class="btn btn-danger" href="<?=base_url('admin/eliminarPedido/'.$data['id_pedido'])?>">Eliminar</a>
                </td>
            </tr>

            
        <?php endforeach;  //} ?>
        
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
    <?php }  ?>
    
    
    </div> <!--Cierre de div container-->
    <script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
</body>
