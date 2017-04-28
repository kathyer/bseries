<?php

/*
Tipos de Voto:
1 - WTF
2 - Me gusta
*/

include_once ("conexion.php");

function obtenerComentariosMuro ($array, $pagina, $comentariosPorPagina)
{
	return hacerListado("SELECT cm.id, id_usuario, contenido, meGusta, wtf, spoil, imagen_comentario, nombre_display, foto_perfil FROM comentarios_muro AS cm JOIN usuarios AS u ON cm.id_usuario = u.id WHERE u.id IN (" . implode(',', $array) . ") ORDER BY fecha DESC LIMIT $comentariosPorPagina OFFSET " . ($pagina - 1) * $comentariosPorPagina);
}

function obtenerCantidadDeComtentariosMuro ($array)
{
	return hacerListado("SELECT count(id) FROM comentarios_muro WHERE id_usuario IN (" . implode(',', $array) . ")")[0]['count(id)'];
}

function anadirComentarioAlMuro ($contenido, $idComentarista, $spoil)
{
	return ejecutarConsulta("INSERT INTO comentarios_muro (id, contenido, spoil) VALUES ($idComentarista, $contenido, $spoil)");
}

/*###########################################################################################
#																							#
#											HUMOR											#
#																							#
###########################################################################################*/

/* Recupera todos los comentarios de humor de la serie seleccionada, así como el tipo de voto del usuario logeado en caso de que hubiera */
function obtenerComentariosHumor($serieId, $comentariosPorPagina, $pagina)
{
	$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, contenido, fecha, id_serie, meGusta, wtf, tipoVoto, imagen_comentario, foto_perfil, nombre_display FROM (SELECT id, id_usuario, id_serie, contenido, fecha, meGusta, wtf, imagen_comentario, tipoVoto FROM humor_comentarios LEFT JOIN (SELECT id_humor_comentario, tipoVoto FROM humor_votos WHERE id_usuario = $usuarioLogeado) AS votos ON humor_comentarios.id = votos.id_humor_comentario) AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id WHERE id_serie = $serieId ORDER BY fecha DESC LIMIT $comentariosPorPagina OFFSET " . ($pagina - 1) * $comentariosPorPagina);
}

function obtenerComentarioHumorPorId($idComentario)
{
	return hacerListado("SELECT hc.id, id_usuario, contenido, fecha, id_serie, meGusta, wtf, imagen_comentario, foto_perfil, nombre_display FROM humor_comentarios AS hc JOIN usuarios AS u ON hc.id_usuario = u.id WHERE hc.id = $idComentario;")[0];

	/*$usuarioLogeado = $_SESSION["usuario"]["id"];

		return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, contenido, fecha, id_serie, meGusta, wtf, tipoVoto, imagen_comentario, foto_perfil, nombre_display FROM (SELECT id, id_usuario, id_serie, contenido, fecha, meGusta, wtf, imagen_comentario, tipoVoto FROM humor_comentarios LEFT JOIN (SELECT id_humor_comentario, tipoVoto FROM humor_votos WHERE id_usuario = $usuarioLogeado) AS votos ON humor_comentarios.id = votos.id_humor_comentario) AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id WHERE comentariosYVotos.id = $idComentario;")[0];*/
}

function obtenerVotosPorIdYVotoDeUsuario($idComentario, $idUsuario)
{
	return hacerListado("SELECT meGusta, wtf , tipoVoto FROM humor_comentarios AS hc LEFT JOIN (SELECT id_usuario, id_humor_comentario, tipoVoto FROM usuarios LEFT JOIN humor_votos ON usuarios.id = humor_votos.id_usuario WHERE id_usuario = $idUsuario) AS votosPorUsuario ON hc.id = votosPorusuario.id_humor_comentario WHERE id = $idComentario;")[0];
}

