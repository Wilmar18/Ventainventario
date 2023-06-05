<?php
class Usuario{
    
		public function login($datos)
		{
			$c = new Conexion();
			$conexion = $c->conectar();
			$password = mysqli_real_escape_string($conexion,sha1(md5($datos[1])));
			$usuario = mysqli_real_escape_string($conexion,$datos[0]);
			$tipo = mysqli_real_escape_string($conexion,$datos[2]);
			$sql = "select * from usuarios where usuario='$usuario' and clave='$password' and tipo = '$tipo'";
			$result = mysqli_query($conexion,$sql);

			if(mysqli_num_rows($result) > 0)
			{
                $_SESSION['usuario'] = $datos[0];
				$_SESSION['tipo'] = $datos[2];
                $_SESSION['datos'] = $result->fetch_object();
				return 1;
			}
			else
			{
				return 0;
			}
		}
        public function cambiarpass($passwords)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$password = mysqli_real_escape_string($conexion,sha1(md5($passwords)));
            $usuario = $_SESSION['datos']->usuario;
			$sql = "UPDATE usuarios SET clave = '$password' where usuario='$usuario'";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }


		public function Signin($datos)
		{ 
			$c = new Conexion();
			$conexion = $c->conectar();
			$estado= 1;
			$nombre = $c->test_input  ($datos[3]);
			$apellido =  $c->test_input($datos[4]);
			$password =$c->test_input(sha1(md5($datos[1])));
			$usuario = $c->test_input($datos[0]);
			$tipo = $c->test_input($datos[2]);
			$sql = "INSERT INTO usuarios (nombre, apellido,usuario, clave, tipo, estado) values ('$nombre','$apellido','$usuario','$password','$tipo','$estado')";
			$result = mysqli_query($conexion,$sql);
			echo $result;
			
		}

}


?>