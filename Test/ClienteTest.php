<?php

require_once './clases/Conexion.php';
require_once './clases/Cliente.php';

use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    public function testSave()
    {
        $cliente = new Cliente();
        $datos = ["Nombre Cliente", "Dirección Cliente", "123456789", "cliente@example.com"];
        $resultado = $cliente->save($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya insertado correctamente el nuevo cliente en la base de datos
    }

    public function testEdit()
    {
        $cliente = new Cliente();
        $datos = [1, "Nuevo Nombre", "Nueva Dirección", "987654321", "nuevo_cliente@example.com"];
        $resultado = $cliente->edit($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya actualizado correctamente el cliente en la base de datos
    }

    public function testDelete()
    {
        $cliente = new Cliente();
        $id = 1;
        $resultado = $cliente->delete($id);

        $this->assertTrue($resultado);
        // Verifica que se haya cambiado correctamente el estado del cliente a 'inactivo' en la base de datos
    }

    public function testMostrar()
    {
        $cliente = new Cliente();
        $resultado = $cliente->mostrar();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar los clientes activos
    }

    public function testTraer()
    {
        $cliente = new Cliente();
        $id = 10;
        $resultado = $cliente->traer($id);

        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('id_cliente', $resultado);
        $this->assertArrayHasKey('nombre', $resultado);
        $this->assertArrayHasKey('direccion', $resultado);
        $this->assertArrayHasKey('telefono', $resultado);
        $this->assertArrayHasKey('email', $resultado);
        // Verifica que se haya obtenido un resultado de tipo array con las claves especificadas

        $this->assertEquals("Nombre Cliente", $resultado['nombre']);
        // Verifica que el nombre del cliente obtenido sea igual al esperado
    }
}
