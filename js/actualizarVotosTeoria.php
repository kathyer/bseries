<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/teorias_modelo.php");

	/* Si recibimos datos del POST, actualizamos los votos */
	if ($_POST)
	{
		$tipoVoto = $_POST["tipoVoto"];
		$idUsuario = $_SESSION["usuario"]["id"];
		$idTeoria = $_POST["id_teoria"];

		votarTeoria($idUsuario, $idTeoria, $tipoVoto);
		actualizarVotosTeoria($idTeoria);
		$teoria = obtenerVotosTeoriaPorIdYVotoDeUsuario($idTeoria, $idUsuario);

		$puntuaciones = [];
		$puntuaciones["meGusta"] = $teoria["meGusta"];
		$puntuaciones["wtf"] = $teoria["wtf"];

		$puntuaciones["imagenBotonMeGusta"] = $teoria["tipoVoto"] == 2 ? "img/megustaBtnSombra.png" : "img/megustaBtn.png";
		$puntuaciones["imagenBotonWTF"] = $teoria["tipoVoto"] == 1 ? "img/wtfBtnSombra.png" : "img/wtfBtn.png";

		/* en teorias.js esto es el parámetro respuesta */
		echo json_encode($puntuaciones);
	}
?>