<?= $html ?>
    <?= $head ?>
        <?= $nav_admin ?>
    <body id="fondo_admin">
    <div class="container m-0 p-0 bg-light">
        <div class="row">
            <div class="col-md-12">
                <h3 class="px-4 pt-4 font-weight-light">
                    Lista de Usuarios registrado en la Pagina: 
                </h3>
                <?php if(isset($mensaje)){ echo "<br>".$mensaje; }?>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-12">
    <?php if(isset($todos_los_usuarios)) : ?>
        <div class="table-responsive">
            <table class="table table-stripper table-dark text-white">
                <thead>
                    <th>Id_Cliente</th>
                    <th>Nombre y Apellido</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Acciones</th>
                </thead>
            <tbody>
            <?php foreach ($todos_los_usuarios as $row) : ?>
                <tr>
                    <td><?=$row->id_cliente?></td>
                    <td><?=$row->nombre." ".$row->apellido?></td>
                    <td><?=$row->correo?></td>
                    <td><?=$row->celular?></td>
                    <td>
                        <a class="btn btn-primary text-white" href="<?=base_url('admin/eliminarUsuario/'.$row->id_cliente )?>">Eliminar Cliente</a>
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
    </body>
    

