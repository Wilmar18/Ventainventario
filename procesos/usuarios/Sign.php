<?php
session_start();
require_once '../../clases/Usuario.php';
require_once '../../clases/Conexion.php';
$nombre = $_POST['inputNombre'];
$apellido = $_POST['inputApellido'];
$usuario = $_POST['inputUser'];
$clave = $_POST['inputContra'];
$tipo = $_POST['inputTipo'];
$datos = array($usuario,$clave,$tipo,$nombre,$apellido);
$obj = new Usuario();
echo $obj->Signin($datos);
?> 