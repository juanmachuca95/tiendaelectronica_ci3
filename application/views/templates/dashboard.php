<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>
  <link rel="shortcut icon" href="<?=base_url('assets/img/logo.png')?>" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url().'/'?>assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=base_url('assets/img/logo.png')?>" alt="SouvenirsZN" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     <!--  <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><b id="consultas_count">0</b></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"> Consultas</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i><b id="consultas_count">0</b> nuevos mensajes
            <span class="float-right text-muted text-sm">no leidos</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('consultas')?>" class="dropdown-item dropdown-footer">Ver todas las Consultas</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('admin');?>" class="brand-link">
      <img src="<?=base_url('assets/img/logo.png')?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-header">PRINCIPALES</li>
          <li class="nav-item">
            <a href="<?=base_url('ordenes')?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Ordenes
                <span class="right badge badge-warning">New <b id="ordenes_num"><?=0;?></b></span>
              </p>
            </a>
          </li>
          <li class="nav-header">RECURSOS</li>
          <li class="nav-item">
            <a href="<?=base_url('productos')?>" class="nav-link">
              <i class="nav-icon fas fa-dumpster-fire"></i>
              <p>
                Catálogo
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('categorias')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('productos')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('consultas')?>" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Consultas
                <span class="right badge badge-warning">New <b id="consultas_count"><?=0;?></b></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('users')?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <!-- <span class="right badge badge-warning">New <?=0;?></span> -->
              </p>
            </a>
          </li>
          <li class="nav-header">SISTEMA</li>
          <li class="nav-item">
            <a href="<?=base_url('configuraciones')?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Configuraciones
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('comercios')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comercio</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li> -->

         <!--  <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Tabbed IFrame Plugin</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=(isset($title)) ? $title : 'Dashboard';?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php if($this->session->success) :?>
    <p class="p-3 alert alert-success">
      <?=$this->session->success;?>
    </p>
    <?php endif; ?>

    <?php if($this->session->error) :?>
    <p class="p-3 alert alert-danger">
      <?=$this->session->error;?>
    </p>
    <?php endif; ?>

    <!-- Main content -->
    <?=$body?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://juanmachuca95.github.io">Made by Machuca Juan</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url()?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url()?>assets/dist/js/pages/dashboard.js"></script>
</body>
</html>

<script>
  const consultas_count = document.querySelectorAll('#consultas_count');
  const ordenes_num = document.querySelectorAll('#ordenes_num');
  const users_num = document.querySelectorAll('#users_num');

  var URLdomain = window.location.host;
  var protocol = window.location.protocol;


  window.addEventListener('DOMContentLoaded', ()=>{
    //Consultas
    http = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject();
    http.onreadystatechange = function(){
      if (http.readyState == 4 && http.status == 200) {
        var data = http.responseText;
        if(Object.entries(data).length > 0){
          data = JSON.parse(data);
          consultas_new  = Object.entries(data).length;
          consultas_count.forEach(element => {
            element.innerHTML = consultas_new;
          });
        }
      }
    }

    http.open('GET', protocol+'//'+URLdomain+'/consultas/obtener?get=consultas', true);
    http.send();


    //Ordenes
    http_orden = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject();
    http_orden.onreadystatechange = function(){
      if(http_orden.readyState == 4 && http_orden.status == 200){
        var data_orden = http_orden.responseText;
        if(Object.entries(data_orden).length > 0){
          data_orden = JSON.parse(data_orden);
          data_orden_nuevas = Object.entries(data_orden).length;
          ordenes_num.forEach(element => {
            element.innerHTML = data_orden_nuevas;
          });
        }
      }
    }

    http_orden.open('GET', protocol+'//'+URLdomain+'/ordenes/obtener?get=ordenes', true);
    http_orden.send();


    //Usuarios
    http_users = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject();
    http_users.onreadystatechange = function(){
      if(http_users.readyState == 4 && http_users.status == 200){
        var data_users = http_users.responseText;
        if(Object.entries(data_users).length > 0){
          data_users = JSON.parse(data_users);
          data_users_nuevos = Object.entries(data_users).length;
          users_num.forEach(element => {
            element.innerHTML = data_users_nuevos;
          });
        }
      }
    }

    http_users.open('GET', protocol+'//'+URLdomain+'/users/obtener?get=users', true);
    http_users.send();


  })
</script>