function obtenerVotosPorIdYVotoDeUsuarioMuro($idComentario, $idUsuario)
{
	return hacerListado("SELECT meGusta, wtf , tipoVoto FROM comentarios_muro AS hc LEFT JOIN (SELECT id_usuario, id_muro_comentario, tipoVoto FROM usuarios LEFT JOIN muro_votos ON usuarios.id = muro_votos.id_usuario WHERE id_usuario = $idUsuario) AS votosPorUsuario ON hc.id = votosPorusuario.id_muro_comentario WHERE id = $idComentario;")[0];
}


function anadirComentarioAHumor($contenido, $idComentarista, $idSerie, $imagenComentario)
{
	return ejecutarConsulta("INSERT INTO humor_comentarios (id_usuario, id_serie, contenido, imagen_comentario) VALUES ($idComentarista, $idSerie, '$contenido', '$imagenComentario')");
}

function cambiarVotoHumor($idUsuario, $idComentario, $tipoVoto)
{
	ejecutarConsulta("UPDATE `humor_votos` SET `tipoVoto` = '$tipoVoto' WHERE id_humor_comentario = '$idComentario' AND id_usuario = '$idUsuario';");
}

function eliminarVotoHumor($idUsuario, $idComentario)
{
	$consulta = "DELETE FROM humor_votos WHERE id_humor_comentario = '$idComentario' AND id_usuario = '$idUsuario';";
	ejecutarConsulta($consulta);
}

function obtenerVotoHumor($idUsuario, $idComentario)
{
	$voto = hacerListado("SELECT tipoVoto FROM humor_votos WHERE id_humor_comentario = '$idComentario' AND id_usuario = '$idUsuario';");

	if (empty($voto))
		return false;
	return $voto[0]["tipoVoto"];
}

function obtenerVotoComentario($idUsuario, $idComentario)
{
	$voto = hacerListado("SELECT tipoVoto FROM muro_votos WHERE id_muro_comentario = '$idComentario' AND id_usuario = '$idUsuario';");

	if (empty($voto))
		return false;
	return $voto[0]["tipoVoto"];
}

function eliminarVotoComentario($idUsuario, $idComentario)
{
	$consulta = "DELETE FROM muro_votos WHERE id_muro_comentario = '$idComentario' AND id_usuario = '$idUsuario';";
	ejecutarConsulta($consulta);
}

function cambiarVotoComentario($idUsuario, $idComentario, $tipoVoto)
{
	ejecutarConsulta("UPDATE `muro_votos` SET `tipoVoto` = '$tipoVoto' WHERE id_muro_comentario = '$idComentario' AND id_usuario = '$idUsuario';");
}

function votarComentario($idUsuario, $idComentario, $tipoVoto)
{
	$voto = obtenerVotoComentario($idUsuario, $idComentario);

	/* Primero buscamos si el usuario ha votado antes */
	if (!$voto)
	{
		/* En caso de que sea falso, es que el usuario no ha votado e insertamos un voto */
		ejecutarConsulta("INSERT INTO `muro_votos` (`id_muro_comentario`, `id_usuario`, `tipoVoto`) VALUES ('$idComentario', '$idUsuario', '$tipoVoto');");
	}
	else
	{
		/* En caso de que el usuario ha votado, comprobamos si el voto nuevo es el mismo. Si es el mismo, lo eliminamos y si es distinto, lo cambiamos */
		if ($tipoVoto == $voto)
		{
			eliminarVotoComentario($idUsuario, $idComentario);
		}
		else
		{
			/* En este caso, el voto es distinto por lo cual lo cambiamos */
			cambiarVotoComentario($idUsuario, $idComentario, $tipoVoto);
		}
	}
}


