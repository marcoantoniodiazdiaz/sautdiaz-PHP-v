<?php 
	include '../../database/parameters.php';

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$celular = $_POST['celular'];



	$sql = "UPDATE CLIENTES SET NOMBRE = '$nombre', DIRECCION = '$direccion', EMAIL = '$email', TELEFONO = '$telefono', CELULAR = '$celular' WHERE ID = $id";

	if ($conn->query($sql)===True){

	} else {
		die();
	}
?>