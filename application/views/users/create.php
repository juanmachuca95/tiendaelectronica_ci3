<div class="container-fluid home-categoria m-0 p-0">
    <div class="container">
        <div class="row py-4">
            <div class="col- col-ms-12 col-md-8 py-4 px-4 bg-light rounded">
            <form id="form_usuario" action="<?=base_url('users/store')?>" method="post">
                <h3 class="font-weight-bold py-3">Crea tu cuenta de Usuario</h3>
                <div class="form-row">
                    <div class="form-group col-xs-12 col-ms-12 col-md-6">
                        <label for="inputNombre">Nombre</label>
                        <input class="form-control" id="inputNombre" name="nombre" minlength="4" maxlength="30" type="text" placeholder="Ingresa un nombre" required
                        title="No se aceptan numeros en el nombre o caracteres especiales">
                        
                        <small class="text-primary" id="outputNombre"></small>

                    </div>
                    <div class="form-group col-xs-12 col-ms-12 col-md-6">
                        <label for="inputApellido">Apellido</label>
                        <input class="form-control" id="inputApellido" name="apellido" minlength="4" maxlength="30" type="text" placeholder="Ingresa un Apellido" required
                        title="No se aceptan numeros en el nombre o caracteres especiales">
                        <small class="text-primary" id="outputApellido"></small>
                    </div>
                </div>
                <div class="form-row">    
                    <div class="form-group col-xs-12 col-ms-12 col-md-8">
                        <label for="inputEmail">Email</label>
                        <input class="form-control" id="inputEmail" type="email" name="correo" maxlength="80" placeholder="Correo. Ej.: nombre@gmail.com " required>
                        <small class="text-primary" id="outputEmail"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-xs-12 col-ms-12 col-md-6">
                        <label for="inputPassword">Contraseña
                            <i id="show_pss" class="cerrados">
                                &#x1f573;
                            </i>
                        </label>
                        <input class="form-control" id="inputPassword" minlength="8" maxlength="12" pattern="[A-Za-z0-9]+" type="password" name="password" placeholder="No mayor de 12 digitos" required>
                    </div>
                    <div class="form-group col-xs-12 col-ms-12 col-md-6">
                        <label for="inputPasswordRepet">Repite Contraseña 
                            <i id="show_pss_repet" class="cerrados_repet">
                                &#x1f573;
                            </i>
                        </label>

                        <input class="form-control" id="inputPasswordRepet" minlength="8" maxlength="12" pattern="[A-Za-z0-9]+" type="password"
                        name="password2" placeholder="No mayor de 12 digitos" required>
                    
                    </div>
                    <small class="text-primary m-0 pl-1 pb-3" id="outputPassword"></small>
                </div>
                <div class="form-row">
                    <div class=" justify-content-center">
                        <button type="submit" class="btn btn-warning m-2">Registrarse</button>
                    </div>
                </div>
                <p><?php if (isset($error)) { echo $error; }  ?></p>

                <p class="font-weight-light">Si ya tenes una cuenta dirigete a <a href="<?=base_url('login')?>">Login.</a></p>
            </form>
            </div>
        </div>
    </div>
</div>