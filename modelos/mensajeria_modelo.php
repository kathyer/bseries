<?php
include_once("conexion.php");

  function enviarMensaje ($emisor, $receptor, $contenido, $asunto) {
    return ejecutarConsulta("INSERT INTO mensajes (id_usuario_emisor, id_usuario_receptor, contenido, leido, solicitud_amistad, asunto) VALUES ($emisor, $receptor, '$contenido', '0', '0', '$asunto')");
  }

  function mostrarMensajesPorUsuario ($id) {
    return hacerListado("SELECT m.id_mensaje, m.id_usuario_emisor, m.id_usuario_receptor, m.asunto, m.contenido, m.leido, u.nombre_display, u.foto_perfil FROM mensajes AS m JOIN usuarios AS u ON m.id_usuario_emisor = u.id WHERE m.id_usuario_receptor = $id ORDER BY leido ASC");
  }

  function mostrarMensajePorId ($idMensaje, $idUsuario) { // si el mensaje es tuyo, te lo devuelve, si es de otro no te deja verlo
    $mensaje = hacerListado ("SELECT m.id_mensaje, m.id_usuario_emisor, m.id_usuario_receptor, m.asunto, m.contenido, m.leido, u.nombre_display, u.foto_perfil FROM mensajes AS m JOIN usuarios AS u ON m.id_usuario_emisor = u.id WHERE id_mensaje = $idMensaje")[0];
    if ($mensaje['id_usuario_receptor'] == $idUsuario) {
      marcarMensajeComoLeido ($idMensaje);
      return $mensaje;
    } else {
      return [];
    }
  }

  function mostrarMensajesEnviadosPorUsuario ($id) {
    return hacerListado("SELECT a.id_mensaje, u.id, u.nombre_display, u.foto_perfil, a.asunto, a.contenido FROM usuarios AS u JOIN mensajes AS a ON a.id_usuario_receptor = u.id WHERE a.id_usuario_emisor = '$id';");
  }

  function obtenerSolicitudesDeAmistadPorUsuario ($id) {
    return hacerListado("SELECT u.id, u.nombre_display, u.foto_perfil FROM usuarios AS u JOIN amistades_solicitud AS a ON a.id_usuario_emisor = u.id WHERE a.id_usuario_receptor = $id");
  }

  function marcarMensajeComoLeido ($idMensaje) {
    ejecutarConsulta("UPDATE mensajes SET leido = '1' WHERE id_mensaje = $idMensaje;");
  }

  function borrarMensajePorId ($idMensaje) {
    ejecutarConsulta("DELETE FROM mensajes WHERE id_mensaje = $idMensaje");
  }
?>
