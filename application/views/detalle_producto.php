<?=$head?>
<?=$nav?>

<div class="container-fluid p-0 home-categoria">
	<div class="container">

		<!--Toast de mensaje Correcto!-->
		<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
		  <div class="toast m-3" style="position: absolute; top: 0; right: 0;" data-delay="5000">
		    <div class="toast-header">
		      <img src="<?=base_url('assets/img/logo.png')?>" class="rounded mr-2" width="30" alt="...">
		      <strong class="mr-auto">Souvenirs ZN </strong>
		      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		      </button>
		    </div>
		    <div class="toast-body">
		      
		    </div>
		  </div>

		  <div class="row m-0">
			<div class="col-md-6 p-0 d-flex justify-content-center"> 
				<div class="p-5">
					<img class="img-fluid rounded p-2 bg-white" src="<?=base_url($producto->imagen)?>">
				</div>
			</div>
			<div class="col-md-6 d-flex justify-content-center align-items-center">
				<div class="p-5 text-center font-weight-light">
					<h2 style="color: #336699">
						<i class="fas fa-tag"></i><?=$producto->categoria?>
					</h2>
					<hr>
					<p>
						Cod: <b id="codigo"><?=$producto->id;?></b> - 
						Descripcion: <b><?=$producto->descripcion?></b>
					</p>
					<p class="lead">Precio <i class="fas fa-hand-holding-usd" style="color: orange;"></i> <?=$producto->precio?></p>

					<p>
						<?php if(true == $this->session->userdata('is_logged_user')): ?>
						<a href="#" class="addItem font-weight-bold btn btn-outline-warning">
							AGREGAR A <i class="fas fa-cart-plus"></i>
						</a>
						<?php else : ?>
						<a href="<?=base_url('login')?>" class="btn btn-warning">REGISTRATE Y USA EL  <i class="fas fa-cart-plus"></i></a>
						<?php endif; ?>
						<a href="<?=$producto->boton_compra?>" class="btn btn-outline-info"> COMPRAR </a>

					</p>
				</div>
			</div>
		</div>
		</div>
		<!--Toast de mensaje-->

		
	</div>
</div>

<?=$footer?>