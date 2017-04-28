<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/usuario_modelo.php");

	/* Este fichero hace un echo con la url de la imagen que tiene que tener el botón de añadir amigo. En caso de que no haya ninguna solicitud de amistad envidada, sombrea el botón y envía la solicitud. En caso de que haya alguna ya enviada anteriormente, borra la solicitiud y aclara el botón. */
	/* Si recibimos datos del POST, añadimos el amigo */
	if ($_POST)
	{
		if (!empty($_POST["idAmigoASolicitar"]))
		{
			/* Si ya existe una anterior, la eliminamos*/
			if (existeSolicitudDeAmistad($_POST["idAmigoASolicitar"]))
			{
				if(eliminarSolicitudDeAmistad($_POST["idAmigoASolicitar"]))
				{
					echo "img/anadirBtn.png";
				}
			}
			else
			{
				/* En caso de que no exista ninguna solicitud enviada, añadimos una */
				if(solicitarAmistad($_POST["idAmigoASolicitar"]))
				{
					echo "img/anadirBtnSombra.png";
				}
			}
		}
	}
?>