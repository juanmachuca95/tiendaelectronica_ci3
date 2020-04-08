<?= $html ?>
<head>
    <?= $head ?>
</head>
    <body id="fondo_admin">
        <?php if(isset($mensaje)){ ?>
            <p class=" bg-info text-center text-white"><?=$mensaje?></p>
        <?php } ?>
        <?php if(isset($error)){ ?>
            <p class=" bg-warning text-center text-white"><?=$error?></p>
        <?php } ?>
        <?= $nav_admin ?>
        
        <?php if(isset($form_carga)){ ?>
                <?= $form_carga ?>
        <?php } ?>

        <?php if(isset($tablasProducto)){ ?>
            <div class="col-md-12">
                <?= $tablasProducto ?>
            </div>
        <?php } ?>

        <?php if(isset($categorias)){ ?>
            <?= $categoria?>
        <?php } ?>            
        <div class="container">
        
        <div class="row">
            <div class="col-sm-12 col-md-12 p-0 m-0">
                <div class="jumbotron bg-dark text-white m-0">
                    <h2 class="display-5 text-warning">Información General de la App</h2>
                    <p class="lead">
                        La aplicación cuenta con una base de datos. Divididas en Categorias o Secciones.
                        El administrador puede cargar, modificar, eliminar y crear categorias si así lo requiere.
                    </p>
                    <hr class="my-4">
                    <p>
                        Todo tipo de Información adicional o cualquier consulta sobre la estructura del diseño consultar a  <a href="#">machucajuangabriel@gmail.com</a> soporte de desarrollo.</machucajuangabriel@gmail>
                    </p>
                    <a class="btn btn-primary btn-md" href="<?=base_url()?>" role="button">Vista de Usuario</a>
                </div>
            </div>
        </div>
        
        </div>
        <!--Cierre Container-->
        </div>
    
    <script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
</body>
