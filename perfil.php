
<?php
	ob_start();
	include_once("modelos/login_snippet.php");
	include('controladores/perfil_controlador.php');
?>
	<div class="fondoGrisClaro">
		<header>
			<div class="col-xs-12 filaContenido padding0">
				<div class="col-xs-11 seccionTituloUsuario divFilaContenido">
					<?= $nombre_display ?>
				</div>
				<div class="col-xs-1 seccionAnadirAmigo divFilaContenido">
					<?php if (!$soyYo):
							if (esAmigo($usuarioId)):?>
								<!-- Mostrar botón de eliminar amigo -->
								<a href="eliminar_amigo.php?amigo=<?= $_GET["usuario"] ?>"><img src="img/borrarBtn.png" class="anadirAmigoImagen" id="botonBorrarAmigo" amigo="<?= $usuarioId ?>" title="Eliminar amigo"></a>
							<?php else: ?>
								<!-- Mostrar botón de añadir amigo -->
								<img src="img/anadirBtn.png" class="anadirAmigoImagen punteroClick" id="botonAnadirAmigo" amigo="<?= $usuarioId ?>" title="Añadir a Amigos">
							<?php endif; ?>
					<?php else: ?>
					<a href="editar_perfil.php?usuario=<?= $_SESSION['usuario']['id'] ?>"><img src="img/editarBtn.png" class="anadirAmigoImagen" title="Editar tu Perfil"></a>
					<?php endif; ?>
				</div>
			</div>
		</header>

		<div class="row">
			<div class="col-md-12 cuerpoPerfil">
				<div class="col-md-3 fondoGrisOscuro seccionPerfilInfo">
					<div class="imagenPerfil">
						<img class="imagenPrincipalPerfil" src="img/usuarios/<?= $usuario["foto_perfil"]?>">
					</div>
					<hr>
					<p><?= $amigosQueTiene ?> <span class="textoGrisClaro">amigos</span> </p>
					<p>
						<span class="textoGrisClaro">Series vistas:</span>
						<span> <?= $seriesQueSigue ?></span>
						</p>
					<p>
						<span class="textoGrisClaro">Estado:</span> 
						<span><?= $usuario['conectado'] ?></span>
					</p>
					<p>
						<span class="textoGrisClaro">Mi vida y milagros:</span>
						<?= $bio ?>					
					</p>
				</div>
				<div class="col-md-9 fondoTurquesa seccionPerfilCuerpo">
					<div class="seccionPerfilCuerpoInterno">
						<p class="perfilTituloSerie">Series</p><hr>
						<!-- Series -->
						<?php for ($i = 0; ($i < $seriesAMostrar) && ($i < $seriesQueSigue); $i++):?>
						<div class="col-xs-3">
							<div class="imagenSeriePerfilConHover">
								<img src="img/series/<?= $series[$i]['nombre_imagen'] ?>">
								<div class="overlay">
									<div class="divSubOverlaySeriePerfil">
										<div id="divTitulo">
											<a href="serie_info.php?id=<?= $series[$i]["id"]?>"><h2><?= $series[$i]["titulo"]?></h2></a>
										</div>
										<?php if ($soyYo):?>
										<div class="botonBorrarSeriePerfil">
											<a class="info" href="desuscribir_serie.php?id=<?= $series[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<?php endfor;?>
						<div class="row botonVerMasSeriesPerfil" id="botonMasSeriesPerfil">
						<?php if ($seriesQueSigue >= $seriesAMostrar): ?>
							<div class="col-xs-offset-11 col-xs-1">
								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							</div>
						<?php endif; ?>
						</div>
						<!-- Boton mas -->
						<div class="restoDeSeriesPerfil" id="restoDeSeriesPerfil">
							<?php for ($i = $seriesAMostrar; $i < $seriesQueSigue; $i++):?>
								<div class="col-xs-3">
									<div class="imagenSeriePerfilConHover">
										<img src="img/series/<?= $series[$i]['nombre_imagen'] ?>">
										<div class="overlay">
											<div class="divSubOverlaySeriePerfil">
												<div id="divTitulo">
													<a href="serie_info.php?id=<?= $series[$i]["id"]?>"><h2><?= $series[$i]["titulo"]?></h2></a>
												</div>
												<?php if ($soyYo):?>
												<div class="botonBorrarSeriePerfil">
													<a class="info" href="desuscribir_serie.php?id=<?= $series[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
												</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							<?php endfor; ?>
						</div>
						<div class="row">
						</div>
						<p class="perfilTituloSerie">Insignias</p>
						<hr>
						<div class="insigniasPerfil">
							<?php for ($i = 0; ($i < $insigniasAMostrar) && ($i < $insigniasQueTiene); $i++):?>
							<div class="col-xs-2">
								<div class="imagenSeriePerfilConHover">
									<img src="img/insignias/<?= $insignias[$i]["imagen_insignia"]; ?>">
									<div class="overlay">
									<?php if ($soyYo):?>
										<div class="divSubOverlaySeriePerfil">
											<a class="info" href="borrar_insignia.php?id=<?= $insignias[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
										</div>
									<?php endif;?>
									</div>
								</div>
							</div>
							<?php endfor; ?>
							<div class="row botonVerMasInsigniasPerfil" id="botonMasInsigniasPerfil">
								<?php if ($insigniasQueTiene >= $insigniasAMostrar): ?>
								<div class="col-xs-offset-11 col-xs-1">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</div>
								<?php endif; ?>
							</div>
							<div class="restoDeInsigniasPerfil" id="restoDeInsigniasPerfil">
								<?php for ($i = $insigniasAMostrar; $i < $insigniasQueTiene; $i++):?>
								<div class="col-xs-2">
									<div class="imagenSeriePerfilConHover">
										<img src="img/insignias/<?= $insignias[$i]["imagen_insignia"]; ?>">
										<div class="overlay">
										<?php if ($soyYo):?>
											<div class="divSubOverlaySeriePerfil">
												<a class="info" href="borrar_insignia.php?id=<?= $insignias[$i]['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
											</div>
										<?php endif;?>
										</div>
									</div>
								</div>
								<?php endfor; ?>
							</div>
							<div class="row">
							</div>
							<p class="perfilTituloSerie">Amigos</p><!-- AMIGOS -->
							<hr>
							<?php for ($i = 0; $i < $amigosAMostrar && $i < $amigosQueTiene; $i++): ?>
							<div class="col-xs-2">
								<div class="imagenSeriePerfilConHover">
									<img src="img/usuarios/<?= $amigos[$i]["foto_perfil"] ?>">
									<div class="overlay">
										<div class="divSubOverlaySeriePerfil">
											<div id="divTitulo">
												<a href="perfil.php?usuario=<?= $amigos[$i]["id_amigo"] ?>"><h3><?= $amigos[$i]["nombre_display"] ?></h3></a>
											</div>
											<?php if ($soyYo):?>
											<div class="botonBorrarSeriePerfil">
												<a class="info" href="eliminar_amigo.php?amigo=<?= $amigos[$i]["id_amigo"] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<?php endfor; ?>
							<!-- Boton mas -->
							<div class="row botonVerMasInsigniasPerfil" id="botonMasAmigosPerfil">
								<?php if ($amigosQueTiene >= $amigosAMostrar): ?>
									<div class="col-xs-offset-11 col-xs-1">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</div>
								<?php endif;?>
							</div>
							<div class="restoDeInsigniasPerfil" id="restoDeAmigosPerfil">
								<?php for ($i = $amigosAMostrar; $i < $amigosQueTiene; $i++):?>
							<div class="col-xs-2">
								<div class="imagenSeriePerfilConHover">
									<img src="img/usuarios/<?= $amigos[$i]["foto_perfil"] ?>">
									<div class="overlay">
										<div class="divSubOverlaySeriePerfil">
											<div id="divTitulo">
												<a href="perfil.php?usuario=<?= $amigos[$i]["id_amigo"] ?>"><h3><?= $amigos[$i]["nombre_display"] ?></h3></a>
											</div>
											<?php if ($soyYo):?>
											<div class="botonBorrarSeriePerfil">
												<a class="info" href="eliminar_amigo.php?amigo=<?= $amigos[$i]["id_amigo"] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script defer src="js/perfil.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
