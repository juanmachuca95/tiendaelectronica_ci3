<!DOCTYPE html>
<html lang="en">
<head>    
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souvenirs ZN</title>
    <link rel="shortcut icon" href="<?=$comercio->imagen;?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/miestilo.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">

    <link href="https://fonts.googleapis.com/css?family=Bellota|Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <div class="nav_personalizado">
            <nav class="navbar navbar-expand-lg navbar-light font-weight-bold py-3">
                <a class="navbar-brand mr-0 text-white" href="<?=base_url('home')?>">
                    <img src="<?=$comercio->imagen?>" height="90px;" width="90px" class="img-fluid img-thumbail d-inline-block align-top rounded-circle" alt="logo">
                </a>

                <button class="navbar-toggler bg-warning border border-light"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('/')?>">Inicio</a>
                        </li>
                        <?php if($this->session->is_logged_user) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-white border border-white rounded" href="<?=base_url('carritos')?>">
                                <i class="fas fa-cart-plus text-white"> <span id="carrito"> <?=$this->session->carrito; ?></span></i>
                            </a>
                        </li>
                        <?php endif; ?>

                        <?php if(!$this->session->is_logged_user && $this->session->carrito > 0) : ?>
                            <li class="nav-item">
                            <a class="nav-link text-white border border-white rounded" href="<?=base_url('compras')?>">
                                Tu compra <i class="fas fa-shopping-cart"></i> <span id="carrito"><?=$this->session->carrito; ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('catalogo')?>">Catálogo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('comercializacion')?>">Comercialización</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('consultas/crear')?>">Consultas</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('contactos/crear')?>">Contactos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('nosotros')?>">¿Quienes Somos?</a>
                        </li>

                        <?php if($this->session->is_logged_user || $this->session->is_logged) :?>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$this->session->nombre.' '.$this->session->apellido;?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li ><a class="dropdown-item" href="<?=base_url('salir')?>">Salir</a></li>
                          </ul>
                        </li>
                        <?php else: ?>
                        <a class="nav-link text-white" href="<?=base_url('inicio')?>">
                            Login 
                        </a>

                        <?php endif;?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <?php 
        if($this->session->flashdata('success')) : 
            $success = $this->session->flashdata('success'); 
            $this->session->unset_userdata('success');
    ?>
    <div class="container-fluid alert alert-success m-0">
        <div class="container m-0">
            <p class="p-3 m-0">
                <?=$success;?>
            </p>
        </div>
    </div>
    <?php endif; ?>

    <?php 
        if($this->session->flashdata('error')) :
            $error = $this->session->flashdata('error');
            $this->session->unset_userdata('error');
    ?>
    <div class="container-fluid alert alert-danger m-0">
        <div class="container m-0">
            <p class="p-3 m-0">
                <?=$error;?>
            </p>
        </div>
    </div>
    <?php endif; ?>
    </div>

    <?=$body;?>



    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
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
        <h3 class="font-weight-light fuente mb-4 text-center  text-warning"><?=$comercio->comercio;?></h3>
        <p class="text-center lead text-white"><?=$comercio->descripcion;?>  </p>
        <p class="text-center lead text-white"></p>
        
        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">
        <h3 class="font-weight-bold fuente  mb-4 text-justify-center text-warning">Acerca de</h3>

        <ul class="list-unstyled text-justify-center">
            <li><p><a class="lead text-white" href="<?=base_url('nosotros')?>">QUIENES SOMOS</a></p></li>
            <li><p><a class="lead text-white" href="<?=base_url('terminos')?>">TERMINOS Y CONDICIONES</a></p></li>
         </ul>

        </div>
        <hr class="clearfix w-100 d-md-none">
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">
        <h3 class="font-weight-bold text-center mb-4 fuente text-warning">Contactanos</h3>
        <ul class="list-unstyled text-center">
            <li>
            <p>
                <a class="text-decoration-none text-white lead" href="#">
                <i class="fas fa-map-marker-alt"></i> 
                    <?=$comercio->direccion;?>
                </a>
            </p>
            </li>
            <li>
                <p>
                    <a class="text-decoration-none text-white lead" href="#">
                    <i class="fas fa-envelope"></i>
                    <?=$comercio->email;?>
                    </a>
                </p>
            </li>
            <li>
                <p>
                    <a class="text-decoration-none text-white lead" href="#">
                    <i class="fas fa-phone-alt"></i>
                    <?=$comercio->telefono;?>
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
            <li>
                <p class="lead">
                    <a href="https://www.facebook.com/souvenireszn/"><i class="fab fa-facebook fa-lg text-white"></i></a>
                </p>
            </li>
            <li>
                <p class="lead">
                    <a href="https://instagram.com/souvenirszn?igshid=pududncn5j0f"><i class="fab fa-instagram fa-lg text-white"></i></a>
                </p>
            </li>
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

<script type="text/javascript">
    
    $('.dropdown').click(function(){

       $('.dropdown-menu').toggleClass('show');

   });

</script>
