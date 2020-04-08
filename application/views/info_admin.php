<?php if(isset($html)){ echo $html;} ?>
    <?php if(isset($head)){ echo $head;} ?>

    <body id="fondo_admin">
    <?php if(isset($nav_admin)){ echo $nav_admin;} ?>
    <div class="container p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-5 p-0">
                <form class="card p-4 mb-3" action="actualizarDatosAdmin" method="post">
                    <h3 class="font-weight-bold text-info pb-3 pt-2">Informaci&oacuten de Admin.</h3>
                    <div class="form-group">
                        <label for="nombre">Administrador :</label>
                        <input class="form-control   bg-dark text-white " type="text" id="nombre" name="nombre" 
                        maxlength="100" placeholder="Nombre del Admin" 
                        value ="<?php if(isset($datos->nombre_admin)) { echo $datos->nombre_admin; }?> " required>
                        <input type="hidden" name="id" id="id" value="<?php if(isset($datos->id)) { echo $datos->id; }?>">
                    </div>
                    <div class="form-group">
                        <label for="correo">Email :</label>
                        <input class="form-control  bg-dark text-white " type="email" id="email" name="email" 
                        maxlength="60"  placeholder="Correo electronico" 
                        value ="<?php if(isset($datos->email)) { echo $datos->email; }?> " required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular :</label>
                        <input class="form-control bg-dark text-white " type="text" id="celular" name="celular" 
                        maxlength="20"  placeholder="Celular" 
                        value="<?php if(isset($datos->celular)) { echo $datos->celular; }?>" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Contraseña :</label>
                        <input class="form-control bg-dark text-white " type="text" id="password" name="password" 
                        maxlength="12"  placeholder="Contraseña" 
                        value="<?php if(isset($datos->contraseña)) { echo $datos->contraseña; }?>" required>
                    </div>
                    <button class="btn btn-warning" type="submit">
                        Actualizar datos
                    </button>
                </form>
            </div>

            <div class="bg-dark text-white col-md-7 p-5">
                <div>
                    <h2 class="display-4">Los datos del Admin :</h2>
                    <h5 class="lead">En esta seccion puedes modificar los datos de <strong> Administrador. </strong>  </h5>
                    <h5 class="lead">Importante tener en cuenta que varios de los datos que se registren en este apartado, tienen impacto en la forma,
                    en la que tus clientes van a comunicarse contigo.  </h5>
                    <h5 class="lead">Tus datos personales, como tus datos de ingreso se modificaran automaticamente al presionar el boton : <strong> Actualizar. </strong>  </h5>
                    <hr>
                    <p>
                        Todo tipo de Información adicional o cualquier consulta sobre la estructura del diseño consultar a  <a href="#">machucajuangabriel@gmail.com</a> soporte de desarrollo.</machucajuangabriel@gmail>
                    </p>
                    <a class="btn btn-primary btn-md" href="<?=base_url()?>" role="button">Vista de Usuario</a>
                </div>
            </div>
        </div>
    </div>