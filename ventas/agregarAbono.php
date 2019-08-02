<?php

	date_default_timezone_set('America/Mexico_City');
	include '../database/parameters.php';

	$venta = $_POST['venta'];
	$cant = $_POST['cant'];

	$fecha = date('Y-m-d');
	$hora = date('G:i:s'); 

	$sql = "INSERT INTO ABONOS VALUES ($venta, $cant, '$fecha', '$hora')";

	$conn->query($sql);

 ?>