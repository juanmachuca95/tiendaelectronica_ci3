<div class="container-fluid p-0 m-0">

    <div class="row m-0">
        <div class="col-md-5 p-0 m-0 d-flex align-items-center justify-content-center" id="home-text">
            <div class="text-center">
                <img class="img-fluid w-50" src="<?=$comercio->imagen;?>">  
            </div>
        </div>
        <div id="home-text" class="col-md-7 p-0 text-white">
            <div class="p-5 text-center">
                <h1 class="font-weight-bold">
                    ¡Tus compras están aquí!
                </h1>
                <p class="lead ">
                    Encontra tu souvenir y si no lo encontras te lo hacemos. 
                </p>
                <p class="lead">
                    Hace crecer tu empresa, pone tu logo. Entr&aacute en la seccion de 
                    institucionales para ver los ejemplos.
                </p>
            </div>
        </div>
    </div>

</div>  

<div class="container-fluid bg-light">
    <div class="py-4" style="max-width: 95%; margin: 0 auto;">
        <div class="glider-contain">
            <div class="glider">
                <?php foreach ($productos as $producto): ?>
                
                <div class="d-flex align-items-center">    
                    <a href="<?=base_url('productos/detalle/').$producto->id?>">
                        <img class="img-fluid img-thumbail" 
                        src="<?=$producto->imagen;?>" alt="">
                    </a>
                </div>

                <?php endforeach; ?>
                
            </div>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    </div>
</div>

    
</div>


<div class="container-fluid home-categoria p-0">
    <div class="container py-5">

         <div class="row py-5">
            <div class="col-12 col-md-4 d-flex align-items-center" style="max-height: 500px;">
                
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <h3 class="font-weight-bold"></h3>    
                    <h3 class="lead px-5">  
                        <p> </p>
                    </h3>
                </div>
            </div>

        </div>


        <div class="text-center">
            <h1 class="font-weight-bold"> ¡Bienvenidos! </h1>
            <p class="lead text-center">
                ¿Qué es el SouvenirsZN?
            </p>
            <p class="text-muted">
                Somos una tienda de regalos originales y creativos, novedades, productos relacionados con el Arte y artículos de todo tipo.
            </p>
            <div class="lead">
                <p> Los productos de nuestra tienda son epeciales, excentricos, originales, y en su mayoria realizados a medida.</p>
                <p> ¡Si quieres regalar algo especial! Llegaste al lugar indicado. </p>
            </div>
        </div>
       

        <!--Introducción a los productos -->
        <h3 class="font-weight-light text-center"> &#x2b50; Productos destacados &#x2b50;</h3>
        <div class="justify-content-center row py-5">

            <div class="col-sm-4 p-2 justify-content-center row">

                <div class="card bg-light" style="width: 18rem;">
                    <img src="<?= base_url() ?>assets/img/categorias/tazas.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Tazas para regalo</h4>
                        <p class="lead text-dark text-center">El regalo más clásico tanto para chicos y grandes</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2 justify-content-center row">

                <div class="card bg-light" style="width: 18rem;">
                    <img src="<?= base_url() ?>assets/img/categorias/calendarios.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Canlendarios</h4>
                        <p class="lead text-dark text-center">Diseño de calendarios para tu organización, aniversario, etc. </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 p-2 justify-content-center row">

                <div class="card bg-light" style="width: 18rem;">
                    <img src="<?= base_url() ?>assets/img/categorias/remeras.jpg" class="card-img-top" style="background-color:#ffff99;" alt="...">

                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Remeras personalizadas</h4>
                        <p class="lead text-dark text-center">Las mejores remeras personalizadas.</p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-center lead">Preciona ver todos para conocer mas a fondo los productos de Souvenirs ZN</p>
                <p class=" text-center"><a class="btn btn-warning" href="<?= base_url('catalogo') ?>">ir a Catálogo de Productos</a></p>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    window.addEventListener('load', function(){
        var slider = new Glider(document.querySelector('.glider'), {
            // Mobile-first defaults
            slidesToShow: 1,
            slidesToScroll: 1,
            scrollLock: true,
            draggable:true,
            dots: '#resp-dots',
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
              },
            responsive: [
            {
              // screens greater than >= 775px
              breakpoint: 775,
              settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 'auto',
                slidesToScroll: 'auto',
                itemWidth: 150,
                duration: 0.25
              }
            },{
              // screens greater than >= 1024px
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                itemWidth: 150,
                duration: 0.25
              }
            }
          ]}
        )



        let autoplayDelay = 5000;

        let autoplay = setInterval(() => {
            slider.scrollItem('next')
        }, autoplayDelay);

        /* element.addEventListener('mouseover', (event) => {
            if (autoplay != null) {
              clearInterval(autoplay);
              autoplay = null;
            }
        }, 300);

        element.addEventListener('mouseout', (event) => {
            if (autoplay == null) {
              autoplay = setInterval(() => {
                  slider.scrollItem('next')
              }, autoplayDelay);
            }
        }, 300);*/
    });

   

  
</script>