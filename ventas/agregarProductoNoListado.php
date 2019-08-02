<?php 
    session_start();
    include 'parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
    $cantidad = $_POST['cant'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $venta = $_POST['venta'];

    //header('Location: index.php');

    $id = rand(10000000, 99999999);
    $categoria = "MISS";
    $buscar = "NO";

    $sql2 = "INSERT INTO PRODUCTOS VALUES ($id, '$nombre', $precio, '$categoria', '$buscar')";

    if ($conn->query($sql2) !== True) {
        die();
    }

    $conn->query($sql);

    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($venta, $cantidad, $id)";

    if ($conn->query($sql) !== True) {
        die();
    }

