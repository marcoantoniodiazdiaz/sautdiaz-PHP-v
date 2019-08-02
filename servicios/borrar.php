<?php 
    session_start();
    include 'parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);

    $id = $_POST['id'];

    $sql = "DELETE FROM VENTAS WHERE ID = $id";

    $conn->query($sql);
?>