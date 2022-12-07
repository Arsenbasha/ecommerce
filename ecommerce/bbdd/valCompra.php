
<?php
session_start();
$response=new stdClass();

if (!isset($_SESSION['idUser'])) {
    $response->state = false;
    $response->log = "no ha iniciado sesion ";
    $response->openLogin = true;
} else {
    include_once('./conex.php');
    $idUser = $_SESSION['idUser'];
    $IdProducto = $_POST['idProducto'];
    $consulta = "INSERT INTO pedido
    (idUser,IdProducto,fecha,direccionUser,telUser,estado)
    VALUES
    ($idUser,$IdProducto,now(),'','',1)";
    $result = mysqli_query($conn, $consulta);
    if ($result) {
        $response->state = true;
        $response->log = "producto agregado ";
    }else {
        $response->state = false;
        $response->log = "producto no agregado";
    }
    mysqli_close($conn);
} 
//mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);
 ?>

