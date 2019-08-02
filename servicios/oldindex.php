<?php 
  session_start();
  include 'parameters.php';
  $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Servicios</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../bootstrap/styles/lux.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <input type="text" placeholder="Buscar" class="form-control" style="width: 25%;" id="barraBuscar">
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="" onclick="location.reload()">Actualizar</a>
      </nav>
      <span><button class="btn btn-outline-danger" href="" onclick="window.history.back()">Volver</button>
        <button class="btn btn-outline-info" href="" onclick="comprobarIntegridad()">COMPROBAR INTEGRIDAD DE DATOS</button>
      <a class="btn btn-outline-primary" href=""><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <?php 
        for ($i=0; $i < 3; $i++) { ?>
          <h1 class="display-4">Servicios</h1>
        <?php }
       ?>
    </div>

    <div class="container" style="font-size: 80%; text-transform: uppercase;">
      <table class="table table-bordered table-hover">
        <thead>
          <th>#</th>
          <th>VENTA</th>
          <th>CLIENTE</th>
          <th>VEHICULO</th>
          <th>FECHA/HORA</th>
          <th>TRABAJADOR</th>
          <th>ACCIONES</th>
          <th>PAGADA</th>
        </thead>
        <tbody id="cuerpoTabla">
        <?php $sql = "SELECT SERVICIO.ID AS S_ID, VENTAS.ID AS V_ID, CLIENTES.NOMBRE, SERVICIO.FECHA, SERVICIO.HORA, TRABAJADORES.NOMBRE AS TRABAJADOR, SERVICIO.ESTADO, SERVICIO.PAGADA, COCHES.MARCA, COCHES.SUBMARCA FROM SERVICIO INNER JOIN VENTAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN COCHES WHERE VENTAS.ID = SERVICIO.VENTA AND CLIENTES.ID = VENTAS.CLIENTE AND TRABAJADORES.ID = SERVICIO.TRABAJADOR AND SERVICIO.COCHE = COCHES.PLACA ORDER BY SERVICIO.FECHA DESC, SERVICIO.HORA DESC"; ?>
        <?php $result = $conn->query($sql); ?>
        <?php while($row = $result->fetch_assoc()) { if($row['ESTADO']==2){?>
          <tr>
            <td><?php echo $row['S_ID']; ?></td>
            <td><button class="btn btn-sm btn-success" onclick="verVenta(<?php echo $row['S_ID']; ?>)">Ver Venta</button></td>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['MARCA']." ".$row['SUBMARCA'] ; ?></td>
            <td><?php echo "".$row['FECHA']." ".$row['HORA'].""; ?></td>
            <td><?php echo $row['TRABAJADOR']; ?></td>  
            <td style="text-align: center;"><button class="btn btn-sm btn-danger" onclick="borrar(<?php echo $row['V_ID']; ?>)">Borrar</button></td>
            <?php 
              $imagen = "";
              if($row['PAGADA'] == 0) {
                $imagen = "tache.png";
              } else {
                $imagen = "si.png";
              }

            ?>
            <td style="text-align: center; cursor: pointer;"><img src="../../img/estados/<?php echo $imagen ?>" width="30px" onclick="change(<?php echo $row['S_ID']; ?>)"></td>

          </tr>
        <?php } }?>
        </tbody>
      </table>
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
          location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
      }
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>
