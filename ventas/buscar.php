<?php 
    include '../database/parameters.php';
    
    $nombre = $_POST['nombreP'];

    $sql = "SELECT * FROM PRODUCTOS WHERE NOMBRE LIKE '%$nombre%' AND BUSCAR = 'SI' LIMIT 8";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo "$ ".sprintf("%.2f", $row['PRECIO']); ?></td>
            <td class="text-right"><button class="btn btn-sm btn-success" onclick="agregarProducto(<?php echo $row['ID']; ?>)"><i class="fa fa-plus"></i></button></td>
        </tr>
    <?php }
?>