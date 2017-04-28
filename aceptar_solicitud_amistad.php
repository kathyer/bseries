<?php
	include_once("modelos/login_snippet.php");
	include_once("modelos/usuario_modelo.php");
	aceptarAmistad($_GET['id'], $_SESSION['usuario']['id']);
	header("Location: mensajes.php");
?>
