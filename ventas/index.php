<?php 
  session_start();
  date_default_timezone_set('America/Mexico_City');
  $id_servicio = isset( $_GET['id'] ) ? $_GET['id'] : 0;
  include '../database/parameters.php';
  $sql = "SELECT CLIENTES.NOMBRE, COCHES.PLACA, COCHES.MARCA, COCHES.SUBMARCA,COCHES.COLOR, SERVICIO.ID AS SERVICIO_ID, SERVICIO.VENTA AS VENTA_ID FROM CLIENTES INNER JOIN COCHES INNER JOIN SERVICIO WHERE CLIENTES.ID = COCHES.CLIENTE AND SERVICIO.COCHE = COCHES.PLACA AND SERVICIO.ID=$id_servicio";

?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Venta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="../css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Cerrar <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="Que estas buscando?...">
                <button type="submit" class="submit">Buscar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Servicio Automotriz Diaz</strong><strong> &nbsp4.0</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">S</strong><strong>A 4.0</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
            <div class="list-inline-item logout"><a id="logout" href="login.html" class="nav-link">Cerrar Sesion <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="../img/logo.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Marco Antonio Diaz Diaz</h1>
            <p>@elprogramador:v</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Menu</span>
        <ul class="list-unstyled">
                <li><a href="clientes/index.php"> <i class="fa fa-user"></i>Clientes </a></li>
                <li><a href="vehiculos/index.php"> <i class="fa fa-car"></i>Vehiculos </a></li>
                <li><a href="vehiculos/index.php"> <i class="fa fa-key"></i>Servicios </a></li>
                <li><a href="orden/index.php"> <i class="icon-padnote"></i>Orden de Servicio </a></li>
                <li><a href="productos/index.php"> <i class="fa fa-briefcase"></i>Productos </a></li>
        </ul><span class="heading">Dinero</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="fa fa-arrow-up"></i>Entradas </a></li>
          <li> <a href="#"> <i class="fa fa-arrow-down"></i>Salidas </a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Movimientos </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Servicio No: <span class="text-primary"><?php echo $id_servicio ?></span></h2>
          </div>
        </div>
        <div class="container">
          <!-- INCLUSION DE CONTENIDO -->
          <?php $result = $conn->query($sql); ?>
          <?php while($row = $result->fetch_assoc()) { 
            $id_venta = $row['VENTA_ID'];
            ?>
          <div class="row">
            <div class="col-md-6">
              <div class="user-block block text-center">
                <div class="contributions"><i class="fa fa-car fa-2x"></i><br>Datos del Vehiculo</div><br><br>
                  <div><img src="../img/logos/<?php echo $row['MARCA'] ?>.jpg" class="img-fluid" style="border-radius: 40px;">
                    <br>
                  </div><a href="#" class="user-title">
                    <h3 class="h5"><?php echo $row['MARCA']." ".$row['SUBMARCA']; ?></h3><span>Color: <?php echo $row['COLOR']; ?></span></a>
                  <div class="details d-flex">
                    <div class="item"><i class="fa fa-pied-piper"></i><strong>Placa: <span class="text-success font-weight-bold"><?php 
                      if($row['PLACA'].is_numeric()) {
                        echo $row['PLACA']."</br><div class='badge badge-warning'>Generada Automaticamente</div>";
                      }
                    ?></span></strong></div>
                    <div class="item"></div>
                    <div class="item"><strong><button class="btn btn-sm btn-info">Datos del Propietario <i class="fa fa-user text-white"></i></button></strong></div>
                  </div>
                </div>
            </div>
            <?php } ?>
            <?php 
              $sql = "SELECT TRABAJADORES.NOMBRE, SERVICIO.FECHA, SERVICIO.HORA, SERVICIO.RAZON FROM SERVICIO INNER JOIN TRABAJADORES WHERE TRABAJADORES.ID = SERVICIO.TRABAJADOR AND SERVICIO.ID = $id_servicio";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
             ?>
            <div class="col-md-6">
              <div class="user-block block text-center">
                <div class="contributions"><i class="icon-padnote" style="font-size: 170%;"></i><br>Datos Tecnicos</div><br><br>
                <div class="row">
                  <div class="col-md-4">
                    <div class="icon"><i class="icon-user-1"></i></div><strong>Trabajador</strong>
                  </div>
                  <div class="col-md-8 text-right">
                    <div style="height: 12px;"></div>
                    <div class="badge badge-danger" style="font-size: 130%;"><?php echo $row['NOMBRE']; ?></div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <div class="icon"><i class="fa fa-wrench"></i></div><strong>Razon de Servicio</strong>
                  </div>
                  <div class="col-md-8 text-right">
                    <div style="height: 12px;"></div>
                    <div class="badge badge-danger text-uppercase" style="font-size: 110%;"><?php echo $row['RAZON']; ?></div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-4">
                    <div class="icon"><i class="fa fa-calendar"></i></div><strong>Fecha y Hora y Llegada</strong>
                  </div>
                  <div class="col-md-8 text-right">
                    <div style="height: 12px;"></div>
                    <div class="badge badge-success" style="font-size: 110%;"><?php echo $row['FECHA']; ?></div>
                    <div class="badge badge-info" style="font-size: 110%;"><?php echo $row['HORA']; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
          <div class="block">
            <strong class="text-primary">Productos</strong>
            <table class="table table-hover table-striped" style="cursor: pointer;">
            <thead>
              <th width="10%;">Cantidad</th>
              <th>Nombre</th>
              <th width="20%;">Precio</th>
              <th width="15%">Total</th>
              <th width="10%">Acciones</th>
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
                $tipo = "text-success";
              } else {
                $tipo = "";
              }

              ?>
              <tr class="<?php echo $tipo; ?>">
                <td class="text-primary"><?php echo $row['CANTIDAD']; ?></td>
                <td class="text-uppercase font-italic"><?php echo $row['NOMBRE']; ?></td>
                <td><input class="text-center form-control cajaPrecioEditar" type="text" value="<?php echo sprintf("%.2f", $row['PRECIO']);?>" id="<?php echo $row['IDPRODUCTO'] ?>"></td>
                <?php $contT = $contT+($row['PRECIO'] * $row['CANTIDAD']); ?>
                <td><?php echo sprintf("%.2f", $row['TOTAL']);?></td>
                <td class="text-right"><button onclick="borrarP(<?php echo $row['IDPRODUCTO'] ?>, <?php echo $id_venta ?>);" class="btn btn-danger btn-block"><i class="fa fa-eraser"></i></button></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
          </div>
          <!-- -->
          <div class="row" id="btnPaquetes">
            <div class="col-md-4">
              <div class="statistic-block block" style="cursor: pointer;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"></div><strong>Mostrar paquetes de Servicio</strong>
                    </div>
                    <div class="number dashtext-1"><i class="fa fa-wrench"></i></div>
                  </div>
                </div>
            </div>
          </div>
          <div class="row" id="paquetes" disabled>
            <div class="col-md-4" id="botonPaqueteMenor">
              <div class="statistic-block block" style="cursor: pointer;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-wrench"></i></div><strong>Paquete de Afinacion <span class="text-info font-weight-bold">Menor</span></strong>
                    </div>
                    <div class="number dashtext-3"><i class="fa fa-plus"></i></div>
                  </div>
                </div>
            </div>
            <div class="col-md-4" id="botonPaqueteMayor">
              <div class="statistic-block block" style="cursor: pointer;">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="fa fa-wrench"></i></div><strong>Paquete de Afinacion <span class="text-info font-weight-bold">Mayor</strong>
                    </div>
                    <div class="number dashtext-3"><i class="fa fa-plus"></i></div>
                  </div>
                </div>
            </div>
            <div class="col-md-4"></div>
          </div>

          <div class="block" id="bloqueDeAfinacionMayor">
            <h4><span class="text-primary">Afinacion Mayor</span></h4>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Aceite</label>
              <div class="col-sm-9">
                <div class="col-sm-9 ml-auto">
                  <div class="form-group">
                    <select id="boxSeleccionarAceite" class="form-control">
                      <option value="0">TIPO DE ACEITE</option>
                      <?php $sql = "SELECT ID, NOMBRE FROM PRODUCTOS WHERE CATEGORIA = 'ACEITES' AND BUSCAR = 'SI'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row['ID']; ?>"><?php echo $row['NOMBRE']; ?></option>
                      <?php } ?>
                  </select>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Cantidad</span></div>
                        <input type="number" class="form-control" id="cajaCantidadAceite">
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">Otro</span></div>
                        <input type="text" class="form-control" id="cajaNombreAceite">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Filtro de Aceite</label>
              <div class="col-sm-9">
                <div class="col-sm-9 ml-auto">
                  <div class="form-group">
                    <select class="form-control" id="boxSeleccionarFiltro">
                      <option value="0">FILTRO DE ACEITE</option>
                      <?php $sql = "SELECT ID, NOMBRE FROM PRODUCTOS WHERE CATEGORIA = 'FILTROS DE ACEITE' AND BUSCAR = 'SI'";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row['ID']; ?>"><?php echo $row['NOMBRE']; ?></option>
                      <?php } ?>
                  </select>
                  </div>
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text">Otro</span></div>
                      <input type="text" class="form-control" id="cajaNombreFiltro">
                    </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Filtro de Aire</label>
              <div class="col-sm-9">
                <div class="col-sm-9 ml-auto">
                  <div class="i-checks">
                    <input id="checkboxAire" type="checkbox" class="checkbox-template">
                    <label for="checkboxCustom2">Agregado</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 form-control-label">Limpieza de Inyectores</label>
              <div class="col-sm-9">
                <div class="col-sm-9 ml-auto">
                  <div class="i-checks">
                    <input id="checkboxLimpieza" type="checkbox" class="checkbox-template">
                    <label for="checkboxCustom2">Agregado</label>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-warning btn-block" onclick="finalizarMayor();">Finalizar Servicio Mayor</button>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="block">
                <strong><i class=""></i><span class="text-primary">Producto Vario &nbsp</span><i class="fa fa-archive"></i></strong>
                <br><br>
                <div class="form-group-material">
                  <input type="number" class="input-material" id="boxCantidadNEI">
                  <label class="label-material">Cantidad</label>
                </div>
                <div class="form-group-material">
                  <input type="text" class="input-material" id="boxNombreNEI">
                  <label class="label-material">Nombre</label>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                    <input type="text" class="form-control" id="boxPrecioNEI">
                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="block">
                <strong><span class="text-primary">En Base de Datos  &nbsp</span><i class="fa fa-database"></i></strong><br><br>
                <input type="number" class="form-control" placeholder="Cantidad" id="boxCantidad">
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" id="inputNombre">
                    <div class="input-group-append">
                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
                <table class="table table-striped table-sm">
                  <thead>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th class="text-right">Acc.</th>
                  </thead>
                  <tbody style="font-size: 70%;" id="cuerpoTabla2">
                    
                  </tbody>
                </table>
                
              </div>
              
            </div>
            <div class="col-md-4">
              <div class="block">
                <strong><span class="text-primary">Mano de Obra &nbsp</span><i class="fa fa-cogs"></i></strong><br><br>
                <div class="form-group-material">
                  <input type="text" class="input-material" id="boxServicioRealizado">
                  <label class="label-material">Servicio</label>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                    <input type="text" class="form-control" id="boxPrecioServicio">
                    <div class="input-group-append"><span class="input-group-text">.00</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <?php 
            //SECCION DE ABONOS
          $sql = "SELECT CANTIDAD, FECHA, HORA FROM ABONOS WHERE VENTA = $id_venta ORDER BY FECHA, HORA DESC";
          $result = $conn->query($sql);
          ?>

          <div class="card mb-3 text-center" style="max-width: 80rem;">
              <div class="card-header">Status de la Venta <br> <span class="badge-danger badge" id="statusVenta">NO LIQUIDADA</span> </div>
                <div class="card-body">
                  <h4 class="card-title"><span class="badge badge-success"><span style="font-size: 300%; padding: 20px;" id="boxTotal" value="<?php echo sprintf("%.2f", $contT); ?>">Total: $<?php echo sprintf("%.2f", $contT); ?></span></span></span></h4>
                  <h4 class="card-title"><span class="badge badge-warning"><span style="font-size: 130%; padding: 20px;" id="boxAbonos" value="0.00"></span></span></span></h4>
                  <h4 class="card-title"><span class="badge badge-danger"><span style="font-size: 130%; padding: 20px;" id="boxRestante">Restante:</span></span></span></h4>

                  <div class="row text-center">
                    <div class="col-9">
                      <input type="number" placeholder="Ingresa la cantidad del abono" class="form-control" id="boxCantidadAbono">
                    </div>
                    <div class="col-3">
                      <button class="btn btn-info" onclick="agregarAbono(<?php echo $id_venta; ?>)">Aregar Abono</button>
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
            <button class="btn btn-block btn-warning btn-lg" onclick="finalizar()">Terminar e Imprimir Venta</button>
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
              </script>
            <?php } ?>
        </div>
        <script>
          $("#boxAbonos").html("ABONOS: $<?php echo $totalAbonos ?>");
          $("#boxAbonos").attr("value", "<?php echo $totalAbonos ?>");
          $("#boxRestante").html("RESTANTE: $<?php echo sprintf("%.2f", ("".($contT - $totalAbonos)."")) ?>");
        </script>
        


        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- 
              MARCO ANTONIO DIAZ DIAZ <3
              -->
              <p class="no-margin-bottom">2018 &copy; Diaz System's. Design by <span class="text-primary">Marco Antonio Diaz Diaz</span>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script>

      $("#paquetes").hide();
      $("#bloqueDeAfinacionMayor").hide();

      $("#botonPaqueteMenor").click(function(event) {
        swal("C:", "Opcion en desarrollo <3", "warning");
      });

      $("#btnPaquetes").click(function() {
        $("#paquetes").show(500);
        $(this).hide(500);
      });

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

      $(document).ready(function() {
        $("#boxPrecioServicio").keyup(function(e) {
          if(e.which==13) {
            agregarManodeObra();
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

      function finalizarMayor() {
        var aceiteCantidad = $("#cajaCantidadAceite").val();
        var nombreAceite = "";
        if ($("#boxSeleccionarAceite option:selected").val() == 0) {
          nombreAceite = $("#cajaNombreAceite").val();
        } else {
          nombreAceite = $("#boxSeleccionarAceite option:selected").val();
        }
        
        var filtroaceiteNombre = "";
        if ($("#boxSeleccionarFiltro option:selected").val() == 0) {
          filtroaceiteNombre = $("#cajaNombreFiltro").val();
        } else {
          filtroaceiteNombre = $("#boxSeleccionarFiltro option:selected").val();
        }

        var limpieza = "";
        if ($("#checkboxLimpieza").prop('checked')) {
          limpieza = "true";
        } else {
          limpieza = "false";
        }

        var filtroaire = "";
        if ($("#checkboxAire").prop('checked')) {
          filtroaire = "true";
        } else {
          filtroaire = "false";
        }

        $.ajax({
          url: 'afinacionMayor.php',
          type: 'POST',
          data: {
            venta: <?php echo $id_venta; ?>,
            nombreAceite : nombreAceite,
            cantidadAceite : aceiteCantidad,
            nombreFiltro : filtroaceiteNombre,
            filtroaire : filtroaire,
            limpieza : limpieza
          },
        })
        .done(function(data) {
          console.log("success");
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

      $(document).ready(function() {
        $("#botonPaqueteMayor").click(function(event) {
          $("#bloqueDeAfinacionMayor").show(500);
        });
      });
      

    </script>
    <!-- JAVASCRIPT FILES-->
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/front.js"></script>
  </body>
</html>