<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];

	$sql = "DELETE FROM CLIENTES WHERE ID = $id";

	if ($conn->query($sql) === TRUE) {
		echo $id;
	} else {
    	echo "Error deleting record: " . $conn->error;
	}
?>