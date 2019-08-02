<?php 
	include '../database/parameters.php';

	$sql = $_GET['query'];
	$result = $conn->query($sql);

	$array_list = array();

	while ($row = $result->fetch_assoc()) {
		# code...
		$array_list[] = $row;
	}

	echo json_encode($array_list);
 ?>