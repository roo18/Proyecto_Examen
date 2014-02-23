<?php session_start(); ?>
<?php if (isset($_SESSION["idCliente"])) { ?>
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
            //PRODUCTOS SEGUN CATEGORIA
            $(document).ready(function() {
                categoria = "<?php echo $categoria = $_GET["categoria"]; ?>";
                $.ajax({
                    dataType: 'json',
                    url: 'php/productoCategoria.php?categoria=' + categoria,
                    type: 'GET',
                    success: function(data) {
                        var datos = '<h3>Productos categoria:' + categoria + '</h3><table class="table"><thead><tr><td>id</td><td>nombre</td><td>descripcion</td><td>precio</td></tr></thead><tbody>';
                        $.each(data, function(index) {
                            datos += '<tr><td>' + data[index].id + '</td><td>' + data[index].nombre + '</td><td>' + data[index].descripcion + '</td><td>' + data[index].precio + '</td></tr>';
                        });
                        datos += '</tbody></table>';
                        $('#contenido').html(datos);
                    }
                });
            });
            //CATEGORIAS
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
            //FIN CATEGORIAS
            //SELECT CLIENTE
            $(document).ready(function() {
                var idCliente = <?php echo $_SESSION["idCliente"]; ?>;

                $.ajax({
                    dataType: 'json',
                    type: 'GET',
                    url: 'php/admin/selectCliente.php?idCliente=' + idCliente,
                    success: function(data) {
                        var index = 0;
                        var datos = 'Bienvenido, eres usuario ' + data[index].nombre + ' <button type="button" onclick="desconectar()"> Log-out</button>';
                        $('#login').html(datos);
                    }
                });
            });

            function desconectar() {
                $.ajax({
                    url: 'php/desconectar.php',
                    success: function() {
                        window.location = "index.php";
                    }
                });
            }
            ;

        </script>
    </head>
    <body>
        <div id="container">
            <div id="cabecera">
                <div id="logo">
                    <h1><a href="./index.php">Proyecto Examen</a></h1>
                </div>
                <div id="login">

                </div>
            </div>
            <div id="menu"></div>
            <div id="contenido"></div>
            <div class="clear"></div>
            <div id="pie"><a href="./adminProductos.php">Acceso Admin</a></div>
        </div>
    </body>
</html>
<?php
} else {
    ?>
    <script type="text/javascript">
        alert("ACCESO DENEGADO");
        window.location = 'index.php';
    </script>
       <?php
}
?>