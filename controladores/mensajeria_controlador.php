<?php
  include_once('modelos/usuario_modelo.php');
  include_once('modelos/mensajeria_modelo.php');

  $longitudMensaje = 17;
  $amigos = obtenerAmigosPorId ($_SESSION['usuario']['id']);
  $mensajes = mostrarMensajesPorUsuario ($_SESSION['usuario']['id']);
  $solicitudes = obtenerSolicitudesDeAmistadPorUsuario ($_SESSION['usuario']['id']);
 ?>
