<?php if(isset($html)){ echo $html;} ?>
<?php if(isset($head)){ echo $head;} ?>
    <body >
    <?php if(isset($nav_admin)){ echo $nav_admin;} ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-3 bg-dark text-white">
                <?php if(isset($error)) { echo "<p class='font-weight-bold'>".$error."</p>"; } ?>
                <h4>Consideraciones: </h4>
                <p>Cuando crees una categoria procura que tenga una sola palabra en lo posible, que todos los productos bajo esa categoria se identifique generalmente con ese nombre. 
                Si se comete algun error ortografico, o de otra indole, la modificacion o eliminacion de la categoria, se debera realizar por el administrador de la base de datos. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 bg-dark py-4 rounded">
                <form class="card p-4" action="crearCategoria" method="post">
                <h3>Nueva Categoria</h3>
                    <div class="form-group">
                        <input class="form-control" id="categoria" name="categoria" type="text" min="1" maxlenght="60" placeholder="Nombre Categoria (Una Palabra)" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="descripcion" name="descripcion" type="text" min="1" maxlenght="60" placeholder="Descripcion (breve y concisa)" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        

            <?php if(isset($categorias)) { ?>
            <div class="col-md-8 bg-dark">
                <div class="table-responsive">
                <table class="table table-light table-hover">
                <thead class="bg-warning text-white">
                    <th>Categoria</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                <?php foreach($categorias as $row){ ?>
                    <tr>
                        <td class="font-weight-light"><?=$row->categoria?></td>
                        <td class="font-weight-light"><?=$row->descripcion?></td>
                    </tr>
                <?php } ?>
                </tbody>
                </table>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>