<?php
	ob_start();
	include_once("controladores/serie_master_controlador.php");
	include_once("controladores/comentar_capitulo_serie_controlador.php");
?>

				<div class="row">
					<div class="col-md-11">
					<p class="tituloTituloDescarga">Capítulo:</p>
						<p class="centrarComentarCapitulo textoRojo">"<?= $capitulo['titulo'] ?>"</p>
							<p class="centrarSeccionCapitulo">Capitulo <?= $capitulo['numero'] ?> - Temporada <?= $capitulo['temporada'] ?></p>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12">
						<img style="width: 100%; height: auto;" src="img\capitulo\<?= $capitulo["imagen_capitulo"] ?>">
					</div>
				</div>

				<div class="tituloPublicar">
					Escupe tus impresiones
				</div>
				<!-- fin titulo de publicar -->

				<!-- Textarea y opciones-->
				<div class="publicarTextarea cuerpoMuro">
					<form method="post">
						<textarea name="contenido" rows="4" class="colorTextarea ponerBlock"></textarea>
						<div class="col-xs-12 filaContenido publicarOpciones">
							<div class="col-xs-3 divFilaContenido padding0 alineamientoDerecha">
								<button class="btn publicarBtn comentarioCapituloBtn" type="submit">Publicar</button>
							</div>
						</div>
					</form>
				</div>

				<div class="noticiasPanel">
					<?php foreach ($comentarios as $comentario): ?>
					<div class="fondoTurquesa ponerInline row">
						<div class="fondoGrisClaro ponerDisplayTable tableMargin">
							<div class="textoRojo avatarContenedor ponerBlock centrarCosas1 ponerTableCell">
								<a href="perfil.php?id=<?= $comentario['id'] ?>"><img src="img/usuarios/<?= $comentario['foto_perfil'] ?>" class="avatarNoticia avatarContenedorMargin"/>
								<?= $comentario['nombre_display'] ?></a>
							</div>
							<div class="noticiaContenedor textoGrisOscuro fondoBlanco ponerTableCell">
								<p><?= $comentario['contenido'] ?></p>
							</div>
						</div>
						<div class="reaccionesNoticia fondoGrisClaro ponerDisplayTable">
							<img src="img/megustaBtn.png" id="botonMeGusta<?= $comentario["id"] ?>" class="botonMeGusta ponerTableCell punteroClick">
							<div class="puntuacionNoticia fondoGrisMedio ponerTableCell" id="meGustaComentarioCapitulo<?= $comentario["id"] ?>"><?= $comentario['meGusta'] ?></div>
							<img src="img/wtfBtn.png" id="botonwtf<?= $comentario["id"] ?>" class="botonwtf ponerTableCell punteroClick">
							<div class="puntuacionNoticia fondoGrisMedio ponerTableCell" id="wtfComentarioCapitulo<?= $comentario["id"] ?>"><?= $comentario['wtf'] ?></div>
						</div>
					</div>
				<?php endforeach; ?>

				<div class="paginacion">
				  <?php for ($i=0; $i < $cantidadDePaginas; $i++): ?>
				    <a class="pagina<?= $_GET['pag'] == $i + 1 ? ' paginaActual' : '' ?>" href="comentar_capitulo_serie.php?capitulo_id=<?= $capitulo['id'] ?>&pag=<?= $i+1 ?>"><?= $i+1 ?></a>
				  <?php endfor; ?>
				</div>
			</div>


	<script defer src="js/comentarCapitulo.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
