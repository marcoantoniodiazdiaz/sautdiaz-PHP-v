<?php 
  session_start();
  include '../database/parameters.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demostracion</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../print/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
    <link rel="stylesheet" href="mainStyles.css">
    <script src="demoFunctions.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
      @font-face {
      font-family: Coches;
      font-style: normal;
      font-weight: normal;
      src: local("?"), url('../../img/logos/Quantify Bold v2.6.ttf');
    }

    .card-title {
      font-family: Coches;
      font-size: 300%;
    }
    </style>
    
  </head>
  <script>
    cambiarHora();
    var start = false;
    var time = 0;
    setInterval(function(){
      $.post("actualizar.php", function(data){
          $("#tablaDeVehiculos").html(data);
        });
      }, 1000);
  </script>

  <body style="background-image: url('../../img/back3.jpg'); background-position: center;
    background-repeat: no-repeat;
    background-size: cover; background-attachment: fixed; color: black;">
    <div style="height: 790px;">
      <div style="width: 100%; height: 100%; padding: 20px;">
        <div class="row">
          <div class="col-md-9 titulo">
            <img src="../../img/logowshadow.png" width="200px;">
          </div>
          <div class="col-md-3 text-white" style="text-align: right;">
            <span class="badge badge-light" id="mostrarHora">CARGANDO HORA</span><br><button class="btn btn-danger text-center" onclick="window.history.back();">VOLVER</button>
          </div>
        </div>
        <br>
        <div class="row text-center" id="tablaDeVehiculos">
          <strong><h1 style="color: white;">CARGANDO...</h1></strong>
        </div>
      </div>
    </div>
  </div>

  <script>
    function obtenerDatos(id) {
      $(document).ready(function() {
        $.post('llenarModel.php', {id: id}, function(data) {
          $("#celdaDeTablas").html(data);
        });
      });
    }
    function irVenta(id) {
      window.location = "../ventas/index.php?id="+id
    }
  </script>




    <!-- SEPARAR MODALS -->
    <!-- Large modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div style="padding: 10px;" id="celdaDeTablas">
          <h2 style="width: 100%;" class="text-center">Datos del Vehiculo</h2>
          <table class="table table-bordered table-hover text-center">
            <thead>
              <th>PLACA</th>
              <th>MARCA</th>
              <th>SUBMARCA</th>
              <th>COLOR</th>
            </thead>
            <tbody id="cuerpoVehiculo"></tbody>
          </table>

          <h2 style="width: 100%;" class="text-center">Datos del Propietario</h2>
          <table class="table table-bordered table-hover text-center">
            <thead>
              <th>NOMBRE COMPLETO</th>
              <th>DIRECCION</th>
              <th>TELEFONO</th>
              <th>CELULAR</th>
            </thead>
            <tbody id="cuerpoPropietario">
              
            </tbody>
          </table>

          <h2 style="width: 100%;" class="text-center">Datos del Servicio</h2>
          <table class="table table-bordered table-hover text-center" style="font-size: 80%;">
            <thead>
              <th width="8%">ID ASIGNADO</th>
              <th width="8%">VENTA RELACIONADA</th>
              <th width="30%">RAZON</th>
              <th width="15%">FECHA DE LLEGADA</th>
              <th width="10%">HORA DE LLEGADA</th>
              <th>TRABAJADOR ASIGNADO</th>
            </thead>
            <tbody id="cuerpoServicio"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
