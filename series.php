<?php
	ob_start();
	include_once("controladores/series_controlador.php");
?>
	<div class="fondoGrisClaro row paddingMensajes">
		<header>
			<div class="row" >        
				<div class="col-md-12 tituloTituloSerie">
					Series
				</div>
			</div>
		</header>
		<!--BOTONES DE ORDENAR SERIES, NO FUNCIONAN-->
		<!--<div class="col-xs-12 fondoTurquesa">
			<div class="row ordenarSeries">
				<div class="col-xs-offset-2">Ordenar series por:
					<button type="button" class="btn ordenarSeriesBtn">Orden Alfabético</button>
					<button type="button" class="btn ordenarSeriesBtn">Fecha</button>
				</div>
			</div>
			-->
			<?php for ($i = 0; ($i < $totalSeries) && ($i < 12); $i++):?>
				<div class="col-xs-2">
					<div class="imagenSeriePerfilConHover separacionSeriesSeries">
						<img src="img/series/<?= $series[$i]["nombre_imagen"]?>">
						<div class="overlay">
							<div class="divSubOverlaySeriePerfil">
								<div id="divTitulo">
									<a href="serie_info.php?id=<?= $series[$i]["id"]?>"><h2><?= $series[$i]["titulo"]?></h2></a>
								</div>
							</div>
						</div>
					</div>
				</div>				
			<?php
				endfor;
				/* Con mas de 12 series mostramos el botón de mas series */
				if ($totalSeries > 12):
			?>
			<div class="row">
				<a class="btn verSeries fondoRojo" id="fullSeries">Ver todas</a>
			</div>
			<?php endif; ?>
			<div id="divAnimado">
			<?php for ($i = 12; $i < $totalSeries; $i++):?>
				<div class="col-xs-2">
					<div class="imagenSeriePerfilConHover separacionSeriesSeries">
						<img src="img/series/<?= $series[$i]["nombre_imagen"]?>">
						<div class="overlay">
							<div class="divSubOverlaySeriePerfil">
								<div id="divTitulo">
									<a href="serie_info.php?id=<?= $series[$i]["id"]?>"><h2><?= $series[$i]["titulo"]?></h2></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
			</div>
		</div>
	</div>

	<script defer src="js/series.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>