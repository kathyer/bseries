<?php
	ob_start();
	include_once("modelos/teorias_modelo.php");
	include_once("controladores/serie_master_controlador.php");
	include_once("controladores/serie_teorias_controlador.php");

?>
	<div id="titulosSeccionTeorias">
		<p class="tituloSeccionTeorias">TEORÍAS</p>
	</div>
	<div>
		<p class="tituloTop5">TOP 5</p>
		<div class="cajaOrdenarBtns">
			<span>Ordenar teorías por:</span>
			<a href="serie_teorias.php?id=<?=$_GET['id'];?>&ordenadas=meGusta"><button type="button" class="btn btn ordenarTeoriasBtn">Las favoritas</button></a>
			<a href="serie_teorias.php?id=<?=$_GET['id'];?>&ordenadas=wtf"><button type="button" class="btn btn ordenarTeoriasBtn">WTF</button></a>
			<a href="serie_teorias.php?id=<?=$_GET['id'];?>&ordenadas=fecha"><button type="button" class="btn btn ordenarTeoriasBtn">Últimas</button></a>
		</div>
	 </div>
		<!--Top 5--> 
	<div id="top5">
	<!--Teoría-->

	<?php for ($i = 0; ($i < $totalDeTeorias) && ($i < 5); $i++):?>
		<div class="cajaExteriorTeoria ponerDisplayTable cajaBotones">  
				<img src="img/estrella.png" class="estrella">
				<div class="ponerTableCell cajaInteriorTeoria centrarCosas1">                
					<a href="serie_teoria.php?id=<?= $id ?>&id_teoria=<?=$teoriasDeLaSerie[$i]['id']?>"><span class="textoCajaInteriorTeoria centrarCosas1"><?= $teoriasDeLaSerie[$i]['titulo'] ?></span></a>
				</div>
				<div class="ponerTableCell">
					<div class="ponerDisplayTable cajaBotones">
						<div class="ponerTableCell">
							<img class="botonMeGusta punteroClick tamanoMeGustaBtn" id="botonMeGusta<?= $teoriasDeLaSerie[$i]['id'] ?>" src="<?= imagenBotonMeGusta($teoriasDeLaSerie[$i]['tipoVoto'])?>">
							<div class="puntuacion fondoGrisClaro" id="meGustaTeoria<?= $teoriasDeLaSerie[$i]['id'] ?>"><?= $teoriasDeLaSerie[$i]['meGusta'] ?></div>
						</div>
						<div class="ponerTableCell">
							<img class="botonwtf punteroClick tamanoMeGustaBtn" id="botonwtf<?= $teoriasDeLaSerie[$i]['id'] ?>" src="<?= imagenBotonWTF($teoriasDeLaSerie[$i]['tipoVoto'])?>">
							<div class="puntuacion fondoGrisClaro" id="wtfTeoria<?= $teoriasDeLaSerie[$i]['id'] ?>"><?= $teoriasDeLaSerie[$i]['wtf'] ?></div>
						</div>
					</div>
				</div>
		</div>
	<?php endfor; 
		 /* Para que se vean todas las teorías y no sólo el top 5, le damos a Ver más */
	if ($totalDeTeorias > 5):?>
			<div class="row margenBotonVerMas">
				<a class="btn verSeries fondoRojo" id="fullSeries">Ver todas las teorías</a>
			</div>
	<?php endif; ?>

	<div id="divAnimado">
	<p class="tituloTop5">OTRAS TEORÍAS</p>
	<?php for ($i = 5; $i < $totalDeTeorias; $i++):?>
		<div class="cajaExteriorTeoria ponerDisplayTable cajaBotones">      
				<img src="img/estrella.png" class="estrella">
				<div class="ponerTableCell cajaInteriorTeoria centrarCosas1">                
					<a href="serie_teoria.php?id_teoria=<?=$teoriasDeLaSerie[$i]['id']?>"><span class="textoCajaInteriorTeoria centrarCosas1"><?= $teoriasDeLaSerie[$i]['titulo']?></span></a>
				</div>
				<div class="ponerTableCell">
					<div class="ponerDisplayTable cajaBotones">
						<div class="ponerTableCell">
							<img class="botonMeGusta punteroClick tamanoMeGustaBtn" id="botonMeGusta<?= $teoriasDeLaSerie[$i]['id'] ?>" src="<?= imagenBotonMeGusta($teoriasDeLaSerie[$i]['tipoVoto'])?>">
							<div class="puntuacion fondoGrisClaro" id="meGustaTeoria<?= $teoriasDeLaSerie[$i]['id'] ?>"><?= $teoriasDeLaSerie[$i]['meGusta'] ?></div>
						</div>
						<div class="ponerTableCell">
							<img class="botonwtf punteroClick tamanoMeGustaBtn" id="botonwtf<?= $teoriasDeLaSerie[$i]['id'] ?>" src="<?= imagenBotonWTF($teoriasDeLaSerie[$i]['tipoVoto'])?>">
							<div class="puntuacion fondoGrisClaro" id="wtfTeoria<?= $teoriasDeLaSerie[$i]['id'] ?>"><?= $teoriasDeLaSerie[$i]['wtf'] ?></div>
						</div>
					</div>
				</div>
			</div>   
	<?php endfor;?>

</div> <!-- no borrar -->

<!--Caja texto Nueva Teoría--> 
<div id="nuevaTeoria">
		</br>
		<div class="cajaTextAreaNuevaTeoria">
			<form id="nuevaTeoriaForm" method="POST" enctype="multipart/form-data">
					<p>
						<input type="text" name="tituloTeoria" placeholder="Título de la teoría" class="cajaTituloTeoria" title="Esto es el resumen de tu teoría, que será lo que aparezca en el ranking. Descríbela bien." />
					 </p>
					<textarea name="cuerpoTeoria" form="nuevaTeoriaForm" placeholder="¿Tienes una nueva teoría conspiranoica?" class="textAreaNuevaTeoria comentarioTexto"></textarea>
					<input type="submit" name="enviarTeoriaBtn" value="Enviar" class="btn btn fondoRojo enviarBtn"/>
			</form>
		</div>
	</div>
</div>

	<script defer src="js/teorias.js"></script>
					

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
