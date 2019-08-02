<?php 
  session_start();
  date_default_timezone_set('America/Mexico_City');
  	$idCliente =  $_GET["id"];
    $placaVehiculo = $_GET["placa"];

  if($_SESSION['username'] == null || $_SESSION['username'] == ""){
    ?>
    <script>
      window.location = "../security/login.php"
    </script>


    <?php
  }

  include '../database/parameters.php';


  $sql = "SELECT ID, NOMBRE FROM CLIENTES ORDER BY NOMBRE ASC";
  $result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orden de Servicio</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../bootstrap/styles/lux.css">
    <!-- Custom styles for this template -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    
  </head>
  <nav>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../content/index.php">Servicio Automotriz Diaz</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="../clientes/index.php">Clientes</a>
        <a class="p-2 text-dark" href="../vehiculos/index.php">Vehiculos</a>
        <a class="p-2 text-dark" href="../servicios/index.php">Servicios</a>
        <a class="p-2 text-dark" href="ordenCompleta/index.php"><span class="font-weight-bold">Agregar Cliente y Vehiculo</span></a>
      </nav>
      <span><button class="btn btn-outline-danger" href="" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href=""><?php echo $_SESSION['nombre']; ?></a></span>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">ORDEN DE SERVICIO</h1><br>
      <button class="btn btn-primary" onclick="window.location = '../demo/index.php'">DENTRO DEL TALLER</button>
    </div>
    <br>
  </nav>
  <body>

    <div class="container">
      <table class="table text-center">
        <tr>
          <td>
            <i class="fa fa-user fa-2x"></i><br>MODULO DE CLIENTE
          </td>
          <td>
            <i class="fa fa-car fa-2x"></i><br>MODULO DE VEHICULO
          </td>
        </tr>
        <tr>
          <td width="50%">
            <div class="alert alert-dismissible alert-danger" id="comprobarCliente">
              <strong>AUN NO HAS SELECCIONADO NINGUN CLIENTE</strong>
            </div>

            <div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="cursor: pointer;">
              <button type="button" class="btn btn-primary btn-block">SELECCIONA EL CLIENTE</button>
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">

              <?php while ($row = $result->fetch_assoc()) { ?>
                <li class="dropdown-item" value="<?php echo $row['ID'] ?>"><?php echo $row['NOMBRE']; ?></li>
              <?php } ?>
              </div>
              </div>
            </div>
            <br>
            <br>
            <div id="moduloCliente">

              <!-- ESPERANDO DATOS -->

            </div>

          </td>

          <td width="50%">
            <div id="aviso" class="text-center">
              <div class="alert alert-dismissible alert-warning">
                <strong>ESPERANDO SELECCION DE CLIENTE</strong><br>
              </div>
            </div>
            <div id="moduloVehiculo">

              <!-- ESPERANDO DATOS -->

            </div>
          </td>
        </tr>
      </table>
      <div class="container" id="mostrar2da">
        <span class="badge badge-info">TRABAJADOR QUE REALIZARA EL SERVICIO</span>
        <select id="boxTrabajador" class="custom-select">
          <option value="0">SELECCIONA EL TRABAJADOR</option>
          <?php
            $sql = "SELECT ID, NOMBRE FROM TRABAJADORES";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) { ?>
              <option value="<?php echo $row['ID'] ?>"><?php echo $row['NOMBRE']; ?></option>
          <?php } ?>
        </select>
        <br>
        <br>
        <div class="row">
          <div class="col-6">
            <input type="text" id="boxCliente" class="form-control text-center is-valid" style="color: #56D957">
            <div class="valid-feedback">CLIENTE VERIFICADO</div>
          </div>
          <div class="col-6">
            <input type="text" id="boxVehiculo" class="form-control text-center is-valid" style="color: #56D957">
            <div class="valid-feedback">PLACA VERIFICADA</div>
          </div>
        </div>
        <span class="badge badge-info">RAZON DE LLEGADA</span>
      <textarea id="boxRazon" cols="10" rows="5" class="form-control text"></textarea>
      <button id="btnSubmit" class="btn btn-primary btn-lg btn-block">AGREGAR ORDEN DE SERVICIO</button>
      </div>
    </div>

    <br>
    <br>
    <br>

    <script>


      var idCliente = <?php 
        if ($idCliente==null || $idCliente == ""){
          echo "0";
        } else {
          echo "".$idCliente."";
        }
      ?>;
      var placaVehiculo = "<?php
        if ($placaVehiculo==null || $placaVehiculo == ""){
          echo "0";
        } else {
          echo $placaVehiculo;
        }
      ?>";

      $(document).ready(function() {
        if (idCliente != 0) {
          var id = idCliente;
          $("#comprobarCliente").attr("class", "alert alert-dismissible alert-success");
          $("#comprobarCliente").html("CLIENTE SELECCIONADO");
          $("#aviso").hide(1000);
          if(active == true){
            location.reload();
          }
          active = true;
          $.ajax({
            url: 'moduloCliente.php',
            type: 'post',
            data: {id: id},
          })
          .done(function(data) {
            $("#moduloCliente").html(data);
          })
          .fail(function() {
            alert("ERROR");
          });
          active = true;
          $.ajax({
            url: 'moduloVehiculo.php',
            type: 'post',
            data: {id: id},
          })
          .done(function(data) {
            $("#moduloVehiculo").html(data);
            $("#boxCliente").val(id)
          })
          .fail(function() {
            alert("ERROR");
          });
          //
          mostrar2da(placaVehiculo);
        }
      });

      var active = false;

      $("#mostrar2da").hide();

      $(document).ready(function() {
        $(".dropdown-item").click(function() {
          //$(this).attr("class", "list-group-item list-group-item-action active");
          var id = $(this).attr("value");
          $("#comprobarCliente").attr("class", "alert alert-dismissible alert-success");
          $("#comprobarCliente").html("CLIENTE SELECCIONADO");
          $("#aviso").hide(1000);
          if(active == true){
            location.reload();
          }
          //
          active = true;
          $.ajax({
            url: 'moduloCliente.php',
            type: 'post',
            data: {id: id},
          })
          .done(function(data) {
            $("#moduloCliente").html(data);
          })
          .fail(function() {
            alert("ERROR");
          });
          //
          active = true;
          $.ajax({
            url: 'moduloVehiculo.php',
            type: 'post',
            data: {id: id},
          })
          .done(function(data) {
            $("#moduloVehiculo").html(data);
            $("#boxCliente").val(id)
          })
          .fail(function() {
            alert("ERROR");
          });
        });
      });

      $(document).ready(function() {
        $("#btnSubmit").click(function() {
          $.ajax({
            url: 'crearServicio.php',
            type: 'post',
            data: {
              cliente: ($("#boxCliente").val()),
              trabajador: ($("#boxTrabajador option:selected").val()),
              placa: ($("#boxVehiculo").val()),
              razon: ($("#boxRazon").val())
            },
          })
          .done(function(data) {
            window.location = "../demo/index.php";
          })
          .fail(function() {
            alert("ERROR");
          });
          
        });
      });

      function mostrar2da(placa) {
        $(document).ready(function() {
          $("#mostrar2da").show(1000);

          $("#boxVehiculo").val(placa);
        });
      }
    </script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
