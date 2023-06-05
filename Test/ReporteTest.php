<?php

require_once './clases/Conexion.php';
require_once './clases/Reporte.php';

use PHPUnit\Framework\TestCase;

class ReporteTest extends TestCase
{
    public function testVentasDia()
    {
        $reporte = new Reporte();

        $resultado = $reporte->ventas_dia();

        $this->assertIsInt($resultado);
        // Verifica que se haya obtenido un número entero como resultado de las ventas del día
    }

    public function testDineroDia()
    {
        $reporte = new Reporte();

        $resultado = $reporte->dinero_dia();

        $this->assertIsFloat($resultado);
        // Verifica que se haya obtenido un número flotante como resultado del dinero del día
    }

    public function testDineroDiaEfectivo()
    {
        $reporte = new Reporte();

        $resultado = $reporte->dinero_dia_Efectivo();

        $this->assertIsFloat($resultado);
        // Verifica que se haya obtenido un número flotante como resultado del dinero del día en efectivo
    }

    public function testDineroDiaBanco()
    {
        $reporte = new Reporte();

        $resultado = $reporte->dinero_dia_Banco();

        $this->assertIsFloat($resultado);
        // Verifica que se haya obtenido un número flotante como resultado del dinero del día en banco
    }

    public function testStock0()
    {
        $reporte = new Reporte();

        $resultado = $reporte->stock_0();

        $this->assertIsInt($resultado);
        // Verifica que se haya obtenido un número entero como resultado del stock 0
    }

    public function testProductosDia()
    {
        $reporte = new Reporte();

        $resultado = $reporte->productos_dia();

        $this->assertIsInt($resultado);
        // Verifica que se haya obtenido un número entero como resultado de los productos del día
    }

    public function testProductos0()
    {
        $reporte = new Reporte();

        $resultado = $reporte->productos_0();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al obtener los productos con stock 0
    }

    public function testProductos01()
    {
        $reporte = new Reporte();

        $resultado = $reporte->productos_01();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al obtener los productos con stock 0 o menos
    }
}
