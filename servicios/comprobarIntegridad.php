<?php 
	include '../database/parameters.php';

	$ventas = array();

	$sql = "SELECT ID FROM VENTAS";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		array_push($ventas, $row['ID']);
	}

	$cont = count($ventas);

	while ($cont != 0) {
		$sql = "SELECT SUM(ABONOS.CANTIDAD) AS ABONADO FROM ABONOS WHERE ABONOS.VENTA = ".$ventas[$cont - 1]."";
		$result = $conn->query($sql);
		$abonado = 0.00;
		while ($row = $result->fetch_assoc()) {
			$abonado = $abonado + $row['ABONADO'];
		}

		$sql = "SELECT SUM(DETALLEDEVENTA.CANTIDAD * PRODUCTOS.PRECIO) AS TOTAL FROM DETALLEDEVENTA INNER JOIN PRODUCTOS WHERE PRODUCTOS.ID = DETALLEDEVENTA.IDPRODUCTO AND DETALLEDEVENTA.VENTA = ".$ventas[$cont - 1]."";
		$result = $conn->query($sql);
		$total = 0.00;
		while ($row = $result->fetch_assoc()) {
			$total = $total + $row['TOTAL'];
		}

		if ($total == $abonado) {
			$conn->query("UPDATE SERVICIO SET PAGADA = 1 WHERE VENTA = ".$ventas[$cont - 1]."");
		} else {
			$conn->query("UPDATE SERVICIO SET PAGADA = 0 WHERE VENTA = ".$ventas[$cont - 1]."");
		}

		$cont = $cont-1;
	}
	

 ?>