<?= $html ?>
    <?= $head ?>
        <?= $nav ?>
    <body>
        <?php if(isset($mensaje)){ ?>
            <p class=" bg-info text-center text-white"><?=$mensaje?></p>
        <?php } ?>
        <?php if(isset($error)){ ?>
            <p class=" bg-info text-center text-white"><?=$error?></p>
        <?php  $error =null; } ?>
        
    <div class="container-fluid transparencia p-0">
        <div class="container p-0">
            <div class="row py-3">
                <div class="col-sm-12 justify-content-center row pt-4 mx-0">
                <form action="<?=base_url('home/galeriaCategoria')?>" method="post" class="form-inline p-3">
                <?php if (isset($categorias) ) { ?>
                    <select class="custom-select col-8" name="categoria" id="categoria">
                        <option>Todos</option>
                        <?php foreach ($categorias as $row) { ?>
                        <option value="<?=$row->categoria?>"><?=$row->categoria?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-info text-white col-4" type="submit">Filtrar</button>
                <?php } else{ echo "<p class='bg-light text-dark'>"."no llego"."</p>";} ?>
                </form>
            </div>
                    <?php if(isset($lista)){
                        foreach ($lista as $row){
                            ?>
                           
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 mb-5 p-0" >
                                
                                <div>    
                                    <a href="" >
                                        <img id="imagen" src="<?=base_url($row->imagen)?>" class="img-fluid img-thumbnail p-1 bg-light" style="background-size:cover;" alt="imagen">
                                    </a>
                                </div>
                                <div class="">
                                
                                    <div class=" d-flex align-items-end card-img-overlay " onclick="mostrarImagen();">
                                        <div id="info-producto" class="text-center w-100 text-white">
                                            
                                            <h5 class="font-weight-bold lead pt-4"><?=$row->categoria?></h5>
                                            <p class="lead"><?=$row->descripcion?></p>
                                            <p class="font-weight-bold text-warning"><?='&#x1f6d2; $'.$row->precio?></p>
                                            <p>
                                                <a class="btn btn-warning" href="<?=$row->boton_compra;?>">Compra</a>
                                                <a class="btn btn-primary" href="<?=base_url('cliente/items/'.$row->id)?>">Haz un Pedido</a>
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                            </div>
                            
                            <?php
                        }
                    } ?>


            </div>
        </div>
    </div>
    <?= $footer ?>
    