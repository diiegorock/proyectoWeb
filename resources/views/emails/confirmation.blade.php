<!DOCTYPE html>
<html>
<head>
	<title>Email de Confirmación</title>
</head>
<body>
	<h1>Gracias por inscribirte!</h1>

	<p>
		Debes confirmar tu dirección de correo. Haz click en<a href="{{ url("register/confirm/{$user->token}") }}"> este link</a> y continua con tu registro. 
	</p>
</body>
</html>