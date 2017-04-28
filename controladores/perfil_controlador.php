<?php
	include_once("modelos/login_snippet.php");
	include_once('modelos/usuario_modelo.php');
	include_once('modelos/serie_modelo.php');
	include_once('modelos/insignias_modelo.php');

	$soyYo = false;

	$seriesAMostrar = 4;
	$insigniasAMostrar = 6;
	$amigosAMostrar = 6;
	$usuarioId = empty($_GET["usuario"]) ? $_SESSION["usuario"]["id"] : $_GET["usuario"];

	// Inicializacion
	if ($usuarioId == $_SESSION["usuario"]["id"])
		$soyYo = true;

	// Recopila todos los datos
	$series = obtenerSeriesPorUsuario ($usuarioId);
	$seriesQueSigue = count($series);
	$insignias = obtenerInsigniasPorUsuario ($usuarioId);
	$insigniasQueTiene = count($insignias);
	$amigos = obtenerAmigosPorId ($usuarioId);
	$amigosQueTiene = count($amigos);
	$usuario = obtenerUsuarioPorId ($usuarioId);
	$nombre_display = $usuario['nombre_display'];
	$bio = $usuario['bio'];

?>
