<?php 
    include '../database/parameters.php'
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coches</title>
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
                    <h2 class="h5 no-margin-bottom">Vehiculos <button class="btn btn-success btn-sm" onclick="ver();"> Agregar Coche</button></h2>
                </div>
            </div>
            <div class="container">
                <!-- INCLUSION DE CONTENIDO -->
                <div class="block" id="mostrarAgregar">
                    <h3 class="text-primary">Nuevo Vehiculo <i class="fa fa-plus"></i></h3>
                    <div class="form-group">
                        <label>Placa</label>
                        <input type="text" class="form-control" id="boxPlaca">
                    </div>
                    <div class="form-group">
                        <label>Cliente</label>
                        <?php 
                            $result = $conn->query("SELECT ID, NOMBRE FROM CLIENTES ORDER BY NOMBRE ASC");
                        ?>
                        <select id="boxCliente" class="form-control">
                            <option value="0">SELECCIONA UNA MARCA</option>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['ID'] ?>"><?php echo $row['NOMBRE']; ?></option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Marca</label>
                        <?php 
                            $result = $conn->query("SELECT NOMBRE FROM MARCAS");
                        ?>
                        <select id="boxMarca" class="form-control">
                            <option value="0">SELECCIONA UNA MARCA</option>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <option value="<?php echo $row['NOMBRE'] ?>"><?php echo $row['NOMBRE']; ?></option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Submarca</label>
                        <input type="text" class="form-control" id="boxSubmarca">
                    </div>
                    <div class="form-group" id="boxColor">
                        <label>Color</label>
                        <select id="boxMarca" class="form-control">
                            <option value="0">SELECCIONA EL COLOR</option>
                            <option value="AZUL">AZUL</option>
                            <option value="ROJO">ROJO</option>
                            <option value="MORADO">MORADO</option>
                            <option value="VERDE">VERDE</option>
                            <option value="NEGRO">NEGRO</option>
                            <option value="BLANCO">BLANCO</option>
                            <option value="ROSA">ROSA</option>
                            <option value="NARANJA">NARANJA</option>
                            <option value="AMARILLO">AMARILLO</option>
                            <option value="VINILLO PFP">VINILLO PFP</option>
                            <option value="VINILLO CABLEMAS">VINILLO CABLEMAS</option>
                            <option value="GRIS">GRIS</option>
                            <option value="PLATEADO">PLATEADO</option>
                            <option value="DORADO">DORADO</option>
                            <option value="CAFE">CAFE</option>
                        </select>
                    </div>
                    <button class="btn btn-warning btn-block" onclick="agregarCoche();">Agregar Coche</button>
                </div>
                <div class="block" style="cursor: pointer;">
                    <table class="table table-striped" style="text-transform: uppercase; font-size: 80%; text-align: center;">
                        <thead>
                            <tr>
                                <th>PLACA</th>
                                <th>CLIENTE</th>
                                <th>MARCA</th>
                                <th>SUBMARCA</th>
                                <th>COLOR</th>
                                <th class="text-right">ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $sql = "SELECT COCHES.PLACA, CLIENTES.NOMBRE, COCHES.MARCA, COCHES.SUBMARCA, COCHES.COLOR FROM COCHES INNER JOIN CLIENTES WHERE CLIENTES.ID = COCHES.CLIENTE"; ?>
                        <?php $result = $conn->query($sql); ?>
                        <?php while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td style="font-weight: bold; font-size: 150%;"><?php echo $row['PLACA']; ?></td>
                                <td><?php echo $row['NOMBRE']; ?></td>
                                <td><?php echo $row['MARCA']; ?></td>
                                <td><?php echo $row['SUBMARCA']; ?></td>
                                <td><?php echo $row['COLOR']; ?></td>
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
            $("#mostrarAgregar").hide();
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

        function agregarCoche() {
        $.ajax({
            url: 'agregar.php',
            type: 'POST',
            data: {
                placa : $("#boxPlaca").val(),
                cliente : $("#boxCliente option:selected").val(),
                marca : $("#boxMarca option:selected").val(),
                submarca : $("#boxSubmarca").val(),
                color : $("#boxColor option:selected").val()
            },
        })
        .done(function(data) {
          // /alert(data);
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