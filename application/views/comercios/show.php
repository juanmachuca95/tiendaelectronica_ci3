 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Comercio <?=$comercio->id;?></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"><i class="fas fa-users"></i> <?=$comercio->comercio?></h3>
        <p class="text-muted"><?=$comercio->descripcion;?> ?></p>
        <br>
        <div class="text-muted">
          <p class="text-sm">Email del comercio
            <b class="d-block"><?=$comercio->email?></b>
          </p>
          <p class="text-sm">Dirección o Casa Central
            <b class="d-block"><?=$comercio->direccion;?></b>
          </p>
          <p class="text-sm">Telefóno
            <b class="d-block"><?=$comercio->telefono;?></b>
          </p>
        </div>

        <h5 class="mt-5 text-muted"> </h5>
        <ul class="list-unstyled">
          <!-- 
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Comprobante de pago</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
          </li>
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
          </li>
 -->        
        </ul>
        <!-- <div class="text-center mt-5 mb-3">
          <a href="#" class="btn btn-sm btn-secondary">Comprobante</a>
          <a href="#" class="btn btn-sm btn-warning">Orden de compra</a>
        </div> -->
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->