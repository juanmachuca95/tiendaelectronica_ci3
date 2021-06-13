 <!-- Main content -->
 <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Orden de compra N° <?=$orden->id;?></h3>

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
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="row">
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Total de la Orden</span>
                <span class="info-box-number text-center text-muted mb-0">$ <?=$orden->total?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Estado</span>
                <span class="info-box-number text-center text-muted mb-0">
                    <?php if($orden->status == 'impago'): ?>
                    <span class="badge badge-danger">Impago</span>
                    <?php elseif($orden->status == 'pendiente') : ?>
                    <span class="badge badge-warning">Pendiente</span>
                    <?php else: ?>
                    <span class="badge badge-success">Pagado</span>
                    <?php endif; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-4">
            <div class="info-box bg-light">
              <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Forma de pago</span>
                <span class="info-box-number text-center text-muted mb-0">
                    <?php if ($orden->tipopago == 'contraentrega'): ?>
                    <span class="badge badge-success">Contra entrega <i class="fas fa-"></i></span>
                    <?php else: ?>
                    <span class="badge badge-primary">Mercadopago <i class="far fa-handshake"></i></span>
                    <?php endif;?>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h4>Detalle de Productos</h4>

                <?php foreach($detalles as $detalle): ?>
                <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="<?=$detalle->imagen?>" alt="producto image">
                  <span class="username">
                    <a href="<?=base_url('productos/show/').$detalle->productos_id;?>"><?=$detalle->producto;?>.</a>
                  </span>
                  <span class="description">Cantidad de unidades: <?=$detalle->cantidad?> - Precio unitario: <?=$detalle->precio_unitario?></span>
                </div>
                    <!-- /.user-block -->
                    <p>
                        <?=$detalle->descripcion?>
                    </p>
                    <p>
                    <a href="#" class="link-black text-sm"><i class="fas fa-cart-plus mr-1"></i> Total $ <?=$detalle->total;?></a>
                    </p>
                </div>

                <?php endforeach;?>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
        <h3 class="text-primary"><i class="fas fa-users"></i> <?=$orden->nombre.' '.$orden->apellido?></h3>
        <p class="text-muted">El usuario de la orden de compra <?= ($orden->activo) ?  'posee cuenta en el sitio.' : 'no posee una cuenta en el sitio.'; ?></p>
        <br>
        <div class="text-muted">
          <p class="text-sm">Email del usuario
            <b class="d-block"><?=$orden->email?></b>
          </p>
          <p class="text-sm">Dirección de entrega
            <b class="d-block"><?=$orden->direccion;?></b>
          </p>
          <p class="text-sm">Telefóno
            <b class="d-block"><?=$orden->telefono;?></b>
          </p>
        </div>

        <h5 class="mt-5 text-muted">Archivos de la Orden</h5>
        <ul class="list-unstyled">
          <li>
            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Comprobante de pago</a>
          </li>
         <!--  <li>
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