function votarHumor($idUsuario, $idComentario, $tipoVoto)
{
	$voto = obtenerVotoHumor($idUsuario, $idComentario);

	/* Primero buscamos si el usuario ha votado antes */
	if (!$voto)
	{
		/* En caso de que sea falso, es que el usuario no ha votado e insertamos un voto */
		ejecutarConsulta("INSERT INTO `humor_votos` (`id_humor_comentario`, `id_usuario`, `tipoVoto`) VALUES ('$idComentario', '$idUsuario', '$tipoVoto');");
	}
	else
	{
		/* En caso de que el usuario ha votado, comprobamos si el voto nuevo es el mismo. Si es el mismo, lo eliminamos y si es distinto, lo cambiamos */
		if ($tipoVoto == $voto)
		{
			eliminarVotoHumor($idUsuario, $idComentario);
		}
		else
		{
			/* En este caso, el voto es distinto por lo cual lo cambiamos */
			cambiarVotoHumor($idUsuario, $idComentario, $tipoVoto);
		}
	}
}

/* Función que vuelve a contar cuantos votos WTF e HUMOR tiene un comentario y actualiza sus campos correspondientes */
function actualizarVotosHumor($idComentario)
{
	$votos = hacerListado("SELECT tipoVoto, count(tipoVoto) AS votos FROM humor_votos WHERE id_humor_comentario = '$idComentario' GROUP BY tipoVoto;");

	/* Ahora rellenamos las variables para saber cuantos votos tenemos
	Tipos de Voto:
	1 - WTF
	2 - Like
	*/

	$votosLike = 0;
	$votosWTF = 0;

	/* Hago esto debido a que la consulta devuevle dos filas con dos columnas. La primera columna indica el tipo de voto y la segunda el número de votos que tiene
	De esta forma busco la fila que tiene de tipoVoto 1 (WTF) y cuento cuantos tiene. Y luego sigo buscando la fila que tiene tipoVoto 2 (Me gusta). De esta forma nos prevenimos
	ante posibles errores y que se devuelvan 3 filas o mas con tipos de voto distintos. */
	foreach ($votos as $voto)
	{
		if ($voto["tipoVoto"] == 1) // WTF
		{
			$votosWTF = $voto["votos"];
		}
		else
		{
			if ($voto["tipoVoto"] == 2) // Me gusta
				$votosLike = $voto["votos"];
		}
	}

	/* Ahora tenemos los votos en las variables y actualizamos el contador de votos del comentario */
	ejecutarConsulta("UPDATE `humor_comentarios` SET `meGusta` = '$votosLike', `wtf` = '$votosWTF' WHERE `humor_comentarios`.`id` = $idComentario;");

}


/* Función que vuelve a contar cuantos votos WTF e HUMOR tiene un comentario y actualiza sus campos correspondientes */
function actualizarVotosComentario($idComentario)
{
	$votos = hacerListado("SELECT tipoVoto, count(tipoVoto) AS votos FROM muro_votos WHERE id_muro_comentario = '$idComentario' GROUP BY tipoVoto;");

	/* Ahora rellenamos las variables para saber cuantos votos tenemos
	Tipos de Voto:
	1 - WTF
	2 - Like
	*/

	$votosLike = 0;
	$votosWTF = 0;

	/* Hago esto debido a que la consulta devuevle dos filas con dos columnas. La primera columna indica el tipo de voto y la segunda el número de votos que tiene
	De esta forma busco la fila que tiene de tipoVoto 1 (WTF) y cuento cuantos tiene. Y luego sigo buscando la fila que tiene tipoVoto 2 (Me gusta). De esta forma nos prevenimos
	ante posibles errores y que se devuelvan 3 filas o mas con tipos de voto distintos. */
	foreach ($votos as $voto)
	{
		if ($voto["tipoVoto"] == 1) // WTF
		{
			$votosWTF = $voto["votos"];
		}
		else
		{
			if ($voto["tipoVoto"] == 2) // Me gusta
				$votosLike = $voto["votos"];
		}
	}

	/* Ahora tenemos los votos en las variables y actualizamos el contador de votos del comentario */
	ejecutarConsulta("UPDATE `comentarios_muro` SET `meGusta` = '$votosLike', `wtf` = '$votosWTF' WHERE `comentarios_muro`.`id` = $idComentario;");

}


