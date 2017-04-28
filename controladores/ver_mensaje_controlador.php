<?php
  include_once('modelos/usuario_modelo.php');
  include_once('modelos/mensajeria_modelo.php');

  if (!empty($_POST)) {
    enviarMensaje($_POST['id_usuario_emisor'], $_POST['id_usuario_receptor'], $_POST['contenido'], $_POST['asunto']);
    header("Location: mensajes.php");
  }

  $amigos = obtenerAmigosPorId ($_SESSION['usuario']['id']);
  $mensaje = mostrarMensajePorId ($_GET['mensaje'], $_SESSION['usuario']['id']);
  $solicitudes = obtenerSolicitudesDeAmistadPorUsuario ($_SESSION['usuario']['id']);
 ?>
