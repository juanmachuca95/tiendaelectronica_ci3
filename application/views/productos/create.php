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

                
                <form action="<?=base_url('productos/store')?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="producto" >Nombre del producto </label>
                <input type="text" id="producto" name="producto" class="form-control" 
                    value="<?php echo set_value("producto"); ?>">
                <small class="text-danger"><?php echo form_error('producto'); ?></small>
                </div>

                <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" maxLength="255" class="form-control" rows="4"><?=set_value("descripcion");?></textarea>
                <small class="text-danger"><?php echo form_error('descripcion'); ?></small>
                </div>

                <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control"
                value="<?php echo set_value("precio"); ?>">
                <small class="text-danger"><?php echo form_error('precio'); ?></small>
                </div>

                <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
                <small class="text-danger"><?php echo form_error('imagen'); ?></small>
                </div>
                
                <div class="form-group">
                    <div class="d-flex">
                        <label for="activo">Activo</label>
                        <input type="checkbox" name="activo" id="activo" class="form-control" value="1" <?php echo set_checkbox('activo', '1'); ?>>
                    </div>
                    <small class="text-danger"><?php echo form_error('activo'); ?></small>
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Agregar</button>
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
