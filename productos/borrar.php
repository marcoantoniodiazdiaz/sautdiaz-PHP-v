<?php 
    include '../database/parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);

    $id = $_POST['id'];

    $sql = "DELETE FROM PRODUCTOS WHERE ID = $id";

    $conn->query($sql);
?>