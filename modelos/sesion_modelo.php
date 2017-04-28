<?php
	include_once("conexion.php");

function obtenerUsuarioPorCorreoYContrasena($correoOnick, $contrasena)
{
	$usuarios = hacerListado("SELECT * FROM usuarios WHERE (correo='$correoOnick' OR nick='$correoOnick') AND contrasena='$contrasena'");

	if (count($usuarios) <= 0)
	{
		return false;
	}
	else
	{
		return $usuarios[0];
	}
}

?>
