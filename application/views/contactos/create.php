<div class="container-fluid p-0 m-0 home-categoria">
    <div class="container">
       
        <div class="row p-0">
            <div class="col-12 col-sm-12 col-md-6 p-5">
                <h1 >Información de contacto</h1>
                <p>
                    <b class="display-4 text-warning"> Machuca Juan Gabriel</b> 
                    <b class="text-muted">Director General (SouvenirsZN)</b>
                </p>
                <p class="lead">
                    SouvenirsZN S.A. Domicilio legal Castelli 1198 <br>
                    REGALÁ ALGO UNICO. Regalos Personalizados Almanaques Cuadernos Agendas Llaveros Pines Remeras Tarjetas Entradas</p>
                <p>Diseñados a medida · Servicio de impresión · Tienda de regalos</p>
                <p class="lead text-warning">&#128222;<a class="text-warning" >0379469474</a> - &#x1f4e7; machucajuangabriel@gmail.com</p>
                <p class="lead">Horario de atención de lunes a viernes de 7:00 a 12:00 y de 16:00 a 20:00 </p>
            </div>

            <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center p-0">
                <form  action="<?=base_url('contactos/store')?>" method="post">
                    <h3 class="font-weight-bold pb-3">¡Contactanos! &#x1f4dd;</h3>
                    <p class="font-weight-lighter">
                        Necesitas estar registrado para enviar mensajes desde contacto. Si aún no estas registrado puede hacerlo en <a href="<?=base_url('users/crear')?>">registrarse</a>
                        O realizar una consulta dirigiendote a <a href="<?=base_url('consultas/crear');?>">consultas.</a>
                    </p>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="users_id" 
                        value="<?=$this->session->users_id ?? '';?>">
                        <small class="text-danger"><?=form_error('users_id'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" id="email" placeholder="Ingresa tu correo electronico" required value="<?=$this->session->email?>" readonly maxLength="255" >
                        <small class="text-danger" required><?=form_error('email'); ?></small>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Escribe la descripción de tu consulta . . ." maxLength="1000" required><?=set_value('descripcion')?></textarea>
                        <small class="text-danger"><?=form_error('descripcion'); ?></small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning">Enviar consulta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
