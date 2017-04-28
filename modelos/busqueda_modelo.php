<?php
	include_once("conexion.php");

function buscarUsuarios($entrada)
{
	return hacerListado("SELECT id, nombre_display, foto_perfil FROM usuarios WHERE nombre_display like '%$entrada%'");
}

function buscarSeries($entrada)
{
	return hacerListado("SELECT id, titulo, nombre_imagen FROM series WHERE titulo like '%$entrada%'");
}

function compararNombresEnBusqueda($nombreBuscador, $nombreAComparar)
{
	
}

?>
