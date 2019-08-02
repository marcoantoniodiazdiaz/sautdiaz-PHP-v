<?php 
    session_start();
    include '../database/parameters.php';

    $placa = $_POST['placa'];
    $cliente = $_POST['cliente'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $color = $_POST['color'];

    $submarca = strtoupper($submarca);

    $sql = "INSERT INTO COCHES VALUES ('$placa', $cliente, '$marca', '$submarca', '$color')";
    if ($conn->query($sql) === TRUE) {
    	//echo $sql;
	} else {
        //echo $sql;
    //echo "Error deleting record: " . $conn->error;
	}

?>