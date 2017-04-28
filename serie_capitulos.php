<?php
	ob_start();
	include_once("controladores/serie_master_controlador.php");
	include_once("controladores/serie_capitulos_controlador.php");
?>

				<div class="row">
					<div class="col-md-11">
						<p class="tituloTituloDescarga">Capítulos</p>
					</div>
					<?php if ($_SESSION["usuario"]["admin"] == 1): ?>
						<div class="col-md-1">
							<a href="serie_anadir_capitulos.php?id=<?= $id?>"><button type="button" id="boton1" class="btn btn-sm masCapitulos glyphicon glyphicon-plus"></button></a>
						</div>
					<?php endif;?>
				</div>

					<?php for ($i = 1; $i <= $temporadas; $i++): ?>
						<?php $capitulos = obtenerCapitulosPorTemporada ($i, $_GET['id']); ?>
						<div class="row fondoTemporada">
							<div class="col-md-11 centrarTemporada">
								<h3 class="tituloTemporada">Temporada <?= $i ?></h3>
							</div>
							<div class="col-md-1 colocarDesplegable">
								<button type="button" id="boton<?= $i ?>" class="btn btn-sm verMensaje glyphicon glyphicon-chevron-down"></button>
							</div>
						</div>

						<div id="capitulos<?= $i ?>" class="ocultarCapitulos capitulosTemporada">
							<?php foreach ($capitulos as $capitulo): ?>
							<div class="row">
								<div class="col-md-6">
									<h5 class="colorCapitulo">Capitulo <?= $capitulo['numero'] ?>: <?= $capitulo['titulo'] ?></h5>
								</div>
								<div class="col-md-6">
									<button type="button" class="btn btn-sm verMensaje"><span class="glyphicon glyphicon-download-alt"></span> Descargar</button>
									<a href="comentar_capitulo_serie.php?id=<?= $id ?>&capitulo_id=<?= $capitulo['id'] ?>&pag=1" class="btn btn-sm eliminarRechazar"><span class=" glyphicon glyphicon-pencil"></span> Comentar</a>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					<?php endfor; ?>


	<script defer src="js/serie_capitulos.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
