<?php
include_once("modelos/login_snippet.php");
include_once("modelos/insignias_modelo.php");

borrarInsigniaUsuario($_SESSION['usuario']['id'], $_GET["id"]);
header("Location: perfil.php");
?>
