<?= $html ?>
<head>
    <?= $head ?>
</head>
    <body id="fondo">
    <?php if(isset($data['mensaje'])){
        echo $data['mensaje'];
    }?>
        <?= $nav_admin ?>

    <?php if(isset($registro)){ ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 card border border-warning">
                <form action="<?=base_url('admin/update')?>" method="post" enctype="multipart/form-data">
                    <h4 class="mt-3 mb-3"><strong>Actualizacion o Modificaci&oacuten id </strong></h4>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?=$registro[0]->id?>">
                        <label for="categoria">Categoria (Se puede agregar Categorias) </label>

                        <select class="form-control" style="background-color: #e6ffff;" name="categoria" required>
                            <option  value="<?=$registro[0]->categoria?>"><?=$registro[0]->categoria?></option>
                            <option>Amigurrumis</option>
                            <option>Calendarios</option>
                            <option>Institucionales</option>
                            <option>Merchandaising | Tematico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock en Deposito</label>
                        <input class="form-control" style="background-color: #e6ffff;" id="stock" name="stock" type="number" min="1" placeholder="Unidades disponibles al Mercado" value="<?=$registro[0]->stock?>" required>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio de Compra</label>
                        <input class="form-control" style="background-color: #e6ffff;" id="precio" name="precio" value="<?=$registro[0]->precio?>"  type="number" placeholder="Precio por Unidad" required>
                    </div>
                    <div class="form-group">
                        <img class="card m-2"  style="background-color: #e6ffff;" src="<?=base_url($registro[0]->imagen)?>" id="img_actual" width="150px" alt="">   
                        <label for="img_actual">Imagen Actual</label>
                        <input class="form-control" id="img" name="img" type="file" value="" accept="image/*"/>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion del Producto</label>
                        <input class="form-control" style="background-color: #e6ffff;" maxlength="50" type="text" id="descripcion" name="descripcion" value="<?=$registro[0]->descripcion?>" minlength="20" maxlength="50" rows="1" placeholder="No mas de 50 caracteres" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-normal" for="info_boton">Agregar Boton de Pago</label>
                        <input class="form-control" style="background-color: #e6ffff;"  type="text" id="info_boton" name="info_boton" value="<?=$registro[0]->boton_compra?>" placeholder="Pega aqu&iacute el Link de Mercado Pago" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="bg-dark text-white p-4 m-4">
                    <h2>Comercializaci&oacuten &#x1f6d2;</h2>
                    <p>Utiliza la opcion de Agregar un <strong>boton de pago</strong>. 
                    Facilita la forma en que tus clientes compran tus productos. 
                    </p>
                    <p>1. Entrá en <a href="https://www.mercadopago.com.ar/como-cobrar"><strong>MercadoPago</strong></a></p>
                    <p>2. Pega la información del boton en el campo <strong>"Boton de Pago"</strong></p>
                    <p>3. Completa la información restante y <strong>Actualizar.</strong></p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
<script src="<?php echo base_url();?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap.js"></script>
</body>