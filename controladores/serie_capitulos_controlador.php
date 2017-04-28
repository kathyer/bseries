<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');

	$paginaSerie = "capitulos";

	$temporadas = obtenerTemporadasPorSerie ($_GET['id']);
?>
