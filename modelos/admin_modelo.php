<?php 
   			include_once("modelos/conexion.php");

function guardarSerie($datos){
	 $consulta = consultaInsert($datos, "series");
            return ejecutarConsulta($consulta);

}

function comprobarErroresSerie($datos) {

	if (empty($datos["titulo"])) {
    return "Debe completar el titulo de la serie";
  }

  if (empty($datos["director"])) {
    return "Debe poner el director";
  }

  if(empty($datos['temporadas'])) {
    return "Debe introducir numero de temporadas.";
  }

  if(empty($datos['nota_media'])) {
    return "Debe introducir una nota media.";
  }

	if(empty($datos['capitulos'])) {
    return "Debe introducir numero de capitulos.";
  }  

  if (empty($datos["reparto"])) {
    return "Debe completar el reparto.";
  }

   if (empty($datos["sinopsis"])) {
    return "Debe hacer una sinopsis de la serie.";
  }


  return false;

}

?>
