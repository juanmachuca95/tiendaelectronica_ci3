<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Formulario</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card-body">

                <?=form_open_multipart('comercios/update/'.$comercio->id);?>
                    <div class="form-group">
                        <label for="comercio" >Comercio </label>
                        <input type="text" id="comercio" name="comercio" class="form-control" 
                            value="<?=$comercio->comercio?>" required>
                        <small class="text-danger"><?php echo form_error('comercio'); ?></small>
                    </div>
                    
                    <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion" maxLength="255" class="form-control" rows="4" required><?=$comercio->descripcion;?></textarea>
                    <small class="text-danger"><?php echo form_error('descripcion'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="direccion" >Direccion </label>
                        <input type="text" id="direccion" name="direccion" class="form-control" 
                            value="<?=$comercio->direccion;?>" required>
                        <small class="text-danger"><?php echo form_error('direccion'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="telefono" >Telefóno </label>
                        <input type="text" id="telefono" name="telefono" class="form-control" 
                            value="<?=$comercio->telefono;?>" required>
                        <small class="text-danger"><?php echo form_error('telefono'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="telefono" >Email </label>
                        <input type="email" id="email" name="email" class="form-control" 
                            value="<?=$comercio->email;?>" required>
                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="telefono" >MercadoPago </label>
                        <input type="text" id="mercadopago_key" name="mercadopago_key" class="form-control" 
                            value="<?=$comercio->mercadopago_key;?>" required>
                        <small class="text-danger"><?php echo form_error('mercadopago_key'); ?></small>
                    </div>

                    <div class="form-group">
                        <label for="imagen" >Imagen principal</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                        <small class="text-danger"><?php echo form_error('imagen'); ?></small>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->
