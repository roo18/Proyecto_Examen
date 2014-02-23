<?php include '../config.php'; ?>
<?php  
    $idProducto = $_POST["idProducto"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    
    $SQL = "UPDATE productos SET nombre ='$nombre', descripcion='$descripcion', precio=$precio WHERE id = $idProducto; ";
    $result = mysql_query($SQL) or die("Couldnt execute query.".mysql.error());
?>
