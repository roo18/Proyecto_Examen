<?php include '../config.php'; ?>
<?php
    $idProducto = $_GET["idProducto"];
    
    $SQL = "DELETE FROM productos WHERE id =$idProducto;";
    $result = mysql_query($SQL) or die('Couldnt execute query');

?>
