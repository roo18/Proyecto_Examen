<?php include 'config.php'; ?>
<?php
    $SQL = "SELECT * FROM productos;";
    $result = mysql_query($SQL) or die("Couldnt execute query." . mysql_error());
    $i = 0;
    while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $datos[$i] = array('id' => $fila["id"], 'nombre' => $fila["nombre"], 'descripcion' => $fila["descripcion"], 'precio' => $fila["precio"], 'imagen' => $fila["imagen"], 'oferta' => $fila["oferta"]);
        $i++;
    }
    header('Content-type: application/json');
    echo json_encode($datos);
?>
