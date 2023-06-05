<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Correos {
    public function Enviarcorreo($datos){
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/Exception.php';

 $c = new Conexion();
	$conexion = $c->conectar();
    $c = new Conexion();
			$conexion = $c->conectar();
			$sql = "select V.id_venta,V.cliente,V.fecha,V.total,V.tipo,V.numero,V.vendedor,cl.email from ventas V INNER JOIN clientes as cl on V.cliente= cl.nombre where id_venta = '$id'";
			$result = mysqli_query($conexion,$sql);
            $ver = mysqli_fetch_row($result);
            $datos = array(
               "id_venta" =>html_entity_decode($ver[0]),
               "cliente" =>html_entity_decode($ver[1]),
               "fecha" =>html_entity_decode($ver[2]),
               "total" =>html_entity_decode($ver[3]),
               "tipo" =>html_entity_decode($ver[4]),
               "numero" =>html_entity_decode($ver[5]),
               "vendedor" =>html_entity_decode($ver[6]),
                "Correo" =>html_entity_decode($ver[7])
             );
            return $datos;

$mail = new PHPMailer(true); // El parámetro true activa excepciones para capturar errores
$mail->isSMTP(); // Utilizar SMTP para enviar el correo

// Configuración del servidor SMTP
$mail->Host = 'smtp.servidor.com';
$mail->SMTPAuth = true;
$mail->Username = 'wilmarr26@gmail.com';
$mail->Password = 'ankcwumfojpekmbw'; //ankcwumfojpekmbw
$mail->Port = 587;

// Configuración del correo electrónico
$mail->setFrom($datos['correo'], 'Villa ResDog');
$mail->addAddress('destinatario@servidor.com', 'Nombre Destinatario');
$mail->Subject = 'Factura Electronica';
$mail->Body = 'Estimado '.$data['Cliente'];
$mail->Body = 'En el siguiente archivo se le adjunta su factura';


// Adjuntar archivos (opcional)
$mail->addAttachment('/ruta/al/archivo.pdf');

// Envío del correo
if ($mail->send()) {
    echo 'Correo enviado correctamente.';
} else {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
    }
}
?>