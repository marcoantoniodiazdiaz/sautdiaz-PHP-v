<?php 
	include '../database/parameters.php';

	$id = rand(10000, 99999);
	$nombre = $_POST['boxNombre'];
	$calle = $_POST['boxCalle'];
	$numero = $_POST['boxNumero'];
	$colonia = $_POST['boxColonia'];
	$telefono = $_POST['boxTelefono'];
	$celular = $_POST['boxCelular'];
	$email = $_POST['boxEmail'];

	$direccion = "".$calle." #".$numero." Col. ".$colonia."";

	//UPPERCASE
	$nombre = strtoupper($nombre);
    $direccion = strtoupper($direccion);
    $marca = strtoupper($marca);
    $submarca = strtoupper($submarca);
    $color = strtoupper($color);
    $placa = strtoupper($placa);
    //

	$sql = "INSERT INTO CLIENTES VALUES ($id, '$nombre', '$direccion', '$email', '$telefono', '$celular', 'default')";
	if ($conn->query($sql) === TRUE) {
    	//echo "Record deleted successfully";
	} else {
    	//echo "Error deleting record: " . $conn->error;
	}

 ?>