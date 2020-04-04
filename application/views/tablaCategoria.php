<?= $html ?>
    <?= $head ?>
<body>
<?php if(isset($error)){
    echo '<p class="font-weight-bold text-white text-center bg-warning">'.$error .'</p>';}
?>

    <?= $nav_admin ?>
    <?= $elegir ?>
    <div class="fluid-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    
                <?php if (isset ($listaGeneral )){ ?>
                <div class="table-responsive">
                
                <table class="table table-light table-hover">
                <thead class="thead-dark"> 
                    <th scope="col">id</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Cambios</th>
                </thead>
                <?php  foreach( $listaGeneral as $row ) { ?>
                <tbody>   
                <tr>
                    <td scope="row"><?=$row->id?></td>
                    <td><?=$row->categoria?></td>
                    <td><?=$row->descripcion?></td>
                    <td><?="$".$row->precio?></td>
                    <td><?=$row->stock?></td>
                    <td><img src="<?=base_url($row->imagen)?>" width="40px" alt="imagen"></td>
                    <td><a class="btn btn-warning" href="<?=base_url('admin/editar/'.$row->id)?>">Editar</a> / <a class="btn btn-danger" href="<?=base_url('admin/eliminar/'.$row->id)?>">Eliminar</a></td>
                </tr>
                <?php }} ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
</body>
