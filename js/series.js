$("#fullSeries").click(function()
{
	$("#fullSeries").hide();
	$('#divAnimado').fadeToggle(1000);

});

$("#botonAnadirSerie").click(function()
{
	var idSerie = $(this).attr("idSerie");

	$.ajax({
	type: "POST",
	url: "js/series_anadir.php",
	data: {
	'idSerie': idSerie
	 },
	success: function(respuesta)
		{
			if(respuesta != "error")
				$("#botonAnadirSerie").attr("src", respuesta);
		}
	});
});

$("#divNotaMedia").click(function()
{
	$("#divNotaMedia").toggle();
	$("#divVotarNotaMedia").toggle();

});

$("#divVotarNotaMedia").change(function()
{

	var voto = $(this).val();
	var idSerie = $(this).attr("serie");

	$.ajax({
	type: "POST",
	url: "js/serie_votar.php",
	data: {
	'idSerie': idSerie,
	'voto': voto
	 },
	success: function (nuevoVoto)
	{
		$("#divNotaMedia").toggle();
		$("#divVotarNotaMedia").toggle();
		$("#divNotaMedia").html(nuevoVoto);
	}
	});
})

$(".insigniaEnSerie").click(function()
{
	$.ajax({
	type: "POST",
	url: "js/anadir_insignia.php",
	data: {
	'insignia': $(this).attr("idInsignia"),
	 },
	success: function (respuesta)
	{
		console.log(respuesta);
	}
	});
})