/*----------------------------------------------------------------------------------------------------------------------
												COMENTARIOS CAPITULOS
-----------------------------------------------------------------------------------------------------------------------*/

function escribirComentarioEnCapitulo ($contenido, $idUsuario, $idCapitulo) {
	ejecutarConsulta("INSERT INTO capitulos_comentarios (contenido, id_usuario, id_capitulo) VALUES ('$contenido', $idUsuario, $idCapitulo)");
}

function obtenerComentariosPorCapitulo ($idCapitulo, $comentariosPorPagina, $pagina) {

	$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, id_usuario, nombre_display, foto_perfil, contenido, meGusta, wtf, tipoVoto FROM (SELECT id, id_usuario, contenido, meGusta, wtf, tipoVoto FROM capitulos_comentarios LEFT JOIN (SELECT id_comentario_capitulo, tipoVoto FROM capitulos_comentarios_votos) as votos ON capitulos_comentarios.id = votos.id_comentario_capitulo WHERE id_capitulo = '$idCapitulo') AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id LIMIT $comentariosPorPagina OFFSET " . ($pagina - 1) * $comentariosPorPagina);
}

function obtenerCantidadDeComtentariosCapitulo ($idCapitulo) {
	return hacerListado("SELECT count(id) FROM capitulos_comentarios WHERE id_capitulo = $idCapitulo")[0]['count(id)'];
}

function obtenerCantidadDeComtentariosHumor ($idSerie) {
	return hacerListado("SELECT count(id) FROM humor_comentarios WHERE id_serie = $idSerie")[0]['count(id)'];
}

function obtenerVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo) 
{

	/* si devuelve 0 filas es que el usuario no ha votado, si devuelve algo es que ha votado o 1 o 2 */
	$voto = hacerListado("SELECT tipoVoto FROM capitulos_comentarios_votos WHERE id_comentario_capitulo = '$idComentarioCapitulo' AND id_usuario = '$idUsuario';");

	if (empty($voto))
		return false;
	return $voto[0]["tipoVoto"];
}

function cambiarVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo, $tipoVoto)
{
	return ejecutarConsulta("UPDATE capitulos_comentarios_votos SET `tipoVoto` = '$tipoVoto' WHERE id_comentario_capitulo = '$idComentarioCapitulo' AND id_usuario = '$idUsuario';");
}

function eliminarVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo)
{
	return ejecutarConsulta("DELETE FROM capitulos_comentarios_votos WHERE id_comentario_capitulo = '$idComentarioCapitulo' AND id_usuario = '$idUsuario';");
}

function votarComentarioCapitulo($idUsuario, $idComentarioCapitulo, $tipoVoto)
{
	$voto = obtenerVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo);

	/*
	1 WTF
	2 Me gusta
	*/

	/* Primero buscamos si el usuario ha votado antes */
	if (!$voto)
	{
		/* En caso de que sea falso, es que el usuario no ha votado e insertamos un voto */
		ejecutarConsulta("INSERT INTO capitulos_comentarios_votos (`id_comentario_capitulo`, `id_usuario`, `tipoVoto`) VALUES ('$idComentarioCapitulo', '$idUsuario', '$tipoVoto');");
	}
	else
	{
		/* En caso de que el usuario ha votado, comprobamos si el voto nuevo es el mismo. Si es el mismo, lo eliminamos y si es distinto, lo cambiamos */
		if ($tipoVoto == $voto)
		{
			eliminarVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo);
		}
		else
		{
			/* En este caso, el voto es distinto por lo cual lo cambiamos */
			cambiarVotoComentarioCapitulo($idUsuario, $idComentarioCapitulo, $tipoVoto);
		}
	}
}

