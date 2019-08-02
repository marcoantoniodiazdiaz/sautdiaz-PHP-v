<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$categoria = $_POST['categoria'];

	$sql = "UPDATE PRODUCTOS SET NOMBRE = '$nombre', PRECIO = $precio, CATEGORIA = '$categoria' WHERE ID = $id";

	$conn->query($sql);

	

?>