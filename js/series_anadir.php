<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/usuario_modelo.php");
	include_once("../modelos/serie_modelo.php");

	if ($_POST)
	{
		$idUsuario = $_SESSION["usuario"]["id"];
		$idSerie = $_POST["idSerie"];
		if(serieAnadidaAUsuario($idSerie, $idUsuario))
		{
			// Eliminamos la serie
			eliminarSerieDeUsuario($idSerie, $idUsuario);
			echo "img/anadirBtn.png";
		}
		else
		{
			// Añadimos la serie
			anadirSerieAUsuario($idSerie, $idUsuario);
			echo "img/borrarBtn.png";
		}
	}
	else
	{
		echo "error";
	}
?>
