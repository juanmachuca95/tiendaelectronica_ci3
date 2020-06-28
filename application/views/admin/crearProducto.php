<?=$html?>
<?=$head?>
<div class="container-fluid p-0 bg-white m-0">
	<?php if($this->session->flashdata('msj') != null): ?>
		<p class="bg-success text-white font-weight-light py-3 px-5"><?=$this->session->flashdata('msj');?></p>
	<?php endif;?>
	<?=$form?>
</div>

