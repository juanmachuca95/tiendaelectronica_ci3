<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Consultas</h3>

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
                        Nombre usuario
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Leido
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php if(!empty($consultas)): foreach ($consultas as $consulta): ?>
                <tr>
                    <td>
                        <?=$consulta->id;?>
                    </td>
                    <td>
                        <?=$consulta->nombre?>
                    </td>
                    <td>
                        <?=$consulta->email?>
                    </td>
                    <td class="project-state">
                        <?php if ($consulta->leido): ?>
                        <span class="badge badge-success">Leido</span>
                        <?php else: ?>
                        <span class="badge badge-danger">No leido</span>
                        <?php endif;?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="<?=base_url('consultas/show/').$consulta->id?>">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?=base_url('consultas/destroy/').$consulta->id?>">
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
    </div>
     <!-- /.card-body -->
    <div class="row m-0 px-4">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
