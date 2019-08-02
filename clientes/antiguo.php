<?php 
  session_start();
  if($_SESSION['username'] == null || $_SESSION['username'] == ""){
    ?>
    <script>
      window.location = "../login.php"
    </script>
    <?php
  }
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
  
    <title>Clientes</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <!-- Custom styles for this template -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="functions.js"></script>
  </head>

  <header id="header">
  <h1><a href="index.html">Servicio Automotriz Diaz</a> 4.0</h1>
    <nav id="nav">
      <ul>
        <li style="white-space: nowrap;"><a href="../clientes/index.php">Clientes</a></li>
        <li style="white-space: nowrap;"><a href="../vehiculos/index.php">Vehiculos</a></li>
        <li style="white-space: nowrap;"><a href="../productos/index.php">Productos</a></li>
        <li style="white-space: nowrap;"><a href="../servicios/index.php">Servicios</a></li>
        <li style="white-space: nowrap;"><a href="../orden/index.php">Orden de Servicio</a></li>
        <li style="white-space: nowrap;"><a href="../statics/index.php">Estadisticas</a></li>
      <li style="white-space: nowrap;"><a href="#" class="button"><?php echo $_SESSION['username']; ?></a></li>
    </ul>
  </nav>
</header>

  <body>
      <div id="spacer" style="height: 80px;"></div>
      <input type="text" class="text-center" placeholder="Buscar" id="boxBuscar">
      <br>
      <div class="box">
        <div class="table-wrapper">
        <table style="text-transform: uppercase; font-size: 80%;">
        <thead>
          <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>DIRECCION</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>CELULAR</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody id="cuerpoTabla">
          <?php $sql = "SELECT * FROM CLIENTES"; ?>
          <?php $result = $conn->query($sql); ?>
          <?php 
          while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['DIRECCION']; ?></td>
            <td style="text-transform: lowercase;"><?php echo $row['EMAIL']; ?></td>
            <td><?php echo $row['TELEFONO']; ?></td>
            <td><?php echo $row['CELULAR']; ?></td>
            <td width="18%"><button class="button small" onclick="ir(<?php echo $row['ID']; ?>)" >Borrar</button>
            <button class="button special small" onclick="editar(<?php echo $row['ID']; ?>)" >Editar</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
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



    <!-- Modal -->
    <div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="agregar.php" method="post">
              <div class="form-row">
                <div class="col-12">
                  <input type="text" class="form-control" placeholder="Nombre" name="boxNombre" style="text-transform: capitalize;">
                </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-5">
                      <input type="text" class="form-control" placeholder="Calle" name="boxCalle" style="text-transform: capitalize;">
                    </div>
                    <div class="col-3">
                      <input type="text" class="form-control" placeholder="Numero" name="boxNumero" style="text-transform: capitalize;">
                    </div>
                    <div class="col-4">
                      <input type="text" class="form-control" placeholder="Colonia" name="boxColonia" style="text-transform: capitalize;">
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-12">
                      <input type="email" class="form-control" placeholder="Email" name="boxEmail">
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-6">
                      <input type="numer" class="form-control" placeholder="Celular" name="boxCelular" style="text-transform: capitalize;">
                  </div>
                  <div class="col-6">
                      <input type="numer" class="form-control" placeholder="Telefono" name="boxTelefono" style="text-transform: capitalize;">
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Registrar</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>

      $(document).ready(function() {
        $("#boxBuscar").keyup(function(event) {

          var nombre = $(this).val();

          $.ajax({
            url: 'buscarCliente.php',
            type: 'post',
            data: {nombre: nombre},
          })
          .done(function(data) {
            //console.log("success");
            $("#cuerpoTabla").html(data);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            //console.log("complete");
          });
          
        });
      });

      function ir(id){
        swal({
          title: "Estas seguro?",
          text: "Seguro que quieres borrar este cliente?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Borrado con exito", {
              icon: "success",
            });
            $.post('borrar.php', {id: id}, function(data) {
              location.reload();
            });
          } else {
            swal("Cancelado!");
          }
        });
      }


      function editar(id) {
        window.location = "editarCliente.php?id="+id;
      }
    </script>

  </body>
</html>
