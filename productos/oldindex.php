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

    <title>Productos</title>

    <!-- Bootstrap core CSS -->
    <!-- Custom styles for this template -->
    <link href="../print/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Servicio Automotriz Diaz</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="" data-toggle="modal" data-target="#agregarProducto">Agregar Producto</a>
        <a class="p-2 text-dark" href="" data-toggle="modal" data-target="#agregarCategoria">Agregar Categoria</a>
      </nav>
      <span><button class="btn btn-outline-danger" href="" onclick="window.history.back()">Volver</button>
      <a class="btn btn-outline-primary" href=""><?php echo $_SESSION['nombre']; ?></a></span>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Productos (3.0)</h1>
    </div>

    <div class="container">
      <table class="table table-hover table-bordered" style="font-size: 80%; text-transform: uppercase;">
        <thead>
          <th width="20%">#</th>
          <th>NOMBRE</th>
          <th width="5%">PRECIO</th>
          <th width="20%">CATEGORIA</th>
          <th width="18%">ACCIONES</th>
        </thead>
        <tbody>
            <?php $sql = "SELECT * FROM PRODUCTOS WHERE BUSCAR = 'SI'"?>
            <?php $result = $conn->query($sql);?>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $row['ID']; ?></td>
              <td><?php echo $row['NOMBRE']; ?></td>
              <td><?php echo sprintf("%.2f", $row['PRECIO']);?></td>
              <td><?php echo $row['CATEGORIA']; ?></td>
              <td style="text-align: center;">
                <button class="btn btn-danger btn-sm" onclick="borrar(<?php echo $row['ID']; ?>)">Borrar</button>
                <button class="btn btn-success btn-sm" onclick="editar(<?php echo $row['ID']; ?>)">Editar</button>
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


  <!-- MODAL AGREGAR CLIENTE -->
    <div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="agregarProductoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="agregarProductoLabel">Agregar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-row">
              <div class="col-5"><input type="text" placeholder="Nombre" id="boxNombre" class="form-control" autocomplete="off"></div>
              <div class="col-4"><input type="text" placeholder="Marca-OPC" id="boxMarca" class="form-control" autocomplete="off"></div>
              <div class="col-3"><input type="text" placeholder="Precio" id="boxPrecio" class="form-control"></div>
            </div>
            <div class="form-row">
            <div class="col-12">
            <select class="form-control" id="comboCategoria">
              <option value="0">SELECCIONA UNA CATEGORIA</option>
            <?php $sql = "SELECT NOMBRE AS N FROM CATEGORIAS"?>
            <?php $result = $conn->query($sql);?>
            <?php while($row = $result->fetch_assoc()) { ?>
              <option value="<?php echo $row['N'] ?>"><?php echo $row['N'] ?></option>

            <?php } ?>
            </select>
            </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- MODAL AGREGAR CATEGORIA -->
    <div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="agregarCategoriaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="agregarCategoriaLabel">Agregar Categoria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" placeholder="NOMBRE DE CATEGORIA" class="form-control" id="boxNombreCategoria">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="guardarCategoria()">Guardar</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
      function guardar(){
        $(document).ready(function(){
          var nombre = $("#boxNombre").val();
          var marca = $("#boxMarca").val();
          var nombre = marca+" "+nombre;
          var precio = $("#boxPrecio").val();
          var categoria = $("#comboCategoria option:selected").val();
          $.post("agregarProducto.php", {nombre: nombre, precio: precio, categoria: categoria});
          location.reload();
        });
      }
      function guardarCategoria(){
        $(document).ready(function(){
          var nombre = $("#boxNombreCategoria").val();
          $.post("agregarCategoria.php", {nombre: nombre});
          location.reload();
        });
      }
      function borrar(id){
        $.post("borrar.php", {id: id});
        location.reload();
      }
      function editar(id){
        location = "editar.php?id="+id;
      }
    </script>
  </body>
</html>
