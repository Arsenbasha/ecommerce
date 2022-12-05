<!DOCTYPE html>
<html>

<head>
    <title>Arsenbasha inc </title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/x-icon" href="assets/icon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css"></style>

</head>
<?php include('conex.php') ?>
<body>
    <!-- we will start with a logo and a search engine -->
    <header>
        <div class="logo-place"><img src="assets/arsen.png"> </div>
        <div class="search">
            <input type="text" id="search" placeholder="Busque aquí">
            <button class="btn-main"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="option-place">
            <div class="items-options" title="Iniciar Sesion"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
            </div>
            <div class="items-options" title="Cerrar Sesion"><i class="fa fa-sign-out" aria-hidden="true"></i></div>
            <div class="items-options" title="Carrito"><i class="fa fa-shopping-basket" aria-hidden="true"></i></div>
        </div>
    </header>
    <div class="nav">
        <li class="categorias">
            <h1>CATEGORIAS</H5>
            <ul>
                <h5> TV</h5>
            </ul>
            <ul>
                <h5>neveras</h5>
            </ul>
            <ul>
                <h5> Ordenadores</h5>
            </ul>
        </li>
    </div>
    <!-- now let's put the body of the page-->
    <div class="contenido">
        <div class="pagina">
          
            <section >
                <div class="itemright">
                <img id = 'img'src="assets/logo.png" alt="title">
                </div> 
                <div class="itemleft">
                    <h1 id='nomProducto'> Title</h1>
                    <h4 id='descProducto'>producto-descripcion</h4>
                    <h5 id='precioProducto'><span>price 00</span></h5>

                </div>    
            </section>
           
            <div class="title-seccion"> Destacados</div>
            <?php
            $consulta1 = "SELECT * from Producto";
            $result1 = mysqli_query($conn, $consulta1);
            $delete = "DELETE FROM user  WHERE cedula = 3"
            ?>
            <div class="lista">
                <?php while ($mostrar1 = mysqli_fetch_array($result1)) {
                ?>
                    <div class="producto-body">
                        <a href="item.php?p<?php echo $mostrar1["IdProducto"] ?> " style="text-decoration: none;">
                            <div class="producto">
                                <img src='<?php echo $mostrar1["img"] ?> '>
                                <div class="producto-title"><?php echo $mostrar1['nomProducto'] ?></div>
                                <div class="producto-descripcion"><?php echo $mostrar1['descProducto'] ?></h1>
                                </div>
                                <div class="producto-precio"> <?php echo $mostrar1['precioProducto'] ?> € </div>
                            </div>
                        </a>
                    </div>
                    <script type="text/javascript"></script>
                <?php
                }
                 mysqli_close($conn)
                ?>
            </div>
            <script type="text/javascript">
                var producto='<?php $_get["p"]; ?>';
            </script>
            




        </div>
    </div>
    </div>
</body>

</html>