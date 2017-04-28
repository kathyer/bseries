<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/enviados_controlador.php");
	ob_start();
?>
<nav class="navbar navbar-default navSerie">
  <ul class="nav navbar-nav elementosNavSerie">
    <li><a href="mensajes.php">Recibidos</a></li>
    <li class="elementoNavSerieSeleccionado"><a href="enviados.php">Enviados</a></li>
  </ul>
</nav>

<div class="listaMensajes marginMensajes">
	<span class="mensajesDestacados textoGrisOscuro">Mensajes enviados</span>
  <?php if (!empty($mensajes)):
    foreach ($mensajes as $mensaje): ?>
    <div class="row mensajeEnviado">
      <div class="col-md-8 textoMensaje textoGrisOscuro">
        <a href="perfil.php?usuario=<?= $mensaje['id'] ?>"><img src="img/usuarios/<?= $mensaje['foto_perfil'] ?>" alt="foto de <?= $mensaje['nombre_display'] ?>"><span class="textoRojo"><?= $mensaje['nombre_display'] ?></span></a>
      </div>

      <div class="col-md-8 textoMensaje">
        <span class="textoGrisOscuro textoBold"><?= $mensaje['asunto'] ?>. </span>
        <p><?= $mensaje['contenido'] ?></p>
      </div>
      <div class="col-md-4 ajustarBotones">
        <a class="btn btn-sm verMensaje">Ver</a>
				<a href="borrar_mensaje.php?id=<?= $mensaje["id_mensaje"]?>&enviados=1" class="btn btn-sm eliminarRechazar">Eliminar</a>
			</div>
	  </div>
  <?php endforeach;
  else: ?>
    <p style="color:black;">No quieres a nadie.</p>
  <?php endif; ?>
</div>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('mensajes_master.php');
?>
