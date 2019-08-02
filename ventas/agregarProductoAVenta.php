<?php
    session_start();
    include 'parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
    $cantidad = $_POST['cant'];
    $id_producto = $_POST['id'];
    $id_venta = $_POST['id_venta'];

    $sql = "INSERT INTO DETALLEDEVENTA VALUES ($id_venta, $cantidad, $id_producto)";
    $conn->query($sql);
    


?>