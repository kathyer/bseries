<?php
	ob_start();
	include_once('controladores/serie_info_controlador.php');
?>
<div class="centrarCosas2">
	<header>
            <div class="row" >
                <div class="col-md-12">
                    <div class="col-md-12 tituloTituloMensajeria">
                        INFORMACIÓN
                    </div>
                </div>
            </div>
 	</header>
	<div class="contenedorInfo">
		<span class="textoBold textoRojo textoRojo">Director/@s: </span><span class="textoBold textoGrisOscuro"><?= $director ?></span>
	</div>
	<div class="contenedorInfo">
		<span class="textoBold textoRojo textoRojo">Reparto: </span><span class="textoBold textoGrisOscuro"><?= $reparto ?></span>
	</div>
	<div class="contenedorInfo">
		<span class="textoBold textoRojo textoRojo">Sinopsis: </span><span class="textoGrisOscuro"><?= $sinopsis ?></span>
	</div>			
</div>
<?php
	$contenido = ob_get_contents();
	ob_end_clean();
	include ('serie_master.php');
?>
