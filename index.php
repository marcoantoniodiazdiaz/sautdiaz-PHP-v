<?php 
  session_start();
  include 'database/parameters.php';
  if($_SESSION['username'] == "" || $_SESSION['username'] == null) { ?>
<script>
    window.location = "security/login.php";
</script>
<?php }
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="search-panel">
                <div class="search-inner d-flex align-items-center justify-content-center">
                    <div class="close-btn">Cerrar <i class="fa fa-close"></i></div>
                    <form id="searchForm" action="#">
                        <div class="form-group">
                            <input type="search" name="search" placeholder="Nada que buscar aqui :P" disabled>
                            <button type="submit" class="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header-->
                    <a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Servicio Automotriz Diaz</strong><strong> &nbsp4.0 BETA</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">S</strong><strong>A 4.0</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">
                    <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
                    <div class="list-inline-item logout"><a id="logout" href="login.html" class="nav-link">Cerrar Sesion <i class="icon-logout"></i></a></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/logo.png" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">
                        <?php echo $_SESSION['nombre']; ?>
                    </h1>
                    <p>Administrador</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Menu</span>
            <ul class="list-unstyled">
                <li>
                    <a href="clientes/index.php"> <i class="fa fa-user"></i>Clientes </a>
                </li>
                <li>
                    <a href="vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a>
                </li>
                <li>
                    <a href="servicios/index.php"> <i class="fa fa-key"></i>Servicios </a>
                </li>
                <li>
                    <a href="orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a>
                </li>
                <li>
                    <a href="productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a>
                </li>
            </ul><span class="heading">Dinero</span>
            <ul class="list-unstyled in-development">
                <li>
                    <a> <i class="fa fa-arrow-up"></i>Entradas </a>
                </li>
                <li>
                    <a> <i class="fa fa-arrow-down"></i>Salidas </a>
                </li>
                <li>
                    <a> <i class="icon-chart"></i>Movimientos </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Inicio</h2>
                </div>
            </div>
            <div class="container text-center">
                <!-- INCLUSION DE CONTENIDO -->
                <div class="block bg-white" style="border-radius: 50px;">
                    <div class="row">
                        <div class="col-md-5"><img src="img/logonew2.jpg" width="350px"></div>
                        <div class="col-md-7 text-center">
                            <div id="spacer" style="height: 80px;"></div>
                            <span class="text-uppercase" style="font-size: 160%;">Servicio Automotriz Diaz</span><br>
                            <span class="text-uppercase text-primary" style="font-size: 200%;"><strong>4.0 BETA</strong></span><br>
                            <span class="text-uppercase">Ultima Actualizacion: 5 de Diciembre de 2018</span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-dark text-white" style="cursor: pointer;" onclick="window.location = 'demo/index.php'">
                            <img class="card-img" src="img/back8.jpeg">
                            <div class="card-img-overlay">
                                <p class="card-text">
                                    <h2><br>Dentro del Taller</h2>
                                </p>
                                <p class="card-text">Coches dentro del Taller</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white" style="cursor: pointer;" onclick="window.location = 'orden/ordenCompleta/index.php'">
                            <img class="card-img" src="img/back9t.jpg">
                            <div class="card-img-overlay">
                                <p class="card-text">
                                    <h2><br>Nuevo Cliente</h2>
                                </p>
                                <p class="card-text">Registrar un Cliente y Coche</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white" style="cursor: pointer;">
                            <img class="card-img" src="img/back10t.jpg">
                            <div class="card-img-overlay">
                                <p class="card-text">
                                    <h2><br>Mantenimiento de Software</h2>
                                </p>
                                <p class="card-text">phpmyadmin</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
            </div>
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- 
              MARCO ANTONIO DIAZ DIAZ <3
              -->
                        <p class="no-margin-bottom">2018 &copy; Diaz System's. Design by <span class="text-primary">Marco Antonio Diaz Diaz</span>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        $(".in-development").click(function(event) {
            swal(":(", "Aun trabajo en eso!", "warning");
        });
    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
</body>

</html>