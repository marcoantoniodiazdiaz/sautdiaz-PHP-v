<?php 
  include '../../database/parameters.php';
  $id_cliente = rand(10000, 99999);
 ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Plantilla</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="../../css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <script src="../../vendor/jquery/jquery.min.js"></script>
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
          <div class="avatar"><img src="../../img/logo.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Usuario</h1>
            <p>Administrador</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Menu</span>
        <ul class="list-unstyled">
                <li><a href="../../clientes/index.php"> <i class="fa fa-user"></i>Clientes </a></li>
                <li><a href="../../vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a></li>
                <li><a href="../../servicios/index.php"> <i class="fa fa-key"></i>Servicios </a></li>
                <li><a href="../../orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a></li>
                <li><a href="../../productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a></li>
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
            <h2 class="h5 no-margin-bottom">Crear Nuevo Cliente + Coche</h2>
          </div>
        </div>
        <div class="container">
          <!--
          INCLUSION DE CONTENIDO
          -->
          <div class="block">
            <table class="table">
        <thead>
          <th style="text-align: center;">Datos del Cliente</th>
        </thead>
        <tr><td>
          <input type="text" autocomplete="off" class="form-control" value="<?php echo $id_cliente?>" style="font-weight: bold;" id="boxID">
          <br>
          <input type="text" placeholder="Nombre del Cliente" autocomplete="off" class="form-control text-uppercase" id="boxNombre">
          <br>
          <div class="row">
            <div class="col-4"><input type="text" placeholder="Calle" autocomplete="off" class="form-control text-uppercase" id="boxCalle"></div>
            <div class="col-4"><input type="text" placeholder="Numero" autocomplete="off" class="form-control text-uppercase" id="boxNumero"></div>
            <div class="col-4"><input type="text" placeholder="Colonia" autocomplete="off" class="form-control text-uppercase" id="boxColonia"></div>
          </div>
          <br>
          <input type="email" placeholder="email" autocomplete="off" class="form-control text-lowercase" id="boxEmail">
          <br>
          <div class="row">
            <div class="col-6"><input type="text" placeholder="Telefono" autocomplete="off" class="form-control text-uppercase" id="boxTelefono"></div>
            <div class="col-6"><input type="text" placeholder="Celular" autocomplete="off" class="form-control text-uppercase" id="boxCelular"></div>
          </div>
        </td></tr>
      </table>
      <br>
      <table class="table">
        <thead>
          <th style="text-align: center;">Datos del Vehiculo</th>
        </thead>
        <tr><td>
          <input type="text" placeholder="Placa" autocomplete="off" class="form-control text-uppercase" style="font-weight: bold; text-align: center;" id="boxPlaca">
          <br>
          <div class="row">
            <div class="col-4">
              <select class="form-control text-uppercase" id="boxMarca" style="font-size: 120%; font-weight: bold;">
                <option value="0">Selecciona la Marca</option>
                <?php $sql = "SELECT NOMBRE FROM MARCAS" ?>
                <?php $result = $conn->query($sql); ?>
                <?php while($row = $result->fetch_assoc()) { ?>
                  <option value="<?php echo $row['NOMBRE'];?>"><?php echo $row['NOMBRE'];?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-4"><input type="text" placeholder="SubMarca" autocomplete="off" class="form-control text-uppercase" id="boxSubmarca"></div>
            <div class="col-4">
              <select id="boxColor" class="form-control text-uppercase">
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
          </div>
        </td></tr>
      </table>
      <br>
      <div width="100%" style="text-align: center;">
        <button class="btn btn-warning btn-block" id="btnSubmit">Agregar Coche y Cliente</button>
      </div>
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

      $(document).ready(function() {
        $("#boxPlaca").keyup(function(e) {
          $.ajax({
            url: 'comprobarPlaca.php',
            type: 'POST',
            data: {
              placa: $(this).val()
            },
          })
          .done(function(data) {
            //alert(data.mensaje);
            if (data[0] == "EXIST") {
              swal("ERROR", data[1], "warning");
            }
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });
      });

      $(document).ready(function() {
        $("#boxNombre").focus();
      });
      $(document).ready(function (){
        $("#btnSubmit").click(function (){

          id = $("#boxID").val();
          nombre = $("#boxNombre").val().toUpperCase();
          calle = $("#boxCalle").val().toUpperCase();
          numero = $("#boxNumero").val();
          colonia = $("#boxColonia").val().toUpperCase();
          email = $("#boxEmail").val();
          telefono = $("#boxTelefono").val();
          celular = $("#boxCelular").val();

          direccion = ""+calle+" #"+numero+" Col. "+colonia;
          direccion = direccion.toUpperCase();
          
          //------------------------------------

          placa = $("#boxPlaca").val().toUpperCase();
          marca = $("#boxMarca option:selected").val();
          submarca = $("#boxSubmarca").val().toUpperCase();
          color = $("#boxColor option:selected").val();

          $.post("agregadDatos.php", {
            id: id,
            nombre: nombre,
            direccion: direccion,
            email: email,
            telefono: telefono,
            celular: celular,
            //
            placa: placa,
            marca: marca,
            submarca: submarca,
            color: color
          }, function(data){
            window.location = "../index.php";
            /*swal("Hecho!", data, "success");
            $("#ValorID").val(id);
            $("#ValorPlaca").val(placa);
            $("#Autoseleccion").submit();*/
          });

        });
      });
    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="../../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../js/front.js"></script>
  </body>
</html>