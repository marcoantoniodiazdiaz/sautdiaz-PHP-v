<?php
    session_start();
    include '../../database/parameters.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre']; 
    $direccion = $_POST['direccion']; 
    $email = $_POST['email']; 
    $telefono = $_POST['telefono']; 
    $celular = $_POST['celular']; 
    $placa = $_POST['placa']; 
    $marca = $_POST['marca']; 
    $submarca = $_POST['submarca']; 
    $color = $_POST['color'];

    

    $sql = "INSERT INTO CLIENTES VALUES ($id, '$nombre', '$direccion', '$email', '$telefono', '$celular', 'default')";
    $conn->query($sql);

    $sql = "INSERT INTO COCHES VALUES ('$placa', $id , '$marca', '$submarca', '$color')";
    $conn->query($sql);

    //echo "CLIENTE:".$nombre." CREADO CON EL COCHE: ".$marca." ".$submarca;
?>