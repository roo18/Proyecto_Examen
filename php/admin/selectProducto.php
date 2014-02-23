<?php include '../config.php'; ?>
<?php
    $idProducto = $_GET["idProducto"];
    $SQL = "SELECT * FROM productos WHERE id LIKE '$idProducto';";
    $result = mysql_query( $SQL ) or die("Couldnt execute query.");
    $fila=mysql_fetch_array($result,MYSQL_ASSOC);
    $datos[0]=array('id' => $fila["id"], 'nombre' => $fila["nombre"], 'descripcion' => $fila["descripcion"], 'precio' => $fila["precio"], 'imagen' => $fila["imagen"], 'oferta' => $fila["oferta"]);
    echo json_encode($datos);
?>
