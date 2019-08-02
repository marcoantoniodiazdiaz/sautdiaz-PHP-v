<?php 
  session_start();
  date_default_timezone_set('America/Mexico_City');
  $id_servicio = isset( $_GET['id'] ) ? $_GET['id'] : 0;
  include '../database/parameters.php';
  $sql = "SELECT CLIENTES.NOMBRE, COCHES.PLACA, COCHES.MARCA, COCHES.SUBMARCA,COCHES.COLOR, SERVICIO.ID AS SERVICIO_ID, SERVICIO.VENTA AS VENTA_ID FROM CLIENTES INNER JOIN COCHES INNER JOIN SERVICIO WHERE CLIENTES.ID = COCHES.CLIENTE AND SERVICIO.COCHE = COCHES.PLACA AND SERVICIO.ID=$id_servicio";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Datos de Venta</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../bootstrap/styles/lux.css">
    <!-- Custom styles for this template -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body style="color: black;">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" onclick="location.reload();" href="">Actualizar</a>
      </nav>
      <span><button class="btn btn-outline-danger" href="" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href=""><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Servicio No: <font style="font-weight: bold;"><?php echo $id_servicio ?></font></h1>
    </div>

    <div class="container">
      <?php $result = $conn->query($sql); ?>
      <?php while($row = $result->fetch_assoc()) { ?>
      <div class="card text-center">
        <div class="card-header" style='text-transform: capitalize;'>
          CLIENTE: <span class="badge badge-warning"><?php echo $row['NOMBRE'] ?></span><br>
          VEHICULO: <span class="badge badge-info"><?php echo $row['MARCA']." ".$row['SUBMARCA'] ?></span>
        </div>
        <div class="card-body">
          <h5 class="card-title">Venta Asignada: <?php echo $row['VENTA_ID'];?></h5>
          <?php $id_venta = $row['VENTA_ID']; ?>
          <?php } ?>
          <table class="table table-hover table-bordered" style="font-size: 80%;">
            <thead>
              <th width="10%;">CANT</th>
              <th>NOMBRE</th>
              <th width="20%;">PRECIO</th>
              <th width="15%">TOTAL</th>
              <th width="10%">ACCIONES</th>
            </thead>
            <span id="cuerpoTabla">
            <tbody>
            <?php $contT = 0;?>
            <?php $sql = "SELECT DETALLEDEVENTA.IDPRODUCTO, PRODUCTOS.CATEGORIA ,DETALLEDEVENTA.CANTIDAD, PRODUCTOS.NOMBRE, PRODUCTOS.PRECIO, (DETALLEDEVENTA.CANTIDAD*PRODUCTOS.PRECIO) AS TOTAL FROM DETALLEDEVENTA INNER JOIN PRODUCTOS WHERE DETALLEDEVENTA.IDPRODUCTO = PRODUCTOS.ID AND DETALLEDEVENTA.VENTA = $id_venta"; ?>
            <?php $result = $conn->query($sql); 
              $tipo = "";
            ?>
            <?php while($row = $result->fetch_assoc()) { 
              if ($row['CATEGORIA'] == "MO") {
                $tipo = "table-success";
              } else {
                $tipo = "";
              }

              ?>
              <tr class="<?php echo $tipo; ?>">
                <td><?php echo $row['CANTIDAD']; ?></td>
                <td style="text-transform: uppercase;"><?php echo $row['NOMBRE']; ?></td>
                <td><input class="text-center form-control cajaPrecioEditar" type="text" value="<?php echo sprintf("%.2f", $row['PRECIO']);?>" id="<?php echo $row['IDPRODUCTO'] ?>"></td>
                <?php $contT = $contT+($row['PRECIO'] * $row['CANTIDAD']); ?>
                <td><?php echo sprintf("%.2f", $row['TOTAL']);?></td>
                <td><button onclick="borrarP(<?php echo $row['IDPRODUCTO'] ?>, <?php echo $id_venta ?>);" class="btn btn-danger btn-sm">Borrar</button></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          <div>
            <!--<span class="badge badge-success" style="font-size: 300%;" id="boxTotal">Total: <?php //echo sprintf("%.2f", $contT); ?></span> -->
            
            </div>
          <br>
          <button class="btn btn-primary" onclick="finalizar()">Terminar Servicio</button>
        </div>
        <div class="card-footer text-muted">
          <?php
            $meses[''];
            echo "Fecha y hora actuales: ".date('Y/m/d')." ".date('G:i'); 
          ?>
      </div>
</div>
<br>
<hr>
<h1 style="text-align: center;font-size: 200%;">No en Inventario</h1>
<div class="form-row">
        
                <div class="col-3">
                  <label class="sr-only" for="inlineFormInputGroup">Cantidad</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Cantidad</div>
                    </div>
                    <input type="text" placeholder="Cantidad" id="boxCantidadNEI" class="form-control">
                </div>
                </div>
                <div class="col-4">
                  <label class="sr-only" for="inlineFormInputGroup">Nombre</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Nombre</div>
                    </div>
                    <input type="text" placeholder="Nombre" id="boxNombreNEI" class="form-control">
                </div>
                </div>
                <div class="col-3">
                  <label class="sr-only" for="inlineFormInputGroup">Precio</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Precio</div>
                    </div>
                    <input type="text" placeholder="Precio" id="boxPrecioNEI" class="form-control">
                </div>
                </div>
                <div class="col-2">
                  <button class="btn btn-info" id="btnANL" onclick="agregarProductoNoListado();">Agregar</button>
                </div>
      </div>
<hr>

<h1 style="text-align: center;font-size: 200%;">Agregar Mano de Obra</h1>
<div class="row">
                <div class="col-7">
                  <label class="sr-only" for="inlineFormInputGroup">Nombre</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Servicio Realizado</div>
                    </div>
                    <input type="text" placeholder="Nombre" id="boxServicioRealizado" class="form-control">
                </div>
                </div>
                <div class="col-3">
                  <label class="sr-only" for="inlineFormInputGroup">Precio</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Precio</div>
                    </div>
                    <input type="text" placeholder="Precio" id="boxPrecioServicio" class="form-control">
                </div>
                </div>
                <div class="col-2">
                  <button class="btn btn-info" id="btnANL" onclick="agregarManodeObra();">Agregar</button>
                </div>
</div>

<hr>
<h1 style="text-align: center;">Busca en Inventario</h1>
    <div class="form-row">
        
                <div class="col-3">
                  <label class="sr-only" for="inlineFormInputGroup">Cantidad</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Cantidad</div>
                    </div>
                    <input type="text" placeholder="Cantidad" id="boxCantidad" class="form-control">
                </div>
                </div>
                <div class="col-9">
                  <label class="sr-only" for="inlineFormInputGroup">Nombre</label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                    <div class="input-group-text">Nombre</div>
                    </div>
                    <input type="text" placeholder="Nombre" id="inputNombre" class="form-control">
                </div>
                </div>
      </div>
      <table class="table table-hover table-bordered" style="text-transform: uppercase; font-size: 80%;">
        <thead>
          <th>Nombre</th>
          <th>Categoria</th>
          <th>Precio</th>
          <th>Acciones</th>
        </thead>
        <tbody id="cuerpoTabla2">
            
        </tbody>
      </table>
    </div>

    <?php 
      //SECCION DE ABONOS
    $sql = "SELECT CANTIDAD, FECHA, HORA FROM ABONOS WHERE VENTA = $id_venta ORDER BY FECHA, HORA DESC";
    $result = $conn->query($sql);
    ?>

    <div class="container" id="seccionAbonos">
      <div class="card bg-secondary mb-3 text-center" style="max-width: 80rem;">
              <div class="card-header">STATUS DE LA VENTA <br> <span class="badge-danger badge" id="statusVenta">NO LIQUIDADA</span> </div>
                <div class="card-body">
                  <h4 class="card-title"><span class="badge badge-success"><span style="font-size: 300%; padding: 20px;" id="boxTotal" value="<?php echo sprintf("%.2f", $contT); ?>">Total: $<?php echo sprintf("%.2f", $contT); ?></span></span></span></h4>
                  <h4 class="card-title"><span class="badge badge-warning"><span style="font-size: 130%; padding: 20px;" id="boxAbonos" value="0.00"></span></span></span></h4>
                  <h4 class="card-title"><span class="badge badge-danger"><span style="font-size: 130%; padding: 20px;" id="boxRestante">RESTANTE:</span></span></span></h4>
                  <h4 class="card-title">ABONOS REGISTRADOS</h4>

                  <div class="row text-center">
                    <div class="col-9">
                      <input type="number" placeholder="INGRESA LA CANTIDAD DE ABONO" class="form-control" id="boxCantidadAbono">
                    </div>
                    <div class="col-3">
                      <button class="btn btn-info" onclick="agregarAbono(<?php echo $id_venta; ?>)">AGREGAR ABONO</button>
                    </div>
                  </div>

                  <br><br>
                  <ul class="list-group">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      ABONO REALIZADO EL <?php echo $row['FECHA']; ?> A LAS <?php echo $row['HORA']; ?>
                      <span class="badge badge-primary badge-pill">$ <?php echo $row['CANTIDAD']; ?></span>
                    </li>
                  <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
    </div>

    <?php //POST INGRESADO
      $sql = "SELECT SUM(CANTIDAD) AS TOTAL FROM ABONOS WHERE VENTA = $id_venta"; 
      $result = $conn->query($sql);
      $totalAbonos = 0.0;
      while($row = $result->fetch_assoc()){ 
        $totalAbonos = $row['TOTAL'];
      }
      $debito = $contT-$totalAbonos;
      if ($debito <= 0 && $contT!=0) { ?>
        <script>
          $("#statusVenta").attr("class", "badge-success badge");
          $("#statusVenta").html("LIQUIDADA");
          /*$.ajax({
            url: '../servicios/cambiarEstado.php',
            type: 'post',
            data: {id: <?php //echo $id_servicio; ?>},
          })
          .done(function() {
            //location.reload();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });*/
          
        </script>
      <?php } 

      ?>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <small class="d-block mb-3 text-muted" style="text-align: center;">&copy; Diaz System's 2017-2018</small>
          </div>
        </div>
      </footer>
    </div>

    <script>
      $("#boxAbonos").html("ABONOS: $<?php echo $totalAbonos ?>");
      $("#boxAbonos").attr("value", "<?php echo $totalAbonos ?>");
      $("#boxRestante").html("RESTANTE: $<?php echo sprintf("%.2f", ("".($contT - $totalAbonos)."")) ?>");
    </script>
    
    <script>

      $(document).ready(function() {
        $("#boxCantidadAbono").keyup(function(event) {
          if(event.which == 13){
            agregarAbono(<?php echo $id_venta ?>);
          }
        });
      });

      function agregarAbono(venta) {
        var cant = $("#boxCantidadAbono").val();
        $.ajax({
          url: 'agregarAbono.php',
          type: 'post',
          data: {
            venta: venta,
            cant: cant
          },
        })
        .done(function() {
          location.reload();
        })
        .fail(function() {
          console.log("error");
        });
        
      }


      $(document).ready(function(){
        $("#inputNombre").on("keyup", function(){
          var nombreP = $(this).val();
          $.post("buscar.php", { nombreP: nombreP }, function(data){
            $("#cuerpoTabla2").html(data);
          });  
        });
      });

      function agregarProducto(id){
        var cant = $("#boxCantidad").val();
        if(cant==null || cant<=0){
          swal("Error!", "No has seleccionado una cantidad", "warning");
        } else {;
          $.ajax({
            url: 'agregarProductoAVenta.php',
            type: 'POST',
            data: {cant: cant, id: id, id_venta: <?php echo $id_venta ?>},
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            location.reload();
          });
          
        }
      }

      function borrarP(id_producto, id_venta){
        var link = "borrarP.php?id_p="+id_producto+"&id_v="+id_venta+"&serv=<?php echo $id_servicio ?>";
        window.location = link;
      }

      function agregarProductoNoListado(){
        var cant = $("#boxCantidadNEI").val();
        var nombre = $("#boxNombreNEI").val();
        nombre = nombre.toUpperCase();
        var precio = $("#boxPrecioNEI").val();
        var venta = <?php echo $id_venta ?>;
        //$.post("agregarProductoNoListado.php", {cant: cant, nombre: nombre, precio: precio, venta: venta});
        //location.reload();
        $.ajax({
          url: 'agregarProductoNoListado.php',
          type: 'post',
          data: {cant: cant, nombre: nombre, precio: precio, venta: venta},
        })
        .done(function() {
        })
        .fail(function() {
          console.log("FAIL")
          swal({
            title: "Error!",
            text: "Fallo al ingresar el producto",
            icon: "warning",
            button: "Cerrar",
          });
        })
        .always(function(data) {
          //$("#cuerpoTabla").html(data);
          //$("#boxCantidadNEI").val("").focus();
          //$("#boxNombreNEI").val("");
          //$("#boxPrecioNEI").val("");
          location.reload();
        });
        
      }
      
      function finalizar(){
          var id = <?php echo $id_servicio ?>;
          //$.post("finalizarServicio.php", {id: id});

          //window.location = "../print/imprimir.php?id="+id;

          $.ajax({
            url: 'finalizarServicio.php',
            type: 'POST',
            data: {id: id},
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            window.location = "../print/imprimir.php?id="+id;
          });
          
      }

      $(document).ready(function() {
      	$(".cajaPrecioEditar").keyup(function(event){
      		$(".cajaPrecioEditar").css({
      			color: "#FE2E2E",
      			backgroundColor: '#610B0B'
      		});
      		if (event.which==13) {
      			var id = $(this).attr("id");
      			var precio = $(this).val();

            $.ajax({
              url: 'cambiarPrecio.php',
              type: 'post',
              data: {
                id: id,
                precio: precio
              },
            })
            .done(function() {
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              location.reload();
            });
            

      		}
      	});
      });

      $(document).ready(function() {
        $("#boxPrecioNEI").keyup(function(e) {
          if (e.which==13) {
            agregarProductoNoListado();
            document.getElementById("boxPrecioNEI").focus();
          }
        });
      });

      function agregarManodeObra() {
        $(document).ready(function() {
          var servicio = $("#boxServicioRealizado").val().toUpperCase();
          var precio = $("#boxPrecioServicio").val();

          $.ajax({
            url: 'agregarManodeObra.php',
            type: 'post',
            data: {
              venta: <?php echo $id_venta; ?>,
              servicio: servicio,
              precio: precio
            },
          })
          .done(function() {
            location.reload();
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });
      }

      $(document).ready(function() {
        var user = "<?php echo $_SESSION['nombre']; ?>";
        $("#seccionAbonos").click(function() {
          if (user == "TALLER"){
            swal("Error de Seguridad", "Esta computadora no tiene acceso a funciones de manejo de ($), ve a la refaccionaria", "error");
          }
        });
      });
      

    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
