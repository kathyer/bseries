<?php
	ob_start();
	include('controladores/muro_controlador.php');
?>

<div class="columnasIgualadasPadre">
	<!-- Contenido de la página -->
		<!--ASIDE IZQUIERDO-->
		<div class="col-md-4 izquierda columnasIgualadasHijos fondoGrisOscuro">
			<!-- Imagen de perfil -->
			<div class="imagenPerfil">
				<img src="img/usuarios/<?= $usuario["foto_perfil"] ?>">
			</div>
			<div class="info">
				<p><?= $usuario["nombre_display"] ?></p>
			</div>
			<!-- fin de imagen de perfil -->
			<div class="row seriesHead">
				<span class="tituloAside">Series<a id="botonVerTodasMuro" class="btn fondoTurquesa pull-right">Ver todas</a></span>
			</div>
			<!-- Series -->
			<div class="seriesUsuario">
				<div class="row">
					<?php
						$seriesTotales = count($seriesUsuario);
						for ($i = 0; ($i < $seriesTotales) && ($i < $seriesAMostrar); $i++ ):
					?>
					<div class="col-xs-4 col-sm-3 col-md-6 col-lg-4 serieUsuarioMargenes">
						<div class="imagenSeriePerfilConHover">
							<img src="img/series/<?= $seriesUsuario[$i]["nombre_imagen"] ?>">
							<div class="overlay">
								<div class="divSubOverlaySeriePerfil">
									<div id="divTitulo">
										<a href="serie_info.php?id=<?= $seriesUsuario[$i]["id"]?>"><h3><?= $seriesUsuario[$i]["titulo"]?></h3></a>
									</div>
									<div class="botonBorrarSeriePerfil">
										<a class="info" href="desuscribir_serie.php?id=<?= $seriesUsuario[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endfor;?>
					<div id="restoSeriesMuro">
						<?php for ($i; $i < $seriesTotales; $i++ ): ?>
							<div class="col-xs-4 col-sm-3 col-md-6 col-lg-4 serieUsuarioMargenes">
								<div class="imagenSeriePerfilConHover">
									<img src="img/series/<?= $seriesUsuario[$i]["nombre_imagen"] ?>">
									<div class="overlay">
										<div class="divSubOverlaySeriePerfil">
											<div id="divTitulo">
												<a href="serie_info.php?id=<?= $seriesUsuario[$i]["id"]?>"><h3><?= $seriesUsuario[$i]["titulo"]?></h3></a>
											</div>
											<div class="botonBorrarSeriePerfil">
												<a class="info" href="desuscribir_serie.php?id=<?= $seriesUsuario[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
			<!-- fin de series -->

			<span class="tituloAside">Insignias</span>
			<!-- Insignias -->
			<div class="row insignias">
				<?php foreach ($insignias as $insignia): ?>
					<div class="col-xs-3 col-sm-2 col-md-3">
						<img src="img/insignias/<?= $insignia['imagen_insignia'] ?>">
					</div>
				<?php endforeach; ?>
			</div>
			<!-- fin de insignias -->
		</div>
		<!-- FIN ASIDE IZQUIERDO -->

		<!-- CONTENIDO PRINCIPAL -->
		<div class="col-md-8 derecha columnasIgualadasHijos">

			<!-- CUADRO DE PUBLICACIÓN -->
			<div class="publicar fondoTurquesa">
				<!-- Titulo de publicar -->
				<div class="tituloPublicar">
					Escupe tus impresiones
				</div>
				<!-- fin titulo de publicar -->

				<!-- Textarea y opciones-->
				<div class="publicarTextarea cuerpoMuro">
					<form method="post" enctype="multipart/form-data">
						<textarea name="contenido" rows="4" class="colorTextarea ponerBlock"></textarea>
						<div class="col-xs-12 filaContenido publicarOpciones">
							<div class="col-xs-2 divFilaContenido padding0 alineamientoIzquierda">
									<div class="botonInputFileModificado margin0">
										<input type="file" class="inputImagenOculto" id="archivo_oculto" name="imagen_comentario"/>
										<div class="btn boton">Añadir imagen</div>
									</div>
							</div>
							<div class="col-xs-3 divFilaContenido alineamientoIzquierda">
								<input type="checkbox" name="spoil" value="1"> Contiene spoiler
							</div>
							<div class="col-xs-3 divFilaContenido padding0 alineamientoDerecha">
								<button class="btn publicarBtn textoGrisOscuro" type="submit">Publicar</button>
							</div>
						</div>
					</form>
				</div>
				<!-- fin textarea y opciones -->
			</div>
			<!-- FIN CUADRO PUBLICACIÓN -->

			<!-- CUADRO DE NOTICIAS -->
			<div class="noticiasPanel fondoTurquesa">
				<?php foreach ($noticias as $noticia): ?>
				<div class="fondoTurquesa ponerInline row">
					<div class="<?= $noticia['spoil'] == 1 ? "fondoGrisOscuro" : "fondoGrisClaro" ?> ponerDisplayTable tableMargin">
						<div class="<?= $noticia['spoil'] == 1 ? "textoBlanco" : "textoRojo" ?> avatarContenedor  ponerBlock centrarCosas1 ponerTableCell">
							<img src="img/usuarios/<?= $noticia['foto_perfil'] ?>" class="avatarNoticia avatarContenedorMargin"/><span><?= $noticia['nombre_display'] ?></span>
						</div>
						<div class="noticiaContenedor textoGrisOscuro fondoBlanco ponerTableCell">
							<p><?= $noticia['contenido'] ?></p>
							<?php if (!empty($noticia['imagen_comentario'])): ?>
								<div class="imagenMuro">
									<img src="img/muro/<?= $noticia['imagen_comentario'] ?>">
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="reaccionesNoticia <?= $noticia['spoil'] == 1 ? "fondoGrisOscuro" : "fondoGrisClaro" ?> ponerDisplayTable">
							<img id="botonMeGusta<?= $noticia['id'] ?>" src="img/megustaBtn.png" class="botonMeGusta ponerTableCell punteroClick">
							<div id="meGustaMuro<?= $noticia['id'] ?>" class="puntuacionNoticia fondoGrisMedio ponerTableCell"><?= $noticia['meGusta'] ?></div>
							<img id="botonwtf<?= $noticia['id'] ?>" src="img/wtfBtn.png" class="botonwtf ponerTableCell punteroClick">
							<div id="wtfMuro<?= $noticia['id'] ?>" class="puntuacionNoticia fondoGrisMedio ponerTableCell"><?= $noticia['wtf'] ?></div>
					</div>
				</div>
			<?php endforeach; ?>

			<div class="paginacion">
			  <?php for ($i=0; $i < $cantidadDePaginas; $i++): ?>
			    <a class="pagina<?= $_GET['pag'] == $i + 1 ? ' paginaActual' : '' ?>" href="muro.php?pag=<?= $i+1 ?>"><?= $i+1 ?></a>
			  <?php endfor; ?>
			</div>
			</div>
			<!-- FIN CUADRO DE NOTICIAS -->
		</div>
		<!-- FIN CONTENIDO PRINCIPAL -->
	<!-- fin contenido de la página -->
</div>

<script defer src="js/muro.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
