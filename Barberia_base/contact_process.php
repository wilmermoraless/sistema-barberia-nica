<?php

$to = "rockybd1995@gmail.com";

// Obtener y sanitizar entradas
$from    = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
$name    = htmlspecialchars($_REQUEST['name']);
$subject = htmlspecialchars($_REQUEST['subject']);
$number  = htmlspecialchars($_REQUEST['number']);
$message = htmlspecialchars($_REQUEST['message']);

// Encabezados del correo
$headers  = "From: " . $from . "\r\n";
$headers .= "Reply-To: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Asunto del correo (puedes personalizar)
$email_subject = "Mensaje desde el sitio web - Barbería";

// Logo y enlace (ajusta si usas ruta absoluta)
$logo = 'img/logo.png';
$link = '#';

// Cuerpo del mensaje
$body = "<!DOCTYPE html><html lang='es'><head><meta charset='UTF-8'><title>Mensaje</title></head><body>";
$body .= "<table style='width: 100%;'>";
$body .= "<thead style='text-align: center;'><tr><td colspan='2'>";
$body .= "<a href='{$link}'><img src='{$logo}' alt='Logo'></a><br><br>";
$body .= "</td></tr></thead><tbody>";
$body .= "<tr><td><strong>Nombre:</strong> {$name}</td><td><strong>Email:</strong> {$from}</td></tr>";
$body .= "<tr><td><strong>Teléfono:</strong> {$number}</td><td><strong>Asunto:</strong> {$subject}</td></tr>";
$body .= "<tr><td colspan='2'><p>{$message}</p></td></tr>";
$body .= "</tbody></table>";
$body .= "</body></html>";

// Enviar correo
$send = mail($to, $email_subject, $body, $headers);

// Opcional: respuesta al usuario (puede imprimirse o redireccionar)
if ($send) {
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error al enviar el mensaje.";
}
?>
