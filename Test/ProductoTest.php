<?php

require_once './clases/Conexion.php';
require_once './clases/Producto.php';

use PHPUnit\Framework\TestCase;

class ProductoTest extends TestCase
{
    public function testSave()
    {
        $producto = new Producto();
        $datos = ["Producto de prueba", 10.99, 19.99, 50, "Despacho", 1, 1, 10];

        $resultado = $producto->save($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya guardado correctamente el producto en la base de datos
    }

    public function testEdit()
    {
        $producto = new Producto();
        $datos = [1, "Producto actualizado", 15.99, 24.99, 100, "Nuevo despacho", 2, 2, 5];

        $resultado = $producto->edit($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya editado correctamente el producto en la base de datos
    }

    public function testDelete()
    {
        $producto = new Producto();
        $id = 1;

        $resultado = $producto->delete($id);

        $this->assertTrue($resultado);
        // Verifica que se haya eliminado correctamente el producto de la base de datos
    }

    public function testMostrar()
    {
        $producto = new Producto();

        $resultado = $producto->mostrar();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar los productos activos
    }

    public function testTraer()
    {
        $producto = new Producto();
        $id = 1;

        $resultado = $producto->traer($id);

        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('id_producto', $resultado);
        $this->assertArrayHasKey('nombre', $resultado);
        $this->assertArrayHasKey('precio_compra', $resultado);
        $this->assertArrayHasKey('precio_venta', $resultado);
        $this->assertArrayHasKey('stock', $resultado);
        $this->assertArrayHasKey('despacho', $resultado);
        $this->assertArrayHasKey('id_proveedor', $resultado);
        $this->assertArrayHasKey('id_categoria', $resultado);
        $this->assertArrayHasKey('stockminimo', $resultado);
        // Verifica que se haya obtenido un array asociativo con los datos del producto
    }

    public function testTraerDatosCb()
    {
        $producto = new Producto();
        $id = 1;

        $resultado = $producto->traer_datos_cb($id);

        $this->assertIsArray($resultado);
        $this->assertArrayHasKey('precio_venta', $resultado);
        $this->assertArrayHasKey('stock', $resultado);
        $this->assertArrayHasKey('despacho', $resultado);
        // Verifica que se haya obtenido un array asociativo con los datos del producto para el ComboBox
    }

    public function testStock()
    {
        $producto = new Producto();
        $id = 1;
        $stock = 20;

        $resultado = $producto->stock($id, $stock);

        $this->assertTrue($resultado);
        // Verifica que se haya actualizado correctamente el stock del producto en la base de datos
    }
}
