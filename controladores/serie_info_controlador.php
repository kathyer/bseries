<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');

	$paginaSerie = "info";

	//$infoSerie = obtenerSeriePorId($id);
	$director = $serie['director'];
	$reparto = $serie['reparto'];
	$sinopsis = $serie['sinopsis'];
?>
