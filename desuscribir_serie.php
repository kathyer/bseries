<?php
	include_once("modelos/login_snippet.php");
	include_once("modelos/serie_modelo.php");

	eliminarSerieDeUsuario($_GET["id"], $_SESSION['usuario']['id']);
	header("Location: perfil.php");
	?>
