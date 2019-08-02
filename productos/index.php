<?php 
    include '../database/parameters.php'
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Productos</title>
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
                    <h1 class="h5">Usuario</h1>
                    <p>Administrador</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <span class="heading">Menu</span>
            <ul class="list-unstyled">
                <li>
                    <a href="../clientes/index.php"> <i class="fa fa-user"></i>Clientes </a>
                </li>
                <li class="active">
                    <a> <i class="fa fa-car"></i>Vehiculos </a>
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
            <ul class="list-unstyled">
                <li>
                    <a href="#"> <i class="fa fa-arrow-up"></i>Entradas </a>
                </li>
                <li>
                    <a href="#"> <i class="fa fa-arrow-down"></i>Salidas </a>
                </li>
                <li>
                    <a href="#"> <i class="icon-chart"></i>Movimientos </a>
                </li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">Productos <button class="btn btn-success btn-sm" onclick="ver();"> Agregar Producto</button></h2>
                </div>
            </div>
            <div class="container" id="mostrarAgregar">
                <!-- INCLUSION DE CONTENIDO -->
                <div class="block">
                    <h3 class="text-primary">Agregar Producto <i class="fa fa-plus"></i></h3>
                    <div class="form-group">
                        <label>ID</label>
                        <input type="text" id="boxID" class="form-control" disabled value="<?php echo rand(10000000, 99999999); ?>">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="boxNombre">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input type="number" class="form-control" id="boxPrecio">
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select id="boxCategoria" class="form-control">
                            <option value="0">SELECCIONA CATEGORIA</option>
                            <?php 
                                $result = $conn->query("SELECT NOMBRE FROM CATEGORIAS");
                                while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['NOMBRE'] ?>"><?php echo $row['NOMBRE'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-warning btn-block" onclick="agregarProducto();">Agregar Producto</button>
                </div>
                <div class="block" style="cursor: pointer;">
                    <table class="table table-striped" style="text-transform: uppercase; font-size: 80%; text-align: center;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>PRECIO</th>
                                <th>CATEGORIA</th>
                                <th class="text-right">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sql = "SELECT * FROM PRODUCTOS WHERE BUSCAR = 'SI' ORDER BY NOMBRE"; ?>
                        <?php $result = $conn->query($sql); ?>
                        <?php while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td style="font-weight: bold; font-size: 150%;"><?php echo $row['ID']; ?></td>
                                <td><?php echo $row['NOMBRE']; ?></td>
                                <td><?php echo $row['PRECIO']; ?></td>
                                <td><?php echo $row['CATEGORIA']; ?></td>
                                <td class="text-right"><button class="btn-danger btn btn-sm" onclick="borrar('<?php echo $row['PLACA'] ?>')">Borrar</button>
                                <button class="btn-primary btn btn-sm" onclick="editar('<?php echo $row['PLACA'] ?>')">Editar</button>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
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
    <!-- JAVASCRIPT FUNCTIONS -->
    <script>

        $(document).ready(function() {
            //$("#mostrarAgregar").hide();
        });

        function ver() {
            $("#mostrarAgregar").show(500);
        }

        function editar(id) {
            window.location = "editarVehiculo.php?placa="+id;
        }

        function borrar(id) {
            $.ajax({
                url: 'borrar.php',
                type: 'POST',
                data: {
                    placa: id
                },
            })
            .done(function() {
                location.reload();
            });
            
        }

        function agregarProducto() {
        $.ajax({
            url: 'agregarProducto.php',
            type: 'POST',
            data: {
                id : $("#boxID").val(),
                nombre : $("#boxNombre").val(),
                categoria : $("#boxCategoria option:selected").val(),
                precio : $("#boxPrecio").val(),
            },
        })
        .done(function(data) {
            //alert(data);
            location.reload();
        });
        
      }
    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="../vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
</body>

</html>