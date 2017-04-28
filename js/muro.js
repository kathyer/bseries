$(function()
{
	$(".botonMeGusta").click(function()
	{
	// botonMeGusta son 12 caracteres, así que eliminamos los 12 primeros y así tenemos el número
	var idComentario = $(this).attr('id').substr(12);
	$.ajax({
		type: "POST",
		url: "js/actualizarVotosMuro.php",
		data: {
		'id_comentario': idComentario,
		'tipoVoto': 2
		 },
		success: function(respuesta)
			{
				actualizarVotosMuro (idComentario, respuesta);
			}
	});
});

	$(".botonwtf").click(function()
	{
		// botonwtf son 8 caracteres, así que eliminamos los 8 primeros y así tenemos el número
		var idComentario = $(this).attr('id').substr(8);

		$.ajax({
			type: "POST",
			url: "js/actualizarVotosMuro.php",
			data: {
			'id_comentario': idComentario,
			'tipoVoto': 1
			 },
			success: function(respuesta)
				{
					actualizarVotosMuro (idComentario, respuesta);
				}
		});
	});

	$("#botonVerTodasMuro").click(function()
	{
		$(this).toggle();
		$("#restoSeriesMuro").slideToggle();
	});

});

function actualizarVotosMuro (idComentario, respuesta)
{
	var puntuaciones = JSON.parse(respuesta);

	$("#meGustaMuro" + idComentario).html(puntuaciones.meGusta);
	$("#wtfMuro" + idComentario).html(puntuaciones.wtf);
	$("#botonwtf" + idComentario).attr("src", puntuaciones.imagenBotonWTF);
	$("#botonMeGusta" + idComentario).attr("src", puntuaciones.imagenBotonMeGusta);
}
