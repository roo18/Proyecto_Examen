<?php include 'config.php'; ?>
<?php
    $categoria = $_GET["categoria"];
    $SQL = "SELECT * FROM productos WHERE idcategoria LIKE '$categoria';";
    $result = mysql_query($SQL) or die("Couldnt execute query".mysql.error());
    $i = 0;
    while ($fila = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $datos[$i] = array('id' => $fila["id"], 'nombre' => $fila["nombre"], 'descripcion' => $fila["descripcion"], 'precio' => $fila["precio"], 'imagen' => $fila["imagen"], 'oferta' => $fila["oferta"]);
        $i++;
    }
    header('Content-type: application/json');
    echo json_encode($datos);
?>