<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souvenirs ZN</title>
    <link rel="shortcut icon" href="<?=base_url('assets/img/icons/favicon.png')?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/miestilo.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Bellota|Lobster&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!-- mi barra de navegacion -->
    <header>
        <div class="nav_personalizado">
            <nav class="navbar navbar-expand-lg navbar-light font-weight-bold ">
                <a class="navbar-brand mr-0 text-white" href="<?=base_url('home')?>">
                    <!-- <img src="<?=base_url()?>assets/img/logo.png" width="90" height="90" class="d-inline-block align-top rounded-circle" alt="logo"> -->
                    TiendaElectrónica
                </a>

                <button class="navbar-toggler bg-warning border border-light"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        
                        <?php if(null !== $this->session->userdata('usuario')) {?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('carritos')?>">
                            Mi Carrito <i class="fas fa-shopping-cart fa-lg"></i>
                            <span id="carrito"><?=$this->session->carrito; ?></span> 
                        </a>
                    
                        </li>
                        <?php }else{ ?>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('login')?>">
                                
                            ¿ Activar Carrito &#x1f6d2; ?
                            
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="<?=base_url('catalogo')?>">Catálogo</a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="<?=base_url('comercializacion')?>">Comercializaci&oacuten <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('contactos')?>">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('consultas/crear')?>">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <?php if($this->session->is_logged_user || $this->session->is_logged) :?>
                            <a class="nav-link text-white" href="<?=base_url('salir')?>">
                                Salir <i class="fas fa-sign-in-alt fa-lg"></i>
                            </a>
                            <?php else: ?>
                            <a class="nav-link text-white" href="<?=base_url('inicio')?>">
                                Login <i class="fas fa-sign-in-alt fa-lg"></i>
                            </a>
                           <?php endif; ?>
                        </li>
                        <!-- <form class="form-inline my-2 my-lg-0" action="<?=base_url('busqueda/buscar')?>" method="POST">
                            <input class="form-control mr-sm-2 col-xs-8" type="search" name="buscar" placeholder="Encuentra lo que quieres" aria-label="Search" required>
                            <div class="my-2 my-sm-0 col-12 col-sm-1 p-0 m-0">       
                                <button class="btn btn-warning" type="submit">Buscar</button>
                            </div>
                        </form> -->
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <?php if($this->session->success) :?>
    <div class="container-fluid alert alert-success m-0">
        <div class="container m-0">
            <p class="p-3 m-0">
                <?=$this->session->success;?>
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php if($this->session->error) :?>
    <div class="container-fluid alert alert-danger m-0">
        <div class="container m-0">
            <p class="p-3 m-0">
                <?=$this->session->error;?>
            </p>
        </div>
    </div>
    <?php endif; ?>
    </div>

    <?=$body;?>




    <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.js"></script>
    <script src="<?=base_url()?>/assets/js/myJQuery.js"></script>
    <script src="<?=base_url()?>/assets/js/validation.js"></script>
</body>
<!--Footer-->
<footer class="page-footer">
    <div class="container text-center text-white text-md-left pt-4">
    <div class="row pt-4">
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">
        <h3 class="font-weight-light fuente mb-4 text-center  text-warning">Souvenirs ZN Misiones.</h3>
        <p class="text-center lead text-white">· Diseñador gráfico  </p>
        <p class="text-center lead text-white">· Servicio de impresión </p>
        <p class="text-center lead text-white">· Tienda de regalos</p>
        <p class="text-center lead text-white">· Innovaci&oacuten y personalizaci&oacuten</p>
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
        <h3 class="font-weight-bold fuente  mb-4 text-justify-center text-warning">Acerca de</h3>

        <ul class="list-unstyled text-justify-center">
            <li><p><a  class="lead text-white" href="<?=base_url('nosotros')?>">NOSOTROS</a></p></li>
            <li><p><a class="lead text-white"  href="<?=base_url('terminos')?>">TERMINOS Y CONDICIONES</a></p></li>
          <!--   <li><p><a class="lead text-white"  href="#!">BLOG</a></p></li>
            <li><p><a class="lead text-white"  href="https://juanmachuca95.github.io/">DESARROLLADOR</a></p></li>
  -->       </ul>

        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
        <h3 class="font-weight-bold text-center mb-4 fuente text-warning">Ubicaci&oacuten</h3>
        <ul class="list-unstyled text-center">
            <li>
            <p>
                <a class="text-decoration-none text-white lead" href="https://goo.gl/maps/PrjQue8BMvo7mbcSA">
                <i class="fas fa-map-marker-alt"></i> 
                 Calle La Pampa Puerto Esperanza Misiones
                </a>
            </p>
            </li>
            <li>
                <p>
                    <a class="text-decoration-none text-white lead" href="#">
                    <i class="fas fa-envelope"></i>
                     souvenirzn@gmail.com
                    </a>
                </p>
            </li>
            <li>
            <p>
                <a class="text-decoration-none text-white lead" href="https://wa.me/5493757570174">
                    <i class="fab fa-whatsapp"></i> 03757 57-0174
                </a>
            </p>
            </li>
            <li>
        </ul>

        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">
        <h3 class="font-weight-bold mb-4 text-center fuente text-warning">Segu&iacutenos</h3>
        <ul class="list-unstyled">
            <li><p><a href="https://www.facebook.com/souvenireszn/"><img style="width: 40px;" src="<?=base_url()?>assets/img/icons/f.png" alt="facebook"></a></p></li>
            <li><p><a href="https://instagram.com/souvenirszn?igshid=pududncn5j0f"><img style="width: 40px;" src="<?=base_url()?>assets/img/icons/i.png" alt="instagram"></a></p></li>
            <li><p><a href="<?=base_url()?>"><img style="width: 40px;" src="<?=base_url()?>assets/img/icons/t.png" alt="twitter"></a></li>
            <li><p><a href="<?=base_url()?>"><img style="width: 40px;" src="<?=base_url()?>assets/img/icons/y.png" alt="youtube"></a></li>
        </ul>
        </div>
    </div>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-warning text-center"><strong> © 2020 Copyright:
    <a href="<?=base_url()?>">SouvenirZN.com</a></strong> 
    </div>
    </footer>
</html>