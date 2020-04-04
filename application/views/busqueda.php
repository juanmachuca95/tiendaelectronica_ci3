<?= $html ?>
<?= $head ?>
<?= $nav ?>
    <body>
    <div class="container p-0">
        <?php if(isset($resultado)) { $cantidad = count($resultado); ?>

            <p class="lead text-center">Cantidad de resultados:  <?=$cantidad?></p>
            <?php
            foreach($resultado as $row) { ?>
            <div class="jumbotron bg-light">
            <div class="row">
                <div class="col-md-3 mr-5">
                    <img class="p-3 bg-warning rounded-circle" src="<?=base_url($row->imagen)?>" style="max-width: 280px;" alt="">
                </div>
                <div class="col-md-8 ">
                    <h1 class="display-4">Categoria: <?=$row->categoria?></h1>
                    <p class="lead">Descripcion: <?=$row->descripcion ?></p>
                    <P class="lead">Precio por unidad: <?=$row->precio?></P>
                    <hr class="my-4">
                    <p>Hace tu pedido registrandote como cliente, accediendo al panel de control o a traves del boton de Mercado Pago</p>
                    <a class="btn btn-primary" href="<?=base_url('cliente/items/'.$row->id)?>" role="button">&#x1f4cb; Hacer Pedido</a>
                    <a class="btn btn-warning text-decoration-none" href="<?=$row->boton_compra;?>">&#x1f6d2; Compra </a>
                </div>
            </div>
            
            
            </div> 
        <?php } }?>
        <?php if(isset($error)){ ?>
            <div class="jumbotron jumbotron-fluid bg-light">
            <div class="container">
                <h1 class="font-weight-light"> &#x1f625; <?=$error?></h1>
                <p class="lead">Intenta nuevamente con otra palabra o dirigete a <a class="text-decoration-none font-weight-bold text-info" href="<?=base_url('home/galeria')?>">Galeria de Productos</a></p>
            </div>
            </div>
        <?php }?>
    </div>
    
    <?= $footer ?>