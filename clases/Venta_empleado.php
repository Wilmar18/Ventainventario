<?php

class VentaEmpleado
{

    public function consultar_venta($nombre)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
            $sql = "SELECT * FROM ventas WHERE vendedor = '$nombre'";
            $result= mysqli_query($conexion,$sql);

              return $result ;
    }


}


?>