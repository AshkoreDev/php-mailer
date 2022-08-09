<?php

require("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($subject, $body, $email, $name, $html = false) {

	// Configuración inicial del servidor de correos.
	$phpmailer = new PHPMailer();
	$phpmailer->isSMTP();
	$phpmailer->Host = 'smtp.mailtrap.io';
	$phpmailer->SMTPAuth = true;
	$phpmailer->Port = 2525;
	$phpmailer->Username = '8d74e5eb77062c';
	$phpmailer->Password = '016113037783b1';

	// Añadir destinatarios.
	$phpmailer->setFrom('contact@miempresa.com', 'Mi empresa');
  $phpmailer->addAddress($email, $name); 

  // Definir el contenido del correo.
  $phpmailer->isHTML($html);                                  
  $phpmailer->Subject = $subject;
  $phpmailer->Body    = $body;

  // Enviar el correo.
  $phpmailer->send();
}