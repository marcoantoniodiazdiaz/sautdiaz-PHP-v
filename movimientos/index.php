<?php 
  include '../database/parameters.php';
  $inicio = $_GET['date'];
  $fin = $_GET['to'];
 ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Movimientos</title>
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
                <li><a href="clientes/index.php"> <i class="fa fa-user"></i>Clientes </a></li>
                <li><a href="vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a></li>
                <li><a href="vehiculos/index.php"> <i class="fa fa-key"></i>Servicios </a></li>
                <li><a href="orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a></li>
                <li><a href="productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a></li>
        </ul><span class="heading">Dinero</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="fa fa-arrow-up"></i>Entradas </a></li>
          <li> <a href="#"> <i class="fa fa-arrow-down"></i>Salidas </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Movimientos </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Movimientos</h2>
          </div>
        </div>
        <div class="container">
          <!--
          INCLUSION DE CONTENIDO
          -->
          <?php
            $dia = date('d');
            $fecha = date('Y/m/')."".$dia;

            $mostrar = true;

            if ($inicio == "" && $fin == "") {
              $inicio = $fecha;
              $fin = $fecha;
              $mostrar = false;
            }

            $sql = "SELECT CONCAT('ABONO DE ', COCHES.MARCA, ' ' ,COCHES.SUBMARCA) AS RAZON, CONCAT(ABONOS.FECHA, ' ', ABONOS.HORA) AS FECHA, ABONOS.CANTIDAD, CONCAT('2') AS TIPO FROM COCHES INNER JOIN ABONOS INNER JOIN VENTAS WHERE ABONOS.VENTA = VENTAS.ID AND ABONOS.FECHA BETWEEN '$inicio' AND '$fin' UNION SELECT OPERACION.RAZON, OPERACION.FECHA, OPERACION.CANTIDAD, OPERACION.TIPO FROM OPERACION WHERE OPERACION.FECHA BETWEEN '$inicio' AND '$fin'";

            // SELECT CONCAT('ABONO DE ', COCHES.MARCA, ' ' ,COCHES.SUBMARCA) AS RAZON, CONCAT(ABONOS.FECHA, ' ', ABONOS.HORA) AS FECHA, ABONOS.CANTIDAD, CONCAT('2') AS TIPO FROM COCHES INNER JOIN ABONOS INNER JOIN VENTAS WHERE ABONOS.VENTA = VENTAS.ID AND ABONOS.FECHA = '2018-12-29' UNION SELECT OPERACION.RAZON, OPERACION.FECHA, OPERACION.CANTIDAD, OPERACION.TIPO FROM OPERACION WHERE OPERACION.FECHA = '2018-12-29'

            //echo $sql;

            $result = $conn->query($sql);
           ?>
          <div class="block">
            <?php 
              if ( $mostrar ) {
                echo "<div class='badge badge-info'>Filtro de '$inicio' a '$fin'</div></br></br>";
              }
             ?>
            <h3>Filtro</h3>
            <div class="row">
              <div class="col-6">
                <h5>De:</h5>
                <div class="row">
                  <div class="col-4">
                    <select id="boxDiaInicio" class="form-control">
                      <?php 
                        for ($i=1; $i <= 31; $i++) { 
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                       ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <select id="boxMesInicio" class="form-control">
                      <option value="1">ENERO</option>
                      <option value="2">FEBRERO</option>
                      <option value="3">MARZO</option>
                      <option value="4">ABRIL</option>
                      <option value="5">MAYO</option>
                      <option value="6">JUNIO</option>
                      <option value="7">JULIO</option>
                      <option value="8">AGOSTO</option>
                      <option value="9">SEPTIEMBRE</option>
                      <option value="10">OCTUBRE</option>
                      <option value="11">NOVIEMBRE</option>
                      <option value="12">DICIEMBRE</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select id="boxAnoInicio" class="form-control">
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <h5>A:</h5>
                <div class="row">
                  <div class="col-4">
                    <select id="boxDiaFin" class="form-control">
                      <?php 
                        for ($i=1; $i <= 31; $i++) { 
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                       ?>
                    </select>
                  </div>
                  <div class="col-4">
                    <select id="boxMesFin" class="form-control">
                      <option value="1">ENERO</option>
                      <option value="2">FEBRERO</option>
                      <option value="3">MARZO</option>
                      <option value="4">ABRIL</option>
                      <option value="5">MAYO</option>
                      <option value="6">JUNIO</option>
                      <option value="7">JULIO</option>
                      <option value="8">AGOSTO</option>
                      <option value="9">SEPTIEMBRE</option>
                      <option value="10">OCTUBRE</option>
                      <option value="11">NOVIEMBRE</option>
                      <option value="12">DICIEMBRE</option>
                    </select>
                  </div>
                  <div class="col-4">
                    <select id="boxAnoFin" class="form-control">
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                    </select>
                  </div>
                </div>
              </div>
              <button class="btn btn-warning btn-block m-3" onclick="filtrarFecha()">Filtrar</button>
            </div>
          </div>
          <div class="block">
            <table class="table table-striped">
              <thead>
                <th>Tipo</th>
                <th>Razon</th>
                <th>Fecha</th>
                <th class="text-right">Cantidad</th>
              </thead>
              <tbody>
                <?php
                  $tipo = "null";
                  while ($row = $result->fetch_assoc()) {
                    if($row['TIPO'] == "1") {
                      $tipo = "fa fa-arrow-down text-danger";
                    } else {
                      $tipo = "fa fa-arrow-up text-success";
                    } ?>
                    <tr>
                      <td class="<?php echo $tipo ?> text-center"></td>
                      <td><?php echo $row['RAZON']; ?></td>
                      <td><?php echo $row['FECHA']; ?></td>
                      <td class="text-right">
                        <?php 
                          if($row['TIPO'] == 1) {
                            echo "<span class='text-danger'>- ".$row['CANTIDAD']."</span>";
                          } else {
                            echo "<span class='text-success'>+ ".$row['CANTIDAD']."</span>";
                          }
                         ?>
                      </td> 
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- -->
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
      function filtrarFecha() {
        var inicio = $("#boxAnoInicio").val()+"/"+$("#boxMesInicio").val()+"/"+$("#boxDiaInicio").val();
        var fin = $("#boxAnoFin").val()+"/"+$("#boxMesFin").val()+"/"+$("#boxDiaFin").val();
        //alert(inicio);

        window.location = "index.php?date="+inicio+"&to="+fin;
      }
    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>