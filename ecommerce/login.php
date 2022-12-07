<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inicar sesión </title>
    <meta name="Arsenbasha inc" content="" charset="utf-8">
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
        
    </header>

    <!-- now let's put the body of the page-->
    <div class="contenido">
        <div class="pagina">
            <form action="bbdd/login.php" class="initSesion" method="POST">
                <h1>Iniciar sesión</h1>
                <input class="formEmail" type="email" name="emailUser" placeholder="Ingrese su correo">
                <input class="formPs" type="password" name="passwordUser" placeholder="Ingrese su contraseña ">

                <?php
                if (isset($_GET['err'])) {
                    switch ($_GET['err']) {
                        case '1':
                            echo ' <p> error de conexion</p>';
                            break;
                        case '2':
                            echo ' <p> Correo incorrecto</p>';
                            break;
                        case '3':
                            echo ' <p> Contraseña incorrecta</p>';
                            break;
                        
                        default:
                            break;
                    }
      
                }
                ?>
                <button type="submit">Ingresar</button>

            </form>
            </div>
        </div>
    </div>
    
</body>

</html>