<?php session_start(); ?>
<?php include 'config.php'; ?>
<?php
    
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    
    $SQL = "SELECT id FROM clientes WHERE user = '$user' AND pass = '$pass';";
    $result = mysql_query($SQL) or die ("Couldnt execute query");
    
    $numRows=mysql_num_rows($result);
	
    if($numRows==1){
	$fila=mysql_fetch_array($result,MYSQL_ASSOC);
	$_SESSION["idCliente"]=$fila["id"];
	
	echo 'indexLog.php';
    }
    else{        
       
        
    };
?>
