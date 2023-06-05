<?php

require_once './clases/Conexion.php';
require_once './clases/Venta_empleado.php';

use PHPUnit\Framework\TestCase;

class Venta_empleadoTest extends TestCase
{
    public function testMostrar()
    {
        $empleados = new VentaEmpleado();
        $nombre= "Soul";
        $resultado = $empleados->consultar_venta($nombre);

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar los empleados activos
    }

    
}
