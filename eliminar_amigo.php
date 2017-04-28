<?php
	include_once("modelos/login_snippet.php");
	include_once("modelos/usuario_modelo.php");

	eliminarAmigo($_GET["amigo"]);
	header("Location: perfil.php");
	?>
