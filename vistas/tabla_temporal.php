<?php
session_start();

?>

<table id="dtproductos" class="table table-responsive-xl table-bordered table-hover table-condensed">
  <thead>
    <tr>
      <td style="width:50%">Producto</td>
      <td style="width:10%">Cantidad</td>
      <td style="width:10%">Despacho</td>
      <td style="width:20%">Precio </td>
      <td style="width:10%;">Descuento (%)</td>
      <td style="width:20%;">Precio descuento</td>
      <td style="width:20%">Importe </td>
      <td style="width:20%">Acciones</td>
    </tr>

  </thead>

  <?php
  $total = 0; //total de la compra en dinero
  if (isset($_SESSION['tablacomprastemp'])) {
    $index = 0;
    foreach (@$_SESSION['tablacomprastemp'] as $key) {

      $d = explode("||", @$key);
      $total = $total + $d[4];
  ?>


      <tbody>

        <tr>
          <td><?php echo $d[0]; ?></td> <!-- 2 es cantidad, 0 es nombre, 1 es precio, 3 es despacho, 4 es total  y 5 es id-->
          <td><?php echo $d[2]; ?></td>
          <td><?php echo $d[3]; ?></td>
          <td><?php echo '$' . number_format($d[1]);  ?></td>
          <td><?php echo number_format($d[5]) . '%';  ?></td>
          <td><?php echo '$' . number_format($d[6]); ?></td>
          <td><?php echo '$' . number_format($d[4]); ?></td>

          <td>
            <span class="btn btn-danger btn-sm" onclick="quitarp('<?php echo $index ?>')">
              <span class="fa fa-window-close"></span>
            </span>
          </td>
        </tr>

    <?php
      $index++;
    }
  } ?>

    <tr>
    <td class="bg-primary">
        <h5>TOTAL $ </h5>
      </td>
      .<td class="bg-primary">
        <h5 id="txttotal" name="txttotal"><?php echo $total ?></h5>
      </td>
      <td></td>
      <td></td>
      
      
    </tr>
      </tbody>
</table>