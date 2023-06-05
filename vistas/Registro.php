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
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto"><br><br><br><br>
                    <div class="card card-login my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>REGISTRO DE USUARIO </strong></h5>
                            <form class="form-signin" id="frmregistro">

                                <div class="espacio-div">
                                    <label for="inputNombre">Nombres</label>
                                    <input autocomplete="off" type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="Nombres" required >
                                </div>
                                <div class="espacio-div">
                                    <label for="inputApellido">Apellidos</label>
                                    <input autocomplete="off" type="text" id="inputApellido" name="inputApellido" class="form-control" placeholder="Apellidos" required >
                                </div>
                                <div class="espacio-div">
                                    <label for="inputUser">Usuario</label>
                                    <input autocomplete="off" type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required >
                                </div>
                                <div class="espacio-div">
                                    <label for="inputContra">Contraseña</label>
                                    <input autocomplete="off" type="password" id="inputContra" name="inputContra" class="form-control" placeholder="Contraseña" required autfocus>
                                </div>


                                <div class="form-label-group">
                                    <label for="inputTipo">Tipo de usuario</label>
                                    <select name="inputTipo" id="inputTipo" class="form-control" required>
                                        <option value="admin">Admin</option>
                                        <option value="Vendedor">Vendedor</option>
                                    </select>
                                </div>

                                <div class="form-label-group">
                                    <label for=""></label>
                                    <span class="btn btn-lg btn-success btn-block text-uppercase" id="btnregistrar" type="submit">Registrar</span><br>
                                </div>

                               

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
        $('#btnregistrar').click(function() {
            datos = $('#frmregistro').serialize();
            var nom = $('#inputNombre').val();
            var ape = $('#inputApellido').val();
            var usu = $('#inputUser').val();
            var cla = $('#inputContra').val();
            var tip = $('#inputTipo').val();

            if (usu.length == 0 || cla.length == 0 || nom.length == 0 || ape.length == 0) {
                alertify.error("Complete los campos");
            } else {
                $.ajax({
                    type:'post',
                url:'../procesos/usuarios/Sign.php',
                data:datos,
                    success: function(r) {
                        $('#InputNombre').val("");
                            $('#InputApellido').val("");
                            $('#InputUser').val("");
                            $('#InputContra').val("");
                        if (r == 1) {
                            $('#InputNombre').val("");
                            $('#InputApellido').val("");
                            $('#InputUser').val("");
                            $('#InputContra').val("");
                            alertify.success("Usuario Registrado Correcamente");
                            
                          
                        } else if (r == 0) {
                            alertify.error("Error al ingresar los datos");
                        } else {
                            //alertify.error("Error al ingresar los datos");
                            alert(r);
                        }
                    }
                });
            }

        });
    });
</script>