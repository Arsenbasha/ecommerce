<?php
include('conex.php');
$response=new stdClass();
$data=[];
$i=0;
$consulta1 = "SELECT * from Producto where stock>1";
$result = mysqli_query($conn, $consulta1);
while($mostrar1=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->idProducto=$mostrar1['IdProducto'];
	$obj->nomProducto=$mostrar1['nomProducto'];
	$obj->img=$mostrar1['img'];
	$obj->descProducto=$mostrar1['descProducto'];
	$obj->precioProducto=$mostrar1['precioProducto'];
	$obj->stock=$mostrar1['stock'];
	$data[$i]=$obj;
	$i++;
}
$response->data=$data;
mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);
 