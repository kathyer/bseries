<?php
  include_once('modelos/usuario_modelo.php');
  include_once('modelos/mensajeria_modelo.php');

  $amigos = obtenerAmigosPorId ($_SESSION['usuario']['id']);
  $mensajes = mostrarMensajesEnviadosPorUsuario ($_SESSION['usuario']['id']);
 ?>
