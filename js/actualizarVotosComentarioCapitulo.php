<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/comentarios_modelo.php");

	if ($_POST)
	{
		votarComentarioCapitulo($_SESSION["usuario"]["id"], $_POST["id_comentario"], $_POST["tipoVoto"]);
		actualizarComentarioVotosCapitulo($_POST["id_comentario"]);
		$comentario = obtenerVotosComentarioCapituloPorIdYVotoDeUsuario($_POST["id_comentario"], $_SESSION["usuario"]["id"]);

		$puntuaciones = [];
		$puntuaciones["meGusta"] = $comentario["meGusta"];
		$puntuaciones["wtf"] = $comentario["wtf"];
		$puntuaciones["imagenBotonMeGusta"] = $comentario["tipoVoto"] == 2 ? "img/megustaBtnSombra.png" : "img/megustaBtn.png";
		$puntuaciones["imagenBotonWTF"] = $comentario["tipoVoto"] == 1 ? "img/wtfBtnSombra.png" : "img/wtfBtn.png";

		echo json_encode($puntuaciones);
	}
	else
	{
		echo "error";
	}
?>
