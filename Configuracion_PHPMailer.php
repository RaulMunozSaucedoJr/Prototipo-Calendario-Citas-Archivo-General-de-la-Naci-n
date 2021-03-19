<?php

$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$numero_investigador = $_POST["numero_investigador"];
$institucion = $_POST["institucion"];
$motivo = $_POST["motivo"];
$hora_entrada = $_POST["hora_entrada"];
$hora_salida = $_POST["hora_salida"];
$coleccion = $_POST["coleccion"];
$serie = $_POST["serie"];
$caja = $_POST["caja"];
$pieza = $_POST["pieza"];
$tema = $_POST["tema"];
$correo = $_POST["correo"];

$body = "<table width='100%' border='1' style='margin-top:15px;' align='left class='table table-striped'>". 
        " Nombre: ".$nombre. "<br>Apellido Paterno: ".$apellido_paterno."<br>Apellido Materno: ".$apellido_materno.
        "<br>Numero de Investigador: ".$numero_investigador."<br>Institución: ".$institucion."<br>Motivo: ".$motivo.
        "<br>Hora de Entrada: ".$hora_entrada."<br>Hora de Salida: ".$hora_salida ."<br>Colección: ".$coleccion."<br>Serie: ".$serie.
        "<br>Caja: ".$caja ."<br>Pieza: ".$pieza ."<br>Tema: ".$tema;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rjumsagn@gmail.com';                     // SMTP username
    $mail->Password   = 'a20g20n#';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('rjumsagn@gmail.com', $nombre);
    $mail->addAddress($correo);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Cita - Archivo General de la Nación';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';

    $mail->send();
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>