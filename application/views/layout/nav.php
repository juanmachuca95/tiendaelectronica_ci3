<!-- mi barra de navegacion -->
<header>
    <div class="nav_personalizado">
        <nav class="navbar navbar-expand-lg navbar-light font-weight-bold ">
                <a class="navbar-brand mr-0" href="<?=base_url('home')?>">
                    <img src="<?=base_url()?>assets/img/logo.png" width="110" height="110" class="d-inline-block align-top rounded-circle" alt="logo">
                </a>

                <button class="navbar-toggler bg-warning border border-light"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-center">
                        
                        <?php if(null !== $this->session->userdata('usuario')) {?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('cliente/carrito')?>">
                            Mis Pedidos (<?= $this->session->userdata('usuario')?><span class="badge badge-warning p-1">
                            &#x1f6d2;
                            <?php if($this->session->userdata("items") !== null && count($this->session->userdata('items')) > 0 ) { 
                                echo count($this->session->userdata('items')); 
                            } 
                            else { 
                                echo  0;
                            } ?></span>)
                        
                        </a>
                    
                        </li>
                        <?php }else{ ?>
                            <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('login')?>">
                                
                            ¿ Activar Carrito &#x1f6d2; ?
                            
                            </a>
                        </li>
                        <?php } ?>
                        <li class="nav-item active ">
                            <a class="nav-link text-white" href="<?=base_url('cliente')?>">Comercializaci&oacuten <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="<?=base_url('galeria')?>">Catálogo de Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('contacto')?>">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('quienessomos')?>">¿Quienes Somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?=base_url('login')?>">Login</a>
                        </li>
                        <form class="form-inline my-2 my-lg-0" action="<?=base_url('busqueda/buscar')?>" method="POST">
                            <input class="form-control mr-sm-2 col-xs-8" type="search" name="buscar" placeholder="Encuentra lo que quieres" aria-label="Search" required>
                            <div class="my-2 my-sm-0 col-12 col-sm-1 p-0 m-0">       
                            <button class="btn btn-warning" type="submit">Buscar</button>
                                  
                            </div>
                        </div>
                    </form>
                    </ul>
                </div>
            </nav>
            </div>
    </header>