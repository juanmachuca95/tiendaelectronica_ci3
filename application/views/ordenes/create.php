
<div class="container-fluid home-categoria p-0 m-0">
    <div class="container-white">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-sm-8 col-md-5 py-5 px-4 bg-white my-4">
                <h1 class="font-weight-light">Completa tus datos</h1>
                <h3 class="lead">Total de compra:  <i class="fas fa-dollar-sign"></i> <?=$total?></h2>
                <h3 class="lead">Cantidad de productos: <i class="fas fa-shopping-cart"></i> <?=$this->session->carrito;?></h3>
                <p>Confirma los datos de tu orden para facilitar el registro y el envio de tus productos.</p>
                <?=form_open('ordenes/store')?>
                <div class="row mb-3">
                    <div class="col">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?=$this->session->nombre;?>" class="form-control" placeholder="Nombre . . ." 
                        <?= (!$this->session->nombre) ? '' : "readonly";?>>
                    <small class="text-danget"><?=form_error('nombre');?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="nombre">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="<?=$this->session->apellido;?>" class="form-control" placeholder="Apellido . . ." 
                        <?= (!$this->session->apellido) ? '' : "readonly";?>>
                        <small class="text-danget"><?=form_error('apellido');?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección . . ." value="<?=$this->session->direccion?>"
                        required
                    >
                    <small class="text-danger"><?=form_error('direccion');?></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                    <label for="telefono">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control"
                        placeholder="Ejemplo: 03794-69-0474 (11 digitos con guiones)" 
                        pattern="[0-9]*{4}-[0-9]*{2}-[0-9]*{4}" value="<?=$this->session->telefono;?>"
                        required
                    >   
                    <small class="text-danger"><?=form_error('telefono');?></small>
                    </div>
                </div>
                <button type="submit" class="btn text-white" style="background-color: #6200ee;">Confirmar</button>
            </div>

        </div>
    
    </div>

</div>