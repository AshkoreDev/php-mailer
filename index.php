<?php 
	
	require("./mail.php");
	
	function validate($name, $email, $subject, $message, $form) {
		
		return !empty($name) && !empty($email) && !empty($subject) && !empty($message);

	}

	$status = "";

	if ( isset($_POST["form"]) ) {
		
		if ( validate(...$_POST) ) {
			
			$name = $_POST["name"];
			$email = $_POST["email"];
			$subject = $_POST["subject"];
			$message = $_POST["message"];

			// Enviar el correo
			$status = "success";

		} else {

			$status = "danger";

		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de Contacto</title>

	<link rel="stylesheet" href="./src/style.css">
</head>
<body>

	<?php if ($status == "danger"):	?>

		<div>
			<span>¡Surgió un problema!</span>
		</div>

	<?php endif; ?>

	<?php if ($status == "success"):	?>

		<div>
			<span>¡Mensaje enviado con éxito!</span>
		</div>
		
	<?php endif; ?>
	
	<main>

		<form action="./" method="POST">
			
			<h2>¡Contáctanos!</h2>

			<div class="form__items">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" autocomplete="off">
			</div>

			<div class="form__items">
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" autocomplete="off">
			</div>

			<div class="form__items">
        <label for="subject">Asunto:</label>
        <input type="text" id="subject" name="subject" autocomplete="off">
			</div>

			<div class="form__items">
        <label for="message">Mensaje:</label>
        <textarea name="message" id="message"></textarea>
			</div>

			<div class="form__button">
				<input type="submit" name="form" value="Enviar">
			</div>

		</form>
	</main>
	
</body>
</html>