$("#botonLandingInicioSesion").click(function()
{
	$(".formularioInicioSesion").slideToggle("fast");
	$('html,body').animate({'scrollTop': 9999}, 'slow');
});


$("#botonLandingr").click(function()
{
	$(".formularioRegistro").slideToggle("fast");
	$('html,body').animate({'scrollTop': 9999}, 'slow');
});