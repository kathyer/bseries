<?php
	include_once("modelos/login_snippet.php");
	include_once("modelos/usuario_modelo.php");

	rechazarSolicitudDeAmistad($_GET['id']);
	header("Location: mensajes.php");
?>
