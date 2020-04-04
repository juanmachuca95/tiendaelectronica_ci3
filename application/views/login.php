<?= $html ?>
    <?= $head ?>
        <?= $nav ?>
    <body>
    <div class="container">
        <?php if(isset($mensaje)) { ?>
            <p class="lead bg-info text-center text-white"><?=$mensaje?></p>
        <?php } ?>
        <div class="row pt-4" >

            <div class="col-sm-12 col-md-5 pt-4 pb-4 mt-4 mb-4 bg-dark text-white card border border-light" width="400px;" >
                
                <?php if ( null === $this->session->userdata('admin') && null === $this->session->userdata('usuario') ) { ?>
                
                <h1 class="display-4 text-warning">Login</h1>

                <?php if(isset($msj)) { ?>
                    <p class="lead bg-dark text-warning" ><?=$msj?>&#x1f389;.</p>
                <?php } ?>

                <form action="<?=base_url('login/login')?>" method="post">
                    <div class="form-group">
                        <label for="correo">Email</label>
                        <input class="form-control" type="email" id="correo" name="correo" placeholder="Correo. Ej.: nombre@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" id="password" minlength="8" maxlength="12" name="password" placeholder="No mayor de 12 digitos" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info">Ingresar</button>
                    </div>
                    <p><a class="lead text-decoration-none text-white" href="<?=base_url('login/registro')?>">¿No tienes cuenta? Regitrarse como <b class="text-warning">Cliente.</b></a></p>
                    <?php if( isset($error) ) { 
                        echo $error." &#x1f515;";
                    } 
                    ?>
                </form>
                <?php } else { ?>
                    <h1 class="display-4 text-warning">Session Iniciada</h1>
                    <hr class="bg-light">
                    <?php if (null === $this->session->userdata('usuario')) { ?>
                    <p class="lead"><b class="text-warning"> Administrador/a en curso: </b> <?= $this->session->userdata('admin') ?> </p>
                    <p class="lead">Trabajando en los recursos de la App &#x1f468;&#x200d;&#x1f527;</p>
                    <p><a class="lead text-decoration-none" href="<?=base_url('login/logout')?>">cerrar session</a></p>
                    <?php }else{ ?>
                    <p class="lead"><b class="text-warning"> Usuario en curso: </b> <?=$this->session->userdata('usuario')?></p>
                    <p class="lead">Disfrutando de los recursos de la App &#x1f601;</p>
                    <p><a class="lead text-decoration-none" href="<?=base_url('login/logout')?>">cerrar session</a></p>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="col-md-6 m-0 p-0 home-categoria">
            
                <div class="text-justify-center p-5">
                    <p class="display-4">Ventajas de Usuario</p>
                    <p class="lead">1. Facilidad en las elecciones de pago, <strong class="text-warning">Mercado Pago, Pedidos, etc.</strong></p>
                    <p class="lead">2. Posibilidad de hacer pedidos en cantidad, acceso a su control de negocio y al trato directo.</p>
                    <p class="lead">3. O contactanos a traves de este misma pagina. Solapa <strong>Contacto</strong>. V&iacutea email <strong>souvenirszn@gmail.com</strong></p>
                </div>         
            
            </div>     
        </div>
    </div>


    <?= $footer ?>