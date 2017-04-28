<?php
	session_start();
	include('usuario_modelo.php');
	if (isset($_GET['id'])) {
		if ($_GET['id'] == $_SESSION['usuario']['id'])
			eliminarCuenta($_SESSION['usuario']['id']);
	}
?>

<!DOCTYPE html>
<html lang="es">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">

			<title>Eliminar cuenta</title>

			<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<link href="../css/estilo_borrar_cuenta.css" rel="stylesheet">
			<link rel="icon" href="img/logo.png">
		</head>

		<body class="container">
		<?php if (!isset($_GET['id'])): ?>
			<div class="alert alert-danger mensaje-alarma">
				<p class="texto-alarma">¿Estás seguro de que quieres eliminar tu cuenta?</p>
				<hr>
				<div class="botones">
					<a href="eliminar_cuenta.php?id=<?= $_SESSION['usuario']['id'] ?>"type="button" class="btn btn-danger" style="float: left; background-color:#A43229; border-color:#A43229">Eliminar</a>
					<a href="../muro.php" type="button" class="btn btn-info" style="float: right; background-color:#5FA199; border-color:#5FA199">¡No! ¡ Ctrl + Z !</a>
				</div>
			</div>
		<?php else: ?>
			<div class="alert alert-info mensaje-alarma">
				<p class="texto-alarma">Tu cuenta ha sido eliminada satisfactoriamente</p>
				<hr>
				<div class="botones">
					<a href="../cerrar_sesion.php" type="button" class="btn btn-info" style="float: right; background-color:#5FA199; border-color:#5FA199">OK!</a>
				</div>
			</div>
		<?php endif; ?>
		</body>
</html>
