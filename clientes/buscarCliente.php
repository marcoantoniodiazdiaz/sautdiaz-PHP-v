<?php 
	
	include '../database/parameters.php';
	$nombre = $_POST['nombre'];
	
	$sql = "SELECT * FROM CLIENTES WHERE NOMBRE LIKE '%".$nombre."%'";

	$result = $conn->query($sql);

	if(!$nombre==""){
		while($row = $result->fetch_assoc()) { ?>
	        <div class="public-user-block block">
              <div class="row d-flex align-items-center">                   
                <div class="col-lg-5 d-flex align-items-center">
                  <div class="order text-primary"><?php echo $row['ID']; ?></div>
                  <a class="name"><strong class="d-block">&nbsp&nbsp&nbsp&nbsp<?php echo $row['NOMBRE']; ?></strong><span class="d-block">&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $row['EMAIL']?></span></a>
                </div>
                <div class="col-lg-3 text-center">
                  <div class="contributions"><?php echo $row['DIRECCION']; ?></div>
                </div>
                <div class="col-lg-4">
                  <div class="details d-flex">
                    <div class="item"><i class="fa fa-mobile"></i><strong><?php echo $row['CELULAR'] ?></strong></div>
                    <div class="item"><i class="fa fa-phone"></i><strong><?php echo $row['TELEFONO']; ?></strong></div>
                    <div class="item">
                      <button class="btn btn-danger btn-sm text-center" onclick="ir(<?php echo $row['ID']; ?>)"><i class="fa fa-eraser text-white"></i></button>
                      <button class="btn btn-info btn-sm text-center" onclick="editar(<?php echo $row['ID']; ?>)"><i class="fa fa-pencil text-white"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    	<?php }
	}

?>