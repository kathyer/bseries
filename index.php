<?php
	session_start();
	include_once("modelos/funciones.php");
	include_once("modelos/sesion_modelo.php");
	include_once ("modelos/usuario_modelo.php");
	$imagen = cambiarImagenLanding();

	$nombre_usuario = "";
	$nombre = "";
	$correo = "";
	$contrasena = "";

	$mensajeValidacion = "";

	if($_POST)
	{
		if (isset($_POST["emailLogin"]))
		{
			$usuario = obtenerUsuarioPorCorreoYContrasena($_POST["emailLogin"], cifrarContrasena($_POST["contrasenaLogin"]));
			if ($usuario)
			{
				$_SESSION["usuario"] = $usuario;
			}
			else
			{
				crearMensajeError("Error. El correo o contraseña no es correcto");
			}
		}
		else
		{
			$validacion = comprobarErroresUsuario($_POST);

			echo $validacion;
			if ($validacion !== false)
			{
				// Creamos un mensaje de error informando de que la
				// validación ha fallado.
				$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";
				$nombre_usuario = isset($_POST["nick"]) ? $_POST["nick"] : "";
				$nombre = isset($_POST["nombre_display"]) ? $_POST["nombre_display"] : "";
				$correo = isset($_POST["correo"]) ? $_POST["correo"] : "";
				$contrasena = isset($_POST["contrasena"]) ? $_POST["contrasena"] : "";
			}
			else
			{
				$resultado = guardarUsuario($_POST);
				if ($resultado == true)
				{
					$_SESSION["usuario"] = obtenerUsuarioPorCorreoYContrasena($_POST["correo"], cifrarContrasena($_POST["contrasena"]));
				}
				else
				{
			    	echo "Ha ocurrido un fallo al guardar el usuario.";
				}
			}
		}
	}

	if (isset($_SESSION["usuario"]))
	{
		header("location: muro.php?pag=1");
	}

	// Los valores iniciales de los datos los ponemos aquí.

 ?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="utf-8">

<title>Bseries Inicio de sesión</title>

	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
	<script defer src="js/landing.js"></script>
	<link rel="icon" href="img/logo.png">

</head>

<body class="fondoRojo">

	<div class="col-lg-12 fondoBlancoRoto centrarCabecera">
		<img width="20%" height="auto" src="img/bseries_logo.png"><br>
	</div>

	<!--Imagen despues del logo-->
	<div class="container">
		<div class="centrarDivImagen">
			<img class="centrarImagen" width="60%" height="auto" src="<?= $imagen ?>"/><br>
		</div>
		<div class="col-md-12">
			<div class="col-md-6 centrarContenido">
				<h3 class="fuenteFraseLnding">Are u serious?</h3>
			</div>
			<div class="col-md-6 centrarContenido">
				<h3 class="fuenteFraseLnding">Or are u series?</h3>
			</div>
		</div>

		 <!--iniciar sesion como usuario-->
		<div class="col-md-12 centrarContenido">
			<div class="centrarContenido">
				<button id="botonLandingInicioSesion" class="botonLanding">Inicia sesión</button>
				<span class="rayita">|</span>
				<button id="botonLandingr" class="botonLanding">Registrate</button>
			</div>
		</div>

		<?php mostrarErrores();?>

		<div class= "formularioInicioSesion">
			<form class="form-horizontal" method="POST">
				<div class="form-group">
					<label for="emailLogin" class="col-sm-offset-2 col-sm-2 control-label">Email o usuario</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="emailLogin" id="emailLogin" placeholder="Email">
					</div>
				</div>
				<br>
				<div class="form-group">
					<label for="contrasenaLogin" class="col-sm-offset-2 col-sm-2 control-label">Contraseña</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="contrasenaLogin" id="contrasenaLogin" placeholder="Password">
						</div>
				</div>
				<br><br>
				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-2">
						<input type="submit" class="btn btn-default"  value="Entrar">
					</div>
				</div>
			</form>
		</div>
		<br><br>

		<!--iniciar sesion registro-->
		<div class ="formularioRegistro">
			<form class="form-horizontal" method="POST">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Nombre de usuario</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nick" id="nombre" required="required" placeholder="Nombre Usuario" value="<?= $nombre_usuario ?>">
					</div>
				</div><br>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Nombre</label>
					<div class="col-md-4">
						<input type="text" class="form-control" name="nombre_display" id="nombreCompleto" required="required" placeholder="Nombre" value="<?= $nombre ?>">
					</div>
				</div><br>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-offset-2 col-sm-2 control-label">Email</label>
					<div class="col-md-4">
						<input type="email" class="form-control" id="correo" name="correo" required="required" placeholder="Email" value="<?= $correo ?>">
					</div>
				</div><br>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-offset-2 col-sm-2 control-label">Contraseña</label>
						<div class="col-md-4">
							<input type="password" class="form-control" name="contrasena" id="contrasena" required="required" placeholder="Password" value="<?= $contrasena ?>">
						</div>
				</div><br>

				<div class="form-group">
					<label for="inputPassword3" class="col-sm-offset-2 col-sm-2 control-label">Confirma contraseña</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="contrasena2" required="required" placeholder="Confirm Password" name="contrasena2" value="<?= $contrasena ?>">
						</div>
				</div><br><br>

				<div class="form-group">
					<div class="col-sm-offset-5 col-sm-2">
						<button type="submit" class="btn btn-default" value="registrarse">Registrarse</button>
					</div>
				</div>

			</form>
		</div>
	</div>
</body>

</html>
