<div class="container-fluid home-categoria pb-4 pt-0 px-0">

    <?php /* 
        echo "<pre>";
        print_r($this->session); */
    ?>
    
    
    <?php if(!empty($productos)): ?>

    <div class="px-5 bg-light">
        <div class="row">
            <div class="col-md-8 py-5">
                <h3 class="font-weight-bold mb-3">
                    Tu Carrito <i class="fas fa-cart-plus"></i> <?=$this->session->carrito;?>
                    <a class="btn btn-danger" href="<?=base_url('carritos/vaciar')?>">Vaciar</a>
                </h3>
                <?php $items = $this->session->items;?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">SubTotal</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($productos as $producto) : ?>
                            <tr>
                                <td><?=$producto->id?></td>
                                <td><?=$producto->producto?></td>
                                <td><?=$producto->precio?></td>
                                <td>
                                    <?= $items[intVal($producto->id)]; ?>
                                </td>
                                <td>
                                    <?=($items[$producto->id] * $producto->precio);?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('carritos/quitar/'.$producto->id)?>"><i class="fas fa-minus"></i></a>
                                    <a class="btn btn-success" href="<?=base_url('carritos/sumar/'.$producto->id)?>"><i class="fas fa-plus"></i></a>
                                    <a class="btn btn-danger text-white" href="<?=base_url('carritos/quitarproducto/'.$producto->id);?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            
                            <?php endforeach; ?>                
                            <tr>
                                <td colspan="1"></td><td colspan="3"><strong> Total de compra: </strong></td><td> <i class="fas fa-dollar-sign"></i> <?=$total;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="p-4">
                    <h3 class="font-weight-bold">¡Confirma tu orden!</h3>
                    <p class="font-weight-light">
                        Se reservara y la administracion se pondra en contacto contigo dentro de las 24 hs. para definir puntos de entrega o tipos envios
                    </p>
                    <a href="<?=base_url('ordenes/create')?>" class="btn btn-warning " type="submit" role="button">Confirmar </a> 
                    <a  class="btn text-white" style="background-color: #6200ee;"
                     href="<?=base_url('catalogo')?>">Seguir comprando</a>
                    </form>    
                </div>     
            </div> 
        </div>
       
    </div>



    <?php else: ?>
    <div class="container">
        <div class="jumbotron bg-transparent">
            <h1 class="display-4">¿Carrito vacio?, ¡Agrega un producto!</h1>
            <p class="lead">Agrega al carrito todo lo que necesitas y te lo mandamos a tu casa!.&#x1f69a;.</p>
            <hr class="my-4">
            <p>No olvides registrarte para poder hacer uso del carrito.</p>
            <a class="btn btn-primary btn-lg" href="<?=base_url('catalogo')?>" role="button">Ir al Catálogo</a>
        </div>
    </div>

    <?php endif; ?>
</div>