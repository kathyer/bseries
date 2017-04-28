<?php
	session_start();
	include("modelos/usuario_modelo.php");
	desconectarUsuarioPorId ($_SESSION['usuario']['id']);
	$_SESSION = [];
	session_destroy();
	header("Location: index.php");
?>
