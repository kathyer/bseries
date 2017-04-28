<?php

function cambiarImagenLanding()
{
	return "img/dibujoLanding" . mt_rand(1,2) . ".png";
}

function crearMensajeError($mensaje)
{
	$_SESSION["error"] = $mensaje;
}

function crearMensajeExito($mensaje)
{
	$_SESSION["exito"] = $mensaje;
}

function mostrarErrores()
{
	if (isset($_SESSION["error"]))
	{
		echo "<div><p class='alert alert-danger'>" . $_SESSION["error"] . "</p></div>";
		unset($_SESSION["error"]);
	}
	if (isset($_SESSION["exito"]))
	{
		echo "<div><p class='alert alert-success'>" . $_SESSION["exito"] . "</p></div>";
		unset($_SESSION["exito"]);
	}
}

function renombrarImagen ($nombreImagen, $usuarioId) {
	return md5($usuarioId . microtime()) . substr ($nombreImagen, strripos($nombreImagen, '.'));
}

function borrarImagenPerfil ($id) {
	$nombreImagen = hacerListado("SELECT foto_perfil FROM usuarios WHERE id = $id")[0]['foto_perfil'];
	unlink("img/usuarios/$nombreImagen");
}

function cambiarFotoUsuario ($nombreImagen, $tmp, $nombreImagenRenombrado, $usuarioId) {
	move_uploaded_file($tmp, "img/usuarios/$nombreImagen");
	rename ("img/usuarios/$nombreImagen", "img/usuarios/$nombreImagenRenombrado");
	return ejecutarConsulta("UPDATE usuarios SET foto_perfil = '$nombreImagenRenombrado' WHERE id = $usuarioId");
}

function subirImagenAImgMuro ($nombreImagen, $tmp, $nombreImagenRenombrado) {
	move_uploaded_file($tmp, "img/muro/$nombreImagen");
	rename ("img/muro/$nombreImagen", "img/muro/$nombreImagenRenombrado");
}

?>
