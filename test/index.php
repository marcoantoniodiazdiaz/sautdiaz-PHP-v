<?php

	date_default_timezone_set ('America/Mexico_City');

	include 'database/parameters.php'; 
	
	// function getLastWeekDates() {
	//     $lastWeek = array();
	 
	//     $prevMon = abs(strtotime("previous monday"));
	//     $currentDate = abs(strtotime("today"));
	//     $seconds = 86400; //86400 seconds in a day
	 
	//     $dayDiff = ceil( ($currentDate-$prevMon)/$seconds ); 
	 
	//     if( $dayDiff < 7 )
	//     {
	//         $dayDiff += 1; //if it's monday the difference will be 0, thus add 1 to it
	//         $prevMon = strtotime( "previous monday", strtotime("-$dayDiff day") );
	//     }
	 
	//     $prevMon = date("Y-m-d",$prevMon);
	 
	//     // create the dates from Monday to Sunday
	//     for($i=0; $i<7; $i++)
	//     {
	//         $d = date("Y-m-d", strtotime( $prevMon." + $i day") );
	//         $lastWeek[]=$d;
	//     }

 //    	return $lastWeek;
	// }


	// $last_week = array();
	// for ($i=0; $i < 6; $i++) { 
	// 	$last_week[$i] = getLastWeekDates()[$i];
	// }

	// $this_week = array();

	// for ($i=0; $i < 6; $i++) {
	// 	$date = getLastWeekDates()[$i];
	// 	$mod_date = strtotime($date."+ 1 week");
	// 	$this_week[$i] = date("Y-m-d",$mod_date);
	// }

	// $trabajador = array('nombre' => 'DANIEL', 'pago' => 120.0);

	// $arrayName = array();

	// for ($i=0; $i < 4; $i++) { 
	// 	array_push($arrayName, $trabajador);
	// }

	// echo json_encode($arrayName);

	//echo "RETORNA: " . date('t');

	$dias = date('d');
	$parser = date('Y-m-');

	$entradas = array();
	$salidas = array();

	do {
		$sql = "SELECT SUM(OPERACION.CANTIDAD) AS ENTRADAS FROM OPERACION WHERE OPERACION.TIPO = 0 AND CAST(OPERACION.FECHA AS DATE) = '" . $parser . $dias ."'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			array_push($entradas, $row['ENTRADAS']);
		}
		$sql = "SELECT SUM(OPERACION.CANTIDAD) AS SALIDAS FROM OPERACION WHERE OPERACION.TIPO = 1 AND CAST(OPERACION.FECHA AS DATE) = '" . $parser . $dias ."'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			array_push($salidas, $row['SALIDAS']);
		}
		$dias--;
	} while($dias != 0);

	$entradas = array_reverse($entradas);
	$salidas = array_reverse($salidas);
	$totales = array();
	for ($i=0; $i < sizeof($entradas); $i++) { 
		array_push($totales, $entradas[$i] - $salidas[$i]);
	}
	echo json_encode($totales);


	

 ?>