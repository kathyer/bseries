<?php
	include_once("modelos/mensajeria_modelo.php");
	include_once("modelos/login_snippet.php");

	borrarMensajePorId($_GET['id']);

	if (!empty($_GET["enviados"]))
		header("Location: enviados.php");
	else
		header("Location: mensajes.php");
?>
