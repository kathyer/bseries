<?php
  include_once("conexion.php");

function obtenerInsigniasPorSerie ($id) {
	return hacerListado("SELECT * FROM insignias WHERE id_serie = $id");
}

function contarInsigniasPorUsuario ($id){
	return hacerListado("SELECT count(insignias.id) FROM insignias JOIN usuarios WHERE usuarios.id = $id")[0]['count(insignias.id)'];
}

function obtenerInsigniasPorUsuario ($id) {
	return hacerListado("SELECT insignias.id, imagen_insignia, id_serie FROM insignias JOIN usuarios_insignias ON (insignias.id = usuarios_insignias.id_insignia) WHERE usuarios_insignias.id_usuario = $id;");
}

function anadirInsigniaAlUsuario ($idUsuario, $idInsignia)
{
	/* Primero comprobamos si esa insignia la tiene el usuario y en caso de que no la tenga, la insertamos */
	if (empty(hacerListado("SELECT * FROM usuarios_insignias WHERE id_usuario = $idUsuario AND id_insignia = $idInsignia")))
		ejecutarConsulta("INSERT INTO usuarios_insignias (id_usuario, id_insignia) VALUES ($idUsuario, $idInsignia)");

}



function borrarInsigniaUsuario ($idUsuario, $idInsignia)
{
	return ejecutarConsulta("DELETE FROM usuarios_insignias WHERE id_usuario = $idUsuario AND id_insignia = $idInsignia");
}

 ?>
