<?= $html ?>
<?= $head ?>
<?= $nav ?>
    <body>
        <!--Contenido col-xs-12 -->
        <div class="container">
            <div class="row my-5">
                <div class="col-md-5">

                </div>
                <div id="home-text" class="col-md-7 p-0 text-white">
                    <div class="p-5 text-center">
                        <p class="display-3 ">

                            ¡Lo que buscas en un solo lugar!

                        </p>
                        <p class="lead ">
                            Encontra tu souvenir y si no lo encontras te lo hacemos. 
                        </p>
                        <p class="lead">
                            Hace crecer tu empresa, pone tu logo. Entr&aacute en la seccion de 
                            institucionales para ver los ejemplos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid home-categoria p-0">
        <div class="container">
        <div class="justify-content-center row py-5">
                <?php if(isset($categorias)){
                    $i = 0;
                        foreach ($categorias as $row) { 
                            if($i < 3) { ?>
                            <div class="col-sm-4 p-2 justify-content-center row">

                                <div class="card bg-light" style="width: 18rem;">
                                    <img src="<?=base_url()?>assets/img/categorias/<?=$row->categoria?>.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">
                                    
                                    <div class="card-body">     
                                        <h4 class="card-title font-weight-bold text-center"><?=$row->categoria?></h4>  
                                        <p class="lead text-dark text-center"><?=$row->descripcion?></p>
                                    </div>
                                </div>
                            </div>
                            
                    <?php $i++; }

                    }
                
                } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center lead">Preciona ver todos para conocer mas a fondo los productos de Souvenirs ZN</p>
                <p class=" text-center"><a class="btn btn-warning" href="<?=base_url('galeria')?>">Ver Todos Los Productos</a></p>
            </div>
        </div>
        
        </div>
    </div>

<?= $footer ?>
    