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


<section class="container-fluid bg-white py-5">
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?=$producto->producto?></h3>
                    <div class="col-12">
                    <img src="<?=$producto->imagen;?>" class="img-fluid w-100" alt="Product Image">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?=$producto->producto?></h3>
                    <p><?=$producto->descripcion;?></p>

                    <hr>
                    <!--  <h4>Available Colors</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                        <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                        Green
                        <br>
                        <i class="fas fa-circle fa-2x text-green"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                        Blue
                        <br>
                        <i class="fas fa-circle fa-2x text-blue"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                        Purple
                        <br>
                        <i class="fas fa-circle fa-2x text-purple"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                        Red
                        <br>
                        <i class="fas fa-circle fa-2x text-red"></i>
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                        Orange
                        <br>
                        <i class="fas fa-circle fa-2x text-orange"></i>
                    </label>
                    </div> -->

                    <!--  <h4 class="mt-3">Size <small>Please select one</small></h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                        <span class="text-xl">S</span>
                        <br>
                        Small
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                        <span class="text-xl">M</span>
                        <br>
                        Medium
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                        <span class="text-xl">L</span>
                        <br>
                        Large
                    </label>
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                        <span class="text-xl">XL</span>
                        <br>
                        Xtra-Large
                    </label>
                    </div> -->

                    <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        $ <?=$producto->precio;?>
                    </h2>
                    <h4 class="mt-0">
                        <small>Costo de envio: 0.00</small>
                    </h4>
                    </div>

                    <div class="mt-4">

                    <?php if($this->session->is_logged_user): ?>
                    <a href="#agregar" class="btn btn-primary btn-lg btn-flat" id="agregar" data-id="<?=$producto->id?>" style="background-color: #6200ee;">
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
                        Agregar
                    </a>
                    <?php else:?>
                    <div class="btn btn-outline-light text-uppercase btn-lg btn-flat">
                        <a class="text-decoration-none" style="color: #6200ee;" href="<?=base_url('compras/store/').$producto->id;?>">
                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Comprar
                        </a>
                    </div>
                    <?php endif; ?>
                    <!-- <div class="btn btn-default btn-lg btn-flat">
                        <i class="fas fa-heart fa-lg mr-2"></i>
                        Lista de deseos
                    </div> -->
                    </div>

                     <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?=$producto->descripcion?></div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"></div>
                </div>
            </div>
        <!-- /.card-body -->
        </div>
    </div>
    <!-- /.card -->
</section>


<script>
    const carrito = document.querySelector('#carrito');
    const categoria = document.querySelector('#categorias_id');
    const mensaje = document.querySelector('#mensaje');
    const header = document.querySelector('#header');

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

                http.open('POST', '../../carritos/store', true);
                http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	            http.send('productos_id='+producto_id);
            });
        })
        
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