<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Formulario de edición</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                </div>
            </div>
            <div class="card-body">

                <?=form_open_multipart('productos/update/'.$producto->id);?>
                <div class="form-group">
                <label for="producto" >Nombre del producto </label>
                <input type="text" id="producto" name="producto" class="form-control" 
                    value="<?=$producto->producto;?>" required>
                <small class="text-danger"><?php echo form_error('producto'); ?></small>
                </div>

                <div class="form-group">
                    <select class="custom-select" name="categorias_id" id="categorias_id">
                        <option value="<?=$producto->categorias_id?>" selected><?=$producto->categoria?></option>

                        <?php foreach($categorias as $categoria) :?>
                        <option value="<?=$categoria->id?>"><?=$categoria->categoria?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger" for="categorias_id"><?php echo form_error('categorias_id'); ?></small>
                </div>

                <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" maxLength="255" class="form-control" rows="4" required><?=$producto->descripcion;?></textarea>
                <small class="text-danger"><?php echo form_error('descripcion'); ?></small>
                </div>
                
                <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock" min="0" class="form-control"
                value="<?=$producto->stock;?>" required>
                <small class="text-danger"><?php echo form_error('stock'); ?></small>
                </div>

                <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control"
                value="<?=$producto->precio?>" >
                <small class="text-danger"><?php echo form_error('precio'); ?></small>
                </div>

                <div class="form-group">
                    <label class="form-control" for="imagen">Imagen actual</label>
                    <img class="img-thumbail img-fluid" src="<?=$producto->imagen?>" alt="<?=$producto->producto?>">
                </div>

                <div class="form-group">
                <label for="imagen">Cambiar imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" class="form-control">
                <small class="text-danger"><?php echo form_error('imagen'); ?><?=($error_image) ?? '' ?></small>
                </div>
                
                <div class="form-group">
                    <div class="d-flex">
                        <label for="activo">Activo</label>
                        <input type="checkbox" name="activo" id="activo" class="form-control" value="1" <?=$producto->activo ? 'checked' : 'unchecked'; ?> <?php echo set_checkbox('activo', $producto->activo); ?>>
                    </div>
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


