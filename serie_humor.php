<?php
	ob_start();
	include_once("controladores/serie_humor_controlador.php");
?>

<script defer src="js/humor.js"></script>

<div class="container humor">
	<div class="row">
		<p class="tituloTituloSerie tituloTituloHumor">LULZ</p>
		<div class="col-md-12 comentariosHumor fondoRojo">

			<?php if (isset($sinComentarios)): ?>
			<!-- Si no hay comentarios -->
			<div class="comentarioBackground">
				<div class="row comentarioTexto">
					<div class="row">
						No hay comentarios aún, ¡sé el primero!
					</div>
				</div>
			</div>
			<?php endif; ?>

			<!-- Comentario -->
			<?php
			foreach ($comentarios as $comentario): ?>
			<div class="comentarioBackground">
				<div class="row comentarioTexto">
					<div class="row">
						<a href="perfil.php?id=<?= $comentario['id'] ?>">
						<img src="img/usuarios/<?= $comentario['foto_perfil'] ?>">
						<span class="nombre"><?= $comentario['nombre_display'] ?></span></a>
					</div>
					<!-- Si hay imagen -->
					<?php if (!empty($comentario['imagen_comentario'])): ?>
					<div class="row imagen">
						<img src="img/<?= $comentario['imagen_comentario'] ?>">
					</div>
					<?php endif; ?>
					<!-- fin imagen -->
					<div class="row">
						<?= $comentario['contenido'] ?>
					</div>
				</div>
				<div class="row reacciones">
					<img class="botonMeGusta punteroClick" id="botonMeGusta<?= $comentario["id"] ?>" src="<?= imagenBotonMeGusta($comentario["tipoVoto"])?>">
					<div class="puntuacion fondoGrisClaro" id="meGustaHumor<?= $comentario["id"] ?>"><?= $comentario['meGusta'] ?></div>
					<img class="botonwtf punteroClick" id="botonwtf<?= $comentario["id"] ?>" src="<?= imagenBotonWTF($comentario["tipoVoto"])?>">
					<div class="puntuacion fondoGrisClaro" id="wtfHumor<?= $comentario["id"] ?>"><?= $comentario['wtf'] ?></div>
				</div>
			</div>
			<!-- fin comentario -->
		<?php endforeach; ?>
		</div>
	</div>
	<div class="row comentarHumor">
		<div class="textareaHumor">
			<h3>Comenta</h3>
			<form method="post" enctype="multipart/form-data">
				<textarea name="contenido" placeholder="¿Qué se te ocurre?" rows="4"></textarea>
				<input class="btn" type="file" name="imagen">
				<button class="btn enviarBtn fondoRojo" type="submit" name="button">Enviar</button>
			</form>
		</div>
	</div>

	<div class="paginacion">
	  <?php for ($i=0; $i < $cantidadDePaginas; $i++): ?>
	    <a class="pagina<?= $_GET['pag'] == $i + 1 ? ' paginaActual' : '' ?>" href="serie_humor.php?id=<?= $_GET['id'] ?>&pag=<?= $i+1 ?>"><?= $i+1 ?></a>
	  <?php endfor; ?>
	</div>
</div>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