/* Función que vuelve a contar cuantos votos WTF e HUMOR tiene un comentario y actualiza sus campos correspondientes */
function actualizarComentarioVotosCapitulo($idComentarioCapitulo)
{
	$votos = hacerListado("SELECT tipoVoto, count(tipoVoto) AS votos FROM capitulos_comentarios_votos WHERE id_comentario_capitulo = '$idComentarioCapitulo' GROUP BY tipoVoto;");

	/* Ahora rellenamos las variables para saber cuantos votos tenemos
	Tipos de Voto:
	1 - WTF
	2 - Like
	*/

	$votosLike = 0;
	$votosWTF = 0;

	/* Hago esto debido a que la consulta devuevle dos filas con dos columnas. La primera columna indica el tipo de voto y la segunda el número de votos que tiene
	De esta forma busco la fila que tiene de tipoVoto 1 (WTF) y cuento cuantos tiene. Y luego sigo buscando la fila que tiene tipoVoto 2 (Me gusta). De esta forma nos prevenimos
	ante posibles errores y que se devuelvan 3 filas o mas con tipos de voto distintos. */
	foreach ($votos as $voto)
	{
		if ($voto["tipoVoto"] == 1) // WTF
		{
			$votosWTF = $voto["votos"];
		}
		else
		{
			if ($voto["tipoVoto"] == 2) // Me gusta
				$votosLike = $voto["votos"];
		}
	}

	/* Ahora tenemos los votos en las variables y actualizamos el contador de votos del comentario */
	ejecutarConsulta("UPDATE capitulos_comentarios SET meGusta = '$votosLike', wtf = '$votosWTF' WHERE id = $idComentarioCapitulo;");

}

function obtenerVotosComentarioCapituloPorIdYVotoDeUsuario($idComentario, $idUsuario)
{
	return hacerListado("SELECT meGusta, wtf, tipoVoto FROM capitulos_comentarios LEFT JOIN (SELECT id_usuario, id_comentario_capitulo, tipoVoto FROM capitulos_comentarios_votos WHERE id_usuario = $idUsuario) AS votos ON capitulos_comentarios.id = votos.id_comentario_capitulo WHERE capitulos_comentarios.id = $idComentario;")[0];
}


/*----------------------------------------------------------------------------------------------------------------------
												COMENTARIOS TEORÍAS
-----------------------------------------------------------------------------------------------------------------------*/

function obtenerComentariosPorTeoria($idTeoria)
{
	$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, id_serie, contenido, meGusta, wtf, tipoVoto, foto_perfil, nombre_display FROM ( SELECT id, id_usuario, id_serie, contenido, fecha, meGusta, wtf, tipoVoto FROM teoria_comentarios LEFT JOIN (SELECT id_teoria_comentarios, tipoVoto FROM teoria_comentarios_votos WHERE id_usuario = '$usuarioLogeado') as votos ON teoria_comentarios.id = votos.id_teoria_comentarios WHERE id_teoria = '$idTeoria') AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id ORDER BY fecha ASC;");
}

function obtenerCantidadDeComtentariosTeoria ($id)
{
	return hacerListado("SELECT count(id) FROM teoria_comentarios WHERE id_teoria = $id")[0]['count(id)'];
}

function cambiarVotoComentarioTeoria($idUsuario, $idComentarioTeoria, $tipoVoto)
{
	ejecutarConsulta("UPDATE `teoria_comentarios_votos` SET `tipoVoto` = '$tipoVoto' WHERE id_teoria_comentarios = '$idComentarioTeoria' AND id_usuario = '$idUsuario';");
}

function eliminarVotoComentarioTeoria($idUsuario, $idComentarioTeoria)
{
	$consulta = "DELETE FROM teoria_comentarios_votos WHERE id_teoria_comentarios = '$idComentarioTeoria' AND id_usuario = '$idUsuario';";
	ejecutarConsulta($consulta);
}

