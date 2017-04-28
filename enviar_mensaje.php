<?php
  include_once("modelos/login_snippet.php");
  include_once("controladores/enviar_mensaje_controlador.php");
	ob_start();
?>

<div class="enviarMensaje">
  <p class="fondoTurquesa paddingMensajes"><span class="textoBlanco">Mensaje para</span> <span class="textoBlanco textoBold"><?= $amigo ?></span></p>
  <div class="marginMensajes paddingMensajes">
    <form method="post">
      <label class="textoGrisOscuro">Asunto</label><br>
      <input type="text" name="asunto" class="form-control">
        <br>
      <label class="textoGrisOscuro">Contenido</label><br>
      <textarea name="contenido" rows="8" cols="80" class="form-control"></textarea>
        <br>
      <input type="hidden" name="id_usuario_emisor" value="<?= $_SESSION['usuario']['id'] ?>">
      <input type="hidden" name="id_usuario_receptor" value="<?= $_GET['to'] ?>">
      <button type="submit" class="btn verMensaje">Enviar</button>
    </form>
  </div>
</div>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('mensajes_master.php');
?>
