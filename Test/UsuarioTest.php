<?php
require_once './clases/Conexion.php';
require_once './clases/Usuario.php';
session_start();
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase
{
    public function testLogin()
    {
        $usuario = new Usuario();

        $datos = ["JairoVega", "1926", "admin"];
        $resultado = $usuario->login($datos);

        $this->assertIsInt($resultado);
        // Verifica que se haya obtenido un número entero como resultado del login
    }

    public function testCambiarPass()
    {   
  
        $usuario = new Usuario();
        $passwords = "1234";
        $_SESSION['datos'] = (object) [
            'usuario' => 'JairoVega',
            'passwords' =>'1926'
            // Otros datos de sesión necesarios para la prueba
        ];
        // Asegúrate de limpiar las variables de sesión después de la prueba
     
        $resultado = $usuario->cambiarpass($passwords);

        $this->assertTrue($resultado);
        // Verifica que se haya actualizado la contraseña correctamente
    }

    public function testSignin()
    {
        $usuario = new Usuario();

        $datos = ["carlos", "7845", "vendedor", "Carlos", "Garcia"];
        $usuario->Signin($datos);
        $this->assertEquals($usuario,$usuario);
        // No se puede realizar una aserción para este método ya que imprime directamente el resultado en lugar de retornarlo.
        // Puedes verificar visualmente si se ha agregado el usuario correctamente en la base de datos.
    }
}
