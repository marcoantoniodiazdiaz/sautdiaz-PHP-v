<?php 
  session_start();
  include '../database/parameters.php';

  $id = $_GET['id'];

  $sql = "SELECT * FROM PRODUCTOS WHERE ID = $id";
  $result = $conn->query($sql);

  $id_prod = "";
  $nombre = "";
  $precio = "";
  $categoria = "";

  while ($row = $result->fetch_assoc()) {
    $id_prod = $row['ID'];
    $nombre = $row['NOMBRE'];
    $precio = $row['PRECIO'];
    $categoria = $row['CATEGORIA'];
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Producto</title>

    <!-- Bootstrap core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="../print/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <span><a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['nombre']; ?></a>
      <button class="btn btn-outline-danger" onclick="window.history.back()">Volver</button></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Editar Producto</h1>
    </div>

    <div class="container text-center">
        <div id="form">
          <div class="form-group">
            <span class="badge badge-primary">ID DEL PRODUCTO</span>
            <input type="text" class="form-control font-weight-bold" style="text-align: center;" id="boxID" value="<?php echo $id_prod ?>">
          </div>
          <div class="form-group">
            <span class="badge badge-primary">NOMBRE DEL PRODUCTO</span>
            <input type="text" class="form-control" style="text-align: center;" id="boxNombre" value="<?php echo $nombre ?>">
          </div>
          <div class="form-group">
            <span class="badge badge-primary">PRECIO DEL PRODUCTO</span>
            <input type="text" class="form-control" style="text-align: center;" id="boxPrecio" value="<?php echo sprintf('%.2f', $precio) ?>">
          </div>
          <div class="form-group">
            <span class="badge badge-primary">CATEGORIA DEL PRODUCTO</span>
            <input type="text" class="form-control" style="text-align: center;" id="boxCategoria" value="<?php echo $categoria ?>">
          </div>

          <button class="btn btn-secondary" onclick="terminar(<?php echo $id_prod ?>)">EDITAR</button>
      </div>

    </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted" style="text-align: center;">&copy; Diaz System's 2017-2018</small>
          </div>
        </div>
      </footer>
    </div>

    <script>
      function terminar(id) {
        var nombre = $("#boxNombre").val();
        var precio = $("#boxPrecio").val();
        var categoria = $("#boxCategoria").val();
        $.post('accionEditar.php', 
          {
            id: id,
            nombre: nombre,
            precio: precio,
            categoria: categoria
          }, function(data) {
          location.reload();
        });
      }
    </script>


  </body>
</html>
