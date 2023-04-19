<?php

include "../clases/Conexion.php";
require '../vendor/autoload.php';
require_once '../assets/dompdf/autoload.inc.php';

use Dompdf\Dompdf; //para incluir el namespace de la librería
use Dompdf\Options;

$dompdf = new Dompdf(); //crear el objeto de la clase Dompdf
$id = $_GET['id'];
$c = new Conexion();
$conexion = $c->conectar();

$query_ventas = mysqli_query($conexion, "select id_venta,cliente,fecha,total,tipo,numero from ventas where id_venta = '$id'");
$result_ventas = mysqli_num_rows($query_ventas);


$query_productos = mysqli_query($conexion, "select de.cantidad,p.despacho,p.nombre,de.precio,de.importe,de.descuento,de.preciodescuento from detalle_ventas as de
inner join productos as p on p.id_producto=de.id_productos where de.id_ventas = $id");
$result_detalle = mysqli_num_rows($query_productos);

$resultado = $conexion->query("SELECT cliente FROM ventas WHERE id_venta = $id");
$registro = $resultado->fetch_assoc();

// Obtener el nombre del archivo
$nombre_archivo = $registro['cliente'];


ob_start();

include 'ejemplo.php';

$html = ob_get_clean();

$options = new Options();
$options -> set("isRemoteEnable",true);

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

//Establecer el tamaño de hoja en DOMPDF
$dompdf->setPaper('letter', 'portrait');

// Renderizar el PDF
$dompdf->render();



// Forzar descarga del PDF
$dompdf->stream($nombre_archivo, array("Attachment" => true));
