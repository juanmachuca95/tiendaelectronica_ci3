<div class="container-fluid home-categoria pb-4 pt-0 px-0">

    <?php /* 
        echo "<pre>";
        print_r($this->session); */
    ?>
    
    
    <?php if(!empty($productos)): ?>

    <div class="px-5 bg-light">
        <div class="row">
            <div class="col-md-8 py-5">
                <h3 class="font-weight-bold mb-3">Tu Carrito</h3>
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
                            $total = 0;
                            $subtotales = 0;
                                foreach($productos as $producto) : ?>
                            <tr>
                                <td><?=$producto->id?></td>
                                <td><?=$producto->producto?></td>
                                <td><?=$producto->precio?></td>
                                <td>
                                    <?= $items[intVal($producto->id)]; ?>
                                </td>
                                <td>
                                    <?= $subtotales = $subtotales + ($items[$producto->id] * $producto->precio); $total = $total + $subtotales; ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="<?=base_url('carritos/quitar/'.$producto->id)?>"><i class="fas fa-minus"></i></a>
                                    <a class="btn btn-success" href="<?=base_url('carritos/sumar/'.$producto->id)?>"><i class="fas fa-plus"></i></a>
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
            <div class="col-md-4">
                <div class="p-4">
                    <h3 class="font-weight-bold">¡Confirma tu orden!</h3>
                    <p class="font-weight-light">
                        Se reservara y la administracion se pondra en contacto contigo dentro de las 24 hs. para definir puntos de entrega o tipos envios
                    </p>
                    <?=form_open('cliente/cargarPedido')?>

                        <div class="row mb-3">
                            <div class="col">
                            <input type="text" id="nombre" name="nombre" value="<?=$this->session->nombre;?>" class="form-control" placeholder="Nombre . . ." readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <input type="text" id="apellido" name="apellido" value="<?=$this->session->apellido;?>" class="form-control" placeholder="Apellido . . ." readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección . . .">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                            <input type="text" id="telefono" name="telefono" class="form-control"
                                placeholder="Ejemplo: 03794-69-0474 (11 digitos con guiones)" 
                                pattern="[0-9]*{4}-[0-9]*{2}-[0-9]*{4}"
                            >
                            </div>
                        </div>
                        <button class="btn btn-warning " type="submit" role="button">Confirmar </button> 
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