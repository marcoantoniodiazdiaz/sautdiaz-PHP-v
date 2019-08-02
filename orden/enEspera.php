<?php 
    include '../database/parameters.php';

    $id = $_POST['id'];

    $sql = "UPDATE SERVICIO SET ESTADO=1 WHERE ID = $id";
    $conn->query($sql);

?>