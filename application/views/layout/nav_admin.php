
<div class="container p-0">
    <div class="row mb-2">
        <div class=" col-xs-12 col-sm-12 col-md-12">
        <p class="display-4 bg-dark  mt-3">
            <a class="text-decoration-none text-white" href="<?=base_url('admin')?>">Admin: <b class="text-warning"><?=$this->session->userdata('admin'); ?></b></a>
        </p>
            <nav class="nav nav-pills flex-column flex-sm-row bg-dark">
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-warning" href="<?=base_url('admin/form_carga')?>"><strong>Cargar</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-warning" href="<?=base_url('admin/tablasProducto')?>"><strong>Lista de Productos</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-warning" href="<?=base_url('admin/pedidos')?>"><strong>Pedidos</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-warning" href="<?=base_url('admin/info')?>"><strong>Informaci&oacuten</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-warning" href="<?=base_url('admin/categoria')?>"><strong>Categorias</strong></a>
                <a class="flex-sm-fill text-sm-center nav-link font-weight-light text-primary" href="<?=base_url('login/logout')?>">Cerrar Session</a>
            </nav>
        </div>
    </div>
    