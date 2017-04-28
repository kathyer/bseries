<?php
	ob_start();
?>
					<div class="fondoGrisClaro">
						<header>
							<div class="row ">
								<div class="col-md-12 tituloTituloSerie ">
									Añadir Nueva Serie
								</div>
							</div>
						</header>

						<?= $contenido ?>
						
					</div>
<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
