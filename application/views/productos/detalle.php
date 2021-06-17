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