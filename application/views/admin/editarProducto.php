<?=$html?>
<?=$head?>
<body>
	<!--Modal de aviso-->
	<div class="modal fade bd-example-modal-sm" id="modalAviso" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Administrador</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <div class="modal-body">
        			
      			</div>
			</div>
		</div>
	</div>
	<!--Fin Modal-->

    <div class="fluid-container fondo_admin p-0 bg-white">
    	<div class="container p-0">
	    	<div class="row m-0">
	    		<div class="col-sm-12 col-md-12">
	    			<h3 class="font-weight-bold py-5"><i class="fas fa-tools"></i> Productos</h3>
					<?php if(null !== $this->session->flashdata('msj')): ?>
						<p class="px-5 font-weight-light"><?=$this->session->flashdata('msj');?></p>
					<?php endif;?>
	        	</div>
	        </div>
	        <div class="row m-0">
	            <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0">
	                <?php if (isset ($listaGeneral )) :  ?>
	                <div class="table-responsive bg-white">
	                <table class="table table-hover">
	                <thead class="thead-info font-weight-light"> 
	                    <th scope="col"><i class="fas fa-barcode"></i> Cod.</th>
	                    <th scope="col"><i class="fas fa-tags"></i> Categoria</th>
	                    <th scope="col"><i class="fas fa-tasks"></i> Descripcion</th>
	                    <th scope="col"><i class="fas fa-comment-dollar"></i> Precio</th>
	                    <th scope="col"><i class="fas fa-warehouse"></i> Stock</th>
	                    <th scope="col">Imagen </th>
	                    <th scope="col">Cambios</th>
	                </thead>
	                <?php foreach($listaGeneral as $row) : ?>
	                <tbody>   
	                <tr>
	                    <td scope="row">
	                        <input class="form-control" type="text" name="cod" value ="<?=$row->id?>" readonly>
	                    </td>
	                    <td>
	                        <input class="form-control" type="text" name="categoria" value ="<?=$row->categoria?>" readonly>
	                   	</td>
	                    <td>
	                    	<textarea class="form-control" name="descripcion" readonly><?=$row->descripcion?></textarea>
	                    </td>
	                    <td>
	                    	<input class="form-control" type="text" name="precio" value="<?=$row->precio?>" readonly>
	                    </td>
	                    <td><input class="form-control" type="text" name="stock" value="<?=$row->stock?>" readonly></td>
	                    <td>
	                    	<input class="custom-file form-control" type="file" value="" id="up_img" accept="/*image" hidden="true">
	                       	<a href="<?=base_url($row->imagen)?>" id="ver">
	                    		<i class="fas fa-eye"></i>
	                    	</a>
	                    </td>
	                    <td>
	                    	<p>
	                    	<a class="btn btn-warning" id="editarFila" href=""><i class="far fa-edit"></i>
	                    	</a><a class="btn btn-danger" id="eliminarFila" href="<?=base_url('admin/eliminar/'.$row->id)?>"><i class="fas fa-trash-alt"></i>
	                    	</a>
	                    	</p>
	                    </td>
	                </tr>
	                <?php endforeach; endif; ?>
	                </tbody>
	                </table>

	                <?php echo $this->pagination->create_links();?>

	                </div>
	            </div>
	        </div>
    	</div>
    </div>
    <script src="<?php echo base_url()?>assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.js"></script>
	<script src="<?=base_url()?>/assets/js/myJQuery.js"></script>
	<script src="<?=base_url()?>/assets/js/validation.js"></script>
</body>


<?php /*base_url('admin/editar/'.$row->id)*/?>