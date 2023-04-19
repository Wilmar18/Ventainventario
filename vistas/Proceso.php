<?php
date_default_timezone_set("America/Lima");
class proceso{
            
    public function mostrarid($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT v.cliente, v.fecha, v.tipo, v.total, v.numero, cl.direccion, cl.telefono,v.vendedor FROM ventas as v INNER JOIN clientes as cl on v.cliente=cl.nombre where  id_venta =$id AND v.cliente=cl.nombre";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }


        
}
