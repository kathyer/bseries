<?php
	include_once("modelos/conexion.php");
	include_once("modelos/usuario_modelo.php");
	$ipBaseDeDatos = hacerListado("SELECT direccion FROM informacion;")[0]["direccion"];
?>
<nav class="navbar navbar-default alturaNavPrincipal fondoRojo">
	<!-- Encabezado nav -->
	<div class="navbar-header navbarHeaderNavPrincipal">
		<!-- Logo -->
		<a class="navbar-brand logoNavPrincipal" href="http://<?= $ipBaseDeDatos?>"><img alt="Bseries" src="img/logo.png"></a>
		<!-- fin logo -->

		<!-- Hamburguesita -->
		<button type="button" class="navbar-toggle navbarToggleNavPrincipal" data-toggle="collapse" data-target="#nav-collapse">
			<!-- La class = "navbar-toggle" sirve para que se muestre el dibujito de la hamburguesa dentro del botón -->
			<!-- El data-toggle = "collapse" sirve para que se muestre la lista al pulsar la hamburguesita -->
			<!-- El data-target = "#nav-collapse" sirve para indicar qué lista debe mostrarse -->
			<span class="icon-bar"></span> <!-- Son las rallitas de dentro de la hamburguesita -->
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<!-- fin hamburguesita -->

		<!-- User -->
		<div class="post-collapse dropdown nav-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-expanded="true"><img src="img/usuario_icono.png"/> <span class="caret"></span></a>
			<ul class="dropdown-menu dropdown-menu-left menuDesplegableUsuario" aria-labelledby="dLabel">
				<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
			</ul>
		</div>
		<!-- fin user -->

		<!-- Buscador -->
		<form class="post-collapse navbar-form nav-buscador">
				<input type="text" class="form-control formularioBuscar" placeholder="Busca series o personas">
				<button class="nav-boton-buscar" type="submit"><img src="img/lupa.png"></button>
		</form>
		<!-- fin buscador -->
	</div>
	<!-- fin encabezado -->

	<!-- Collapse -->
	<div class="collapse navbar-collapse navbarCollapseNavPrincipal fondo-rojo" id="nav-collapse">
		<!-- Lista -->
		<ul class="nav navbar-nav navBarPrincipal">
			<li><a href="perfil.php?usuario=<?= $_SESSION['usuario']['id'] ?>">Mi perfil</a></li>
			<li><a href="muro.php?pag=1">Muro</a></li>
			<li><a href="mensajes.php" id="mensajesUsuarioNav"><?= mostrarMensajesConMensajesNuevos(); ?></a></li>
			<li><a href="series.php">Series</a></li>
			<?php if ($_SESSION["usuario"]["admin"] == 1): ?><li><a href="serie_nueva.php">Añadir serie</a></li> <?php endif;?>
		</ul>
		<!-- fin lista -->

		<!-- User -->
			<div class="pre-collapse dropdown nav-user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-expanded="true"><img src="img/usuario_icono.png"/> <span class="caret"></span></a>
				<ul class="dropdown-menu dropdown-menu-left menuDesplegableUsuario" aria-labelledby="dLabel">
					<li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
				</ul>
			</div>
		<!-- fin user -->

		<!-- Buscador -->
		<form method="POST" action="resultadosBusqueda.php" class="pre-collapse navbar-form nav-buscador">
			<div class="form-group">
				<input id="buscador" name="buscador" type="text" class="form-control formularioBuscar" placeholder="Busca series o personas" autocomplete="off">
				<div id="iframeBuscador" class="iframeBuscador"></div>
			</div>
			<button class="nav-boton-buscar" type="submit"><img src="img/lupa.png"></button>
		</form>
		<!-- fin buscador -->
	</div>
	<!-- fin collapse -->
</nav>

<script defer src="js/navbar.js"></script>
<script defer src="js/buscador.js"></script>
