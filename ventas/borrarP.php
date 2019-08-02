<?php 
    session_start();
    include '../database/parameters.php';
    $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);
    $servicio = isset( $_GET['serv'] ) ? $_GET['serv'] : 0;
    $id_producto = isset( $_GET['id_p'] ) ? $_GET['id_p'] : 0;
    $id_venta = isset( $_GET['id_v'] ) ? $_GET['id_v'] : 0;
    //header('Location: index.php?id='.$servicio);
    
    $sql = "DELETE FROM DETALLEDEVENTA WHERE IDPRODUCTO = $id_producto AND VENTA = $id_venta";
    $conn->query($sql);

    ?>
    <script>
        window.history.back();
    </script>
    <?php


?>