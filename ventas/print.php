<?php 
    session_start();
    include 'parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);

    
?>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
<link href="pricing.css" rel="stylesheet">
<br>
<br>
<div class="container" style="text-align: center;">
    <div class="row">
        <div class="col-md-3"><img src="/img/logocolored.jpg" alt="" width="200px"></div>
        <div class="col-md-6">&nbsp</div>
        <div class="col-md-3">
            <p>Servicio Automotriz Diaz
            <span class="badge badge-success">Venta: 19234</span></p>
        </div>
    </div>
</div>