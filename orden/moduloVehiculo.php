<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];

	$sql = "SELECT COCHES.* FROM COCHES INNER JOIN CLIENTES WHERE CLIENTES.ID = $id AND CLIENTES.ID = COCHES.CLIENTE";

	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) { ?>
		
		<div class="messages optionCoche text-center"><a href="#" class="message d-flex align-items-center">
                    <div class="content">
                    	<img src="../img/logos/<?php echo $row['MARCA'] ?>.jpg" style="width: 100%; border-radius: 30px;">
                    	<strong class="d-block text-primary"><?php echo $row['SUBMARCA']; ?></strong>
                      <span class="d-block"><?php echo $row['PLACA'];?></span>
                      <small class="date d-block"><?php echo $row['COLOR'];?></small></div></a>
                      <button class="btn btn-danger btn-block btnSeleccionar" onclick="seleccionarCoche('<?php echo $row['PLACA'] ?>');">Seleccionar</button>
                </div>
                <div class="line"></div>


	<?php } ?>
	