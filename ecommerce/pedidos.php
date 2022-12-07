<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header('location:index.php');
    # code...
}

?>
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
                echo '<p>' . $_SESSION['nomUser'] .  '</p>';
            ?> <div class="items-options" title="Cerrar Sesion"><a href="exit.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a></div>
            <?php
            } else {

            ?>
                <div class="items-options" title="Iniciar Sesion"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
            <?php
            }
            ?>
            <div class="items-options" title="Carrito"><a href="pedidos.php" style="text-decoration: none;"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a></div>
        </div>
    </header>

    <!-- now let's put the body of the page-->
    <div class="contenido">
        <div class="pagina">
            <h1>Mis pedidos </h1>
            <div class="bodyPedido" id="listaProductos">
                <div class="itemPedido">
                    <div class="imgPedido">
                        <img src="assets/logo.png" alt="">
                    </div>
                    <div class="itemDetail">
                        <h3> titulo</h3>
                        <p> Precio</P>
                        <p>FECHA</p>
                        <p>eSTADO</p>
                        <p>dIRECCION</p>
                        <p>tEL</p>
                        <p></p>
                    </div>
                </div>       
            </div>
            <input class="iptCompra" type="text" id="direccion" placeholder="Ingrese la direccion"><br>
            <input class="iptCompra" type="text" id="tel" placeholder="Ingrese su numero de telefono">
            <br><button>Procesar compra</button>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: 'bbdd/pedidos.php',
                type: 'POST',
                data: {},
                success: function(data) {
                    console.log(data);
                    let html = '';
                    for (var i = 0; i < data.data.length; i++) {
                      /*  if (data.data[i].idProducto == p) {
                            document.getElementById("img").src = data.data[i].img;
                            document.getElementById("nomProducto").innerHTML = data.data[i].nomProducto
                            document.getElementById("stock").innerHTML = data.data[i].stock
                            document.getElementById("precioProducto").innerHTML = data.data[i].precioProducto
                            document.getElementById("descProducto").innerHTML = data.data[i].descProducto
                        }*/
                        html +=
                       '  <div class="itemPedido">' +
                       ' <div class="imgPedido">' +
                       ' <img src="' + data.data[i].img + '" alt="">' +
                       '   </div>' +
                       '<div class="itemDetail">' +
                       ' <h3> ' + data.data[i].nomProducto + '</h3>' +
                       ' <p> ' + data.data[i].precioProducto + ' €</P>' +
                       '  <p>' + data.data[i].fecha + '</p>' +
                       ' <p> ' + data.data[i].estado + '</p>' +
                       ' <p>' + data.data[i].direccion + '</p>' +
                       ' <p>' + data.data[i].tel + '</p>' +
                       ' <p></p>' +
                       ' </div>' ;
                     

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