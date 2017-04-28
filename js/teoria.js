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
	var idComentario = $(this).attr('id').substr(12);

	$.ajax({
		type: "POST",
		url: "js/actualizarVotosComentarioTeoria.php",
		data: {
		'id_comentario_teoria': idComentario, 
		'tipoVoto': 2
		 },
		success: function(respuesta)
			{
				actualizarVotos(idComentario, respuesta);
			}
	});
});

	$(".botonwtf").click(function()
	{
		// botonLike son 8 caracteres, así que eliminamos los 8 primeros y así tenemos el número
		var idComentario = $(this).attr('id').substr(8);

		$.ajax({
			type: "POST",
			url: "js/actualizarVotosComentarioTeoria.php",
			data: {
			'id_comentario_teoria': idComentario, 
			'tipoVoto': 1
			 },
			success: function(respuesta)
				{
					actualizarVotos(idComentario, respuesta);
				}
		});
	});
});

	function actualizarVotos(idComentario, respuesta)
	{
		var puntuaciones = JSON.parse(respuesta);

		$("#meGustaTeoria" + idComentario).html(puntuaciones.meGusta);
		$("#wtfTeoria" + idComentario).html(puntuaciones.wtf);
		$("#botonwtf" + idComentario).attr("src", puntuaciones.imagenBotonWTF);
		$("#botonMeGusta" + idComentario).attr("src", puntuaciones.imagenBotonMeGusta);
	}