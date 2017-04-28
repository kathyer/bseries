<?php
include_once("../modelos/login_snippet.php");
include_once("../modelos/serie_modelo.php");

	if ($_POST)
	{
		$nota = comprobarVoto($_POST["idSerie"], $_SESSION["usuario"]["id"]);
		if ($nota)
		{
			cambiarVotoSerie ($_POST["voto"], $_POST["idSerie"], $_SESSION["usuario"]["id"]);
		}
		else
		{
			votarSerie($_POST["voto"], $_POST["idSerie"], $_SESSION["usuario"]["id"]);
		}

		actualizarVotoSerie($_POST["idSerie"]);

		echo obtenerNotaMediaPorSerie($_POST["idSerie"]);
	}
?>