<?php
	include_once ("modelos/login_snippet.php");
	include_once ("modelos/comentarios_modelo.php");
	include_once ("modelos/funciones.php");
	include_once ("controladores/serie_master_controlador.php");

	$pagina = $_GET['pag'];
	$comentariosPorPagina = 5;
	$cantidadDePaginas = obtenerCantidadDeComtentariosHumor($_GET['id'])/$comentariosPorPagina; // Calcula cuántas páginas va a haber en el muro

	$paginaSerie = "humor";

	if (!empty($_POST)) {
		$comentario = $_POST;
		if ($_FILES['imagen']['error'] != 4) { // si hay foto
			$nombreImagenRenombrado = renombrarImagen($_FILES['imagen']['name'], $_SESSION['usuario']['id']);
			subirImagenAImg ($_FILES['imagen']['name'], $_FILES['imagen']['tmp_name'], $nombreImagenRenombrado);
			$comentario['imagen_comentario'] = $nombreImagenRenombrado;
		} else {
			$comentario['imagen_comentario'] = NULL;
		}
		anadirComentarioAHumor ($comentario['contenido'], $_SESSION['usuario']['id'], $id, $comentario['imagen_comentario']);
	}

	$comentarios = obtenerComentariosHumor($id, $comentariosPorPagina, $_GET['pag']);

	if (count($comentarios) <= 0) {
		$sinComentarios = true;
	}

?>
