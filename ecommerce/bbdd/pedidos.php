<?php
include('conex.php');
$response = new stdClass();
$data = [];
$i = 0;
function estadoLog($id)
{
    switch ($id) {
        case '1':
            return 'Por procesar';
            break;
            case '0':
                return 'Por procesar';
                break;
        default:
            # code...
            break;
    }
}
$consulta1 = "SELECT * from pedido ped inner join Producto pro on ped.IdProducto=pro.IdProducto where estado=1";
$result = mysqli_query($conn, $consulta1);
while ($mostrar1 = mysqli_fetch_array($result)) {
    $obj = new stdClass();
    $obj->idPedido = $mostrar1['idPedido'];
    $obj->idProducto = $mostrar1['IdProducto'];
    $obj->nomProducto = $mostrar1['nomProducto'];
    $obj->img = $mostrar1['img'];
    $obj->fecha = $mostrar1['fecha'];
    $obj->estado = estadoLog($mostrar1['estado']);
    $obj->direccion = $mostrar1['direccionUser'];
    $obj->tel = $mostrar1['telUser'];
    $obj->precioProducto = $mostrar1['precioProducto'];
    $data[$i] = $obj;
    $i++;
}
$response->data = $data;
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);

