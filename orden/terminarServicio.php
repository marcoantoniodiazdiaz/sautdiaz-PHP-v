<?php 
 session_start();
  date_default_timezone_set('America/Mexico_City');
  if($_SESSION['username'] == null || $_SESSION['username'] == ""){
    ?>
    <script>
      window.location = "../login.php"
    </script>
    <?php
  }
  include 'parameters.php';
  $conn = new mysqli($dbserver, $dbuser, $dbpassword, $dbname);

  $id = isset( $_GET['id'] ) ? $_GET['id'] : 0;
  /*$sql = "UPDATE SERVICIO SET ESTADO = '2' WHERE ID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }*/

    ?>
    <script>
      var link = "../ventas/index.php?id="+<?php echo $id;?>;
      window.location = link;
    </script>
    <?php


?>