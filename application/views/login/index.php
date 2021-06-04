
<div class="container">
    <?php if(isset($mensaje)) { ?>
        <p class="lead bg-info text-center text-white"><?=$mensaje?></p>
    <?php } ?>
    <div class="row pt-4" >

        <div class="col-sm-12 col-md-6 pt-4 pb-4 mt-4 mb-4 bg-light  rounded " width="400px;" >
            
            <?php if ( null === $this->session->userdata('admin') && null === $this->session->userdata('usuario') ) { ?>
            
            <h3 class="font-weight-bold display-4 text-warning p-3">Login</h3>

            <?php if(isset($msj)) { ?>
                <p class=" px-3 lead text-success" ><?=$msj?>&#x1f389;.</p>
            <?php } ?>

            <?php echo validation_errors(); ?>
            <?php echo form_open('login'); ?>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input class="form-control" id="inputEmail" type="email" name="correo" maxlength="80" placeholder="Correo. Ej.: nombre@gmail.com ">
                    <small class="text-primary" id="outputEmail"></small>
                </div>
                <div class="form-group">
                <label for="inputPassword">Contraseña
                    <i id="show_pss" class="cerrados">
                        &#x1f573;
                    </i>
                </label>
                <input class="form-control" id="inputPassword" minlength="8" maxlength="12" pattern="[A-Za-z0-9]+" type="password" name="password" placeholder="No mayor de 12 digitos">
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Ingresar</button>
                </div>
                <p class="font-weight-light text-decoration-none text-dark">¿No tienes cuenta? Regitrarse como <a class="text-primary" href="<?=base_url('users/crear')?>">Cliente</a></p>
                <?php if( isset($error) ) { 
                    echo $error." &#x1f515;";
                } 
                ?>
            </form>
            <?php } else { ?>
                <h1 class="font-weight-bold display-4 p-5">Session Iniciada</h1>
                <hr class="bg-light">
                <?php if (null === $this->session->userdata('usuario')) { ?>
                <p class="font-weight-bold px-3"><b class="text-info"> Administrador/a en curso: </b> <?= $this->session->userdata('admin') ?> </p>
                <p class="font-weight-light px-3">Trabajando en los recursos de la App &#x1f468;&#x200d;&#x1f527;</p>
                <p class="px-3"><a class="btn btn-warning" href="<?=base_url('admin')?>">Tu Panel</a></p>
                <small class="font-weight-light px-3"><a href="<?=base_url('login/logout')?>">Cerrar Session</a></small>
                <?php }else{ ?>
                <p class="font-weight-bold px-3"><b class="text-info"> Usuario en curso: </b> <?=$this->session->userdata('usuario')?></p>
                <p class="font-weight-light px-3">Disfrutando de los recursos de la App &#x1f601;</p>
                <small class="font-weight-light px-3"><a href="<?=base_url('login/logout')?>">Cerrar Session</a></small>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
