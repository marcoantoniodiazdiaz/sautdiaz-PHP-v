<?php 
  session_start();
  include '../../database/parameters.php';
  $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
  $id_cliente = rand(10000, 99999);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orden Completa</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../../bootstrap/styles/lux.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom styles for this template -->
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <span><button class="btn btn-outline-danger" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href="#"><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">+ Cliente y Vehiculo</h1>
    </div>

    <div class="container">
      <table class="table table-bordered">
        <thead>
          <th style="text-align: center;">Datos del Cliente</th>
        </thead>
        <tr><td>
          <input type="text" autocomplete="off" class="form-control" value="<?php echo $id_cliente?>" style="font-weight: bold;" id="boxID">
          <br>
          <input type="text" placeholder="Nombre del Cliente" autocomplete="off" class="form-control text-uppercase" id="boxNombre" style="font-size: 200%;">
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
      <table class="table table-bordered">
        <thead>
          <th style="text-align: center;">Datos del Vehiculo</th>
        </thead>
        <tr><td>
          <input type="text" placeholder="Placa" autocomplete="off" class="form-control text-uppercase" style="font-weight: bold; font-size: 400%; text-align: center;" id="boxPlaca">
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

      <div width="100%" style="text-align: center;">
        <button class="btn btn-primary" id="btnSubmit">Agregar Coche y Cliente</button>
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


    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <form action="../index.php" style="display: none;" id="Autoseleccion" method="get">
      <input type="text" id="ValorID" name="id">
      <input type="text" id="ValorPlaca" name="placa">
    </form>
    
    <!-- Placed at the end of the document so the pages load faster -->
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
            alert(data.mensaje);
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
            swal("Hecho!", data, "success");
            $("#ValorID").val(id);
            $("#ValorPlaca").val(placa);
            $("#Autoseleccion").submit();
          });

        });
      });
    </script>
  </body>
</html>
