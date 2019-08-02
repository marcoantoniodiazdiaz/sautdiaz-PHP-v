<?php 
    session_start();
    include '../database/parameters.php';

    $cliente = $_POST['cliente'];
    $idventa = rand(10000, 99999);
    $trabajador = $_POST['trabajador'];

    $sql = "INSERT INTO VENTAS VALUES ($idventa, $cliente, NULL, NULL, NULL)";
    //$result = $conn->query($sql);
    $conn->query($sql);
    
    $id = rand(10000, 99999);
    $placa = $_POST['placa'];
    $razon = $_POST['razon'];
    $fecha = date('Y-m-d');
    $hora = date('G:i');
    $pagada = 0;

    $sql = "INSERT INTO SERVICIO VALUES ($id, $idventa, '$placa', '$razon', '$fecha', '$hora', 0, $trabajador, $pagada)";
    if ($conn->query($sql) === TRUE) {
        $result = $conn->query($sql);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo $id;

?>