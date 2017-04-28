<?php
	include_once("conexion.php");

	function obtenerTodasLasSeries () {
		return hacerListado("SELECT * FROM series");
	}

	function obtenerIdTituloImagenDeTodasLasSeries()
	{
		return hacerListado("SELECT id, titulo, nombre_imagen FROM series");
	}

	/* Function que obtiene las series a las que sigue un usuario */
	function obtenerSeriesPorUsuario ($id) {
		return hacerListado("SELECT series.id, titulo, nombre_imagen FROM series LEFT JOIN usuario_series ON (series.id = usuario_series.id_serie) WHERE usuario_series.id_usuario = $id;");
	}

	function obtenerSeriePorId ($id) {
		return hacerListado("SELECT * FROM series WHERE id = $id;")[0];
	}

	function obtenerTemporadasPorSerie ($id) {
		return hacerListado("SELECT MAX(temporada) AS max FROM capitulos WHERE id_serie = $id")[0]['max'];
	}

	function obtenerCapituloPorId ($id) {
		return hacerListado("SELECT * FROM capitulos WHERE id = $id;")[0];
	}

	function obtenerCapitulosPorTemporada ($temporada, $idSerie) {
		return hacerListado("SELECT * FROM capitulos WHERE temporada = $temporada AND id_serie = $idSerie ORDER BY numero ASC");
	}

	function contarSeriesPorUsuario ($id) {
		return hacerListado("SELECT count(id_usuario_series) FROM usuario_series JOIN usuarios ON usuarios.id = usuario_series.id_usuario WHERE usuarios.id = $id")[0]['count(id_usuario_series)'];
	}

	function obtenerVotosPorSerie ($id) {
		return hacerListado("SELECT * FROM votos WHERE id_serie = $id");
	}

	function comprobarVoto ($idSerie, $idUsuario)
	{
		$nota = hacerListado("SELECT nota FROM votos WHERE id_usuario = $idUsuario AND id_serie = $idSerie");

		if (empty($nota))
			return false;
		return $nota[0]['nota'];
	}

	function votarSerie ($nota, $idSerie, $idUsuario) {
		ejecutarConsulta("INSERT INTO votos (id_usuario, id_serie, nota) VALUES ($idUsuario, $idSerie, $nota)");
	}

	function cambiarVotoSerie ($nota, $idSerie, $idUsuario) {
		ejecutarConsulta("UPDATE votos SET nota = $nota WHERE id_usuario = $idUsuario AND id_serie = $idSerie");
	}

	function actualizarVotoSerie($idSerie)
	{
		return ejecutarConsulta("UPDATE series SET nota_media = (SELECT round(avg(nota), 1) AS nota FROM votos WHERE id_serie = '$idSerie') WHERE id = '$idSerie';");
	}

	function obtenerNotaMediaPorSerie($idSerie)
	{
		return hacerListado("SELECT nota_media FROM series WHERE id = '$idSerie'")[0]['nota_media'];
	}

	function imagenBotonMeGusta($tipoVoto)
	{
		if ($tipoVoto == 2)
		{
			return "img/megustaBtnSombra.png";
		}
		return "img/megustaBtn.png";
	}

	function imagenBotonWTF($tipoVoto)
	{
		if ($tipoVoto == 1)
		{
			return "img/wtfBtnSombra.png";
		}
		return "img/wtfBtn.png";
	}

	function guardarCapitulo($datos){
	 $consulta = consultaInsert($datos, "capitulos");
            return ejecutarConsulta($consulta);

}

	function comprobarErroresCapitulo($datos) {

	if (empty($datos["titulo"])) {
    return "Debe completar el titulo de la serie";
  }

  if (empty($datos["temporada"])) {
    return "Debe poner el director";
  }

  if(empty($datos['enlace'])) {
    return "Debe introducir numero de temporadas.";
  }

  if(empty($datos['numero'])) {
    return "Debe introducir una nota media.";
  }

	if(empty($datos['descripcion'])) {
    return "Debe introducir numero de capitulos.";
  }

  return false;

}

function serieAnadidaAUsuario($idSerie, $idUsuario)
{
	$resultado = hacerListado("SELECT id FROM usuario_series WHERE id_usuario = '$idUsuario' AND id_serie = '$idSerie'");

	if (empty($resultado))
		return false;
	return true;
}

function anadirSerieAUsuario($idSerie, $idUsuario)
{
	return ejecutarConsulta("INSERT INTO usuario_series (`id_usuario`, `id_serie`) VALUES ('$idUsuario', '$idSerie');");
}

function eliminarSerieDeUsuario($idSerie, $idUsuario)
{
	return ejecutarConsulta("DELETE FROM usuario_series WHERE id_usuario = '$idUsuario' AND id_serie = '$idSerie';");
}

?>
