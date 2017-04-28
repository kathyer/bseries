<?php
include_once("modelos/mensajeria_modelo.php");
session_start();
marcarMensajeComoLeido($_GET['id']);
header("Location: mensajes.php");
?>
