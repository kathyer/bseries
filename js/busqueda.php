<?php
	include_once("../modelos/login_snippet.php");
	include_once("../modelos/busqueda_modelo.php");

	$totalResultados = 0;
	$maximoResultadosAMostrar = 5;
	$resultadosAMostrar = 0;

	if ($_POST)
	{
		$usuarios = buscarUsuarios($_POST["buscador"]);
		$series = buscarSeries($_POST["buscador"]);
		$totalUsuarios = count($usuarios);
		$totalSeries = count($series);
	}

	if (!empty($_POST["buscador"]))
	{
		if ($totalUsuarios == 0)
		{
			?>
			<div class="noHayResultados">No hay resultados</div>
			<?php
		}
		else
		{

			for ($i = 0; ($i < $totalUsuarios) && ($resultadosAMostrar < $maximoResultadosAMostrar); $i++)
			{
		?>
				<div class="col-xs-12" style="padding-left: 3px;">
					<div class="col-xs-3" style="padding: 0">
						<img style="width: 100%; height: auto;" src="img/usuarios/<?= $usuarios[$i]["foto_perfil"]?>">
					</div>
					<div class="col-xs-9">
						<a href="perfil.php?usuario=<?= $usuarios[$i]["id"]?>"><?= $usuarios[$i]["nombre_display"]?></a>
					</div>
				</div>
		<?php
				$resultadosAMostrar++;
			}
		}

		if($totalSeries != 0)
		{
			for ($i = 0; ($i < $totalSeries) && ($resultadosAMostrar < $maximoResultadosAMostrar); $i++)
			{
			?>
				<div class="col-xs-12" style="padding-left: 3px;">
					<div class="col-xs-3" style="padding: 0">
						<a href="serie_info.php?id=<?= $series[$i]["id"]?>" ><img style="width: 100%; height: auto;" src="img/series/<?= $series[$i]["nombre_imagen"]?>"></a>
					</div>
					<div class="col-xs-9">
						<a href="serie_info.php?id=<?= $series[$i]["id"]?>"><?= $series[$i]["titulo"]?></a>
					</div>
				</div>			
			<?php
				$resultadosAMostrar++;
			}
		}
	}
	?>

</html>


