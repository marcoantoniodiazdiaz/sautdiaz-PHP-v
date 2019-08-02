<?php
	include '../database/parameters.php';
	
	if ($conn->connect_error) {
    	die("Conexion Fallida" . $conn->connect_error);
	}

	$username = $_POST['email'];
	$password = $_POST['pass'];

	$sql = "SELECT * FROM ADMIN";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		if($username === $row['EMAIL'] && $password === $row['PASSWORD']){
			echo "Sesion Iniciada";
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['nombre'] = $row['NOMBRE'];

			if ($username == "TALLER") { ?>
				<script>
					var url = "legacy/index.php";
					window.location = url;
				</script>
			<?php } else { ?>
				<script>
					var url = "legacy/index.php";
					window.location = url;
				</script>
			<?php }
			?>
			<script>
				//var url = "content/index.php";
				//window.location = url;
			</script>
			<?php  
		} else {
			?>
				<script>
					window.location = "login.php?access=denied";
				</script>
			<?php
		}
	}

 ?>