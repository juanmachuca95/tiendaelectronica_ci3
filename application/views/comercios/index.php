<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Comercio</h3>

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
                    Comercio
                </th>
                <th>
                    Dirección
                </th>
                <th>
                    Telefóno
                </th>
                <th>
                    Email
                </th>
                <th>
                    MercadoPago Key
                </th>
                <th class="text-center">
                    Imagen
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php if(!empty($comercios)): foreach ($comercios as $comercio): ?>
            <tr>
                <td>
                    <?=$comercio->id;?>
                </td>
                <td>
                    <?=$comercio->comercio?>
                </td>
                <td>
                   <?=$comercio->dirección?> 
                </td>
                <td>
                   <?=$comercio->telefono?>
                </td>
                <td>
                    <?=$comercio->email?>
                </td>
                <td>
                    <?=$comercio->mercadopago_key;?>
                </td>
                <td>
                    <img class="img-circle img-bordered-sm img-fluid" src="<?=$comercio->imagen?>" alt="comercio image">
                </td>
                <td class="project-actions text-right">
                    <a class="btn btn-primary btn-sm" href="<?=base_url('comercios/show/').$comercio->id?>">
                        <i class="fas fa-folder">
                        </i>
                        View
                    </a>
                    <a class="btn btn-info btn-sm" href="<?=base_url('comercios/edit/').$comercio->id?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                   <!--  <a class="btn btn-danger btn-sm" href="<?=base_url('comercios/destroy/').$comercio->id?>">
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
