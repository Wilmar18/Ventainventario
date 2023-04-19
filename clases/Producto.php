<?php
class Producto{
            public function save($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$nombre = $c->test_input($datos[0]);
            $pc = $c->test_input($datos[1]);
            $pv = $c->test_input($datos[2]);
            $stock = $c->test_input($datos[3]);
            $despacho = $c->test_input($datos[4]);
            $proveedor = $c->test_input($datos[5]);
            $categoria = $c->test_input($datos[6]);
            $stockminimo = $c->test_input($datos[7]);
			$sql = "INSERT INTO productos(nombre,precio_compra,precio_venta,stock,despacho,id_proveedor,id_categoria,estado,stockminimo) values('$nombre','$pc','$pv','$stock','$despacho','$proveedor','$categoria','activo','$stockminimo')";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
                public function edit($datos)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
            $id = $datos[0];
			$nombre = $c->test_input($datos[1]);
            $pc = $c->test_input($datos[2]);
            $pv = $c->test_input($datos[3]);
            $stock = $c->test_input($datos[4]);
            $despacho = $c->test_input($datos[5]);
            $proveedor = $c->test_input($datos[6]);
            $categoria = $c->test_input($datos[7]);
            $stockminimo = $c->test_input($datos[8]);
			$sql = "update productos set nombre = '$nombre', precio_compra = '$pc',precio_venta = '$pv',
            stock = '$stock',despacho = '$despacho', id_proveedor = '$proveedor', id_categoria = '$categoria', stockminimo= '$stockminimo' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
            
        }
                public function delete($id)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set estado = 'inactivo' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    public function mostrar()
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "SELECT pro.id_producto,pro.nombre,pro.precio_compra,pro.precio_venta,pro.stock,pro.despacho,pro.stockminimo,pr.nombre as id_proveedor,ca.nombre
            as id_categoria FROM categorias AS ca
            INNER JOIN productos AS pro ON pro.id_categoria=ca.id_categoria INNER JOIN proveedores AS pr ON pr.id_proveedor=pro.id_proveedor
            WHERE pro.estado = 'activo'";
			$result = mysqli_query($conexion,$sql);
            return $result; 
    }
    public function traer($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select * from productos where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_producto" =>html_entity_decode($ver[0]),
               "nombre" =>html_entity_decode($ver[1]),
               "precio_compra" =>html_entity_decode($ver[2]),
               "precio_venta" =>html_entity_decode($ver[3]),
               "stock" =>html_entity_decode($ver[4]),
               "despacho" =>html_entity_decode($ver[5]), 
               "id_proveedor" =>html_entity_decode($ver[6]),
               "id_categoria" =>html_entity_decode($ver[8]),
               "stockminimo" =>html_entity_decode($ver[9]),
             );
            return $datos;
    }
    
    public function traer_datos_cb($id)
    {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select precio_venta,stock,despacho from productos where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
            "precio_venta" =>html_entity_decode($ver[0]),
            "stock" =>html_entity_decode($ver[1]),
            "despacho" =>html_entity_decode($ver[2])
            );
            return $datos;
    }

                public function stock($id,$stock)
        {
            $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "update productos set stock = stock + '$stock' where id_producto=$id";
			$result = mysqli_query($conexion,$sql);
            return $result;
        }
    
}
