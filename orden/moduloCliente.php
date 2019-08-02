<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];

	$sql = "SELECT * FROM CLIENTES WHERE ID = $id";

	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) { ?>
		
		<div class="card text-white bg-primary mb-3 text-uppercase" style="max-width: 50rem;">
			<div class="card-header">MIS DATOS:</div>
                <div class="card-body">
                  <h4 class="card-title">NOMBRE COMPLETO</h4>
                  <p class="card-text"><?php echo $row['NOMBRE']; ?></p>
                  <h4 class="card-title">DIRECCION</h4>
                  <p class="card-text"><?php echo $row['DIRECCION']; ?></p>
                  <h4 class="card-title">EMAIL</h4>
                  <p class="card-text"><?php echo $row['EMAIL']; ?></p>
                  <h4 class="card-title">TELEFONO | CELULAR</h4>
                  <p class="card-text"><?php echo $row['TELEFONO']." <|> ".$row['CELULAR']; ?></p>
              </div>
        </div>

	<?php } ?>
	