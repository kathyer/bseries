$("#botonMasSeriesPerfil").click(function()
{
	$("#restoDeSeriesPerfil").slideToggle();
	$("#botonMasSeriesPerfil").slideToggle();
});

$("#botonMasInsigniasPerfil").click(function()
{
	$("#restoDeInsigniasPerfil").slideToggle();
	$("#botonMasInsigniasPerfil").slideToggle();
});

$("#botonAnadirAmigo").click(function()
{
	idAmigoASolicitar = $(this).attr("amigo");

	$.ajax({
	type: "POST",
	url: "js/anadirAmigo.php",
	data: {
	'idAmigoASolicitar': idAmigoASolicitar
	 },
	success: function(respuesta)
		{
			console.info(respuesta);
			$("#botonAnadirAmigo").attr("src", respuesta);
		}
	});
});
