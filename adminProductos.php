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
                $.ajax({
                    dataType: 'json',
                    url: 'php/productos.php',
                    type: 'GET',
                    success: function(data) {
                        var datos = '<h3>ADMIN productos <button class="btn btn-xs btn-info"  data-toggle="modal" data-target="#modalInsert">INSERT</button></h3><table class="table"><thead><tr><td>id</td><td>nombre</td><td>descripcion</td><td>precio</td><td>EDIT</td></tr></thead><tbody>';
                        $.each(data, function(index) {
                            datos += '<tr><td>' + data[index].id + '</td><td>' + data[index].nombre + '</td><td>' + data[index].descripcion + '</td><td>' + data[index].precio + '</td><td><button class="btn btn-xs btn-info" onclick="cargarUpdateModal(' + data[index].id + ')" data-toggle="modal" data-target="#modalUpdate">EDIT</button><button class="btn btn-xs btn-danger" onclick="borrar(' + data[index].id + ')">DELETE</button></td></tr>';
                        });
                        datos += '</tbody></table>';
                        $('#contenido').html(datos);
                    }
                });
            });

            //CARGAR FORMULARIO
            function cargarUpdateModal(idProducto) {
                $.ajax({
                    dataType: 'json',
                    url: 'php/admin/selectProducto.php?idProducto=' + idProducto,
                    type: 'GET',
                    success: function(data) {
                        var index = 0;
                        var datos = '<form id="updateForm">Nombre:<input class="form-control hidden" name="idProducto" value="' + data[index].id + '" />Nombre:<input class="form-control" name="nombre" value="' + data[index].nombre + '" />Descripcion:<input class="form-control" name="descripcion" value="' + data[index].descripcion + '" />Precio:<input class="form-control" name="precio" value="' + data[index].precio + '" />                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="update()">Save changes</button></form>';
                        $('#updateContainer').html(datos);
                    }
                });
            }
            ;

            //ACTUALIZAR
            function update() {
                var productoActualizado = $('#updateForm').serialize();
                $.ajax({
                    url: 'php/admin/updateProducto.php',
                    type: 'POST',
                    data: productoActualizado,
                    success: function() {
                        refresh();
                    }
                });
            }
            ;

            //DELETE
            function borrar(idProducto) {
                $.ajax({
                    type: 'GET',
                    url: 'php/admin/deleteProducto.php?idProducto=' + idProducto,
                    success: function() {
                        refresh();
                    }
                });
            }
            
            //INSERTAR
            function insertar(){
                var productoInsertar = $('#insertForm').serialize();
                $.ajax({
                    type:'POST',
                    url:'php/admin/insertProducto.php',
                    data: productoInsertar,
                    success: function(){
                        refresh();
                    }
                })
            }

            function refresh() {
                document.location.reload(true);
            }



        </script>
    </head>
    <body>
        <div id="container">
            <div id="cabecera">
                <h1><a href="./index.php">Proyecto Examen</a></h1>
            </div>
            <div id="menu"></div>
            <div id="contenido"></div>
            <div class="clear"></div>
            <div id="pie"></div>
        </div>
    </body>
</html>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Update producto</h4>
            </div>
            <div class="modal-body" id="updateContainer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Insert producto</h4>
            </div>
            <div class="modal-body" id="insertContainer">
                <form id="insertForm">
                    Nombre:<input class="form-control" name="nombre" />
                    Descripcion:<input class="form-control" name="descripcion" />
                    Precio:<input class="form-control" name="precio" />
                    Oferta:<input class="form-control" name="oferta" />
                    idCategoria:<input class="form-control" name="idCategoria" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="insertar()">Insert</button>
                </form>
            </div>
        </div>
    </div>
</div>