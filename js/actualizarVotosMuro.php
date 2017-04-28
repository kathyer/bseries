<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/comentarios_modelo.php");

	/* Si recibimos datos del POST, actualizamos los votos */
	if ($_POST)
	{
		votarComentario($_SESSION["usuario"]["id"], $_POST["id_comentario"], $_POST["tipoVoto"]);
		actualizarVotosComentario($_POST["id_comentario"]);
		$comentario = obtenerVotosPorIdYVotoDeUsuarioMuro($_POST["id_comentario"], $_SESSION["usuario"]["id"]);

		$puntuaciones = [];
		$puntuaciones["meGusta"] = $comentario["meGusta"];
		$puntuaciones["wtf"] = $comentario["wtf"];
		$puntuaciones["imagenBotonMeGusta"] = $comentario["tipoVoto"] == 2 ? "img/megustaBtnSombra.png" : "img/megustaBtn.png";
		$puntuaciones["imagenBotonWTF"] = $comentario["tipoVoto"] == 1 ? "img/wtfBtnSombra.png" : "img/wtfBtn.png";

		echo json_encode($puntuaciones);
	}
?>
