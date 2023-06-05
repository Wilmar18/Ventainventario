<?php

require_once './clases/Conexion.php';
require_once './clases/Proveedor.php';

use PHPUnit\Framework\TestCase;

class ProveedorTest extends TestCase
{
    public function testSave()
    {
        $proveedor = new Proveedor();
        $datos = ["Proveedor de prueba", "Dirección de prueba", "123456789", "proveedor@test.com"];

        $resultado = $proveedor->save($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya guardado correctamente el proveedor en la base de datos
    }

    public function testEdit()
    {
        $proveedor = new Proveedor();
        $datos = [1, "Proveedor actualizado", "Nueva dirección", "987654321", "proveedor@actualizado.com"];

        $resultado = $proveedor->edit($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya editado correctamente el proveedor en la base de datos
    }

    public function testDelete()
    {
        $proveedor = new Proveedor();
        $id = 1;

        $resultado = $proveedor->delete($id);

        $this->assertTrue($resultado);
        // Verifica que se haya eliminado correctamente el proveedor de la base de datos
    }

    public function testMostrar()
    {
        $proveedor = new Proveedor();

        $resultado = $proveedor->mostrar();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar los proveedores activos
    }

    public function testTraer()
    {
        $proveedor = new Proveedor();
        $id = 1;

        $resultado = $proveedor->traer($id);

        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('id_proveedor', $resultado);
        $this->assertArrayHasKey('nombre', $resultado);
        $this->assertArrayHasKey('direccion', $resultado);
        $this->assertArrayHasKey('telefono', $resultado);
        $this->assertArrayHasKey('email', $resultado);
        // Verifica que se haya obtenido un array asociativo con los datos del proveedor
    }
}
