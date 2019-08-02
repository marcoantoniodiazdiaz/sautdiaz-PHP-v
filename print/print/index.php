<?php 
	include 'database/parameters.php';
	$id_service = $_GET['id'];
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Nota de Remison</title>

 	<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 </head>
 <body>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<div class="main-content">
 		<div class="container-fluid mt--7">
 			<div class="card shadow">
		 		<div class="card-header">
		 			<div class="row">
		 				<div class="col-4">
		 					<img src="logo.jpg" width="200px">
		 				</div>
		 				<div class="col-3 text-center">
		 					SERVICIO AUTOMOTRIZ DIAZ <br>
		 					MOCTEZUMA #729 COL. FLORIDA <br>
		 					OCOTLAN, JALISCO.
		 				</div>
		 				<div class="col-5 text-right">
		 					<div class="card shadow">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-0">Departamentos</h3>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button class="btn btn-success btn-sm" (click)="VerAgregar =! VerAgregar">Añadir Departamento</button>
                    </div>
                </div>
            </div>
            <div class="">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr *ngFor="let item of Departamento">
                            <th scope="row">
                                {{ item['ID'] | capitalize }}
                            </th>
                            <td>
                                {{ item['NOMBRE'] | capitalize }}
                            </td>
                            <td class="text-right">
                                <button class="btn btn-danger btn-sm" (click)="borrar(item['ID'])">Borrar</button>
                                <button class="btn btn-primary btn-sm">Editar</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
		 				</div>
		 			</div>
		 		</div>
		 		<div class="card-body">

		 		</div>

	 		</div>

 		</div>
 	</div>
 </body>
 </html>