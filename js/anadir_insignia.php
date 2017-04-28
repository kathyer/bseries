<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/insignias_modelo.php");

	anadirInsigniaAlUsuario($_SESSION['usuario']['id'], $_POST["insignia"]);
?>
