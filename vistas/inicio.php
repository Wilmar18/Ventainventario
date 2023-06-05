<?php
require 'header.php';

if(isset($_SESSION['usuario']))
{
date_default_timezone_set("America/Lima");
//ebeef1 gris
?>
<style>
    body {
        background-image: url("../assets/images/Fondo.JPG");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }
    
</style>

<!-- Resto del contenido de la página -->

<style>
                            .imgroder{
                               border-radius: 15px;
                            }
                            .card-redonder{
                                border-radius:15px ;
                                width: 100%;
                                height: 100%;
                                
                            }
                            .gris{
                                background-color: #ebeef1;
                            }
                        </style>

    <div class="content-page">
	
    <!-- Start content -->
    <div class="content">
        
        <div class="container-fluid">
                
                    <div class="row">
                                <div style="margin-bottom: 10px;" class="col-xl-12">
                                        <div class="breadcrumb-holder">
                                                <h1  class="main-title float-left"><span><img class="imgroder"  src="../assets/images/villa.JPG
            " alt="logo"></span></h1>
                                               
                                        </div>
                                </div>
                    </div>
                    <!-- end row -->
                        <style>
                            .card-box noradius noborder bg-purple{
                                background-color: #ffcc27;
                            }
                        </style>
                    
                        <div class="row">
                            
                                <div class=" col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class=" card-redonder card-box noradius noborder bg-purple">
                                                <i class="fa fa-money float-right text-white"></i>
                                                <h5 class="text-white text-uppercase m-b-20">Dinero del Dia en Efectivo</h5>
                                                <h4 class="m-b-20 text-white counter">$
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj1 = new Reporte();
                                                                        $r1 = $obj1->dinero_dia_Efectivo();
                                                                        if(empty($r1))
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo number_format($r1);
                                                                        }
                                                                        
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br><br></span>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card-redonder card-box noradius noborder bg-purple">
                                                <i  class="fas fa-cash-register float-right text-white"></i>
                                                <h7 class="text-white text-uppercase m-b-19">Dinero en Transferencias</h7>
                                                <h4 class="m-b-20 text-white counter">$
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj1 = new Reporte();
                                                                        $r1 = $obj1->dinero_dia_Banco();
                                                                        if(empty($r1))
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo number_format ($r1);
                                                                        }
                                                                        
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br><br></span>
                                        </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div  class="card-redonder card-box noradius noborder bg-Red">
                                                <i class="fa fa-shopping-cart  float-right text-white"></i>
                                                <h5 class="text-white text-uppercase m-b-20">Ventas del Dia</h5>
                                                <h4 class="m-b-20 text-white counter">
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj1 = new Reporte();
                                                                        $r1 = $obj1->ventas_dia();
                                                                        echo $r1;
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br><br></span>
                                        </div>
                                </div>                                                
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card-redonder card-box noradius noborder bg-Red">
                                                <i class="fa fa-product-hunt  float-right text-white"></i>
                                                <h5 class="text-white text-uppercase m-b-20">Productos Vendidos</h5>
                                                <h4 class="m-b-20 text-white counter">
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj2 = new Reporte();
                                                                        $r2 = $obj2->productos_dia();
                                                                        if(empty($r2))
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo $r2;
                                                                        }
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br></span>
                                        </div>
                                </div>

                                <div style="margin-top: 30px; margin-bottom: 10px;" class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card-redonder card-box noradius noborder bg-dark">
                                                <i class="fa fa-bell-o float-right text-white"></i>
                                                <h5 class="text-white text-uppercase m-b-20">Stock<br> Bajo</h5>
                                                <h4 class="m-b-20 text-white counter">
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj2 = new Reporte();
                                                                        $r2 = $obj2->stock_0();
                                                                        echo $r2;
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br></span>
                                        </div>
                                </div>
                                <div style="margin-top: 30px; margin-bottom: 10px;" class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                        <div class="card-redonder card-box noradius noborder bg-Red">
                                                <i class="fa fa-money float-right text-white"></i>
                                                <h5 class="text-white text-uppercase m-b-20">Dinero del Dia</h5>
                                                <h4 class="m-b-20 text-white counter">$
                                                                    <?php
                                                                        require_once '../clases/Reporte.php';
                                                                        require_once '../clases/Conexion.php';
                                                                        $obj1 = new Reporte();
                                                                        $r1 = $obj1->dinero_dia();
                                                                        if(empty($r1))
                                                                        {
                                                                            echo "0";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo number_format($r1);
                                                                        }
                                                                        
                                                                    ?>
                                                </h4>
                                                <span class="text-white"><br><br></span>
                                        </div>
                                </div>

                        </div>
                        <!-- end row -->


                        
                        <div class="row">
                        
                                <H4>Tabla de productos con stock Bajo</H4>
<table id="dtventas" class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            
                            <td>Producto</td>
                            <td>Stock</td>
                            <!--<td>Fecha Sepelio</td>-->
                            <td>Despacho</td>
                            <td>Stock Minimo</td>
                           
                        </tr>
                    </thead>
                    <tbody>

<?php
        require_once '../clases/Conexion.php';
        require_once '../clases/Reporte.php';
        $obj = new Reporte();
        $result = $obj->productos_0();
	while($fila=mysqli_fetch_row($result))
	{
 ?>
    <tr>
		
		<td><?php echo $fila[1] ?></td>
		<td><?php echo "<h5 style='color:red;'>$fila[2]</h5>"; ?></td>
        <td><?php echo $fila[3] ?></td>
        <td><?php echo "<h5 style='color:green;'>$fila[4]</h5>"; ?></td>


	</tr>
	<?php
} ?>

                    </tbody>
</table>
                                
                        </div>
                        <!-- end row -->
 

        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->



<?php
require 'footer.php';
?>

<script>
$(document).ready(function() {
			

} );		
</script>
	
	
<!-- END Java Script for this page -->


<?php
}
else {
	header("location:../index.php");  
}

?>