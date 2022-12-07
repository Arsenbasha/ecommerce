
<?php
include('conex.php');

session_start();
$response = new stdClass();
$emailUser = $_POST["emailUser"];
$sql = "Select * from usuario where emailUser='$emailUser'";
$result = mysqli_query($conn, $sql);
$consulta = mysqli_fetch_array($result);
if ($result) {
    $count=mysqli_num_rows($result) ;
    if ($count!= 0) {
        $passworUser = $_POST["passwordUser"];
     
        if ($consulta['passwordUser'] != $passworUser) {
            //error password 
            header('Location: ../login.php?err=3');
        } else {
            $_SESSION['idUser']=$consulta['idUser'];
            $_SESSION['emailUser']=$consulta['emailUser'];
            $_SESSION['nomUser']=$consulta['nomUser'];
            header('Location:../');
        }
    } else {
        //error email 
        header('Location: ../login.php?err=2');
    }
} else {
    //error conexion 
    header('Location: ../login.php?err=1');
}

if (!isset($_SESSION['idUser'])) {
    $response->state = false;
    $response->log = "no ha iniciado seccion ";
    $response->openLogin = true;
} else {
    $response->state = true;
    $response->log = "proceder compra";
}
//mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);
?>

