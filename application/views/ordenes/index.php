<!-- Main content -->
<section class="content">


<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Ordenes</h3>

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
                    Usuario
                </th>
                <th>
                    Total
                </th>
                <th>
                    Estado
                </th>
                <th>
                    Activo
                </th>
                <th class="text-center">
                    Tipo
                </th>
                <th>Emitida</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($ordenes)): foreach ($ordenes as $orden): ?>
            <tr>
                <td>
                    <?=$orden->id;?>
                </td>
                <td>
                    <?=$orden->nombre.' '.$orden->apellido;?>
                </td>
                <td>
                    $ <?=$orden->total;?>
                </td>
                <td>
                   <?php if($orden->status == 'impago'): ?>
                    <span class="badge badge-danger">Impago</span>
                    <?php elseif($orden->status == 'pendiente') : ?>
                    <span class="badge badge-warning">Pendiente</span>
                    <?php else: ?>
                    <span class="badge badge-success">Pagado</span>
                    <?php endif; ?>
                </td>
                <td class="project-state">
                    <?php if ($orden->activo): ?>
                    <!-- <a href="<?=base_url('ordenes/active/').$orden->id.'/'.$orden->activo;?>"> -->
                    <span class="badge badge-success">activo</span>
                   <!--  </a> -->
                    <?php else: ?>
                    <!-- <a href="<?=base_url('ordenes/active/').$orden->id.'/'.$orden->activo;?>"> -->
                    <span class="badge badge-danger">inactivo</span>
                    <!-- </a> -->
                    <?php endif;?>
                </td>
                <td class="project-state">
                    <?php if ($orden->tipopago == 'contraentrega'): ?>
                    <span class="badge badge-success">Contra entrega <i class="fas fa-"></i></span>
                    <?php else: ?>
                    <span class="badge badge-primary">Mercadopago <i class="far fa-handshake"></i></span>
                    <?php endif;?>
                </td>
                <td>
                    <?=date('d-m-Y H:s', strtotime($orden->created_at))?>
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="<?=base_url('ordenes/show/').$orden->id?>">
                        <i class="fas fa-folder">
                        </i>
                        Detalle
                    </a>
                   <!--  <a class="btn btn-info btn-sm" href="<?=base_url('productos/edit/').$producto->id?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="<?=base_url('productos/destroy/').$producto->id?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                    </a> -->
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
