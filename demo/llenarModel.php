<?php 
	include '../database/parameters.php';

	$id = $_POST['id'];

	$sql = "SELECT COCHES.PLACA, COCHES.MARCA, COCHES.SUBMARCA, COCHES.COLOR, CLIENTES.NOMBRE, CLIENTES.DIRECCION, CLIENTES.TELEFONO, CLIENTES.CELULAR, SERVICIO.ID, SERVICIO.VENTA, SERVICIO.FECHA, SERVICIO.HORA, SERVICIO.ESTADO, SERVICIO.RAZON, TRABAJADORES.NOMBRE AS TRABAJADOR FROM COCHES INNER JOIN CLIENTES INNER JOIN SERVICIO INNER JOIN TRABAJADORES WHERE COCHES.CLIENTE = CLIENTES.ID AND SERVICIO.COCHE = COCHES.PLACA AND SERVICIO.TRABAJADOR = TRABAJADORES.ID AND SERVICIO.ID = $id";

	$result = $conn->query($sql);

	while ($row = $result->fetch_assoc()) {
		if ($row['ESTADO'] == 0){
			echo "
					<h2 style='width: 100%;' class='text-center'>Datos del Vehiculo</h2>
          			<table class='table table-bordered table-hover text-center'>
            			<thead>
              				<th>PLACA</th>
							<th>MARCA</th>
							<th>SUBMARCA</th>
							<th>COLOR</th>
						</thead>
						<tbody>
							<tr>
								<td>".$row['PLACA']."</td>
								<td>".$row['MARCA']."</td>
								<td>".$row['SUBMARCA']."</td>
								<td>".$row['COLOR']."</td>
							</tr>
						</tbody>
          			</table>

          <h2 style='width: 100%;' class='text-center'>Datos del Propietario</h2>
          <table class='table table-bordered table-hover text-center'>
            <thead>
              <th>NOMBRE COMPLETO</th>
              <th>DIRECCION</th>
              <th>TELEFONO</th>
              <th>CELULAR</th>
            </thead>
            <tbody>
				<tr>
					<td>".$row['NOMBRE']."</td>
					<td>".$row['DIRECCION']."</td>
					<td>".$row['TELEFONO']."</td>
					<td>".$row['CELULAR']."</td>
				</tr>
            </tbody>
          </table>

          <h2 style='width: 100%;' class='text-center'>Datos del Servicio</h2>
          <table class='table table-bordered table-hover text-center' style='font-size: 80%;''>
            <thead>
              <th width='8%'>ID ASIGNADO</th>
              <th width='8%'>VENTA RELACIONADA</th>
              <th width='30%'>RAZON</th>
              <th width='15%'>FECHA DE LLEGADA</th>
              <th width='10%'>HORA DE LLEGADA</th>
              <th>TRABAJADOR ASIGNADO</th>
            </thead>
            <tbody>
				<tr>
					<td>".$row['ID']."</td>
					<td><button class='btn btn-success btn-sm' onclick='irVenta(".$row['ID'].")' >VENTA</button></td>
					<td>".$row['RAZON']."</td>
					<td>".$row['FECHA']."</td>
					<td>".$row['HORA']."</td>
					<td>".$row['TRABAJADOR']."</td>
				</tr>
            </tbody>
          </table>


			";
		}
	}


?>