<?php

require_once './clases/Conexion.php';

use PHPUnit\Framework\TestCase;

class ConexionTest extends TestCase
{
    public function testConectar()
    {
        $conexion = new Conexion();
        $resultado = $conexion->conectar();

        $this->assertInstanceOf(mysqli::class, $resultado);
        // Verifica que la conexión sea una instancia de la clase mysqli
    }

    public function testTestInput()
    {
        $conexion = new Conexion();

        $data = "Hola, <script>alert('Hacker');</script>";
        $resultado = $conexion->test_input($data);

        $this->assertEquals("Hola, &lt;script&gt;alert(&#039;Hacker&#039;);&lt;/script&gt;", $resultado);
        // Verifica que los caracteres especiales y las etiquetas HTML sean escapados correctamente
    }
}
