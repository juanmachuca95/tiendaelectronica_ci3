<div class="container p-0">
<div class="row m-0">
    <div class=" col-sm-12 col-md-6 p-0">
        <div class="p-4">
        <h4 class="mt-3 mb-3"><strong>Cargar Producto</strong></h5>
        <form action="<?=base_url('admin/cargar')?>" id="crear_producto"  method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="categoria">Categoria (Se puede agregar Categorias) </label>

                <select class="form-control" name="categoria" required>
                    <option>Amigurrumis</option>
                    <option>Calendarios</option>
                    <option>Institucional</option>
                    <option>Merchandaising | Tematico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stock">Stock en Deposito</label>
                <input class="form-control" id="stock" name="stock" type="number" min="1" placeholder="Unidades disponibles al Mercado" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio de Compra &#x1f4b0;</label>
                <input class="form-control" id="precio" name="precio" type="number" placeholder="Precio por Unidad" required>
            </div>
            <div class="form-group">
                <label for="img"> Agregar Imagen &#x1f3b4;</label>
                <input class="form-control" id="img" name="img" type="file" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion </label>
                <input class="form-control" type="text" id="descripcion" name="descripcion" maxlength="50" rows="1" placeholder="No mas de 50 caracteres" required>
            </div>
            <div class="form-group">
                <label class="font-weight-normal" for="info_boton">Agregar Boton de Pago</label>
                <input class="form-control" type="text" id="info_boton" name="info_boton" placeholder="Pega aqu&iacute el Link de Mercado Pago" required>
            </div>
            <div class="form-group">
                <button class="btn btn-info" id="cargar" type="submit">Confimar</button>
            </div>
        </form>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 p-0">
        <div class="bg-dark text-white p-4 m-4">
            <h2>Comercializaci&oacuten &#x1f6d2;</h2>
            <p>Utiliza la opcion de Agregar un <strong>boton de pago</strong>. 
            Facilita la forma en que tus clientes compran tus productos. 
            </p>
            <p>1. Entrá en <a href="https://www.mercadopago.com.ar/como-cobrar"><strong>MercadoPago</strong></a></p>
            <p>2. Pega la información del boton en el campo <strong>"Boton de Pago"</strong></p>
            <p>3. Completa la información restante y <strong>confirma.</strong></p>
        </div>
    </div>
</div>
</div>