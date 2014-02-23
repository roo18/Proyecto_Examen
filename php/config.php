<?php
// Connection's Parameters
    $db_host = "localhost";
    $db_name = "pcstore";
    $username = "root";
    $password = "";
    
    $db_con = mysql_connect($db_host, $username, $password);
    $connection_string = mysql_select_db($db_name);
    
    // Connection
    mysql_connect($db_host, $username, $password) or die("Connection Error:");
    mysql_select_db($db_name) or die("Error connecting db");
?>