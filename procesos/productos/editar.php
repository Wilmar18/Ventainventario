<?php
require_once '../../clases/Producto.php';
require_once '../../clases/Conexion.php';
$id = $_POST['id_producto'];
$nombre = $_POST['txtnombree'];
$txtprecioc = $_POST['txtprecioce'];
$txtpreciov = $_POST['txtpreciove'];
$txtstock = $_POST['txtstocke'];
$txtdespacho =$_POST['txtdespachoe'];
$txtproveedor = $_POST['txtproveedore'];
$txtcategoria = $_POST['txtcategoriae'];
$txtstockminimo = $_POST['txtstockminimoe'];
$datos = array($id,$nombre,$txtprecioc,$txtpreciov,$txtstock,$txtdespacho,$txtproveedor,$txtcategoria,$txtstockminimo);
$obj = new Producto();
echo $obj->edit($datos);
?>