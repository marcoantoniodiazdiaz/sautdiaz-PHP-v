<?php 
	include '../database/parameters.php';

	$cadena = $_POST['cadena'];

	$sql = "SELECT * FROM CLIENTES WHERE NOMBRE LIKE '%".$cadena."%' ORDER BY NOMBRE ASC";
  	$result = $conn->query($sql); ?>

  	<?php while ($row = $result->fetch_assoc()) { ?>

		<div class="messages optionCliente" id="<?php echo $row['ID'] ?>" nombre="<?php echo $row['NOMBRE']; ?>"><a class="message d-flex align-items-center" onclick="planB(<?php echo $row['ID']; ?>, '<?php echo $row['NOMBRE']; ?>')">
        	<div class="content"><strong class="d-block text-primary"><?php echo $row['NOMBRE']; ?></strong>
            	<span class="d-block"><?php echo $row['DIRECCION']; ?></span>
            	<small class="date d-block"><?php echo $row['EMAIL']; ?></small>
        	</div></a>
        </div>

  	<?php } ?>