<?php
	include_once("modelos/login_snippet.php");
	include_once ("modelos/admin_modelo.php");
	ob_start();

  $titulo = "";
	$temporadas = "";
	$director = "";
	$nota = "";
	$capitulos = "";
	$reparto = "";
	$sinopsis = "";

	$mensajeValidacion = "";

		$mensaje="";
    	$imagen="";

		  // Comprobamos si hay datos enviados por POST.
	if ($_POST) {
		$validacion = comprobarErroresSerie($_POST);
		if ($validacion !== false) {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
			$director = isset($_POST["director"]) ? $_POST["director"] : "";
			$temporadas = isset($_POST["temporadas"]) ? $_POST["temporadas"] : "";
			$nota = isset($_POST["nota_media"]) ? $_POST["nota_media"] : "";
			$capitulos = isset($_POST["capitulos"]) ? $_POST["capitulos"] : "";
			$reparto = isset($_POST["reparto"]) ? $_POST["reparto"] : "";
			$sinopsis = isset($_POST["sinopsis"]) ? $_POST["sinopsis"] : "";
		}
		else
		{


			if(isset($_FILES["imagen"])) {
				$path="img/series/";
				$file_path= $path . basename($_FILES["imagen"]["name"]);// de esta forma podemos guardar los archivos de subida
				if(move_uploaded_file($_FILES["imagen"]["tmp_name"], $file_path)){//indicamos donde esta el archivo y dondee queremos que se guarde.
			        $mensaje= "<h3>Archivo subido correctamente</h3>";
			        $imagen= "<img src='$file_path'>";
				} else{
					$mensaje= "<h3>Ha ocurrido un error intentelo de nuevo</h3>";
					$imagen="";
				}
			}


			$datos = $_POST;
			$datos['nombre_imagen'] = basename($_FILES["imagen"]["name"]);
			unset($datos['MAX_FILE_SIZE']);
			$resultado = guardarSerie($datos);
			if ($resultado == true){
				header("Location: index.php");
			} else {
				echo "Ha ocurrido un fallo al guardar la serie.";
			}
		}
	}  



?>
	<div class="fondoGrisOscuro">
		<form enctype="multipart/form-data" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="row"> 
				<div class="col-md-12">
					<div class="col-md-2">
						<label for="titulo" class="control-label">Titulo</label>
						<input type="text" name="titulo" class="form-control" placeholder="" required="required" value="<?= $titulo ?>">
					</div>
		
					<div class="col-md-5">
						<label for="fecha_inicio" class=" control-label">Titulo</label>
						<input type="date" name="fecha_inicio" class="form-control" required="required">
					</div> 

					<div class="col-md-2">
						<label for="ntemporadas" class="control-label">Temporadas</label>
						<input type="number" name="temporadas" class="form-control" required="required" value="<?= $temporadas ?>">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
				<div class="col-md-2">
					<label for="director" class="control-label">Director</label>
					<input type="text" name="director" class="form-control" placeholder="" required="required" value="<?= $director ?>">
				</div>

				<div class="col-md-2">
					<label for="capitulos" class="control-label">Capitulos</label>
					<input type="number" name="capitulos" class="form-control" required="required" value="<?= $capitulos ?>">
				</div>

				<div class="col-md-2">
					<label for="nota_media" class="control-label">Nota</label>
					<input type="number" name="nota_media" class="form-control" required="required" value="<?= $nota ?>">
				</div>
				</div>
			</div>

			<div class="row">
			<div class="col-md-12">
				<div class="col-md-6">
					<label for="reparto" class="col-md-1 control-label">Reparto</label>
					<textarea class="colorTextArea form-control" name="reparto" rows="5" placeholder="" required="required" value="<?= $reparto ?>"></textarea>
				</div>
			
				<div class="col-md-6">
					<label for="sinopsis" class="col-md-1 control-label">Sinopsis</label>
					<textarea class="colorTextArea form-control" rows="5" name="sinopsis" placeholder="" required="required" value="<?= $sinopsis ?>"></textarea>
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
				<button type="submit" class="btn btn-primary">Guardar serie</button>
			</div>
			</div>
		</form>
	</div>

<?php
  $contenido = ob_get_contents();
  ob_end_clean();
  include ('admin_master.php');
?>