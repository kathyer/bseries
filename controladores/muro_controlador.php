<?php
	include_once("modelos/login_snippet.php");
	include_once('modelos/usuario_modelo.php');
	include_once('modelos/serie_modelo.php');
	include_once('modelos/comentarios_modelo.php');
	include_once('modelos/insignias_modelo.php');
	include_once('modelos/funciones.php');

	$usuarioId = $_SESSION['usuario']['id'];

	// Recoge los amigos
	$amigos = obtenerIdAmigosPorId($usuarioId);
	$listadoAmigos = [$usuarioId];
	foreach ($amigos as $amigo){
	$listadoAmigos[] = $amigo['id_amigo'];
	}

	// inicializa variables
	$pagina = $_GET['pag'];
	$comentariosPorPagina = 5;
	$cantidadDePaginas = obtenerCantidadDeComtentariosMuro($listadoAmigos)/$comentariosPorPagina; // Calcula cuántas páginas va a haber en el muro
	$seriesAMostrar = 3;

	// Recoge los datos del usuario
	$usuario = obtenerUsuarioPorId($usuarioId);
	$seriesUsuario = obtenerSeriesPorUsuario($usuarioId);
	$insignias = obtenerInsigniasPorUsuario($usuarioId);

	// Escribe tu comentario, si lo has hecho
	if (!empty($_POST)) {
		$comentario = $_POST;
		$comentario = array_merge ($comentario, ["id_usuario" => $usuarioId]);
		if ($_FILES['imagen_comentario']['error'] != 4) {
			$nombreImagenRenombrado = renombrarImagen($_FILES['imagen_comentario']['name'], $_SESSION['usuario']['id']);
			subirImagenAImgMuro ($_FILES['imagen_comentario']['name'], $_FILES['imagen_comentario']['tmp_name'], $nombreImagenRenombrado);
			$comentario['imagen_comentario'] = $nombreImagenRenombrado;
		}
		ejecutarConsulta(consultaInsert($comentario, "comentarios_muro"));
	}
	// Lista las noticias de los amigos y del usuario
	$noticias = obtenerComentariosMuro($listadoAmigos, $pagina, $comentariosPorPagina);

?>
