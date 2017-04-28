<?php
  include_once("modelos/login_snippet.php");
  include_once("controladores/ver_mensaje_controlador.php");
	ob_start();
?>
<!-- nav de recibidos y enviados -->
<nav class="navbar navbar-default navSerie">
  <ul class="nav navbar-nav elementosNavSerie">
    <li><a href="mensajes.php">Recibidos</a></li>
    <li><a href="enviados.php">Enviados</a></li>
  </ul>
</nav>
<!-- fin nav -->
<div class="listaMensajes textoGrisOscuro">
  <p>
    <span class="textoRojo textoBold">Asunto:</span> 
    <span class="textoGrisOscuro"><?= $mensaje['asunto'] ?></span>
  </p>
  <p class="textoRojo">
    Contenido:
  </p>
  <p class="textoGrisOscuro fondoGrisMedioClarito paddingMensajes">
    <?= $mensaje['contenido'] ?>
  </p>
  <div class="row paddingMensajes alinearDerecha">
    <button type="button" class="btn verMensaje textoGrisOscuro">Responder</button>
    <a href="mensajes.php" class="btn btn-sm">Volver</a>
    <a href="borrar_mensaje.php?id=<?= $mensaje['id_mensaje'] ?>" class="btn btn-sm">Eliminar</a>
  </div>
</div>
<div class="responderMensaje">
  <form method="post">
    <label>Asunto</label><br>
    <input type="text" name="asunto" value="RE: <?= $mensaje['asunto'] ?>">
    <br>
    <label>Contenido</label><br>
    <textarea name="contenido" rows="8" cols="80"></textarea>
    <br>
    <input type="hidden" name="id_usuario_emisor" value="<?= $_SESSION['usuario']['id'] ?>">
    <input type="hidden" name="id_usuario_receptor" value="<?= $mensaje['id_usuario_emisor'] ?>">
    <button type="submit">Responder</button>
  </form>
</div>
<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('mensajes_master.php');
?>
