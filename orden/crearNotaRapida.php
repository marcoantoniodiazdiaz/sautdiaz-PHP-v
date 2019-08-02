<?php 
	include '../database/parameters.php';

	$placa = $_POST['placa'];
	$marca = $_POST['marca'];
	$submarca = $_POST['submarca'];
	$color = $_POST['color'];

	if ($placa == null || $placa == "" || $placa == 0) {
		$placa = rand(1000000, 9999999);
	}

	$conn->query("INSERT INTO COCHES VALUES ('$placa', 10000, '$marca', '$submarca', '$color')");

	//CREACION DE VENTA
	$idventa = rand(10000, 99999);

	$conn->query("INSERT INTO VENTAS VALUES ($idventa, 10000, NULL, NULL, NULL)");

	//CREACION DE SERVICIO
	$fecha = date('Y-m-d');
    $hora = date('G:i');
	$id = rand(10000, 99999);
	$conn->query("INSERT INTO SERVICIO VALUES ($id, $idventa, '$placa', 'NOTA RAPIDA', '$fecha', '$hora', 0, 0, 0)");

	echo $id;
 ?>