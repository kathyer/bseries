<!-- Sobre nosotros -->
<?php
	include_once("modelos/login_snippet.php");
    ob_start();
?>
	<div class="condiciones fondoTurquesa">
		<center><h1 class="seccionTituloUsuario">Sobre nosotros...</h1></center>
		<div class="fondoGrisClaro condiciones_uso">

		BSeries. Sabe quiénes somos. Sabe lo que hacemos. Sabe que puede contar con nosotros para disfrutar de todas las series, y noticias y poder compartirla con todos sus amigos<br> <br>

		Nuestra simplez revolucionó el sector de las redes sociales. Y seguimos liderando presentando una amplia cartelera de series de las cuales nuestros usuarios disfrutan dia a dia, haciendo todo lo posible para garantizar a nuestros usuarios una experiencia única. <br><br>

		Pero nuestras series no son lo único que nos diferencia. Podemos presumir de ser la red social mas interactiva del momento,donde nuestros usuarios pueden formar grandes grupos de amigos y con tan solo seguir una serie. BSeries busca innovar, seguimos y sumamos, trabajamos para mantener a los usuarios continuamente satisfechos.<br><br>

		¿Quiere los datos puros y duros? Eche un vistazo a las cifras:<br><br>

		+400 series<br><br>
		Más de 5000 usuarios registrados<br><br>
		6 moderadores que controlan continuamente el funcionamiento de la web<br><br>
		Actualizaciones continuas para seguir ampliando cartelera<br><br>
		+50 tipos de insignias diferentes para cada serie<br><br>
		Gran variedad de géneros de series<br><br>
		La red social mas visitada en el año 2017<br><br>
		Aunque, después de todo, lo unico que importa es la comodidad del usuario. Y una cosa está clara, BSeries siempre ofrece las máximas comodidas y facilita a nuestros usuarios pasar un buen tiempo con nuestras series.<br><br>
		</div>
		<img src="img/logo.png" style="margin-left:450px; margin-top: 10px; margin-bottom:10px;">
	</div>



<?php
    $contenido = ob_get_contents();
    ob_end_clean();
    include ('master.php');
?>