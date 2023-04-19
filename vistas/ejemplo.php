<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            padding: 10px 20px;
            background-color: #eee;
            text-align: center;
            font-size: 12px;
            left: 0;
            right: 0;
            margin: auto;
        }

        #footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        .header img {
            width: 100px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .header h1 {
            margin: 0;
        }

        .details {
            margin-bottom: 20px;
        }

        .details table {
            margin-bottom: 10px;
        }

        .total {
            text-align: right;
        }
    </style>
</head>
<style>
    body {  
      color: blue;
    }
  </style>
<body>
    <div class="header">

        <h1>Factura</h1>
    </div>
    <div class="row">
        <!-- Button trigger modal -->


        <?php
        require_once '../clases/Conexion.php';
        require_once 'Proceso.php';
        $obj = new proceso();
        //$id=$_GET['id'];
        $idz =  $id;
        $result = $obj->mostrarid($id);

        ?>

        <div class="col-lg-12">
            <table id="dtventas" class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        
                        <td>Cliente</td>
                        <td>Fecha</td>
                        
                        <td>Pago</td>
                        <td>Direccion</td>
                        <td>Telefono</td>
                        <td>Vendedor</td>
                        <td>Total a pagar</td>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    while ($fila = mysqli_fetch_row($result)) {
                    ?>
                        <tr>
                           
                            <td><?php echo $fila[0] ?></td>
                            <td><?php echo $fila[1] ?></td>
                          
                            <td><?php echo $fila[4] ?></td>
                            <td><?php echo $fila[5] ?></td>
                            <td><?php echo $fila[6] ?></td>
                            <td><?php echo $fila[7] ?></td>
                            <td><?php echo "$" . number_format($fila[3]) ?></td>

                        </tr>
                    <?php
                    } ?>

                </tbody>
            </table>
        </div>

    </div>

    <?php
    setlocale(LC_MONETARY, 'es_PE');
    require_once "../clases/Venta.php";
    require_once "../clases/Conexion.php";
    $obj = new Venta();

    $idx =  $id;
    $result = $obj->traer_detalles($idx);

    $re = "<div >
<table id='tbdetalle' class='table table-responsive'>
                                            <tr class='bg-warning'>
                                            <th scope='col' style='width:70%'>Productos</th>  
                                              <th scope='col' style='width:20%'>Cantidad</th>
                                              <th scope='col' style='width:20%'>Despacho</th>
                                              
                                              <th scope='col' style='width:70%'>Precio</th>
                                              <th scope='col' style='width:10%'>Descuento (%)</th>
                                              <th scope='col' style='width:70%'>Precio descuento</th>
                                              <th scope='col' style='width:10%''>Importe</th>
                                            </tr>
";

    while ($r = mysqli_fetch_array($result)) {

        $re .= '
    <tr>
    <td>' . html_entity_decode($r['nombre']) . '</td>
    <td> ' . utf8_decode($r['cantidad']) . '</td>
    <td> ' . utf8_decode($r['despacho']) . '</td>
    
    <td>' . utf8_decode(number_format($r['precio'])) . '</td>
    <td> ' . utf8_decode($r['descuento']) . '</td>
    <td>' . utf8_decode(number_format($r['preciodescuento'])) . '</td>
    <td>' . utf8_decode(number_format($r['importe'])) . '</td>
    </tr>
    ';
    }
    $re .= "</table";

    echo $re;
    ?>

    <div width= "50%" height= "50%"  class="footer">
        <p>Gracias por su compra</p>
        <p>VILLA RES DOG</p>
    </div>
</body>

</html>