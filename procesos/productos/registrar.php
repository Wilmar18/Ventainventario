<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['txtnombre'];
$txtprecioc = $_POST['txtprecioc'];
$txtpreciov = $_POST['txtpreciov'];
$txtstock = $_POST['txtstock'];
$txtdespacho = $_POST['txtdespacho'];
$txtproveedor = $_POST['txtproveedor'];
$txtcategoria = $_POST['txtcategoria'];
$txtstockminimo= $_POST['txtstockminimo'];
$datos = array($nombre,$txtprecioc,$txtpreciov,$txtstock,$txtdespacho,$txtproveedor,$txtcategoria,$txtstockminimo);
$obj = new Producto();
echo $obj->save($datos);
?>