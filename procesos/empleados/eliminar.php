<?php
require_once '../../clases/Empleados.php';
require_once '../../clases/Conexion.php';
$id = $_GET['id'];
echo $id;
$obj = new Empleados();
echo json_encode($obj->marcar_empleado($id));
?>