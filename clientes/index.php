<?php 
  include '../database/parameters.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clientes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="../css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                            <input type="search" name="search" placeholder="Que estas buscando?...">
                            <button type="submit" class="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header-->
                    <a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Servicio Automotriz Diaz</strong><strong> &nbsp4.0</strong></div>
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
                <div class="avatar"><img src="../img/logo.png" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">Marco Antonio Diaz Diaz</h1>
                    <p>@elprogramador:v</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Menu</span>
            <ul class="list-unstyled">
                <li class="active">
                    <a> <i class="fa fa-user"></i>Clientes </a>
                </li>
                <li>
                    <a href="../vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a>
                </li>
                <li>
                    <a href="../servicios/index.php"> <i class="fa fa-key"></i>Servicios </a>
                </li>
                <li>
                    <a href="../orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a>
                </li>
                <li>
                    <a href="../productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a>
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
                    <h2 class="h5 no-margin-bottom">Clientes</h2>
                </div>
            </div>
            <div class="container">
                <div class="block">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar" id="boxBuscar">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#agregarCliente">Agregar <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--
          INCLUSION DE CONTENIDO
          -->
                <div id="user-content">
                    <?php $sql = "SELECT * FROM CLIENTES"; ?>
                    <?php $result = $conn->query($sql); ?>
                    <?php 
          while($row = $result->fetch_assoc()) { ?>
                    <div class="public-user-block block">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="order text-primary">
                                    <?php echo $row['ID']; ?>
                                </div>
                                <a class="name"><strong class="d-block">&nbsp&nbsp&nbsp&nbsp<?php echo $row['NOMBRE']; ?></strong><span class="d-block">&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['EMAIL']?></span></a>
                            </div>
                            <div class="col-lg-3 text-center">
                                <div class="contributions">
                                    <?php echo $row['DIRECCION']; ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="details d-flex">
                                    <div class="item"><i class="fa fa-mobile"></i><strong><?php echo $row['CELULAR'] ?></strong></div>
                                    <div class="item"><i class="fa fa-phone"></i><strong><?php echo $row['TELEFONO']; ?></strong></div>
                                    <div class="item">
                                        <button class="btn btn-danger btn-sm text-center" onclick="ir(<?php echo $row['ID']; ?>)"><i class="fa fa-eraser text-white"></i></button>
                                        <button class="btn btn-info btn-sm text-center" onclick="editar(<?php echo $row['ID']; ?>)"><i class="fa fa-pencil text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
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

    <!-- Modal -->
    <div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-12">
                            <input type="text" class="form-control" placeholder="Nombre" id="boxNombre" style="text-transform: capitalize;">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-5">
                            <input type="text" class="form-control" placeholder="Calle" id="boxCalle" style="text-transform: capitalize;">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" placeholder="Numero" id="boxNumero" style="text-transform: capitalize;">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Colonia" id="boxColonia" style="text-transform: capitalize;">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-12">
                            <input type="email" class="form-control" placeholder="Email" id="boxEmail">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-6">
                            <input type="numer" class="form-control" placeholder="Celular" id="boxCelular" style="text-transform: capitalize;">
                        </div>
                        <div class="col-6">
                            <input type="numer" class="form-control" placeholder="Telefono" id="boxTelefono" style="text-transform: capitalize;">
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success" onclick="agregar()">Registrar</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT METHODS-->
    <script>
        $(document).ready(function() {
            $("#boxBuscar").keyup(function(event) {

                var nombre = $(this).val();

                $.ajax({
                        url: 'buscarCliente.php',
                        type: 'post',
                        data: {
                            nombre: nombre
                        },
                    })
                    .done(function(data) {
                        //console.log("success");
                        $("#user-content").html(data);
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        //console.log("complete");
                    });

            });
        });

        function ir(id) {
            swal({
                    title: "Estas seguro?",
                    text: "Seguro que quieres borrar este cliente?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Borrado con exito", {
                            icon: "success",
                        });
                        $.post('borrar.php', {
                            id: id
                        }, function(data) {
                            location.reload();
                        });
                    } else {
                        swal("Cancelado!");
                    }
                });
        }

        function agregar() {
            $.ajax({
                    url: 'agregar.php',
                    type: 'POST',
                    data: {
                        boxNombre: $("#boxNombre").val(),
                        boxCalle: $("#boxCalle").val(),
                        boxNumero: $("#boxNumero").val(),
                        boxColonia: $("#boxColonia").val(),
                        boxTelefono: $("#boxTelefono").val(),
                        boxCelular: $("#boxCelular").val(),
                        boxEmail: $("#boxEmail").val()
                    },
                })
                .done(function() {
                    location.reload();
                })
                .fail(function() {
                    //console.log("error");
                })
                .always(function() {
                    //console.log("complete");
                });

        }


        function editar(id) {
            window.location = "editarCliente.php?id=" + id;
        }

        $(".in-development").click(function(event) {
            swal(":(", "Aun trabajo en eso!", "warning");
        });
    </script>
    <!-- JAVASCRIPT FILES -->
    <script src="../vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
</body>

</html>