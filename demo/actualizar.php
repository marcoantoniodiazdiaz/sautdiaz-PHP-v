<?php 
	include '../database/parameters.php';

	$sql = "SELECT COCHES.MARCA, COCHES.SUBMARCA, CLIENTES.NOMBRE, SERVICIO.RAZON, SERVICIO.ID AS SERVICIOID, SERVICIO.FECHA, SERVICIO.HORA, TRABAJADORES.NOMBRE AS TRABAJADOR FROM SERVICIO INNER JOIN COCHES INNER JOIN CLIENTES INNER JOIN TRABAJADORES WHERE COCHES.PLACA = SERVICIO.COCHE AND CLIENTES.ID = COCHES.CLIENTE AND TRABAJADORES.ID = SERVICIO.TRABAJADOR AND (SERVICIO.ESTADO = 0)";

	$result = $conn->query($sql);

	$respuesta = "";
	$marca = "";
	while ($row = $result->fetch_assoc()) {

		if ($row['ESTADO']!=2) {
		
		$marca = "".$row['MARCA'].".jpg";

		$respuesta = $respuesta."

			
				<div class='col-md-4' data-toggle='modal' data-target='.bd-example-modal-lg' onclick='obtenerDatos(".$row['SERVICIOID'].")'>
            		<div class='card mb-3' style='cursor: pointer;'>
             			<img class='card-img-top' src='../../img/logos/".$marca."' width='25%;'>
						<div class='card-body'>
                			<h5 class='card-title'>".$row['SUBMARCA']."</h5>
                			<p class='card-text'>".$row['NOMBRE']."</p>
                			<strong><p class='card-text' style='text-transform: uppercase;'>".$row['RAZON']."</p></strong>
                			Asignado a: <strong><p class='card-text' style='text-transform: uppercase;'>".$row['TRABAJADOR']."</p></strong>
                			<p class='card-text'><small class='text-muted'>FECHA: ".$row['FECHA']." HORA: ".$row['HORA']."</small></p>
              			</div>
            		</div>
            	</div>";
		}
	}	

	echo $respuesta;

?>