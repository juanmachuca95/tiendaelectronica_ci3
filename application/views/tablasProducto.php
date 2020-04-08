<?php if(isset($html)){ echo $html;} ?>
    <?php if(isset($head)){ echo $head;} ?>

    <body id="fondo_admin">
    <?php if(isset($nav_admin)){ echo $nav_admin;} ?>
    <h2 class="font-weight-bold" style="font-size:2rem;">Lista de Mercaderias</h2>

    <form action="<?=base_url('admin/ver_categoria')?>" method="post">
    <div class="form-row">
        <label class="form-control bg-transparent col-md-2" for="categoria">Elige una Categoria</label>
        <select class="form-control col-md-3 mb-2" name="eleccion" id="eleccion" required>
            <option value="0">Opciones</option>
            <option value="Todos">Todos</option>
            <option value="Amigurrumis">Amigurrumis</option>
            <option value="Calendarios">Calendarios</option>
            <option value="Institucionales">Institucionales</option>
            <option value="Tematicos ">Tematicos</option>
        </select>
        <button class="form-control btn btn-warning mb-2 col-md-2" type="submit">Solicitar Lista</button>
        <?php if (isset($error))  { ?>
        <br>
        <p class="form-control bg-transparent text-dark font-weight-bold"><?=$error." &#x1f515;";?></p>
        <?php } ?>
    </div>
    </form>
</body>

