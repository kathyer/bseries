<?php
	ob_start();
	include_once ('controladores/modificar_perfil_controlador.php');
?>

	<div class="fondoGrisClaro">
		<header>
			<div class="seccionTituloUsuario divFilaContenido">
				Editar Perfil
			</div>
		</header>
		<div class="row">
			<div class="col-md-12 cuerpoPerfil">
				<div class="col-md-3 fondoGrisOscuro seccionPerfilInfo">
					<img class="imagenPrincipalEditarPerfil" src="img/usuarios/<?= $usuario['foto_perfil'] ?>">
					<hr>
					<label for="fotoPerfil">Cambiar imagen Perfil:</label>
					<form method="post" enctype="multipart/form-data">
						<input type="file" name="imagen" id="fotoPerfil" class="inputfile btn" />
						<button type="submit" class="btn verMensajes">Cambiar</button>
					</form>
				</div>
				<div class="col-md-9 fondoTurquesa seccionPerfilCuerpo">
					<div class="centrarCosas1 marginFormEditar">
						<p class="perfilTituloSerie">Datos Usuario</p><hr>
						<div class="row marginFormEditar ponerBlock" id="3PrimerasSeriesPerfil">
							<form class="form-inline" method="post">
								<p>
								    <label for="exampleInputName2">Nick:</label>
								</p>
								<p>
								    <input name="nick" type="text" class="form-control datosPerfil" id="exampleInputName2" value="<?= $usuario['nick'] ?>" style="width: 400px; color: black;">
								</p>

								<p>
								    <label for="exampleInputName2">Nombre:</label>
								</p>
								<p>
								    <input name="nombre_display" type="text" class="form-control datosPerfil" id="exampleInputName2" value="<?= $usuario['nombre_display'] ?>" style="width: 400px; color: black; text-align: center;">
								</p>
								<p>
								    <label for="exampleInputEmail2">Correo Electrónico:</label>
								</p>
								<p>
								    <input name="correo" type="email" class="form-control datosPerfil" id="exampleInputEmail2" value="<?= $usuario['correo'] ?>" style="width: 400px; color: black;">
								</p>
								  <!--<div class="form-group">
								    <label for="exampleInputName2">Contraseña:</label>
								    <input name="contrasena" type="text" id="exampleInputName2" class="form-control datosPerfil" value="[Contraseña]" style="width: 400px; text-align:center; color: black;">
								  </div>-->
								<p>
								    <label for="exampleInputName2">Biografía:</label>
								</p>
								<p>
								    <textarea name="bio" class="form-control datosPerfil" rows="3" style="width: 400px; color: black;"><?= $usuario['bio'] ?></textarea>
								</p>
								<p>
									<button type="submit" class="btn enviarModificacionBtn">Enviar</button>
								</p>
							</form>
							
						</div>
						<div class="row separacionSeriesPerfil" id="3PrimerasSeriesPerfil" style="">
							<p class="perfilTituloSerie">Eliminar cuenta</p><hr>
							<a href="modelos/eliminar_cuenta.php" class="btn enviarModificacionBtn" style="color:white">Eliminar cuenta</a>
						</div>
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