function obtenerVotoComentarioTeoria($idUsuario, $idComentarioTeoria) 
{

	/* si devuelve 0 filas es que el usuario no ha votado, si devuelve algo es que ha votado o 1 o 2 */
	$voto = hacerListado("SELECT tipoVoto FROM teoria_comentarios_votos WHERE id_teoria_comentarios = '$idComentarioTeoria' AND id_usuario = '$idUsuario';");

	if (empty($voto))
		return false;
	return $voto[0]["tipoVoto"];
}

function votarComentarioTeoria($idUsuario, $idComentarioTeoria, $tipoVoto)
{
	$voto = obtenerVotoComentarioTeoria($idUsuario, $idComentarioTeoria);

	/*
	1 WTF
	2 Me gusta
	*/

	/* Primero buscamos si el usuario ha votado antes */
	if (!$voto)
	{
		/* En caso de que sea falso, es que el usuario no ha votado e insertamos un voto */
		ejecutarConsulta("INSERT INTO `teoria_comentarios_votos` (`id_teoria_comentarios`, `id_usuario`, `tipoVoto`) VALUES ('$idComentarioTeoria', '$idUsuario', '$tipoVoto');");
	}
	else
	{
		/* En caso de que el usuario ha votado, comprobamos si el voto nuevo es el mismo. Si es el mismo, lo eliminamos y si es distinto, lo cambiamos */
		if ($tipoVoto == $voto)
		{
			eliminarVotoComentarioTeoria($idUsuario, $idComentarioTeoria);
		}
		else
		{
			/* En este caso, el voto es distinto por lo cual lo cambiamos */
			cambiarVotoComentarioTeoria($idUsuario, $idComentarioTeoria, $tipoVoto);
		}
	}
}

/* Función que vuelve a contar cuantos votos WTF e HUMOR tiene un comentario y actualiza sus campos correspondientes */
function actualizarComentarioVotosTeoria($idComentarioTeoria)
{
	$votos = hacerListado("SELECT tipoVoto, count(tipoVoto) AS votos FROM teoria_comentarios_votos WHERE id_teoria_comentarios = '$idComentarioTeoria' GROUP BY tipoVoto;");

	/* Ahora rellenamos las variables para saber cuantos votos tenemos
	Tipos de Voto:
	1 - WTF
	2 - Like
	*/

	$votosLike = 0;
	$votosWTF = 0;

	/* Hago esto debido a que la consulta devuevle dos filas con dos columnas. La primera columna indica el tipo de voto y la segunda el número de votos que tiene
	De esta forma busco la fila que tiene de tipoVoto 1 (WTF) y cuento cuantos tiene. Y luego sigo buscando la fila que tiene tipoVoto 2 (Me gusta). De esta forma nos prevenimos
	ante posibles errores y que se devuelvan 3 filas o mas con tipos de voto distintos. */
	foreach ($votos as $voto)
	{
		if ($voto["tipoVoto"] == 1) // WTF
		{
			$votosWTF = $voto["votos"];
		}
		else
		{
			if ($voto["tipoVoto"] == 2) // Me gusta
				$votosLike = $voto["votos"];
		}
	}

	/* Ahora tenemos los votos en las variables y actualizamos el contador de votos del comentario */
	ejecutarConsulta("UPDATE teoria_comentarios SET meGusta = '$votosLike', wtf = '$votosWTF' WHERE id = $idComentarioTeoria;");

}

function obtenerVotosComentarioTeoriaPorIdYVotoDeUsuario($idComentario, $idUsuario)
{
	return hacerListado("SELECT meGusta, wtf , tipoVoto FROM teoria_comentarios AS hc LEFT JOIN (SELECT id_usuario, id_teoria_comentarios, tipoVoto FROM usuarios LEFT JOIN teoria_comentarios_votos ON usuarios.id = teoria_comentarios_votos.id_usuario WHERE id_usuario = $idUsuario) AS votosPorUsuario ON hc.id = votosPorusuario.id_teoria_comentarios WHERE id = $idComentario;")[0];	
}

?>
