<?php

require_once './clases/Conexion.php';
require_once './clases/Empleados.php';

use PHPUnit\Framework\TestCase;

class EmpleadosTest extends TestCase
{
    public function testMostrar()
    {
        $empleados = new Empleados();
        $resultado = $empleados->mostrar();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar los empleados activos
    }

    public function testMarcarEmpleado()
    {
        $empleados = new Empleados();
        $id = 1;
        $resultado = $empleados->marcar_empleado($id);

        $this->assertTrue($resultado);
        // Verifica que se haya cambiado correctamente el estado del empleado a '0' en la base de datos
    }
}
