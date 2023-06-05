<?php
require 'header.php';

if ($_SESSION['tipo'] == "admin") {




?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <style>
            .espacio-div {
                padding-bottom: 20px;
                /* Ajusta el valor según el espacio deseado */
            }
        </style>
        <div class="modal fade" id="exampleModal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		        				<div class="modal-dialog" role="document">
		        					<div class="modal-content">
		        						<div class="modal-header">
		        							<h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
		        							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        								<span aria-hidden="true">&times;</span>
		        							</button>
		        						</div>
		        						<div class="modal-body">
		        							<form id="frmproductoe">
		        								<div class="row">

		        									<label>Nombre (*)</label>
		        									<input type="text" class="form-control" id="txtnombree" name="txtnombree">
		        									<label>Apellido (*)</label>
		        									<input type="text" class="form-control" id="txtprecioce" name="txtprecioce">
		        									<label>Cargo</label>
		        									<input type="text" class="form-control" id="txtpreciove" name="txtpreciove">
		        							</form>
		        						</div>
		        					</div>
		        					<div class="modal-footer">
		        						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        						<button type="button" id="btneditar" class="btn btn-primary">Guardar</button>
		        					</div>
		        				</div>
		        			</div>
		        		  </div>
        <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Personal</h1>

                                <div class="clearfix">


                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <!-- Button trigger modal -->

                        <div class="col-lg-12">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Nombre</td>
                                        <td>Apellidos</td>
                                        <td>Cargo</td>
                                        <td></td>
                                        <td></td>
                                  
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
    </body>

    </html>





<?php
    require 'footer.php';
} else {
    header("location:../index.php");
}

?>

<script>
    $(document).ready(function() {
        $('#txtproveedor').select2({
            dropdownParent: $("#exampleModal .modal-content")
        });
        $('#txtcategoria').select2({
            dropdownParent: $("#exampleModal .modal-content")
        });
        $('#txtproveedore').select2({
            dropdownParent: $("#exampleModal2 .modal-content")
        });
        $('#txtcategoriae').select2({
            dropdownParent: $("#exampleModal2 .modal-content")
        });

        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "../procesos/empleados/mostrar.php",
                "type": "GET"
                //"crossDomain": "true",
                //"dataType": "json",
                //"dataSrc":""
            },
            "columns": [{
                    "data": "id_usuario"
                },
                {
                    "data": "nombre"
                },
                {

                    "data": "apellido"
                },
                {

                    "data": "tipo"
                },
                {
                    sTitle: "Eliminar",
                    mDataProp: "id_usuario",
                    sWidth: '7%',
                    orderable: false,
                    render: function(data) {
                        acciones = `<button id="` + data + `" value="Eliminar"  type="button" class="fa fa-times btn btn-danger accionesTabla" >
                                    
                                </button>`;
                        return acciones
                    }
                },
                {
                    sTitle: "Editar",
                    mDataProp: "id_usuario",
                    sWidth: '7%',
                    orderable: false,
                    render: function(data) {
                        acciones = `<button id="` + data + `" value="Traer" class="fa fa-pencil-square-o btn btn-primary accionesTabla" data-toggle="modal" data-target="#exampleModal2" type="button"  >
                                    
                                </button>`;
                        return acciones
                    }
                }
               

            ],
            responsive: true,
            "ordering": false


        });

        $(document).on('click', '.accionesTabla', function() {
            var id = this.id;   
            var val = this.value;

            switch (val) {
                case "Traer":
                    $.ajax({
                        method: "GET",
                        url: "../procesos/empleados/traer.php",
                        data: 'id_usuario=' + id
                    }).done(function(msg) {
                        var dato = JSON.parse(msg);

                        $('#txtnombree').val(dato['nombre']);
                        $('#txtprecioce').val(dato['precio_compra']);
                        $('#txtpreciove').val(dato['precio_venta']);
                        $('#txtstocke').val(dato['stock']);


                        $('#btneditar').unbind().click(function() {
                            vacios = validarFormVacio('frmproductoe');


                            if (vacios <= 0) {
                                noma = $("#txtnombree").val();
                                pc = $("#txtprecioce").val();
                                pv = $("#txtpreciove").val();
                                sto = $("#txtstocke").val();
                                des = $("#txtdespachoe").val();
                                prove = $("#txtproveedore").val();
                                cate = $("#txtcategoriae").val();
                                stokmin = $("#txtstockminimoe").val();
                                oka = {
                                    "txtnombree": noma,
                                    "id_producto": id,
                                    "txtprecioce": pc,
                                    "txtpreciove": pv,
                                    "txtstocke": sto,
                                    "txtdespachoe": des,
                                    "txtproveedore": prove,
                                    "txtcategoriae": cate,
                                    "txtstockminimoe": stokmin
                                };
                                //alert(oka);
                                //alert(JSON.stringify(oka));
                                $.ajax({
                                    method: "POST",
                                    //contentType: 'application/json; charset=utf-8',
                                    url: "../procesos/productos/editar.php",
                                    data: oka
                                }).done(function(msg) {
                                    alertify.success("Producto Editado Correctamente!");
                                    table.ajax.reload();
                                });

                            } else {
                                alertify.error("Complete los datos");
                            }

                        });
                    });
                    break;
                case "Eliminar":

                    alertify.confirm('Empleado', '¿Esta seguro que desea eliminar este empleado?', function() {
                        $.ajax({
                            type: "POST",
                            data: "id=" + id,
                            url: "../procesos/empleados/eliminar.php",
                        }).done(function(msg) {
                            alertify.success("Empleado Eliminado Correctamente");
                            table.ajax.reload();
                        });
                    }, function() {

                    });




                    break;
                case "Ver":
                    $('#btnventas').unbind().click(function() {
                       


                        if (vacios <= 0) {
                            $.ajax({
                                method: "POST",
                                //contentType: 'application/json; charset=utf-8',
                                url: "../procesos/productos/stock.php",
                                data: oka
                            }).done(function(msg) {
                                if (msg == 1) {
                                    alertify.success("Stock Agregado Correctamente!");
                                    table.ajax.reload();
                                } else if (msg == "n") {
                                    alertify.error("Ingrese un numero valido");
                                } else {
                                    alertify.error("No se pudo añadir");
                                }

                            });

                        } else {
                            alertify.error("Complete los datos");
                        }

                    });
                    break;
                default:
                    alert("No existe el valor");
                    break;
            }
        });



    });
</script>