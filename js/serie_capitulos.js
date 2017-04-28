$(".glyphicon-chevron-down").click(function()
{
	// Boton son 5 caracteres, así que eliminamos los 5 primeros y así tenemos el número
	var numero  = $(this).attr('id').substr(5);
	var divACambiar = "#capitulos" + numero;
	$(divACambiar).slideToggle();
});