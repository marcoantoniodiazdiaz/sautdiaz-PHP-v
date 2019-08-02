<?php 
	session_start();
    include '../database/parameters.php';

    $cantidad = 1;
    $servicio = $_POST['servicio'];
    $precio = $_POST['precio'];
    $venta = $_POST['venta'];

    //header('Location: index.php');

    $id = rand(10000000, 99999999);
    $categoria = "MO";
    $buscar = "NO";

    $sql2 = "INSERT INTO PRODUCTOS VALUES ($id, '$servicio', $precio, '$categoria', '$buscar')";

    if ($conn->query($sql2) !== True) {
        die();
    }

    $conn->query($sql);

    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($venta, $cantidad, $id)";

    if ($conn->query($sql) !== True) {
        die();
    }
 ?>