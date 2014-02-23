<?php include '../config.php'; ?>
<?php
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $oferta = $_POST["oferta"];
    $idCategoria = $_POST["idCategoria"];
    
    $SQL = "INSERT INTO productos (nombre, descripcion, precio, oferta, idCategoria) VALUES ('$nombre','$descripcion',$precio,$oferta,$idCategoria);";
    $result = mysql_query($SQL) or die('Couldnt execute query');           
?>
