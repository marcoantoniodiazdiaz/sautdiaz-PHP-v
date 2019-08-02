<?php
    session_start();
    include '../database/parameters.php';

    $placa = $_POST['placa'];

	$sql = "DELETE FROM COCHES WHERE PLACA = '$placa'";

	$conn->query($sql);

?>