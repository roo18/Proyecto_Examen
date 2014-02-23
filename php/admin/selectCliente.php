<?php session_start(); ?>
<?php include '../config.php'; ?>
<?php

$idCliente = $_GET["idCliente"];

$SQL = "SELECT * FROM clientes WHERE id = '$idCliente';";
$result = mysql_query($SQL) or die("Couldnt execute query");

$fila = mysql_fetch_array($result, MYSQL_ASSOC);
$datos[0] = array('id' => $fila["id"], 'dni' => $fila["dni"], 'nombre' => $fila["nombre"], 'user' => $fila["user"]);

echo json_encode($datos);

?>
