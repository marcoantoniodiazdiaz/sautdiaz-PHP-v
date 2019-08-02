<?php 
	include '../database/parameters.php';

	$placa = $_POST['placa'];
	$marca = $_POST['marca'];
	$submarca = $_POST['submarca'];
	$color = $_POST['color'];


	$sql = "UPDATE COCHES SET PLACA = '$placa', MARCA = '$marca', SUBMARCA = '$submarca', COLOR = '$color' WHERE PLACA = '$placa'";

	echo $sql;

	if ($conn->query($sql)===True){

	} else {
		die();
	}
?>