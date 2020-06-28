
<div class="container p-0">
    <div class="row">
        <div class=" col-xs-12 col-sm-12 col-md-12">
        <p class="lead mt-3">
            <a class="pl-2 text-decoration-none" href="<?=base_url('admin')?>">Admin: <b class=" text-dark"><?=$this->session->userdata('admin'); ?></b></a>
        </p>
            <nav class="nav nav-pills flex-column flex-sm-row bg-dark">
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/form_carga')?>"><strong>Cargar</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/tablasProducto')?>"><strong>Lista de Productos</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/pedidos')?>"><strong>Pedidos</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/usuarios')?>"><strong>Usuarios</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/info')?>"><strong>Informaci&oacuten</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('admin/categoria')?>"><strong>Categorias</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-white" href="<?=base_url('login/logout')?>">Cerrar Session</a>
            </nav>
        </div>
    </div>
</div>