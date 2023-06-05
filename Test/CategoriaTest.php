<?php

require_once './clases/Categoria.php';
require_once './clases/Conexion.php';

use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase
{
    public function testSave()
    {
        $categoria = new Categoria();
        $resultado = $categoria->save("Nueva categoría");

        $this->assertTrue($resultado);
        // Verifica que se haya insertado correctamente la nueva categoría en la base de datos
    }

    public function testEdit()
    {
        $categoria = new Categoria();
        $datos = [1, "Categoría actualizada"];
        $resultado = $categoria->edit($datos);

        $this->assertTrue($resultado);
        // Verifica que se haya actualizado correctamente la categoría en la base de datos
    }

    public function testDelete()
    {
        $categoria = new Categoria();
        $id = 1;
        $resultado = $categoria->delete($id);

        $this->assertTrue($resultado);
        // Verifica que se haya cambiado correctamente el estado de la categoría a 'inactivo' en la base de datos
    }

    public function testMostrar()
    {
        $categoria = new Categoria();
        $resultado = $categoria->mostrar();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar las categorías activas
    }

    public function testTraer()
    {
        $categoria = new Categoria();
        $id = 1;
        $resultado = $categoria->traer($id);

        $this->assertIsString($resultado);
        // Verifica que se haya obtenido un resultado de tipo string al traer la categoría por ID
    }

    public function testMostrarCb()
    {
        $categoria = new Categoria();
        $resultado = $categoria->mostrar_cb();

        $this->assertIsObject($resultado);
        // Verifica que se haya obtenido un objeto (resultado de la consulta) al mostrar todas las categorías
    }
}
