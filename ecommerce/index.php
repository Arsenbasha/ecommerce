<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <title>Arsenbasha inc </title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="jquery-3.6.1.min.js"></script>
    <link rel="icon" type="image/x-icon" href="assets/icon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css"></style>

</head>
<?php include('bbdd/conex.php') ?>

<body>
    <!-- we will start with a logo and a search engine -->
    <header>
        <div class="logo-place"><a href="index.php"><img src="assets/arsen.png"> </a></div>
        <div class="search">
            <input type="text" id="search" placeholder="Busque aquí">
            <button class="btn-main"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="option-place">
            <?php
            if (isset($_SESSION['idUser'])) {
                echo '<h3>' .$_SESSION['nomUser'].  '</h3>';
            ?> <div class="items-options" title="Cerrar Sesion"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
            <?php
            } else {

            ?>
                <div class="items-options" title="Iniciar Sesion"><a href="exit.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>
            <?php
            }

            ?>


            <div class="items-options" title="Carrito"><a href="pedidos.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></div>
        </div>
    </header>

    <!-- now let's put the body of the page-->
    <div class="contenido">
        <div class="pagina">
            <div class="title-seccion">
                <h1>Destacados</h1>
            </div>
            <div class="lista" id="listaProductos">
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'bbdd/productos.php',
                type: 'POST',
                data: {},
                success: function(data) {
                    console.log(data);
                    let html = '';
                    for (var i = 0; i < data.data.length; i++) {
                        html +=
                            ' <div class="producto-body">' +
                            '   <a href="item.php?p=' + data.data[i].idProducto + ' " style="text-decoration: none;">' +
                            '       <div class="producto">' +
                            '           <img src="' + data.data[i].img + '"> ' +
                            '           <div class="producto-title">' + data.data[i].nomProducto + '</div>' +
                            '           <div class="producto-descripcion"> ' + data.data[i].descProducto + '</div>' +
                            '           <div class="producto-precio">' + data.data[i].precioProducto + ' €</div>' +
                            '       </div>' +
                            '   </a>' +
                            ' </div> ';

                    }
                    document.getElementById("listaProductos").innerHTML = html
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });
    </script>
</body>

</html>