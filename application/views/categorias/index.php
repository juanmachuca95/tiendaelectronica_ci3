<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><a class="btn btn-primary btn-sm" href="<?=base_url('categorias/crear')?>">Crear</a></h3>

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
    <div class="table-responsive">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Nombre categoria
                    </th>
                    <th>
                        Registrada
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php if(!empty($categorias)): foreach ($categorias as $categoria): ?>
                <tr>
                    <td>
                        <?=$categoria->id;?>
                    </td>
                    <td>
                        <?=$categoria->categoria?>
                    </td>
                    <td>
                    <?=date('d-m-Y', strtotime($categoria->created_at))?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-info btn-sm" href="<?=base_url('categorias/edit/').$categoria->id?>">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?=base_url('categorias/destroy/').$categoria->id?>">
                            <i class="fas fa-trash">
                            </i>
                            Eliminar
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
