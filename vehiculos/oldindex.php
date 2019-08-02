<?php 
  session_start();
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  if($_SESSION['username'] == null || $_SESSION['username'] == ""){
    ?>
    <script>
      window.location = "../login.php"
    </script>
    <?php
  }
  include '../database/parameters.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vehiculos</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../print/bootstrap.min.css">
    <script src="../vendor/jquery/jquery.js"></script>
    <!-- Custom styles for this template -->
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="" data-toggle="modal" data-target="#agregarCliente">Agregar Vehiculo</a>
      </nav>
      <span><button class="btn btn-outline-danger" href="" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href=""><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Vehiculos (3.0)</h1>
    </div>

    <div class="container">
      <table class="table table-bordered table-hover" style="text-transform: uppercase; font-size: 80%; text-align: center;">
        <thead>
          <tr>
            <th>PLACA</th>
            <th>CLIENTE</th>
            <th>MARCA</th>
            <th>SUBMARCA</th>
            <th>COLOR</th>
            <th>ACCIONES</th>
          </tr>
        </thead>
        <tbody>
          <?php $sql = "SELECT COCHES.PLACA, CLIENTES.NOMBRE, COCHES.MARCA, COCHES.SUBMARCA, COCHES.COLOR FROM COCHES INNER JOIN CLIENTES WHERE CLIENTES.ID = COCHES.CLIENTE"; ?>
          <?php $result = $conn->query($sql); ?>
          <?php while($row = $result->fetch_assoc()) { ?>
          <tr>
            <td style="font-weight: bold; font-size: 150%;"><?php echo $row['PLACA']; ?></td>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['MARCA']; ?></td>
            <td><?php echo $row['SUBMARCA']; ?></td>
            <td><?php echo $row['COLOR']; ?></td>
            <td><button class="btn-danger btn btn-sm" onclick="ir('<?php echo $row['PLACA'] ?>')">Borrar</button>
            <button class="btn-primary btn btn-sm" onclick="editar('<?php echo $row['PLACA'] ?>')">Editar</button>
            </td>
          </tr>
          <?php } ?>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      function ir(placa){
        swal({
          title: "Estas seguro?",
          text: "Seguro que quieres borrar este Vehiculo??",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Borrado con exito", {
              icon: "success",
            });
            var link = "borrar.php?placa="+placa;
            window.location = link;
          } else {
            swal("Cancelado!");
          }
        });
      }
    </script>
    <!-- Modal -->
    <div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Agregar Vehiculo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <?php $sql = "SELECT NOMBRE FROM MARCAS" ?>
        <?php $result = $conn->query($sql); ?>
        

          <div class="modal-body">
              <div class="form-row">
                <div class="col-12">
                  <input type="text" class="form-control" placeholder="Placa" id="boxPlaca" style="font-size: 140%;">
                </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col-6">
                      <select id="boxMarca" class="form-control">
                        <option value="0">Selecciona Marca</option>
                        <?php while($row = $result->fetch_assoc()) { ?>
                          <option value="<?php echo $row['NOMBRE'] ?>"><?php echo $row['NOMBRE'] ?></option>
                        <?php } ?>
                      </select>
                      <?php $sql = "SELECT ID, NOMBRE FROM CLIENTES" ?>
                      <?php $result = $conn->query($sql); ?>
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control" placeholder="Submarca" id="boxSubmarca" style="text-transform: capitalize;">
                    </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-12">
                      <select id="boxCliente" class="form-control" style="text-transform: capitalize;">
                          <option value="0">Selecciona Cliente</option>
                          <?php while($row = $result->fetch_assoc()) { ?>
                          <option value="<?php echo $row['ID'] ?>"><?php echo $row['NOMBRE'] ?></option>
                          <?php } ?>
                      </select>
                  </div>
                </div>
                <br>
                <div class="form-row">
                  <div class="col-12">
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
                </div>
                <br>
                <button class="btn btn-success" onclick="agregarCoche();">Registrar</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
      function editar(id) {
        window.location = "editarVehiculo.php?placa="+id;
      }
      function agregarCoche() {


        $.ajax({
          url: 'agregar.php',
          type: 'POST',
          data: {
            placa : $("#boxPlaca").val(),
            cliente : $("#boxCliente option:selected").val(),
            marca : $("#boxMarca option:selected").val(),
            submarca : $("#boxSubmarca").val(),
            color : $("#boxColor option:selected").val()
          },
        })
        .done(function() {
          //location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
      }
    </script>
  </body>
</html>
