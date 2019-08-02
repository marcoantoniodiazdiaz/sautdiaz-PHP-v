<?php 
  session_start();
  include '../../database/parameters.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM CLIENTES WHERE ID = $id";
  $result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Clientes</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../bootstrap/styles/lux.css">
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
      <h1 class="display-4">Clientes</h1>
    </div>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <div class="container">
        <div class="form-group">
          <span class="badge badge-info">NOMBRE</span>
          <input type="text" value="<?php echo $row['NOMBRE'] ?>" class="form-control" id="boxNombre">
        </div>
        <div class="form-group">
          <span class="badge badge-info">DIRECCION</span>
          <input type="text" value="<?php echo $row['DIRECCION'] ?>" class="form-control" id="boxDireccion">
        </div>
        <div class="form-group">
          <span class="badge badge-info">EMAIL</span>
          <input type="text" value="<?php echo $row['EMAIL'] ?>" class="form-control" id="boxEmail">
        </div>
        <div class="form-group">
          <span class="badge badge-info">TELEFONO</span>
          <input type="text" value="<?php echo $row['TELEFONO'] ?>" class="form-control" id="boxTelefono">
        </div>
        <div class="form-group">
          <span class="badge badge-info">CELULAR</span>
          <input type="text" value="<?php echo $row['CELULAR'] ?>" class="form-control" id="boxCelular">
        </div>

        <div class="text-center"><button class="btn btn-success" onclick="guardar()">GUARDAR</button></div>
    </div>

    <?php } ?>


    <script>

      var id = <?php echo $id; ?>;

      function guardar() {
        $(document).ready(function() {
          var nombre = $("#boxNombre").val();
          var direccion = $("#boxDireccion").val();
          var email = $("#boxEmail").val();
          var telefono = $("#boxTelefono").val();
          var celular = $("#boxCelular").val();
          $.post('guardarCambios.php', 
            {
              id: id,
              nombre: nombre,
              direccion: direccion,
              email: email,
              telefono: telefono,
              celular: celular

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
