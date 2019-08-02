<?php 
    include '../database/parameters.php';

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $id = $_POST['id'];

    $sql = "INSERT INTO PRODUCTOS VALUES ($id, '$nombre', $precio, '$categoria', 'SI')";

    if ($conn->query($sql) == TRUE) {
    	echo $sql;
    } else {
    	echo $sql;
    }

?>