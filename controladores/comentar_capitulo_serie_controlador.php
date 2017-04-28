<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');
	include_once('modelos/comentarios_modelo.php');

	$paginaSerie = "capitulos";

	$pagina = $_GET['pag'];
	$comentariosPorPagina = 5;
	$cantidadDePaginas = obtenerCantidadDeComtentariosCapitulo($_GET['capitulo_id'])/$comentariosPorPagina; // Calcula cuántas páginas va a haber en el muro

	if (!empty($_POST))
	{
		escribirComentarioEnCapitulo ($_POST['contenido'], $_SESSION['usuario']['id'], $_GET['capitulo_id']);
	}

	$capitulo = obtenerCapituloPorId ($_GET['capitulo_id']);
	$comentarios = obtenerComentariosPorCapitulo ($_GET['capitulo_id'], $comentariosPorPagina, $_GET['pag']);
?>
