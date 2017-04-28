<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/mensajeria_controlador.php");
	ob_start();
?>
<nav class="navbar navbar-default navSerie">
	<ul class="nav navbar-nav elementosNavSerie">
		<li class="elementoNavSerieSeleccionado"><a href="mensajes.php">Recibidos</a></li>
		<li><a href="enviados.php">Enviados</a></li>
	</ul>
</nav>

<div class="listaMensajes">
	<?php if (!empty($solicitudes)): ?>
		<h2 class="mensajesDestacados">Solicitudes de amistad</h2>
		<?php foreach ($solicitudes as $solicitud): ?>
			<div class="row mensajeNoLeido">
				<div class="col-md-8 textoMensaje">
					<a href="perfil.php?usuario=<?= $solicitud['id'] ?>"><img src="img/usuarios/<?= $solicitud['foto_perfil'] ?>" alt="foto de <?= $solicitud['nombre_display'] ?>"><?= $solicitud['nombre_display'] ?></a> quiere ser tu bro / sis
				</div>

				<div class="col-md-4 ajustarBotones">
					<a href="aceptar_solicitud_amistad.php?id=<?= $solicitud['id'] ?>" class="btn aceptarAmistad">Aceptar</a>
					<a href="rechazar_solicitud_amistad.php?id=<?= $solicitud['id'] ?>" class="btn eliminarRechazar">Rechazar</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
	<h2 class="mensajesDestacados">Mensajes recibidos</h2>
	<?php if (!empty($mensajes)):
		foreach ($mensajes as $mensaje): ?>
		<div class="row<?= $mensaje['leido'] ? " mensajeLeido" : " mensajeNoLeido" ?>">
			<div class="col-md-8 textoMensaje">
				<a href="perfil.php?usuario=<?= $mensaje['id_usuario_emisor'] ?>"><img src="img/usuarios/<?= $mensaje['foto_perfil'] ?>" alt="foto de <?= $mensaje['nombre_display'] ?>"><?= $mensaje['nombre_display'] ?></a>
			</div>

			<div class="col-md-8 textoMensaje">
				<strong style="color:black"><?= $mensaje['asunto'] ?>. </strong>
				<?= strlen($mensaje['contenido']) > $longitudMensaje ? str_pad(substr($mensaje['contenido'], 0, $longitudMensaje), $longitudMensaje + 3, ".", STR_PAD_RIGHT) : $mensaje['contenido'] ?>
			</div>
			<div class="col-md-4 ajustarBotones">
				<a href="ver_mensaje.php?mensaje=<?= $mensaje['id_mensaje'] ?>" class="btn btn-sm verMensaje">Ver</a>
				<a href="marcar_mensaje_como_leido.php?id=<?= $mensaje['id_mensaje'] ?>" class="btn btn-sm btn aceptarAmistad">Leido</a>
				<a href="borrar_mensaje.php?id=<?= $mensaje['id_mensaje'] ?>" class="btn btn-sm eliminarRechazar">Eliminar</a>
			</div>
		</div>
	<?php endforeach;
	else: ?>
		<p style="color:black;">Nadie te quiere.</p>
	<?php endif; ?>
</div>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('mensajes_master.php');
?>
