<?php 
  session_start();
  include '../database/parameters.php';
 ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Orden de Servicio</title>
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
            <h1 class="h5"><?php echo $_SESSION['nombre']; ?></h1>
            <p>Administrador</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Menu</span>
        <ul class="list-unstyled">
                <li><a href="../clientes/index.php"> <i class="fa fa-user"></i>Clientes </a></li>
                <li><a href="../vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a></li>
                <li><a href="../servicios/index.php"> <i class="fa fa-key"></i>Servicios </a></li>
                <li class="active"> <a><i class="icon-padnote"></i>Orden de Servicio </a></li>
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
            <div class="row">
              <div class="col-md-6"><h2 class="h5 no-margin-bottom">Orden de Servicio</h2></div>
              <div class="col-md-6 text-right">
                <span>
                  <button class="btn btn-success btn-sm" onclick="window.location = 'ordenCompleta/index.php'">Cliente Nuevo <i class="fa fa-plus"></i></button>
                  <button class="btn btn-warning btn-sm" onclick="location.reload();">Volver a Empezar <i class="fa fa-retweet"></i></button>
                  <button class="btn btn-info btn-sm" onclick="activarNota()">Nota de Remision Rapida <i class="fa fa-plus"></i></button>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <!--
          INCLUSION DE CONTENIDO
          -->

          <div class="block" id="notaRapida">
            <h3 class="text-primary">Crear Nota de Remision Rapida <i class="fa fa-plus"></i></h3>

            <div class="form-group">
              <label>Placa <i class="text-warning">(Opcional)</i></label>
              <input type="text" class="form-control text-uppercase" id="boxPlaca">
            </div>
            <div class="form-group">
              <label>Marca</label>
              <select id="boxMarca" class="form-control">
                <option value="0">SELECCIONA UNA MARCA</option>
                <?php
                  $result = $conn->query("SELECT NOMBRE FROM MARCAS");
                  while ($row = $result->fetch_assoc()) { ?>
                    <option value="<?php echo $row['NOMBRE']; ?>"><?php echo $row['NOMBRE']; ?></option>
                  <?php } ?>
                             
                </select>
            </div>
            <div class="form-group">
              <label>Submarca</label>
              <input type="text" class="form-control text-uppercase" id="boxSubmarca">
            </div>
            <div class="form-group">
              <label>Color</label>
              <select id="boxColor" class="form-control">
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

            <button class="btn btn-block btn-warning" onclick="notaRapida();">Crear Nota Rapida</button>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="messages-block block">
                <div class="badge badge-success" style="width: 100%;" id="mensajeClienteS"><h4>Cliente Seleccionado </h4><br><br>
                  <span id="imprimeNombreMensaje">?</span><br>
                  <span id="labelClienteS">?</span><br>
                  <i class="fa fa-check fa-2x"></i>
                </div>
                  <div id="mostrarClientes">
                    <div class="title"><strong>Selecciona el Cliente <i class="fa fa-user"></i></strong></div>
                      <div class="form-group">
                        <input type="text" id="boxBuscarCliente" placeholder="Buscar Cliente" class="form-control">
                      </div>
                      <div id="mostrarClientesBuscados">
                        <?php $result = $conn->query("SELECT * FROM CLIENTES ORDER BY NOMBRE ASC"); ?>
                        <?php while($row = $result->fetch_assoc()) { ?>
                        <div class="messages optionCliente" id="<?php echo $row['ID'] ?>" nombre="<?php echo $row['NOMBRE']; ?>"><a href="#" class="message d-flex align-items-center">
                            <div class="content"><strong class="d-block text-primary"><?php echo $row['NOMBRE']; ?></strong>
                              <span class="d-block"><?php echo $row['DIRECCION']; ?></span>
                              <small class="date d-block"><?php echo $row['EMAIL']; ?></small></div></a>
                        </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col-md-6">
              <div class="messages-block block" id="moduloVehiculo">
                <div class="title"><strong>Selecciona el Coche <i class="fa fa-car"></i></strong></div>
                <div class="badge badge-danger">Esperando Seleccion de Cliente</div>
              </div>
              </div>
            </div>
          </div>
          <div class="block">
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Razon de Servicio</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="boxRazon"><small class="help-block-none">Ejem: Afinacion Mayor, Ruido, etc.</small>
              </div>
            </div>
            <div class="line"></div>
            <?php $result = $conn->query("SELECT * FROM `TRABAJADORES`"); ?>
            <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Trabajador</label>
                        <div class="col-sm-9 ml-auto">
                          <select multiple="" class="form-control" id="boxTrabajador">
                            <?php while($row = $result->fetch_assoc()) {?>
                              <option value="<?php echo $row['ID']; ?>"><?php echo $row['NOMBRE']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
            <button class="btn btn-warning btn-block" id="btnSubmit">Crear Servicio</button>
          </div>
          <div class="block text-center">
            <strong><i class="fa fa-arrow-down"></i> Esperando Instrucciones</strong>
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
    <div id="hiddenPlaca" value=""></div>
    <!-- JAVASCRIPT FILES-->
    <script>
      var sprIdCliente = "";
      $("#mensajeClienteS").hide();
      $("#notaRapida").hide();

      $(this).click(function(event) {
        if($(this).attr('class') == 'optionCliente') {
          alert("SI");
        }
      });

      function activarNota() {
        $("#notaRapida").show(500);
      }

      $(document).ready(function() {
        $(".optionCliente").click(function(event) {
          sprIdCliente = $(this).attr('id');
          var nombreCliente = $(this).attr('nombre');
          //alert(idCliente);
          $("#mostrarClientes").hide(500);
          $("#mensajeClienteS").show(500);

          $("#imprimeNombreMensaje").html(nombreCliente);
          $("#labelClienteS").html(sprIdCliente);

          $.ajax({
            url: 'moduloVehiculo.php',
            type: 'post',
            data: {
              id : sprIdCliente
            },
          })
          .done(function(data) {
            $("#moduloVehiculo").hide(250);
            $("#moduloVehiculo").html(data);
            $("#moduloVehiculo").show(250);
          });
        });
      });
      //----
      function seleccionarCoche(placa) {
        $("#hiddenPlaca").attr('value', placa);
      }

        $(".btnSeleccionar").click(function(event) {
          alert("FUNCIONA");
        });
      //---
      $(document).ready(function() {
        $("#btnSubmit").click(function() {
          $.ajax({
            url: 'crearServicio.php',
            type: 'post',
            data: {
              cliente: (sprIdCliente),
              trabajador: ($("#boxTrabajador option:selected").val()),
              placa: ($("#hiddenPlaca").attr('value')),
              razon: ($("#boxRazon").val())
            },
          })
          .done(function(data) {
            //window.location = "../demo/index.php";
            window.location = "../ventas/index.php?id="+data;
          })
          .fail(function() {
            alert("ERROR");
          });
          
        });
      });

      $(".in-development").click(function(event) {
        swal(":(", "Aun trabajo en eso!", "warning");
      });

      function planB(id, nombre) {
          sprIdCliente = id;
          var nombreCliente = nombre;
          //alert(idCliente);
          $("#mostrarClientes").hide(500);
          $("#mensajeClienteS").show(500);

          $("#imprimeNombreMensaje").html(nombreCliente);
          $("#labelClienteS").html(sprIdCliente);

          $.ajax({
            url: 'moduloVehiculo.php',
            type: 'post',
            data: {
              id : sprIdCliente
            },
          })
          .done(function(data) {
            $("#moduloVehiculo").hide(250);
            $("#moduloVehiculo").html(data);
            $("#moduloVehiculo").show(250);
          });
      }


      $(document).ready(function() {
        $("#boxBuscarCliente").keyup(function(event) {
          var cadena = $(this).val();
          $.ajax({
            url: 'buscarCliente.php',
            type: 'POST',
            data: {
              cadena : cadena
            },
          })
          .done(function(data) {
            $("#mostrarClientesBuscados").html(data);
          });
        });
      });

      function notaRapida() {

        $.ajax({
          url: 'crearNotaRapida.php',
          type: 'POST',
          data: {
            placa : $("#boxPlaca").val().toUpperCase(),
            marca : $("#boxMarca option:selected").val(),
            submarca : $("#boxSubmarca").val().toUpperCase(),
            color : $("#boxColor option:selected").val()
          },
        })
        .done(function(data) {
          window.location = "../ventas/index.php?id="+data;
          //alert("FUNCIONA");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function(data) {
          //alert(data);
        });
        
        
      }

    </script>
    <!-- -->
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>