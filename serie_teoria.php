<?php
	ob_start();
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/comentarios_modelo.php');
	include_once("controladores/serie_teoria_controlador.php");

?>
	<div id="titulosSeccionTeorias">
		<p class="tituloSeccionTeorias">TEORÍA:</p>
	</div>
										   
		<!--Top 5--> 
	<div><!--Teoría-->
		<div class="alinearCentro">
			<span>Autor:</span>
			<span id="autorTeoria" class="autorTeoria"><?= $teoria['nombre_display'] ?></span>
		</div>
		<div class="cajaExteriorTeoriaIndividual">
			<span class="cajaInteriorTeoriaIndividual textoCajaInteriorTeoria">
				<p id="tituloTeoria"><?= $teoria['titulo'] ?></p>
				<p id="cuerpoTeoria" class="textoCuerpoTeoria"><?= $teoria['cuerpo'] ?></p>
			</span>
		</div>
			<br>
			<br>
	</div>
	<!-- Comentarios -->
	<!-- Comentarios de la teoría -->
	<div class="noticiasPanel">
		<?php foreach ($comentarios as $comentario): ?>
			<div class="fondoTurquesa ponerInline row">
				<div class="fondoGrisClaro ponerDisplayTable tableMargin">
					<div class="textoRojo avatarContenedor  ponerBlock centrarCosas1 ponerTableCell">
						<img src="img/usuarios/<?= $comentario['foto_perfil'] ?>" class="avatarNoticia avatarContenedorMargin"/>
						<a href="perfil.php?usuario=<?= $comentario['id_usuario'] ?>"><?= $comentario['nombre_display'] ?></a>
					</div>
					<div class="noticiaContenedor textoGrisOscuro fondoBlanco ponerTableCell">
						<p><?= $comentario['contenido'] ?></p>
					</div>
				</div>
				<div class="reaccionesNoticia fondoGrisClaro ponerDisplayTable">
					<img src="img/megustaBtn.png" id="botonMeGusta<?= $comentario["id"] ?>" class="botonMeGusta ponerTableCell punteroClick">
					<div class="puntuacionNoticia fondoGrisMedio ponerTableCell" id="meGustaTeoria<?= $comentario["id"] ?>"><?= $comentario['meGusta'] ?></div>
					<img src="img/wtfBtn.png" id="botonwtf<?= $comentario["id"] ?>" class="botonwtf ponerTableCell punteroClick">
					<div class="puntuacionNoticia fondoGrisMedio ponerTableCell" id="wtfTeoria<?= $comentario["id"] ?>"><?= $comentario['wtf'] ?></div>
				</div>
			</div>
		<?php endforeach; ?>
		<div class="paginacion">
		  <?php for ($i=0; $i < $cantidadDePaginas; $i++): ?>
			<a class="pagina<?= $_GET['pag'] == $i + 1 ? ' paginaActual' : '' ?>" href="serie_teoria.php?id_teoria=<?= $_GET['id_teoria'] ?>&pag=<?= $i+1 ?>"><?= $i+1 ?></a>
		  <?php endfor; ?>
		</div>
	</div>

	<div class="tituloPublicar">
		Escupe tus impresiones
	</div>
	<!-- fin titulo de publicar -->
	<!-- Publicar comentario nuevo-->
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

	<script defer src="js/teoria.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
