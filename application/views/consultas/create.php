<div class="container-fluid p-0 m-0 home-categoria">
    <div class="container">
        <div class="col-12 col-sm-12 col-md-6 p-5 d-flex align-items-center">
            <form  action="<?=base_url('consultas/store')?>" method="post">
                <h3 class="font-weight-bold pb-3">¡Envianos tu Consulta! &#x1f4dd;</h3>
                <p class="font-weight-lighter">
                    Mandan&oacutes tus inquietudes, sobre sobre desarrollos ideas o emprendimientos que quieras llevar a cabo. </p>
                <div class="form-group">
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Tu nombre" value="<?=set_value('nombre')?>" maxLength="255">
                    <small class="text-danger"><?=form_error('nombre'); ?></small>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" id="email" placeholder="Ingresa tu correo electronico" value="<?=set_value('email')?>" maxLength="255">
                    <small class="text-danger"><?=form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Escribe la descripción de tu consulta . . ." maxLength="1000"><?=set_value('descripcion')?></textarea>
                    <small class="text-danger"><?=form_error('descripcion'); ?></small>
                </div>
                <div class="form-group">
                    <button class="btn btn-warning">Enviar consulta</button>
                </div>
            </form>
        </div>
    </div>
</div>
