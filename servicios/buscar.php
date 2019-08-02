<?php 
	include '../../database/parameters.php';

	$cadena = $_POST['cadena'];

	$sql = "SELECT SERVICIO.ID AS S_ID, VENTAS.ID AS V_ID, CLIENTES.NOMBRE, SERVICIO.FECHA, SERVICIO.HORA, TRABAJADORES.NOMBRE AS TRABAJADOR, SERVICIO.ESTADO, SERVICIO.PAGADA, COCHES.MARCA, COCHES.SUBMARCA FROM SERVICIO INNER JOIN VENTAS INNER JOIN CLIENTES INNER JOIN TRABAJADORES INNER JOIN COCHES WHERE VENTAS.ID = SERVICIO.VENTA AND CLIENTES.ID = VENTAS.CLIENTE AND TRABAJADORES.ID = SERVICIO.TRABAJADOR AND SERVICIO.COCHE = COCHES.PLACA AND (COCHES.MARCA LIKE '%".$cadena."%' OR COCHES.SUBMARCA LIKE '%".$cadena."%' OR CLIENTES.NOMBRE LIKE '%".$cadena."%') ORDER BY SERVICIO.FECHA DESC, SERVICIO.HORA DESC";

	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) { 
		if($row['ESTADO']==2){ ?>
			<tr>
            	<td><?php echo $row['S_ID']; ?></td>
            	<td><button class="btn btn-sm btn-success" onclick="verVenta(<?php echo $row['S_ID']; ?>)">Ver Venta</button></td>
            	<td><?php echo $row['NOMBRE']; ?></td>
            	<td><?php echo $row['MARCA']." ".$row['SUBMARCA'] ; ?></td>
            	<td><?php echo "".$row['FECHA']." ".$row['HORA'].""; ?></td>
            	<td><?php echo $row['TRABAJADOR']; ?></td>  
            	<td style="text-align: center;"><button class="btn btn-sm btn-danger" onclick="borrar(<?php echo $row['V_ID']; ?>)">Borrar</button></td>
            <?php 
              $imagen = "";
              if($row['PAGADA'] == 0) {
                $imagen = "tache.png";
              } else {
                $imagen = "si.png";
              }

            ?>
            	<td style="text-align: center; cursor: pointer;"><img src="../../img/estados/<?php echo $imagen ?>" width="30px" onclick="change(<?php echo $row['S_ID']; ?>)"></td>
			</tr>
	
	<?php echo $sql; ?>

	<?php } } ?>
