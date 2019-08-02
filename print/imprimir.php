<?php
	date_default_timezone_set('America/Mexico_City');
	include 'print/database/parameters.php';

	$id = isset( $_GET['id'] ) ? $_GET['id'] : 0;

	$meses = array("0", "ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "NOVIEMBRE", "DICIEMBRE");

	$mesA = date('m');
	$mesA = intval($mesA);
	$mes = $meses[$mesA];

	$ano = date('Y');
	$dia = date('d');

	$hora = "";
	$horaA = date('G');
	$min = date('i');

	$HD = "";

	if($horaA >= 13 ) {
		$HD = "P.M";
	} else {
		$HD = "A.M";
	}

	switch ($horaA) {
		case 13:
			$horaA = 1;
			break;
		case 14:
			$horaA = 2;
			break;
		case 15:
			$horaA = 3;
			break;
		case 16:
			$horaA = 4;
			break;
		case 17:
			$horaA = 5;
			break;
		case 18:
			$horaA = 6;
			break;
		case 19:
			$horaA = 7;
			break;
		case 20:
			$horaA = 8;
			break;
		case 21:
			$horaA = 9;
			break;
		case 22:
			$horaA = 10;
			break;
		case 23:
			$horaA = 11;
			break;

	}

	$hora = "".$horaA.":".$min." ".$HD;

	$fecha = "";
	$fecha = "".$dia." DE ".$mes." DEL ".$ano;


	$sql = "SELECT UPPER(CLIENTES.NOMBRE) AS NOMBRE , UPPER(CLIENTES.DIRECCION) AS DIRECCION, CLIENTES.EMAIL, CLIENTES.TELEFONO, CLIENTES.CELULAR, UPPER(VEHICULOS.PLACA) AS PLACA, UPPER(MARCAS.NOMBRE) AS MARCA, UPPER(VEHICULOS.SUBMARCA) AS SUBMARCA, UPPER(COLORES.NOMBRE) AS COLOR, SERVICIOS.ID FROM CLIENTES INNER JOIN VEHICULOS INNER JOIN SERVICIOS INNER JOIN COLORES INNER JOIN MARCAS WHERE MARCAS.ID = VEHICULOS.MARCA AND CLIENTES.ID = VEHICULOS.CLIENTE AND SERVICIOS.VEHICULO = VEHICULOS.PLACA AND COLORES.ID = VEHICULOS.COLOR AND SERVICIOS.ID = $id";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
	?>
<style>
	@import url('https://fonts.googleapis.com/css?family=Open+Sans');

	.container {
		font-family: 'Open Sans';
	}
</style>


<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		@media print {
			#impre {display:none};
		}	
	</style>
	<meta charset="UTF-8">
	<title>Imprimir</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../../qr/qrcode.js"></script>
	<script src="../../qr/jspdf.js"></script>
	<script src="../../qr/pdfFromHTML.js"></script>
</head>
<body id="toPDF">
	<div class="container" style="padding: 20px;">
		<div class="row">
			<div class="col-md-3">
				<img src="../../img/logonew2.jpg" width="180px;">
			</div>
			<div class="col-md-3">
				<div class="text-center" style="font-size: 90%;">
					<strong>SERVICIO AUTOMOTRIZ DIAZ</strong>
					<strong>MOCTEZUMA NO. 729 COL. FLORIDA</strong>
					<strong>OCOTLAN, JALISCO.</strong>
				</div>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-4" style="text-align: right;">
				<table class="table table-bordered text-center" style="font-size: 80%; border-collapse: collapse">
					<tr>
						<th style="padding: 6px;" colspan="2"><strong>FECHA Y HORA DE EXPEDICION:</strong></th>
					</tr>
					<tr>
						<td style="padding: 3px;"><?php echo $fecha ?></td>
						<td style="padding: 3px;"><?php echo $hora ?></td>
					</tr>
					<tr>
						<th style="padding: 6px;" colspan="2"><strong>DATOS DEL SERVICIO</strong></th>
					</tr>
					<tr>
						<td style="padding: 3px;">SERVICIO: <?php echo $row['ID']; ?></td>
						<td style="padding: 3px;">VENTA: <?php echo $row['VENTA']; ?></td>
						<?php $idVenta = $row['VENTA'] ?>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
				<table class="table-bordered table" style="font-size: 90%;">
					<tr><td style="padding: 6px; text-align: center;"><strong>DATOS DEL CLIENTE</strong></td></tr>
					<tr><td style="padding: 6px;"><strong>NOMBRE: </strong><?php echo $row['NOMBRE'] ?></td></tr>
					<tr><td style="padding: 6px;"><strong>DIRECCION: </strong><?php echo $row['DIRECCION'] ?></td></tr>
					<tr><td style="padding: 6px;"><strong>EMAIL: </strong><?php echo $row['EMAIL'] ?></td></tr>
					<tr><td style="padding: 6px;"><strong>TELEFONO: </strong><?php echo $row['TELEFONO'] ?></td></tr>
					<tr><td style="padding: 6px;"><strong>CELULAR:  </strong><?php echo $row['CELULAR'] ?></td></tr>
				</table>
			</div>
			<div class="col-md-6">
				<table class="table-bordered table" style="font-size: 90%;">
					<tr><td style="padding: 6px; text-align: center;"><strong>DATOS DEL VEHICULO</strong></td></tr>
					<tr><td style="padding: 6px;"><strong>PLACA: </strong><?php echo $row['PLACA'] ?></td></tr>
					<tr><td style="padding: 6px; text-align: center;"><img src="print/assets/img/logos/<?php echo $row['MARCA']; ?>.jpg" height="70px"></td></tr>
					<tr><td style="padding: 6px;"><strong>SUBMARCA: </strong><?php echo $row['SUBMARCA'] ?></td></tr>
					<tr><td style="padding: 6px;"><strong>COLOR: </strong><?php echo $row['COLOR'] ?></td></tr>
				</table>
			</div>
			<?php } ?>
			<?php $sql = "SELECT DETALLE.PRODUCTO, DETALLE.CANTIDAD, PRODUCTOS.PRECIO, UPPER(PRODUCTOS.NOMBRE) AS NOMBRE, (PRODUCTOS.PRECIO * DETALLE.CANTIDAD) AS TOTAL FROM PRODUCTOS INNER JOIN DETALLE INNER JOIN SERVICIOS WHERE DETALLE.PRODUCTO = PRODUCTOS.ID AND SERVICIOS.ID = DETALLE.SERVICIO AND SERVICIOS.ID = $id" ?>
			<?php $result = $conn->query($sql); ?>
		</div>
		<div style="height: 700px; border: 1px solid #DFDFDF; padding: 5px;">
			<table class="table table-bordered table-sm">
				<thead>
					<th>CODIGO</th>
					<th>DESCRIPCION</th>
					<th>CANTIDAD</th>
					<th>PRECIO</th>
					<th class="text-right">TOTAL</th>
				</thead>
				<tbody style="font-size: 90%;">
					<?php $total = 0; ?>
			<?php while ($row = $result->fetch_assoc()) {  ?>
					<tr style="font-size: 80%;">
						<td width="10%"><?php echo $row['PRODUCTO']; ?></td>
						<td><?php echo $row['NOMBRE']; ?></td>
						<td width="10%"><?php echo sprintf("%.2f", $row['CANTIDAD']); ?></td>
						<td width="10%">$ <?php echo sprintf("%.2f", $row['PRECIO']); ?></td>
						<td width="15%" class="text-right"><strong>$ <?php echo sprintf("%.2f", $row['TOTAL']); ?></strong></td>
						<?php $total = $total+$row['TOTAL'] ?>
					</tr>
			<?php } ?>
				</tbody>
			</table>
			
		</div>
		<br>
		<div class="row">
			<div class="col-md-8">
				<div id="qrSpace"></div>
			</div>
			<div class="col-md-4">
				<table class="table table-bordered">
					<tr>
						<td><div class="row"><div class="col-7"><strong>SUBTOTAL: </strong></div><div class="col-5" style="text-align: right;"><?php echo "$ ".sprintf("%.2f", $total); ?></div></div></div></td>
					</tr>
					<tr>
						<td><div class="row"><div class="col-7"><strong>% DESC: </strong></div><div class="col-5" style="text-align: right;">0.00 %</div></div></div></td>
					</tr>
					<tr>
						<td><div class="row"><div class="col-7"><strong>TOTAL: </strong></div><div class="col-5" style="text-align: right;"><?php echo "$ ".sprintf("%.2f", $total); ?></div></div></div></td>
					</tr>
				</table>
			</div>
		</div>-->
	</div>
</body>
<br>
<script>
	update_qrcode("<?php echo $id ?>");
	window.print();
</script>

<?php 
	$sql = "UPDATE SERVICIOS SET SERVICIOS.STATUS = 1 WHERE SERVICIOS.ID = $id";
	$conn->query($sql);
 ?>
</html>