<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');

	$paginaSerie = "capitulos";

	$titulo = "";
	$temporada = "";
	$enlace = "";
	$numero = "";
	$descripcion = "";

	$mensajeValidacion = "";

	$mensaje="";
	$imagen="";

		  // Comprobamos si hay datos enviados por POST.
	if ($_POST) {
		$validacion = comprobarErroresCapitulo($_POST);
		if ($validacion !== false) {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$titulo = isset($_POST["titulo"]) ? $_POST["titulo"] : "";
			$enlace = isset($_POST["enlace"]) ? $_POST["enlace"] : "";
			$temporada = isset($_POST["temporada"]) ? $_POST["temporada"] : "";
			$numero = isset($_POST["numero"]) ? $_POST["numero"] : "";
			$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
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
			$datos['imagen_capitulo'] = basename($_FILES["imagen"]["name"]);
			$datos['id_serie']= $_GET['id'];
			unset($datos['MAX_FILE_SIZE']);
			$resultado = guardarCapitulo($datos);
			if ($resultado == true){
				header("Location: index.php");
			} else {
				echo "Ha ocurrido un fallo al guardar la serie.";
			}
		}
	}
?>