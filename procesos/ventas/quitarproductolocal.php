<?php
session_start();
$index = $_POST['ind'];
unset($_SESSION['tablacomprastemplocal'][$index]);
$datos=array_values($_SESSION['tablacomprastemplocal']);
unset($_SESSION['tablacomprastemplocal']);
$_SESSION['tablacomprastemplocal']=$datos;

?>


