<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/teorias_modelo.php");
	include_once("../modelos/comentarios_modelo.php");

	/* Si recibimos datos del POST, actualizamos los votos */
	if ($_POST)
	{
		$tipoVoto = $_POST["tipoVoto"];
		$idUsuario = $_SESSION["usuario"]["id"];
		$idComentarioTeoria = $_POST["id_comentario_teoria"];

		votarComentarioTeoria($idUsuario, $idComentarioTeoria, $tipoVoto);
		actualizarComentarioVotosTeoria($idComentarioTeoria);
		$comentarioTeoria = obtenerVotosComentarioTeoriaPorIdYVotoDeUsuario($idComentarioTeoria, $idUsuario);

		$puntuaciones = [];
		$puntuaciones["meGusta"] = $comentarioTeoria["meGusta"];
		$puntuaciones["wtf"] = $comentarioTeoria["wtf"];

		$puntuaciones["imagenBotonMeGusta"] = $comentarioTeoria["tipoVoto"] == 2 ? "img/megustaBtnSombra.png" : "img/megustaBtn.png";
		$puntuaciones["imagenBotonWTF"] = $comentarioTeoria["tipoVoto"] == 1 ? "img/wtfBtnSombra.png" : "img/wtfBtn.png";

		/* en teorias.js esto es el parámetro respuesta */
		echo json_encode($puntuaciones);
	}
?>