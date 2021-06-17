 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Leer consulta de una contacto</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <div class="mailbox-read-info">
            <h5>Mensaje por <?=$contacto->nombre?></h5>
            <h6>From: <?=$contacto->email;?>
                <span class="mailbox-read-time float-right"><?=date('d-m-Y H:i:s', strtotime($contacto->created_at))?></span></h6>
            </div>
            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <?=$contacto->descripcion;?>
            </div>
            <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
            <div class="float-right">
            <a href="<?=base_url('contactos/leido/').$contacto->id.'/'.$contacto->leido;?>" class="btn btn-success"><i class="fas fa-check"></i> Marcar como leido</a>
            </div>
            <a href="<?=base_url('contactos/destroy/').$contacto->id;?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
        </div>
        <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->