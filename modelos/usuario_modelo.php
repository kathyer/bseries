<?php
	include_once("conexion.php");

function obtenerUsuarioPorId ($id) {
	return hacerListado("SELECT * FROM usuarios WHERE id = $id")[0];
}

function agregarUsuario ($datos) {
	return ejecutarConsulta(consultaInsert($datos, "usuarios"));
}

function modificarUsuario ($datos, $id) {
	return ejecutarConsulta(consultaUpdate($datos, "usuarios", $id));
}

/*###########################################################################################
#																							#
#								SOLICITUDES DE AMISTAD										#
#																							#
###########################################################################################*/

function obtenerIdAmigosPorId ($id) {
	return hacerListado("SELECT id_amigo FROM amistades WHERE id_usuario = $id");
}

function obtenerNombreDeAmigoPorId ($id) {
	return hacerListado("SELECT nombre_display FROM usuarios WHERE id = $id")[0]['nombre_display'];
}

/* Función que indica si el una pesona es amigo o no. Se usa al visitar perfiles ajenos */
function esAmigo($id)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	$resultado = hacerListado("SELECT id_amigo FROM amistades WHERE id_usuario = '$id' AND id_amigo = '$idUsuario'");
	if (count($resultado) == 0)
		return false;
	else
		return true;
}

/* Función que comprueba si se ha enviado una solicitud de amistad */
function existeSolicitudDeAmistad($idUsuarioASolicitar)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	$resultado = hacerListado("SELECT * FROM amistades_solicitud WHERE id_usuario_emisor = '$idUsuario' AND id_usuario_receptor = '$idUsuarioASolicitar';");

	if (count($resultado) == 0)
		return false;
	else
		return true;
}

/* Función que solicita la amistad del amigo seleccionado. El usuario logeado solicita la amistad del usuario seleccionado */
function solicitarAmistad($idUsuarioASolicitar)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	return (ejecutarConsulta("INSERT INTO `amistades_solicitud` (`id_usuario_emisor`, `id_usuario_receptor`) VALUES ('$idUsuario', '$idUsuarioASolicitar');"));
}

function eliminarSolicitudDeAmistad($idUsuarioASolicitar)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	$consulta = "DELETE FROM amistades_solicitud WHERE id_usuario_emisor = '$idUsuario' AND id_usuario_receptor = '$idUsuarioASolicitar';";
	return ejecutarConsulta($consulta);
}

function rechazarSolicitudDeAmistad($idUsuarioARechazar)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	$consulta = "DELETE FROM amistades_solicitud WHERE id_usuario_emisor = '$idUsuarioARechazar' AND id_usuario_receptor = '$idUsuario';";
	return ejecutarConsulta($consulta);
}

function cuantasSolicitudesDeAmistadTienes()
{
	$idUsuario = $_SESSION["usuario"]["id"];
	return hacerListado("SELECT count(*) AS solicitudes FROM amistades_solicitud WHERE id_usuario_receptor = '$idUsuario';")[0]["solicitudes"];
}

function cuantosMensajesSinLeerTienes()
{
	$idUsuario = $_SESSION["usuario"]["id"];
	return hacerListado("SELECT count(*) AS mensajesNuevos FROM mensajes WHERE id_usuario_receptor = '$idUsuario' AND leido = 0;")[0]["mensajesNuevos"];	
}

function mostrarMensajesConMensajesNuevos()
{
	$nuevosMensajes = cuantasSolicitudesDeAmistadTienes() + cuantosMensajesSinLeerTienes();

	$numeroMensajes = "";

	if ($nuevosMensajes != 0)
		$numeroMensajes = " (" . $nuevosMensajes . ")";

	return "Mensajes" . $numeroMensajes;

}

