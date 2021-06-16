<div class="container-fluid">
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



   <!--  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?=base_url('assets/img/carousel/imagen1.png')?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?=base_url('assets/img/carousel/imagen2.png')?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="<?=base_url('assets/img/carousel/imagen3.png')?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->
</div>


<div class="container-fluid home-categoria p-0">
    <div class="container py-5">

         <div class="row py-5">
            <div class="col-12 col-md-4 d-flex align-items-center" style="max-height: 500px;">
                <div class="text-center">
                    <img class="img-fluid w-50" src="<?=$comercio->imagen;?>">  
                </div>
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h3 class="font-weight-bold">¿Qué es el SouvenirsZN?</h3>    
                    <h3 class="lead px-5">  
                        <p> Somos una tienda de regalos originales y creativos, novedades, productos relacionados con el Arte y artículos de todo tipo.</p>
                    </h3>
                </div>
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

            <div class="col-sm-4 p-2 justify-content-center row">

                <div class="card bg-light" style="width: 18rem;">
                    <img src="<?= base_url() ?>assets/img/categorias/tazas.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Tazas para regalo</h4>
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
                    <img src="<?= base_url() ?>assets/img/categorias/remeras.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Remeras personalizadas</h4>
                        <p class="lead text-dark text-center">Las mejores remeras personalizadas.</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center lead">Preciona ver todos para conocer mas a fondo los productos de Souvenirs ZN</p>
                <p class=" text-center"><a class="btn btn-warning" href="<?= base_url('catalogo') ?>">ir a Catálogo de Productos</a></p>
            </div>
        </div>

    </div>
</div>
