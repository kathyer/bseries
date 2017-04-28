$("#buscador").keyup(function()
{

	let valorBuscador = $(this).val();

	$.ajax({
	type: "POST",
	url: "js/busqueda.php",
	data: {
	'buscador': valorBuscador
	 },
	success: function(respuesta)
		{
			$('#iframeBuscador').html(respuesta);

			totalHeight = 0;
			$("#iframeBuscador").children().each(function(){
				totalHeight = totalHeight + $(this).outerHeight(true);
			});

			$("#iframeBuscador").height(totalHeight);
		}
	});

});

$("#buscador").change(function()
{
	totalHeight = 0;
	$("#iframeBuscador").children().each(function(){
		totalHeight = totalHeight + $(this).outerHeight(true);
	});

	$("#iframeBuscador").height(totalHeight);
});