function aceptarAmistad ($idAceptado, $idUsuario) {
	ejecutarConsulta("INSERT INTO amistades (id_usuario, id_amigo) VALUES ($idUsuario, $idAceptado)");
	ejecutarConsulta("INSERT INTO amistades (id_usuario, id_amigo) VALUES ($idAceptado, $idUsuario)");
	ejecutarConsulta("DELETE FROM amistades_solicitud WHERE id_usuario_receptor = $idUsuario AND id_usuario_emisor = $idAceptado");
	ejecutarConsulta("DELETE FROM amistades_solicitud WHERE id_usuario_emisor = $idUsuario AND id_usuario_receptor = $idAceptado");
}

function rechazarAmistad() {
	ejecutarConsulta("DELETE FROM amistades_solicitud WHERE id_usuario_receptor = $idUsuario AND id_usuario_emisor = $idAceptado");
}

/*###########################################################################################
#																							#
#											AMIGOS											#
#																							#
###########################################################################################*/

function obtenerAmigosPorId($id)
{
	return hacerListado("SELECT id_amigo, nombre_display, foto_perfil from usuarios JOIN amistades ON usuarios.id = amistades.id_amigo WHERE id_usuario = '$id';");
}

/* Función que devuelve cuantos amigos en común tiene el usuario logeado con el introducido por parámetro */
function obtenerAmigosEnComun($idUsuario)
{
	$usuario = $_SESSION["usuario"]["id"];

	return hacerListado("SELECT count(tabla1.id_amigo) AS amigosEnComun FROM (SELECT id_amigo from usuarios JOIN amistades ON usuarios.id = amistades.id_amigo WHERE id_usuario = '$idUsuario') AS tabla1 JOIN (SELECT id_amigo from usuarios JOIN amistades ON usuarios.id = amistades.id_amigo WHERE id_usuario = '$usuario') AS tabla2 ON tabla1.id_amigo = tabla2.id_amigo;")[0]["amigosEnComun"];

}

function eliminarAmigo($idAmigo)
{
	$idUsuario = $_SESSION["usuario"]["id"];
	ejecutarConsulta("DELETE FROM amistades WHERE id_usuario = '$idUsuario' AND id_amigo = '$idAmigo'");
	ejecutarConsulta("DELETE FROM amistades WHERE id_usuario = '$idAmigo' AND id_amigo = '$idUsuario'");
}


function suscribirASerie ($idUsuario, $idSerie) {
	return ejecutarConsulta("INSERT INTO `usuario_series` (`id_usuario_series`, `id_usuario`, `id_serie`) VALUES (NULL, $idUsuario, $idSerie)");
}

function desuscribirDeSerie ($idUsuario, $idSerie) {
	return ejecutarConsulta ("DELETE FROM `usuario_series` WHERE id_usuario = $idUsuario AND id_serie = $idSerie");
}

function obtenerUsuarios()
{
	return hacerListado("SELECT * FROM usuarios");
}

function guardarUsuario($datos)
{
	unset($datos["contrasena2"]);
	$datos["contrasena"] = cifrarContrasena($datos["contrasena"]);
	$consulta = consultaInsert($datos,"usuarios");
	return ejecutarConsulta($consulta);
}

function comprobarErroresUsuario($datos)
{

	if (empty($datos["nick"])) {
		return "Debe completar el nombre de usuario";
	}

	if (empty($datos["nombre_display"])) {
		return "Debe completar el nombre";
	}

	if(empty($datos['contrasena'])) {
		return "Debe introducir una contraseña.";
	}

	if(empty($datos['contrasena2'])) {
		return "Debe introducir una contraseña.";
	}

	if($datos['contrasena'] != $datos['contrasena2']){
		return "Las contraseñas no coinciden.";
	}

	if (empty($datos["correo"])) {
		return "Debe proporcionar una dirección e-mail.";
	}

	return false;
}

function conectarUsuarioPorId ($id)
{
	ejecutarConsulta("UPDATE usuarios SET 'conectado' = 'conectado' WHERE usuarios.id_usuario = $id");
}

function desconectarUsuarioPorId ($id)
{
	ejecutarConsulta("UPDATE usuarios SET 'conectado' = 'desconectado' WHERE usuarios.id_usuario = $id");
}



function eliminarCuenta ($id) {
	ejecutarConsulta ("DELETE FROM usuarios WHERE id = $id");
}

?>
