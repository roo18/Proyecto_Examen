<?php include 'config.php'; ?>
<?php
    $SQL = "SELECT * FROM categorias;";
    $result = mysql_query($SQL) or die("Couldnt execute query".mysql.error());
    $i = 0;
    while($fila = mysql_fetch_array($result, MYSQL_ASSOC)){
        $datos[$i] = array('id' => $fila["id"],'nombre' => $fila["nombre"]);
        $i++;
    }
    header('Content-type: application/json');
    echo json_encode($datos);
?>
