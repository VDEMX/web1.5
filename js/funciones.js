$(document).on("ready", inicio);
function inicio () 
{
	//slider
	$('.flexslider').flexslider({
		animation: "slide"
	});
	//botones para el iframe
	$(".boton").click(function toggle(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#ranimg, #Table_01, #map, #productos-nuevos, #contacto, #acercade, #fotovoltaicos, #ax, #federatas").hide();
		$("iframe").show();
	});
	//acordión del menú táctil
	$('ul').accordion();
	//formulario de contacto
	$('#myform').html5form({
        method: 'POST',
        messages : 'es', // Opciones 'en', 'es', 'it', 'de', 'fr', 'nl', 'be', 'br'
        responseDiv : '#respuesta',
        allBrowsers: true,  
    }); 
    //pestañas
   $(".tab").click(function tabs(){
   //quitar la clase .active a la pestaña que la tenga:
      $(".active").removeClass("active");
   //agregar la clase .active la pestaña que hicimos click:
   $(this).addClass("active");
   });
    $('.sec-1').click(
      function()
      {
            window.location = '/aviso-nov-2012';
      }
   );
   $('.sec-2').click(
      function()
      {
            window.location = '/aviso-nov-2012#sec-2';
      }
   );
   $('.sec-02').click(
      function()
      {
            window.location = '/aviso-nov-2012#sec-02';
      }
   );
   $('.sec-6').click(
      function()
      {
            window.location = '/aviso-nov-2012#sec-6';
      }
   );
   $('.sec-8').click(
      function()
      {
            window.location = '/aviso-nov-2012#sec-8';
      }
   );
}

if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)))
{
// Ocultar la barra de dirreciones en iOS
// Cuando este listo
window.addEventListener("load",function cargar() {
  // Set a timeout...
  setTimeout(function seacaboeltiempo(){
    // Hide the address bar!
    window.scrollTo(0, 1);
  }, 0);
  
});

// bloquear el zoom en iOS
MBP.scaleFix();
}

// Respond.js
yepnope({
	test : Modernizr.mq('(only all)'),
	nope : ['js/respond.min.js']
});