<?php

require_once './clases/Conexion.php';
require_once './clases/Venta.php';

use PHPUnit\Framework\TestCase;

class VentaTest extends TestCase
{
    public function testSave()
    {
        $venta = new Venta();

        $cliente = "nombre_cliente";
        $total = 100;
        $tipo = "tipo_pago";
        $numero = "numero_pago";
        $vendedor = "nombre_vendedor";

        $resultado = $venta->save($cliente, $total, $tipo, $numero, $vendedor);

        $this->assertTrue($resultado);
        // Verifica que se haya guardado la venta correctamente
    }

    public function testSaveDetalle()
    {
        $venta = new Venta();

        $resultado = $venta->save_detalle();

        $this->assertIsInt($resultado);
        // Verifica que el resultado sea un entero, indicando la cantidad de detalles de venta guardados
    }

    public function testTraeVenta()
    {
        $venta = new Venta();

        $resultado = $venta->trae_venta();

        $this->assertIsInt($resultado);
        // Verifica que el resultado sea un entero, indicando el ID de la última venta guardada
    }

    public function testBajaStock()
    {
        $venta = new Venta();

        $stock = 10;
        $id = 1;

        $resultado = $venta->baja_stock($stock, $id);

        $this->assertTrue($resultado);
        // Verifica que se haya actualizado el stock correctamente
    }

    public function testConsultarVenta()
    {
        $venta = new Venta();

        $f1 = "2023-01-01";
        $f2 = "2023-12-31";

        $resultado = $venta->consultar_venta($f1, $f2);

        $this->assertInstanceOf(mysqli_result::class, $resultado);
        // Verifica que el resultado sea una instancia de la clase mysqli_result
    }
    public function testMostrar()
    {
        // Crear una instancia de la clase Venta
        $venta = new Venta();

        // Llamar al método mostrar
        $result = $venta->mostrar();

        // Verificar el resultado
        $this->assertIsObject($result, 'El resultado debe ser un objeto');
    }

    public function testMostrarPorId()
    {
        // Crear una instancia de la clase Venta
        $venta = new Venta();

        // Llamar al método mostrar_porid con el ID de prueba
        $id = 20;

        $result = $venta->mostrar_porid($id);

        // Verificar el resultado
        $this->assertIsArray($result, 'El resultado debe ser un arreglo');
        $this->assertArrayHasKey('id_venta', $result, 'El arreglo debe contener la clave "id_venta"');
        $this->assertArrayHasKey('cliente', $result, 'El arreglo debe contener la clave "cliente"');
        // Verificar las demás claves del arreglo según corresponda
    }

    public function testTraerDetalles()
    {
        // Crear una instancia de la clase Venta
        $venta = new Venta();

        // Llamar al método traer_detalles con el ID de prueba
        $id = 20;

        $result = $venta->traer_detalles($id);

        // Verificar el resultado
        $this->assertIsObject($result, 'El resultado debe ser un objeto');
    }

    public function testMarcarVenta()
    {
        // Crear una instancia de la clase Venta
        $venta = new Venta();

        // Llamar al método marcar_venta con el ID de prueba
        $id = 22;

        $result = $venta->marcar_venta($id);

        // Verificar el resultado
        $this->assertTrue($result);
    }
}
