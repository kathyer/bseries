<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');
	include_once('modelos/teorias_modelo.php');

	$paginaSerie = "teorias";

	$pagina = empty($_GET['pag']) ? 1 : $_GET['pag'];
	$comentariosPorPagina = 5;
	$cantidadDePaginas = obtenerCantidadDeComtentariosTeoria($_GET['id_teoria'])/$comentariosPorPagina; // Calcula cuántas páginas va a haber en el muro

	$teoria = obtenerTeoriaPorId($_GET['id_teoria']);

	/* Si hemos enviado un comentario */
	if($_POST)
	{
		comentarTeoria($teoria["id"], $_SESSION["usuario"]["id"], $_POST["contenido"]);
	}

	$comentarios = obtenerComentariosPorTeoria($_GET['id_teoria']);


?>
