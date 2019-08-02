<?php 
	include '../../database/parameters.php';

	$placa = $_POST['placa'];

	$todas = array();

	$sql = "SELECT PLACA FROM COCHES";
	$result = $conn->query($sql);

	$condition = false;

	//echo $placa;

	// $return = array();

	while ($row = $result->fetch_assoc()) {
		array_push($todas, $row['PLACA']);
	}

	if (in_array($placa, $todas)) {
		$condition = true;
	} else {
		$condition = false;
	}

	if ($condition == true) {
		$sql = "SELECT CLIENTES.NOMBRE, COCHES.MARCA, COCHES.SUBMARCA FROM CLIENTES INNER JOIN COCHES WHERE CLIENTES.ID = COCHES.CLIENTE AND COCHES.PLACA = '$placa'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$return = array(
				'existe' => "EXIST",
				'mensaje' => "ESTAS REGISTRANDO UN ".$row['MARCA']." ".$row['SUBMARCA']." DEL CLIENTE ".$row['NOMBRE']
			);
		}
	} else {
		$return = array(
			'existe' => "NOT EXIST",
			'mensaje' => ""
		);
	}
	echo json_encode($return, JSON_FORCE_OBJECT);

 ?>