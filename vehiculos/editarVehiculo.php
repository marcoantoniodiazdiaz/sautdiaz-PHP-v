<?php 
  session_start();
  include '../database/parameters.php';

  $placa = $_GET['placa'];

  $sql = "SELECT * FROM COCHES WHERE PLACA = '$placa'";
  $result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Vehiculo</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../print/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <span><button class="btn btn-outline-danger" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Vehiculos</h1>
    </div>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <div class="container">
        <div class="form-group">
          <span class="badge badge-info">PLACA</span>
          <input type="text" value="<?php echo $row['PLACA'] ?>" class="form-control" id="boxPlaca">
        </div>
        <div class="form-group">
          <span class="badge badge-info">MARCA</span>
          <input type="text" value="<?php echo $row['MARCA'] ?>" class="form-control" id="boxMarca">
        </div>
        <div class="form-group">
          <span class="badge badge-info">SUBMARCA</span>
          <input type="text" value="<?php echo $row['SUBMARCA'] ?>" class="form-control" id="boxSubmarca">
        </div>
        <div class="form-group">
          <span class="badge badge-info">COLOR</span>
          <input type="text" value="<?php echo $row['COLOR'] ?>" class="form-control" id="boxColor">
        </div>

        <div class="text-center"><button class="btn btn-success" onclick="guardar()">GUARDAR</button></div>
    </div>

    <?php } ?>


    <script>

      var placa = "<?php echo $placa; ?>";

      function guardar() {
        $(document).ready(function() {
          var placa = $("#boxPlaca").val();
          var marca = $("#boxMarca").val();
          var submarca = $("#boxSubmarca").val();
          var color = $("#boxColor").val();
          $.post('guardarCambios.php', 
            {
              placa: placa,
              marca: marca,
              submarca: submarca,
              color: color,

            }, function(data) {
              location.reload();
          });
        });
      }
    </script>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted" style="text-align: center;">&copy; Diaz System's 2017-2018</small>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
