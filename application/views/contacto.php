<?= $html ?>
<?= $head ?>
<?= $nav ?>

<body>
    <div class="container my-4">
        <div class="row bg-dark">
            <div class="col-sm-12 col-md-12 p-5">
                <h1 class="text-white">Información de contacto</h1>
                <p><b class="display-4 text-warning"> Machuca Juan Gabriel</b> <b class="text-muted">Director General (SouvenirsZN)</p>
                <p class="lead text-white">
                    SouvenirsZN S.A. Domicilio legal Castelli 1198 <br> 
                    REGALÁ ALGO UNICO. Regalos Personalizados Almanaques Cuadernos Agendas Llaveros Pines Remeras Tarjetas Entradas</p>
                <p class="text-white">Diseñados a medida · Servicio de impresión · Tienda de regalos</p>
                <p class="lead text-warning">&#128222;<a class="text-warning" >0379469474</a> - &#x1f4e7; souvenirszn@gmail.com</p>
                <p class="lead text-white">Horario de atención de lunes a viernes de 7:00 a 12:00 y de 16:00 a 20:00 </p>

                <form  action="pr-5" method="post">
                    <h3 class="font-weight-bold pb-3 text-white">¡Envianos tu Consulta! &#x1f4dd;</h3>
                    <p class="font-weight-lighter">
                        Mandan&oacutes tus inquietudes, sobre sobre desarrollos ideas o emprendimientos que quieras llevar a cabo. </p>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nombre" id="" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="correo" placeholder="Ingresa tu correo electronico" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" id="" cols="30" rows="5" placeholder="Escribe la descripción del desarrollo"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" disabled>Enviar consulta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $footer ?>