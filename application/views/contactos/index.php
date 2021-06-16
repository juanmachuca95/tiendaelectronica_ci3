<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Contactos</h3>

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
                    <th>Enviado</th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php if(!empty($contactos)): foreach ($contactos as $contacto): ?>
                <tr>
                    <td>
                        <?=$contacto->id;?>
                    </td>
                    <td>
                        <?=$contacto->nombre?>
                    </td>
                    <td>
                        <?=$contacto->email?>
                    </td>
                    <td>
                        <?php if ($contacto->leido): ?>
                        <span class="badge badge-success">Leido</span>
                        <?php else: ?>
                        <span class="badge badge-danger">No leido</span>
                        <?php endif;?>
                    </td>
                    <td>
                        <?=date('d-m-Y H:i:s', strtotime($contacto->created_at));?>
                    </td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="<?=base_url('contactos/show/').$contacto->id?>">
                            <i class="fas fa-folder">
                            </i>
                            Ver
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?=base_url('contactos/destroy/').$contacto->id?>">
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
    </div>
     <!-- /.card-body -->
    <div class="row m-0 px-4">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
