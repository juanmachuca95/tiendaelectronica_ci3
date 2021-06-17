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

<!-- Modal carrito-->
<div class="modal fade" id="carritoMensaje" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="carritoMensajeLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="carritoMensajeLabel"><i class="fas fa-shopping-cart"></i> Tu carrito </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center" id="mensaje"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
<!--         <button type="button" class="btn btn-primary">Understood</button>
 -->      </div>
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
    <div class="row justify-content-center align-items-center p-5 m-0">
        <div class="col-12 col-md-7">
            <form action="<?=base_url('productos/finder')?>" method="POST">
                <h4 class="text-center"><?=($resultados) ?? 'Buscar en Catálogo'; ?></h4>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" name="producto" id="producto" placeholder="¿Que producto estas buscando? . . .">
                        <small class="text-danger" for="producto"><?php echo form_error('producto'); ?></small>
                    </div>
                    <div class="form-group col-md-5">
                        <select class="custom-select" name="categorias_id" id="categorias_id">
                            <option value="" selected>Elige una categoria . . .</option>
                        </select>
                        <small class="text-danger" for="categorias_id"><?php echo form_error('categorias_id'); ?></small>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
    
        <div class="row m-0  d-flex justify-content-center">
            <?php foreach ($productos as $producto) : ?>
            <div class="col-12 col-sm-6 col-md-4 p-1">
                <div class="card shadow-lg mb-5 bg-white rounded">

                    <a href="#" id="ver"><img class="img-fluid w-100 img-thumbail" style="max-height: 300px;" src="<?=$producto->imagen;?>" alt=""></a>
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold mifont">
                            <svg class="bi bi-card-image" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                                <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                            <?=$producto->producto?>
                        </h5>
                        <h4 class="card-subtitle text-muted"><?=$producto->categoria;?></h4>
                        <p class="card-text font-weight-lighter">
                            <?=$producto->descripcion?>
                        </p>
                        <p class="font-weight-light">
                            Precio
                            <svg class="bi bi-cart-fill text-warning" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg> $ <?=$producto->precio;?>
                        </p>
                        <?php if($this->session->is_logged_user): ?>
                        <a href="#" class="btn text-white text-uppercase" id="agregar" data-id="<?=$producto->id?>" style="background-color: #6200ee;">
                            <i data-id="<?=$producto->id?>" class="fas fa-shopping-cart"></i> 
                            <b id="cantidad[<?=$producto->id?>]" data-id="<?=$producto->id?>">

                                <?php 
                                    
                                    $items = $this->session->items ?? [];
                                    if(array_key_exists($producto->id, $items)){
                                        echo $items[$producto->id];
                                    }else{
                                        echo "0";
                                    }
                                
                                
                                ?>
                            
                            </b>
                        </a>

                        <?php else: ?>
                        <a href="<?=base_url('compras/store/').$producto->id;?>" class="btn text-white text-uppercase" style="background-color: #6200ee;"> Comprar </a>
                        <?php endif; ?>

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


<script>
    const carrito = document.querySelector('#carrito');
    const categoria = document.querySelector('#categorias_id');
    const mensaje = document.querySelector('#mensaje');
    const header = document.querySelector('#header');
    var url = '<?php echo base_url(); ?>'
   
    window.addEventListener('DOMContentLoaded', () => {
        
        productos = document.querySelectorAll('#agregar');
        productos.forEach(producto => {
            producto.addEventListener('click', (e) => {
                e.preventDefault();
                console.log(e.target.dataset.id);
                producto_id = e.target.dataset.id;
                cantidad_producto_id = document.getElementById("cantidad["+producto_id+"]");

                http = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject();
                http.onreadystatechange = function(){
                    if (http.readyState == 4 && http.status == 200) {
                        var data = http.responseText;
                        data = JSON.parse(data);
                        cantidad_producto_id.innerHTML = data.cantidad;
                        carrito.innerHTML = data.carrito;
                        showMensaje(data);

                    }
                }

                http.open('POST', url+'carritos/store', true);
                http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	            http.send('productos_id='+producto_id);
            });
        })



        if (window.XMLHttpRequest) {
            http_request = new XMLHttpRequest();
        } else {
            http_request = new ActiveXObject("Microsoft.XMLHTTP");
        }

        http_request.onreadystatechange = function () {
            if (http_request.readyState == 4 && http_request.status == 200) {
                console.log("La solicitud se ejecuto correctamente");
                data = JSON.parse(http_request.responseText);
                if(Object.entries(data).length > 0){
                    data.forEach(element => {
                        var option = document.createElement("option");
                        option.value = element.id;
                        option.innerHTML = element.categoria;
                        categoria.appendChild(option);
                    });
                }
            }
        }
        http_request.open('GET', url+'categorias/search?get=ok', true);
	    http_request.send();
        
    });

    function showMensaje(data){
        if(data.cargado){
            mensaje.innerHTML = 'Se agrego un producto a tu carrito exitosamente.';
            $('#carritoMensaje').modal('show');
        }else{
            mensaje.innerHTML = 'Lo sentimos, no hay stock suficiente.';
            $('#carritoMensaje').modal('show');
        }
    }

</script>