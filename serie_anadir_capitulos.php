<?php
	ob_start();
	include_once('controladores/serie_anadir_capitulos_controlador.php');
?>

<div class="centrarCosas2">

	<header>
            <div class="row" >
                <div class="col-md-12">
                    <div class="col-md-12 tituloTituloMensajeria">
                        NUEVO CAPITULO
                    </div>
                </div>
            </div>
 	</header>

	<div >
		<form enctype="multipart/form-data" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="row"> 
				<div class="col-md-12">
					<div class="col-md-6">
						<label for="titulo" class="control-label">Titulo</label>
						<input type="text" name="titulo" class="form-control" placeholder="" required="required" value="<?= $titulo ?>">
					</div>

					<div class="col-md-6">
						<label for="temporada" class="control-label">Temporada</label>
						<input type="number" name="temporada" class="form-control" required="required" value="<?= $temporada ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
				<div class="col-md-6">
					<label for="enlace" class="control-label">Enlace</label>
					<input type="text" name="enlace" class="form-control" placeholder="" required="required" value="<?= $enlace ?>">
				</div>

				<div class="col-md-6">
					<label for="numero" class="control-label">Número</label>
					<input type="number" name="numero" class="form-control" required="required" value="<?= $numero ?>">
				</div>
				</div>
			</div>

			<div class="row">
			<div class="col-md-12">
				<div class="col-md-8">
					<label for="descripcion" class="col-md-1 control-label">Descripción</label>
					<textarea class="colorTextArea form-control" name="descripcion" rows="5" placeholder="" required="required" value="<?= $descripcion ?>"></textarea>
				</div>
			</div>

			<?= $mensaje ?>
          	<?= $imagen ?>

          	<div class="col-md-6">
          	</br>
          		<input type="file" name="imagen">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000">
			</div>

			<div class="row col-sm-offset-5 col-sm-8">
			<br>
				<button type="submit" class="btn btn adminBtn fondoRojo">Guardar serie</button>
			</div>
			</div>
		</form>
	</div>

</div>
<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
