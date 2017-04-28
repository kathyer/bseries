<?php
	include_once("modelos/login_snippet.php");
	include_once('modelos/serie_modelo.php');
	include_once('modelos/insignias_modelo.php');

	$id = isset($_GET["id"]) ? $_GET["id"] : 1;

	$serie = obtenerSeriePorId($id);
	$insigniasSerie = obtenerInsigniasPorSerie($id);
	$cuentaInsigniasSerie = count($insigniasSerie);
	$votosSerie = obtenerVotosPorSerie($id);
	$countVotosSerie = count($votosSerie);

?>