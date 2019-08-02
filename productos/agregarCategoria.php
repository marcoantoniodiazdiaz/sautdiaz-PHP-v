<?php 
    include '../database/parameters.php';

    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO CATEGORIAS VALUES ('$nombre')";

    $conn->query($sql);
?>