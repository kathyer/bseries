
<?php
	ob_start();
	include_once("modelos/login_snippet.php");
	include_once("modelos/busqueda_modelo.php");
	include_once("modelos/usuario_modelo.php");


	if ($_POST)
	{
		$resultados = buscarUsuarios($_POST["buscador"]);
	}

?>
	<div class="fondoGrisClaro">
		<header>
			<div class="col-xs-12 seccionTituloUsuario centrarCosas1">
					Resultados de búsqueda
			</div>
		</header>

		<div class="row">
			<div class="col-xs-12 cuerpoPerfil">
				<div class="col-xs-12 fondoTurquesa seccionPerfilCuerpo">
					<div class="col-xs-12 cuerpoResultadoBuscador">
						<?php foreach ($resultados as $resultado): ?>
							<?php if($_SESSION["usuario"]["id"] != $resultado["id"] ):?>
							<div class="col-xs-4">
								<div class="col-xs-12">
									<div class="col-xs-4 cuerpoImagenResultadoBusquedaUsuario">
										<img class="imagenResultadoBusquedaUsuario" src="img/usuarios/<?= $resultado["foto_perfil"]?>">
									</div>
									<div class="col-xs-8">
										<div class="nombreUsuarioResultadoBuscador">
											<a href="perfil.php?usuario=<?= $resultado["id"]?>"><?= $resultado["nombre_display"]?></a>
										</div>
										<div class="amigosComunResultadoBuscador"><?= obtenerAmigosEnComun($resultado["id"])?> amigos en común</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script defer src="js/perfil.js"></script>

<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('master.php');
?>
