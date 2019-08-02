<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];
	$precio = $_POST['precio'];

	$sql = "UPDATE PRODUCTOS SET PRECIO = $precio WHERE ID = $id";

	$conn->query($sql);

?>