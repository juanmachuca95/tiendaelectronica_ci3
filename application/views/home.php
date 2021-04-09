<?= $html ?>
<?= $head ?>
<?= $nav ?>

<body>
    <!--Contenido col-xs-12 -->
    <div class="container-fluid">
        <!-- <div class="row my-5">
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
            </div> -->
        <div class="row">
            <div class="col-md-12 p-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active text-center" style="background-color: black;">
                            <img class="img-fluid" src="<?= base_url('assets/img/carousel/imagen1.png') ?>" alt="imagen_1">
                            <div class="carousel-caption d-none d-md-block">
                                <!--   <h5>...</h5>
                                <p>...</p> -->
                            </div>
                        </div>
                        <div class="carousel-item bg-info text-center">
                            <img class="img-fluid" src="<?= base_url('assets/img/carousel/imagen2.png') ?>" alt="imagen_2">
                            <div class="carousel-caption d-none d-md-block">
                                <!--  <h5>...</h5>
                                <p>...</p> -->
                            </div>
                        </div>
                        <div class="carousel-item bg-white text-center">
                            <img class="img-fluid" src="<?= base_url('assets/img/carousel/imagen3.png') ?>" alt="imagen_3">
                            <div class="carousel-caption d-none d-md-block">
                                <!--  <h5>...</h5>
                                <p>...</p> -->
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 1 - Presentación -->

    <div class="container-fluid home-categoria p-0">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 d-flex align-items-center" style="max-height: 500px;">
                    <h1 class="pt-5 pb-4 font-weight-bold text-center">¿Qué es el SouvenirsZN?</h1>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-center">
                    <h3 class="font-weight-light text-left p-5">
                        <p> Somos una tienda de regalos originales y creativos, novedades, productos relacionados con el Arte y artículos de todo tipo.</p>
                    </h3>
                </div>

            </div>


            <h1 class="font-weight-bold text-center"> ¡Bienvenidos! </h1>
            <div class="lead text-center">
                <p> Los productos de nuestra tienda son epeciales, excentricos, originales, y en su mayoria realizados a medida.</p>
                <p> ¡Si quieres regalar algo especial! Llegaste al lugar indicado. </p>
            </div>

            <!--Introducción a los productos -->
            <h3 class="font-weight-light text-center"> &#x2b50; Productos destacados &#x2b50;</h3>
            <div class="justify-content-center row py-5">

                <!-- FORMA DINIAMICA DE MOSTRAR LAS CATEGORIAS 
                    <?php if (isset($categorias)) {
                            $i = 0;
                            foreach ($categorias as $row) {
                                if ($i < 3) { ?>
                            <div class="col-sm-4 p-2 justify-content-center row">

                                <div class="card bg-light" style="width: 18rem;">
                                    <img src="<?= base_url() ?>assets/img/categorias/<?= $row->categoria ?>.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                                    <div class="card-body">
                                        <h4 class="card-title font-weight-bold text-center"><?= $row->categoria ?></h4>
                                        <p class="lead text-dark text-center"><?= $row->descripcion ?></p>
                                    </div>
                                </div>
                            </div>

                <?php $i++;
                                }
                            }
                        } ?> -->

                <div class="col-sm-4 p-2 justify-content-center row">

                    <div class="card bg-light" style="width: 18rem;">
                        <img src="<?= base_url() ?>assets/img/categorias/amigurrumis.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                        <div class="card-body">
                            <h4 class="card-title font-weight-bold text-center">Osos de Peluche</h4>
                            <p class="lead text-dark text-center">El regalo más clásico tanto para chicos y grandes</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-2 justify-content-center row">

                    <div class="card bg-light" style="width: 18rem;">
                        <img src="<?= base_url() ?>assets/img/categorias/calendarios.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                        <div class="card-body">
                            <h4 class="card-title font-weight-bold text-center">Canlendarios</h4>
                            <p class="lead text-dark text-center">Diseño de calendarios para tu organización, aniversario, etc. </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 p-2 justify-content-center row">

                    <div class="card bg-light" style="width: 18rem;">
                        <img src="<?= base_url() ?>assets/img/categorias/institucionales.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                        <div class="card-body">
                            <h4 class="card-title font-weight-bold text-center">Materiales Institucionales</h4>
                            <p class="lead text-dark text-center">Cuadernos con logos de empresas, estikers y prendas empresariales.</p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center lead">Preciona ver todos para conocer mas a fondo los productos de Souvenirs ZN</p>
                    <p class=" text-center"><a class="btn btn-warning" href="<?= base_url('galeria') ?>">ir a Catálogo de Productos</a></p>
                </div>
            </div>

        </div>
    </div>

    <?= $footer ?>