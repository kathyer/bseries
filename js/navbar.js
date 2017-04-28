$(function()
{
	setInterval(comprobarNuevosMensajes, 1000);

	function comprobarNuevosMensajes()
	{
		$.ajax({
		type: "POST",
		url: "js/nuevosMensajes.php",
		success: function(respuesta)
			{
				$("#mensajesUsuarioNav").html(respuesta);
			}
	});
	}

	$("#buscador").focus(function () {
		$(".iframeBuscador").slideDown('fast');
	});

	$("#buscador").focusout(function () {
		$(".iframeBuscador").slideUp('fast');
	});
});
