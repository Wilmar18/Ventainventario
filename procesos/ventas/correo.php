<?php
require_once '../../clases/Conexion.php';
require_once '../../clases/Correo.php';
$obj = new Correos();
$id = $_POST['id_venta'];
echo $obj->Enviarcorreo($id);
?>