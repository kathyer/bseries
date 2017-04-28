<?php
	ob_start();
?>
					<div class="fondoGrisClaro">
						<header>
							<div style="width:100%" class="filaContenido">
								<div class="col-xs-10 tituloTituloSerie divFilaContenido">
									<?=$serie["titulo"]?>
								</div>
								<div class="col-xs-1 tituloNotaSerie divFilaContenido">
									<div class="punteroClick nota" id="divNotaMedia" title="Vota la serie"> <?=$serie["nota_media"]?></div>
									<select id="divVotarNotaMedia" class="votar notaPuntuaciones" name="nota" serie="<?= $id ?>">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>
								</div>
								<div class="col-xs-1 tituloAnadirSerie divFilaContenido">
								<?php
									$tieneSerie = serieAnadidaAUsuario($id, $_SESSION["usuario"]["id"]);
									if (!$tieneSerie):
								?>
									<img class="imagenBotonAnadir punteroClick" id="botonAnadirSerie" idSerie="<?= $id ?>" title="Sigue esta serie" src="img/anadirBtn.png">
								<?php else: ?>
									<img class="imagenBotonAnadir punteroClick" id="botonAnadirSerie" idSerie="<?= $id ?>" title="Deja de seguir la serie" src="img/borrarBtn.png">
								<?php endif; ?>
								</div>
							</div>
						</header>

						<nav class="navbar navbar-default navSerie" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>

							<div class="collapse navbar-collapse navbar-ex1-collapse centrado">
								<ul class="nav navbar-nav elementosNavSerie">
									<li <?php if($paginaSerie == "info"): ?> class="elementoNavSerieSeleccionado" <?php endif;?> ><a href="serie_info.php?id=<?=$id?>">Información</a></li>
									<li <?php if($paginaSerie == "capitulos"): ?> class="elementoNavSerieSeleccionado" <?php endif;?> ><a href="serie_capitulos.php?id=<?=$id?>">Capítulos</a></li>
									<li <?php if($paginaSerie == "teorias"): ?> class="elementoNavSerieSeleccionado" <?php endif;?> ><a href="serie_teorias.php?id=<?=$id?>&ordenadas=fecha">Teorías</a></li>
									<li <?php if($paginaSerie == "humor"): ?> class="elementoNavSerieSeleccionado" <?php endif;?> ><a href="serie_humor.php?id=<?=$id?>&pag=1">Humor</a></li>
								</ul>
							</div>
						</nav>

						<div class="row">
							<div class="col-md-12 contenedorCuerpo">
								<div class="col-md-3 fondoGrisOscuro cuerpoFichaSerie">
									<img class="imagenPrincipalSerie" src="img/series/<?=$serie['nombre_imagen']?>">
									<p>Votos: <?=$countVotosSerie?></p>
									<p>Temporadas: <?=$serie["temporadas"]?></p>
									<p>Capitulos: <?=$serie["capitulos"]?></p>
									<p>Insignias: <?=$cuentaInsigniasSerie?></p>
								</div>

								<div class="col-md-8 fondoGrisMedio cuerpoSerie">
									<div class="contenidoCuerpoSerie">
										<?= $contenido ?>
									</div>
								</div>
								<div class="col-md-1 fondoGrisOscuro cuerpoInsignias">
								<?php foreach ($insigniasSerie as $insignia): ?>
									<div class="row" style="padding: 0 10px 10px 10px">
										<div class="imagenSeriePerfilConHover">
											<img src="img/insignias/<?= $insignia["imagen_insignia"]; ?>">
											<div class="overlay">
												<div class="divSubOverlaySeriePerfil" >
													<a class="info insigniaEnSerie punteroClick" idInsignia="<?= $insignia['id'] ?>"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								</div>
							</div>
						</div>
						</div>
	<script defer src="js/series.js"></script>
<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
