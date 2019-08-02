<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];

	$sql = "SELECT PAGADA FROM SERVICIO WHERE ID = $id";

	$result = $conn->query($sql);


	while($row = $result->fetch_assoc()){
		if ($row['PAGADA'] == 0) {
			$sql = "UPDATE SERVICIO SET PAGADA = 1 WHERE ID = $id";
		} else {
			$sql = "UPDATE SERVICIO SET PAGADA = 0 WHERE ID = $id";
		}
	}



	$conn->query($sql);
?>