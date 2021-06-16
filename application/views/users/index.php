<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Usuarios</h3>

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
                <th>
                    #
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Email
                </th>
                <th>
                    Dirección
                </th>
                <th>
                    Telefóno
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($users)): foreach ($users as $user): ?>
            <tr>
                <td>
                    <?=$user->id;?>
                </td>
                <td>
                    <?=$user->nombre?>
                </td>
                <td>
                    <?=$user->email?>
                </td>
                <td>
                    <?=$user->direccion?>
                </td>
                <td>
                    <?=$user->telefono?>
                </td>
                <td>
                    <?php if ($user->activo): ?>
                    <a href="<?=base_url('users/active/').$user->id.'/'.$user->activo;?>">
                    <span class="badge badge-success">activo</span>
                    </a>
                    <?php else: ?>
                    <a href="<?=base_url('users/active/').$user->id.'/'.$user->activo;?>">
                    <span class="badge badge-danger">inactivo</span>
                    </a>
                    <?php endif;?>
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-danger btn-sm" href="<?=base_url('users/destroy/').$user->id?>">
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
