<?php 
  session_start();
  include '../database/parameters.php';
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Servicios</title>
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
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
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
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Servicio Automotriz Diaz</strong><strong> &nbsp4.0</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">S</strong><strong>A 4.0</strong></div></a>
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
                <li><a href="../clientes/index.php"> <i class="fa fa-user"></i>Clientes </a></li>
                <li><a href="../vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a></li>
                <li class="active"><a> <i class="fa fa-key"></i>Servicios </a></li>
                <li><a href="../orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a></li>
                <li><a href="../productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a></li>
        </ul><span class="heading">Dinero</span>
        <ul class="list-unstyled in-development">
          <li> <a href="#"> <i class="fa fa-arrow-up"></i>Entradas </a></li>
          <li> <a href="#"> <i class="fa fa-arrow-down"></i>Salidas </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Movimientos </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Servicios</h2>
          </div>
        </div>
        <div class="container">
          <!--
          INCLUSION DE CONTENIDO
          -->
          <div class="block">
            <table class="table table-striped" style="cursor: pointer;">
              <thead>
                <th class="text-primary">#</th>
                <th>Venta</th>
                <th>Cliente</th>
                <th>Vehiculo</th>
                <th>Fecha/Hora</th>
                <th>Trabajador</th>
                <th>Acciones</th>
                <th>Pagada</th>
              </thead>
              <tbody id="cuerpoTabla">
              <?php $sql = "SELECT SERVICIO.ID AS S_ID, VENTAS.ID AS V_ID, CLIENTES.NOMBRE, SERVICIO.FECHA, SERVICIO.HORA, TRABAJADORES.NOMBRE AS TRABAJADOR, SERVICIO.ESTADO, SERVICIO.PAGADA, COCHES.MARCA, COCHES.SUBMARCA FROM SERVICIO INNER JOIN VENTAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN COCHES WHERE VENTAS.ID = SERVICIO.VENTA AND CLIENTES.ID = VENTAS.CLIENTE AND TRABAJADORES.ID = SERVICIO.TRABAJADOR AND SERVICIO.COCHE = COCHES.PLACA ORDER BY SERVICIO.FECHA DESC, SERVICIO.HORA DESC"; ?>
              <?php $result = $conn->query($sql); ?>
              <?php while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td class="text-primary"><?php echo $row['S_ID']; ?></td>
                  <td><button class="btn btn-sm btn-success" onclick="verVenta(<?php echo $row['S_ID']; ?>)">Ver Venta</button></td>
                  <td><?php echo $row['NOMBRE']; ?></td>
                  <td><?php echo $row['MARCA']." ".$row['SUBMARCA'] ; ?></td>
                  <td><?php echo "".$row['FECHA']." ".$row['HORA'].""; ?></td>
                  <td><?php echo $row['TRABAJADOR']; ?></td>  
                  <td style="text-align: center;"><button class="btn btn-sm btn-danger" onclick="borrar(<?php echo $row['V_ID']; ?>)">Borrar</button></td>
                  <?php 
                    $imagen = "";
                    if($row['PAGADA'] == 0) {
                      $imagen = "fa fa-times fa-2x text-danger";
                    } else {
                      $imagen = "fa fa-check fa-2x text-success";
                    }

                  ?>
                  <td style="text-align: center; cursor: pointer;"><span onclick="change(<?php echo $row['S_ID']; ?>)"><i class="<?php echo $imagen ?>"></i></span></td>

                </tr>
              <?php }?>
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
    <!-- JAVASCRIPT METHODS -->
    <script>
      function verVenta(id){
        link = "../ventas/index.php?id="+id;
        window.location = link;
      }
      function borrar(id){
        $.post("borrar.php", {id: id});
        location.reload();
      }
      function change(id) {
        $.post('cambiarEstado.php', {id: id});
        location.reload();
      }
      $(document).ready(function() {
        $("#barraBuscar").keyup(function(event) {
          var cadena = $(this).val();
          $.post('buscar.php', {cadena: cadena}, function(data) {
            $("#cuerpoTabla").html(data);
          });
        });
      });
      function comprobarIntegridad() {
        $.ajax({
          url: 'comprobarIntegridad.php',
          type: 'POST',
          data: {},
        })
        .done(function(data) {
          //alert(data);
          //location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
      }

      comprobarIntegridad();

      $(".in-development").click(function(event) {
        swal(":(", "Aun trabajo en eso!", "warning");
      });
    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>