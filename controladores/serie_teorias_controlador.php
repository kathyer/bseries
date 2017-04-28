<?php
	include_once("modelos/login_snippet.php");
	include_once("controladores/serie_master_controlador.php");
	include_once('modelos/serie_modelo.php');
	include_once('modelos/teorias_modelo.php');


	/* para ordenar las teorías según meGusta, wtf o fecha*/

	$paginaSerie = "teorias";

	$serieId = $_GET['id'];
	$orden = isset($_GET['ordenadas']) ? $_GET['ordenadas'] : 'fecha';

	//$teoriaId = $_GET['teoriaId'];


	/* para obtener todas las teorías de la serie, con sus votos, y publicarlas*/
	$teoriasDeLaSerie = ordenarTeorias($orden, $serieId);
	$totalDeTeorias = count($teoriasDeLaSerie);


	/* para enviar nueva teoría */

	$titulo = "";
	$cuerpo = "";

	$mensajeValidacion = "";

		  //Validación de la teoría. Comprobamos si hay datos enviados por POST.
	if ($_POST) {
		$teoriaNueva = $_POST;
		$validacion = comprobarErroresTeoria($_POST);
		if ($validacion !== false) {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$titulo = isset($teoriaNueva["tituloTeoria"]) ? $teoriaNueva["tituloTeoria"] : "";
			$cuerpo = isset($teoriaNueva["cuerpoTeoria"]) ? $teoriaNueva["cuerpoTeoria"] : "";
		}
		else
		{
			
			$resultado = anadirNuevaTeoria($_SESSION['usuario']['id'], $id, $teoriaNueva['tituloTeoria'], $teoriaNueva['cuerpoTeoria']);
			
			if ($resultado == true){
				header("Location: serie_teorias.php?id=" . $serieId);
			} else {
				echo "Ha ocurrido un fallo al publicar la teoría.";
			}
		}
	}

?>
