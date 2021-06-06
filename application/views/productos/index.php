<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><a class="btn btn-primary" href="<?=base_url('productos/crear')?>">Registrar producto</a></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    #
                </th>
                <th style="width: 20%">
                    Nombre producto
                </th>
                <th style="width: 30%">
                    Imagen
                </th>
                <th>
                    Precio
                </th>
                <th style="width: 8%" class="text-center">
                    Activo
                </th>
                <th style="width: 20%">
                </th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($productos)): foreach ($productos as $producto): ?>
            <tr>
                <td>
                    <?=$producto->id;?>
                </td>
                <td>
                    <?=$producto->producto?>
                </td>
                <td>
                   <?=$producto->imagen?>
                </td>
                <td>
                   <?=$producto->precio?>
                </td>
                <td class="project-state">
                    <?php if ($producto->activo): ?>
                    <span class="badge badge-success">activo</span>
                    <?php else: ?>
                    <span class="badge badge-danger">inactivo</span>
                    <?php endif;?>
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="<?=base_url('productos/show/').$producto->id?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="<?=base_url('productos/edit/').$producto->id?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?=base_url('productos/destroy/').$producto->id?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a>
                </td>
            </tr>
            <?php endforeach; endif;?>
        </tbody>

    </table>
    </div>
     <!-- /.card-body -->
    <div class="row m-0 px-4">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
