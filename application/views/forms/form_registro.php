<div class="container">
    <div class="row my-4">
        <div class="col-md-5 card py-5 bg-dark border border-light">
            <p class="display-4 text-warning">Registro</p>
            <form class="text-white" action="<?=base_url('login/registrarCliente')?>" method="post">
                <div class="form-group ">
                    <label for="correo">Nombre</label>
                    <input class="form-control" type="text" id="nombre" name="nombre" minlenght="3" maxlength="100" placeholder="Nombre Completo" required>
                </div>
                <div class="form-group">
                    <label for="correo">Apellido</label>
                    <input class="form-control" type="text" id="apellido" name="apellido" minlenght="2" maxlength="60"  placeholder="Apellido/s" required>
                </div>
                <div class="form-group">
                    <label for="correo">Email</label>
                    <input class="form-control" type="email" id="correo" name="correo" maxlength="80" placeholder="Correo. Ej.: nombre@gmail.com " required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" minlength="8" maxlength="12" name="password" placeholder="No mayor de 12 digitos" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Ingresar</button>
                </div>
                <p><?php if (isset($error)) { echo $error; }  ?></p>
            </form>
        </div>
        <div class="col-md-6 p-0 home-categoria">
                <div class="py-5"> 
                    <div class="text-justify-center p-5">
                        <p class="display-4">Ventajas de Usuario</p>
                        <p class="lead">1. Facilidad en las elecciones de pago, <strong class="text-warning">Mercado Pago, Pedidos, etc.</strong></p>
                        <p class="lead">2. Podes activar el carrito de compras.</p>
                        <p class="lead">3. Solicitar pedidos fuera de catalogo, ya sea para tu empresa o emprendimiento.</p>
                        <p class="lead">4. Posibilidad de hacer pedidos en cantidad, acceso a su control de negocio y al trato directo.</p>
                    </div>         
                </div>
            </div>     
    </div>
</div>