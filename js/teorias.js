/*
Tipos de Voto:
1 - WTF
2 - Me gusta
*/
$(function()
{
	$(".botonMeGusta").click(function()
	{
	// botonLike son 12 caracteres, así que eliminamos los 12 primeros y así tenemos el número
	var idTeoria = $(this).attr('id').substr(12);

	$.ajax({
		type: "POST",
		url: "js/actualizarVotosTeoria.php",
		data: {
		'id_teoria': idTeoria, 
		'tipoVoto': 2
		 },
		success: function(respuesta)
			{
				actualizarVotos(idTeoria, respuesta);
			}
	});
});

	$(".botonwtf").click(function()
	{
		// botonLike son 8 caracteres, así que eliminamos los 8 primeros y así tenemos el número
		var idTeoria = $(this).attr('id').substr(8);

		$.ajax({
			type: "POST",
			url: "js/actualizarVotosTeoria.php",
			data: {
			'id_teoria': idTeoria, 
			'tipoVoto': 1
			 },
			success: function(respuesta)
				{
					actualizarVotos(idTeoria, respuesta);
				}
		});
	});
});

	function actualizarVotos(idTeoria, respuesta)
	{
		var puntuaciones = JSON.parse(respuesta);

		console.info()

		$("#meGustaTeoria" + idTeoria).html(puntuaciones.meGusta);
		$("#wtfTeoria" + idTeoria).html(puntuaciones.wtf);
		$("#botonwtf" + idTeoria).attr("src", puntuaciones.imagenBotonWTF);
		$("#botonMeGusta" + idTeoria).attr("src", puntuaciones.imagenBotonMeGusta);
	}