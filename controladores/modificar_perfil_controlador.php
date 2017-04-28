<?php
  session_start();
  include('modelos/usuario_modelo.php');
  include('modelos/funciones.php');

  // Comprueba si la persona que estás intentando modificar eres tú, para evitar cabrones
  if ($_SESSION['usuario']['id'] == $_GET['usuario']) {
    // Si ha intentado cambiar la imagen
    if (!empty($_FILES)) {
      borrarImagenPerfil ($_SESSION["usuario"]["id"]);
      cambiarFotoUsuario ($_FILES['imagen']['name'], $_FILES['imagen']['tmp_name'], renombrarImagen ($_FILES['imagen']['name'], $_SESSION['usuario']['id']), $_SESSION['usuario']['id']);
    }
    // Si se ha intentado modificar mandando un post
    if (!empty($_POST)) {
      // Modifica el usuario en la base de datos
      modificarUsuario ($_POST, $_SESSION['usuario']['id']);
    }
    $usuario = obtenerUsuarioPorId ($_SESSION['usuario']['id']);
  } else {
    // Lo suyo es poner un mensaje de error un poco más elaborado
    echo "No puedes modificar un perfil que no es tuyo.";
    exit();
  }

?>
