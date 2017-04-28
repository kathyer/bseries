<?php
  include_once("conexion.php");

 /*--------------------------------------- obtener teorías---------------------------------- */

	function obtenerTeoriasPorSerie ($id) {
	return hacerListado("SELECT * FROM teorias WHERE id_serie = $id");
}

function obtenerTeoriasPorSerieConVotos($serieId)
{
	$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, titulo, cuerpo, id_serie, meGusta, wtf, tipoVoto, nombre_display FROM (SELECT id, id_usuario, id_serie, titulo, cuerpo, fecha, meGusta, wtf, tipoVoto FROM teorias LEFT JOIN (SELECT id_teoria, tipoVoto FROM teorias_votos WHERE id_usuario = $usuarioLogeado) AS votos ON teorias.id = votos.id_teoria) AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id WHERE id_serie = $serieId ORDER BY fecha DESC;");
}

function obtenerTeoriasOrdenadasPorMeGusta ($serieId) {
		$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, titulo, cuerpo, id_serie, meGusta, wtf, tipoVoto, nombre_display FROM (SELECT id, id_usuario, id_serie, titulo, cuerpo, fecha, meGusta, wtf, tipoVoto FROM teorias LEFT JOIN (SELECT id_teoria, tipoVoto FROM teorias_votos WHERE id_usuario = $usuarioLogeado) AS votos ON teorias.id = votos.id_teoria) AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id WHERE id_serie = $serieId ORDER BY meGusta DESC;");
}

function obtenerTeoriasOrdenadasPorWTF ($serieId) {
		$usuarioLogeado = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT comentariosYVotos.id, comentariosYVotos.id_usuario, titulo, cuerpo, id_serie, meGusta, wtf, tipoVoto, nombre_display FROM (SELECT id, id_usuario, id_serie, titulo, cuerpo, fecha, meGusta, wtf, tipoVoto FROM teorias LEFT JOIN (SELECT id_teoria, tipoVoto FROM teorias_votos WHERE id_usuario = $usuarioLogeado) AS votos ON teorias.id = votos.id_teoria) AS comentariosYVotos JOIN usuarios ON comentariosYVotos.id_usuario = usuarios.id WHERE id_serie = $serieId ORDER BY wtf DESC;");
}

function obtenerTeoriasOrdenadasPorFecha ($id) {
	return hacerListado("SELECT * FROM teorias WHERE id_serie = $id ORDER BY fecha DESC");
}

 /*--------------------------------------- añadir teorías----------------------------------- */

function anadirNuevaTeoria ($idComentarista, $idSerie, $titulo, $cuerpo)
{
return ejecutarConsulta("INSERT INTO teorias (id_usuario, id_serie, titulo, cuerpo) VALUES ($idComentarista, $idSerie, '$titulo', '$cuerpo')");
}

 /*------------------------------------ comprobar errores------------------------------------ */

function comprobarErroresTeoria($datos) {
	if (empty($datos["tituloTeoria"])) {
    return "Debe completar el campo 'Título' obligatoriamente";
  }
  return false;
}


 /*------------------------------------ ordenarTeorias ------------------------------------ */
function ordenarTeorias($orden, $serieId) {
		switch ($orden) {
			case 'meGusta':
				return obtenerTeoriasOrdenadasPorMeGusta($serieId);
				break;

			case 'wtf':
				return obtenerTeoriasOrdenadasPorWTF($serieId);
				break;
			
			default:
				return obtenerTeoriasPorSerieConVotos($serieId);
				break;
		}
}


/* -----------------------------likes y wtfs teoría----------------------------- */

function cambiarVotoTeoria($idUsuario, $idTeoria, $tipoVoto)
{
	ejecutarConsulta("UPDATE `teorias_votos` SET `tipoVoto` = '$tipoVoto' WHERE id_teoria = '$idTeoria' AND id_usuario = '$idUsuario';");
}

function eliminarVotoTeoria($idUsuario, $idTeoria)
{
	$consulta = "DELETE FROM teorias_votos WHERE id_teoria = '$idTeoria' AND id_usuario = '$idUsuario';";
	ejecutarConsulta($consulta);
}

function obtenerVotoTeoria($idUsuario, $idTeoria) 
{

	/* si devuelve 0 filas es que el usuario no ha votado, si devuelve algo es que ha votado o 1 o 2 */
	$voto = hacerListado("SELECT tipoVoto FROM teorias_votos WHERE id_teoria = '$idTeoria' AND id_usuario = '$idUsuario';");

	if (empty($voto))
		return false;
	return $voto[0]["tipoVoto"];
}

function votarTeoria($idUsuario, $idTeoria, $tipoVoto)
{
	$voto = obtenerVotoTeoria($idUsuario, $idTeoria);

	/*
	1 WTF
	2 Me gusta
	*/

	/* Primero buscamos si el usuario ha votado antes */
	if (!$voto)
	{
		/* En caso de que sea falso, es que el usuario no ha votado e insertamos un voto */
		ejecutarConsulta("INSERT INTO `teorias_votos` (`id_teoria`, `id_usuario`, `tipoVoto`) VALUES ('$idTeoria', '$idUsuario', '$tipoVoto');");
	}
	else
	{
		/* En caso de que el usuario ha votado, comprobamos si el voto nuevo es el mismo. Si es el mismo, lo eliminamos y si es distinto, lo cambiamos */
		if ($tipoVoto == $voto)
		{
			eliminarVotoTeoria($idUsuario, $idTeoria);
		}
		else
		{
			/* En este caso, el voto es distinto por lo cual lo cambiamos */
			cambiarVotoTeoria($idUsuario, $idTeoria, $tipoVoto);
		}
	}
}

/* Función que vuelve a contar cuantos votos WTF e HUMOR tiene un comentario y actualiza sus campos correspondientes */
function actualizarVotosTeoria($idTeoria)
{
	$votos = hacerListado("SELECT tipoVoto, count(tipoVoto) AS votos FROM teorias_votos WHERE id_teoria = '$idTeoria' GROUP BY tipoVoto;");

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
	ejecutarConsulta("UPDATE teorias SET meGusta = '$votosLike', wtf = '$votosWTF' WHERE id = $idTeoria;");

}

function obtenerVotosTeoriaPorIdYVotoDeUsuario($idComentario, $idUsuario)
{
	return hacerListado("SELECT meGusta, wtf , tipoVoto FROM teorias LEFT JOIN (SELECT id_usuario, id_teoria, tipoVoto FROM usuarios LEFT JOIN teorias_votos ON usuarios.id = teorias_votos.id_usuario WHERE id_usuario = $idUsuario) AS votosPorUsuario ON teorias.id = votosPorusuario.id_teoria WHERE id = $idComentario;")[0];
}

/*----------------------------------------------------------------------------------------------------------------------
											Subpágina: comentarios de teorías 
-----------------------------------------------------------------------------------------------------------------------*/

function obtenerTeoriaPorId($id_teoria)
{
	return hacerListado("SELECT teorias.*, nombre_display, foto_perfil FROM teorias JOIN usuarios ON teorias.id_usuario = usuarios.id WHERE teorias.id = $id_teoria;")[0];
}

function comentarTeoria($idTeoria, $idUsuario, $comentario)
{
	return ejecutarConsulta("INSERT INTO teoria_comentarios (id_usuario, id_teoria, contenido, fecha, meGusta, wtf) VALUES ('$idUsuario', '$idTeoria', '$comentario', CURRENT_TIMESTAMP, '0', '0');");
}

 ?>
