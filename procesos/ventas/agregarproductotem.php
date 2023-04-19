<?php
session_start();
require_once '../../clases/Conexion.php';
$c = new Conexion();
$conexion = $c->conectar();
$producto = $_POST['txtproducto'];
$precio = $_POST['txtprecio'];
$cantidad = $_POST['txtcantidad'];
$despacho = $_POST['txtdespacho'];
$descuento = $_POST['txtdescuento'];
if (!empty($cantidad) and ($precio >=0)  and is_numeric($cantidad) and !empty($despacho)) {
    $consulta = "select nombre,precio_venta,stock,despacho,id_producto from productos where id_producto='$producto'";
    $result = mysqli_query($conexion, $consulta);
    $tablap = $result->fetch_object();
    $total = 0;
    if (isset($_SESSION['tablacomprastemp'])) {

        foreach (@$_SESSION['tablacomprastemp'] as $key) {

            $d = explode("||", @$key);
            if ($d[4] == $producto) {
                $total = $total + $d[2];
            }
        }
    }
    if (($tablap->stock < ($cantidad + $total))) {
        echo "s";
    } else {
        if ($cantidad <= 0) {
            echo "n";
        } else {
            $preciodescuento = $precio * (1 - ($descuento / 100));
            $importe = $cantidad * $preciodescuento;
            $articulo = $tablap->nombre . "||" .
                $precio . "||" .
                $cantidad . "||" .
                $despacho . "||" .
                $importe . "||" .
                $descuento. "||" .
                $preciodescuento. "||".
                $tablap->id_producto . "||";
            //variable de session-

            $_SESSION['tablacomprastemp'][] = $articulo;
            echo "1";
        }
    }
} else {
    echo "camposventa";
}
