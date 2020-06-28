<?= $html ?>
<?= $head ?>
<body class="">
    <div class="container-fluid p-0 fondo_admin">
    <div class="container p-0">
    	<div class="row m-0 p-5">
    		<div class="col-md-12 d-flex justify-content-center align-items-center">
    			<p class="display-4 font-weight-bold text-center text-azul p-5 m-5">
    				<i class="fas fa-user-shield"></i> Admin
    			</p>
    		</div>
    	</div>

    	<div class="row m-0">
    		<div class="col-12 col-sm-6 col-md-3 p-0">
    			<div class="pb-5 px-3">
	    			<h4 class="pb-5">
	    				<a class="font-weight-bold text-decoration-none text-azul" href="<?=base_url('admin/cargar_producto')?>">
	    					<i class="fas fa-plus-square"></i> Crear Producto
	    				</a>
	    			</h4>
	    			<p class="font-weight-light text-dark">
	    				Carga tus productos desde la tabla de productos de forma sencilla y rapida con un panel super intuitivo.
	    			</p>
    			</div>
    		</div>
    		<div class="col-12 col-sm-6 col-md-3 p-0">
    			<div class="pb-5 px-3">
	    			<h4 class="pb-5">
	    				<a class="font-weight-bold text-decoration-none text-azul" href="<?=base_url('admin/editar_producto')?>">
	    					<i class="fas fa-edit"></i> Editar Productos
	    				</a>
	    			</h4>
	    			<p class="font-weight-light text-dark">
	    				Edita modifica, cambia a gusto cada una de las caracteristicas de tus productos desde la tabla de productos rapidamente con la tabla de valores.
	    			</p>
    			</div>
    		</div>
    		<div class="col-12 col-sm-6 col-md-3 p-0">
    			<div class="pb-5 px-3">
	    			<h4 class="pb-5">
	    				<a class="font-weight-bold text-decoration-none text-azul" href="<?=base_url('admin/pedidos')?>">
	    					<i class="fas fa-chart-area"></i> Gestión de Pedidos
	    				</a>
	    			</h4>
	    			<p class="font-weight-light text-dark p-0">
	    				Supervisa la cantidad de pedidos y confirma las entregas en tiempo y forma para que tu empresa siga creciendo.
	    			</p>
    			</div>
    		</div>
    		<div class="col-12 col-sm-6 col-md-3 p-0">
    			<div class="pb-5 px-3">
	    			<h4 class="pb-5">
	    				<a class="font-weight-bold text-decoration-none text-azul" href="<?=base_url('admin/usuarios')?>">
	    					<i class="fas fa-plus-square"></i> Gestión de Usuarios
	    				</a>
	    			</h4>
	    			<p class="font-weight-light text-dark">
	    				Carga tus productos desde la tabla de productos de forma sencilla y rapida con un panel super intuitivo.
	    			</p>
    			</div>
    		</div>
    	</div>
    </div>
    </div>

<script src="<?=base_url()?>/assets/js/myJQuery.js"></script>
<script src="<?=base_url()?>/assets/js/validation.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
</body>
