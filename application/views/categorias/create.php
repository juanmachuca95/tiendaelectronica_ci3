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

                <?=form_open_multipart('categorias/store');?>
                <div class="form-group">
                <label for="categoria" >Nombre categoria </label>
                <input type="text" id="categoria" name="categoria" class="form-control" 
                    value="<?php echo set_value("categoria"); ?>" required>
                <small class="text-danger"><?php echo form_error('categoria'); ?></small>
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
