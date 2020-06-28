<?= $html ?>
<?= $head ?>
<body style="background-image: none">
    <div class="container-fluid p-0 fondo_admin">  
        
        <div class="container p-0">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="p-4 font-weight-light">
                        <i class="fas fa-user-tag"></i> Usuarios: <?=$cant_usuarios?>
                    </h3>
                    <?php if( null !== $this->session->flashdata('msj') ) : ?>
                        <?=$this->session->flashdata('msj')?>
                    <?php endif;?>
                </div>  
            </div>
            <div class="row">
                <div class="col-md-12">
            
                    <?php if(isset($todos_los_usuarios)) : ?>
                    <div class="table-responsive">
                        <table class="table table-stripper table-dark text-white">
                            <thead>
                                <th>Cod. Usuario</th>
                                <th><i class="fas fa-address-card"></i> Nombre y Apellido</th>
                                <th><i class="fas fa-envelope"></i> Correo</th>
                                <th><i class="fas fa-key"></i> Password</th>
                                <th><i class="fas fa-phone-square-alt"></i> Celular</th>
                                <th><i class="fas fa-user-shield"></i> Acciones</th>
                            </thead>
                        <tbody>
                        <?php foreach ($todos_los_usuarios as $row) : ?>
                            <tr>
                                <td><?=$row->id_cliente?></td>
                                <td><?=$row->nombre." ".$row->apellido?></td>
                                <td><?=$row->correo?></td>
                                <td><?=$row->password?></td>
                                <td><?=$row->celular?></td>
                                <td>
                                    <a class="btn btn-info text-white" href="<?=base_url('admin/eliminarUsuario/'.$row->id_cliente )?>">Eliminar Cliente</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                    <?php endif; ?>
            
            </div>
        </div>
    
    </div>
<script src="<?=base_url()?>/assets/js/myJQuery.js"></script>
<script src="<?=base_url()?>/assets/js/validation.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</body>
    

