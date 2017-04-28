<?php
	include_once("modelos/login_snippet.php");
	include_once("modelos/serie_modelo.php");

	$series = obtenerIdTituloImagenDeTodasLasSeries();
	$totalSeries = count($series);

?>
