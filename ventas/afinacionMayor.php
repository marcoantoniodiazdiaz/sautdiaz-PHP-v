<?php 
	include '../database/parameters.php';

	$cantidadAceite = $_POST['cantidadAceite'];
	$nombreAceite = $_POST['nombreAceite'];
	$filtroAceiteNombre = $_POST['nombreFiltro'];
	$filtroaire = $_POST['filtroaire'];
	$limpieza = $_POST['limpieza'];

	$id_venta = $_POST['venta'];

	//AGREGAR ACEITE
	if (ctype_digit($nombreAceite)) {
		$sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, $cantidadAceite, $nombreAceite)";
    	$conn->query($sql);
	} else {
		$id = rand(10000000, 99999999);
		$categoria = "MISS";
    	$buscar = "NO";
    	$sql2 = "INSERT INTO PRODUCTOS VALUES ($id, '$nombreAceite', 0, '$categoria', '$buscar')";
    	$conn->query($sql2);

    	$sql3 = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, $cantidadAceite, $id)";
    	$conn->query($sql3);
	}
	//AGREGAR FILTRO
	if (ctype_digit($filtroAceiteNombre)) {
		$sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, 1, $filtroAceiteNombre)";
    	$conn->query($sql);
	} else {
		$id = rand(10000000, 99999999);
		$categoria = "MISS";
    	$buscar = "NO";
    	$sql2 = "INSERT INTO PRODUCTOS VALUES ($id, '$filtroAceiteNombre', 55, '$categoria', '$buscar')";
    	$conn->query($sql2);

    	$sql3 = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, 1, $id)";
    	$conn->query($sql3);
	}
	//AGREGAR FILTRO DE AIRE
	if($filtroaire == "true") {
		$id = rand(10000000, 99999999);
	    $categoria = "MISS";
	    $buscar = "NO";
	    $sql = "INSERT INTO PRODUCTOS VALUES ($id, 'FILTRO DE AIRE', 0, '$categoria', '$buscar')";
	    $conn->query($sql);

	    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, 1, $id)";
	    $conn->query($sql);
	}
	//AGREGAR LIMPIZA DE INYECTORES
	if ($limpieza == "true") {
		$id = rand(10000000, 99999999);
	    $categoria = "MO";
	    $buscar = "NO";
	    $sql = "INSERT INTO PRODUCTOS VALUES ($id, 'LIMPIZA DE INYECTORES', 250, '$categoria', '$buscar')";
	    $conn->query($sql);

	    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, 1, $id)";
	    $conn->query($sql);
	}

	if (true) {
		$id = rand(10000000, 99999999);
	    $categoria = "MO";
	    $buscar = "NO";
	    $sql = "INSERT INTO PRODUCTOS VALUES ($id, 'AFINAR MOTOR', 300, '$categoria', '$buscar')";
	    $conn->query($sql);

	    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, 1, $id)";
	    $conn->query($sql);
	}



 ?>