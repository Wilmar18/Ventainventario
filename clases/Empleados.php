<?php
class Empleados{

    

    public function mostrar()
    {
        $c = new Conexion();
        $conexion = $c->conectar();
        $sql = "Select id_usuario,nombre,apellido,tipo From usuarios where estado = '1'";
        $result = mysqli_query($conexion,$sql);
        return $result; 
    }

    public function marcar_empleado($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update usuarios set estado = '0' where id_usuario = '$id'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }



}
?>