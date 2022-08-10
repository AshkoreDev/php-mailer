<?php

require "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;

function sendMail($subject, $body, $email, $name, $html = false) {

	// Configuración inicial del servidor de correos.
	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.gmail.com';
	$phpmailer->SMTPAuth = true;
	$phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$phpmailer->CharSet = PHPMailer::CHARSET_UTF8;
	$phpmailer->Port = 465;
	$phpmailer->Username = ''; // Correo
	$phpmailer->Password = '016113037783b1'; // Contraseña generada en Gmail.

	// Añadir destinatarios.
	$phpmailer->setFrom('contact@miempresa.com', 'Mi empresa');
  $phpmailer->addAddress($email, $name); 

  // Definir el contenido del correo.
  $phpmailer->isHTML($html);                                  
  $phpmailer->Subject = $subject;
  $phpmailer->Body = $body;

  // Enviar el correo.
  $phpmailer->send();
}