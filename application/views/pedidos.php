<?= $html ?>
    <?= $head ?>

    <body>
    <?= $nav_admin ?>
    <div class="container bg-dark text-white p-0 m-0">
    <?php if(isset($mensaje)){ echo "<p class='bg-dark text-white p-3'>".$mensaje. "</p>"; } ?>
    <p class="display-4 pb-3 pt-2 px-4">
        Lista de pedidos : <?php if ( isset($todos_los_pedidos) ) { echo count($todos_los_pedidos);  }?> 
    </p>
    <?php if (isset($productos) && isset($info_items)){ $subtotal = 0; ?>
    <h4>Detalle del Pedido : <?=$pedido?></h4>
                <div class="table-responsive">
                <table class="table table-light table-bordered table-hover">
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
        <th>Acciones</th>
        
        </thead>
        <?php foreach ($todos_los_pedidos as $row) {

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
                <td>
                    <a class="btn btn-warning" href="<?=base_url('admin/confirmarPedido/'.$data['id_pedido'])?>">Confirmar Envio</a>
                    <a class="btn btn-danger" href="<?=base_url('admin/eliminarPedido/'.$data['id_pedido'])?>">Eliminar</a>
                </td>
            </tr>

            
        <?php } //} ?>
        </table>
    </div>
    <?php }  ?>
    
    </div> <!--Cierre de div container-->
    <script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
</body>
