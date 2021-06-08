<!-- Modal Imagen-->
<div class="modal fade" id="modalImagen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-image"></i> Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="container">
        <img id="verImagen" class="img-fluid w-100" src="">
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>

<!-- Mensajes -->
<?php if (isset($mensaje)): ?>
    <p class=" bg-info text-center text-white"><?=$mensaje?></p>
<?php endif;?>

<?php if (isset($error)): ?>
    <p class=" bg-info text-center text-white"><?=$error?></p>
<?php $error = null;endif;?>


<div class="container-fluid bg-light px-0">
    <div class="row justify-content-center align-items-center p-5">
        <div class="col-12 col-md-6 d-flex">
            <form action="<?=base_url('productos/search')?>">
                <div class="input-group">
                    <input type="text" placeholder="¿Que producto estas buscando? . . . " class="form-control">
                    <select class="custom-select" name="categoria" id="categoria">
                        <option value="">Elige una categoria . . .</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row m-0  d-flex justify-content-center">
            <?php foreach ($productos as $producto) : ?>
            <div class="col-12 col-sm-6 col-md-4 p-1">
                <div class="card shadow-lg mb-5 bg-white rounded">

                    <a href="#" id="ver"><img class="img-fluid w-100" src="<?=$producto->imagen;?>" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold mifont">
                            <svg class="bi bi-card-image" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                                <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                            <?=$producto->producto?>
                        </h5>
                        <p class="card-text font-weight-lighter">
                            <?=$producto->descripcion?>
                        </p>
                        <p class="font-weight-light">
                            Precio
                            <svg class="bi bi-cart-fill text-warning" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg> <?=$producto->precio;?> USD
                        </p>
                        <a href="#" class="btn text-white text-uppercase" style="background-color: #6200ee;"> Comprar </a>
                        <a href="<?=base_url('productos/detalle/').$producto->id?>" class="btn btn-outline-light text-uppercase" style="color: #6200ee;"> Detalles </a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>
            
            
        </div>
        
        <div class="row m-0 px-4">
            <?php echo $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
