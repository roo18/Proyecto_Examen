<?php session_start(); ?>
<?php if (!isset($_SESSION["idCliente"])) { ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title></title>
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="lib/jquery/js/jquery-2.0.3.min.js" type="text/javascript"></script>
        <script src="lib/bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="lib/jquery/js/jquery-2.0.3.min.js" type="text/javascript"></script>
        <link href="css/estilo.css" type="text/css" rel="stylesheet" media="screen" />
        <script type="text/javascript" >
            $(document).ready(function() {
                $.ajax({
                    dataType: 'json',
                    url: 'php/productos.php',
                    type: 'GET',
                    success: function(data) {
                        var datos = '<h3>Todos los productos</h3><table class="table"><thead><tr><td>id</td><td>nombre</td><td>descripcion</td><td>precio</td></tr></thead><tbody>';
                        $.each(data, function(index) {
                            datos += '<tr><td>' + data[index].id + '</td><td>' + data[index].nombre + '</td><td>' + data[index].descripcion + '</td><td>' + data[index].precio + '</td></tr>';
                        });
                        datos += '</tbody></table>';
                        $('#contenido').html(datos);
                    }
                });
            });

            $(document).ready(function() {
                $.ajax({
                    dataType: 'json',
                    url: 'php/categorias.php',
                    type: 'GET',
                    success: function(data) {
                        var datos = '<h3>CATEGORIAS</h3><ul>';
                        $.each(data, function(index) {
                            datos += '<li><a href="./productos.php?categoria=' + data[index].id + '">' + data[index].nombre + '</a></li>';
                        });
                        datos += '</ul>';
                        $('#menu').html(datos);
                    }
                });
            });

            //CONECTAR
            function conectar() {
                var datosConexion = $('#loginForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'php/validacion.php',
                    data: datosConexion,
                    success: function(url) {
                        window.location = url;
                    }
                });
            }

        </script>
    </head>
    <body>
        <div id="container">
            <div id="cabecera">
                <div id="logo">
                    <h1><a href="./index.php">Proyecto Examen</a></h1>
                </div>
                <div id="login">
                    <form id="loginForm">
                        User: <input name="user" /> 
                        Pass: <input name="pass" /> 
                        <button type="button" onclick="conectar()">Accept</button>
                    </form>
                </div>
            </div>
            <div id="menu"></div>
            <div id="contenido"></div>
            <div class="clear"></div>
            <div id="pie">
                <a href="./adminProductos.php">Acceso Admin</a>
            </div>
        </div>
    </body>
</html>
<?php
} else {
    ?>
    <script type="text/javascript">
        window.location = 'indexLog.php';
    </script>
       <?php
}
?>