<?php
  include_once("modelos/login_snippet.php");
	ob_start();
?>

<header>
  <div class="tituloTituloMensajeria fondoGrisClaro">
      Mensajes
  </div>
</header>

<div class="fondoGrisClaro">
  <div class="row">
    <div class="col-md-12 contenedorCuerpo">
      <div class="col-md-3 fondoGrisOscuro amigosConectados">
        <!-- si tiene amigos los muestra, si no muestra un mensaje -->
        <?php if (!empty($amigos)): ?>
          <ul class="listaAmigos amigosAsaid">
              <li class="tituloAsaid">Amigos conectados</li>
              <?php foreach ($amigos as $amigo): ?>
              <li>
                <a href="enviar_mensaje.php?to=<?= $amigo['id_amigo'] ?>">
                <img src="img/usuarios/<?= $amigo['foto_perfil'] ?>" width="40" height="40" class="fotoMensajeria">
                <span class="textoGrisClaro"><?= $amigo['nombre_display'] ?></span></a>
              </li>
              <?php endforeach; ?>
          </ul>
        <?php else: ?>
          Forever alone.
        <?php endif; ?>
        <!-- fin mostrar amigos -->
      </div>
      <div class="col-md-9 cuerpoMensajes">
        <?= $contenido ?>
      </div>
    </div>
  </div>
</div>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
