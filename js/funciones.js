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
		$("#ranimg, #Table_01, #map, #productos-nuevos, #contacto, #acercade, #fotovoltaicos, #ax, #federatas, #servicios").hide();
		$("#iframe").show();
	});
	//acordi�n del men� t�ctil
	$('ul').accordion();
	//formulario de contacto
	$('#myform').html5form({
        method: 'POST',
        messages : 'es', // Opciones 'en', 'es', 'it', 'de', 'fr', 'nl', 'be', 'br'
        responseDiv : '#respuesta',
        allBrowsers: true,  
    }); 
    //pesta�as
   $(".tab").click(function tabs(){
   //quitar la clase .active a la pesta�a que la tenga:
      $(".active").removeClass("active");
   //agregar la clase .active la pesta�a que hicimos click:
   $(this).addClass("active");
   });
    $('.sec-1').click(
      function aviso1()
      {
            window.location = '/aviso-nov-2012';
      }
   );
   $('.sec-2').click(
      function aviso2()
      {
            window.location = '/aviso-nov-2012#sec-2';
      }
   );
   $('.sec-02').click(
      function aviso3()
      {
            window.location = '/aviso-nov-2012#sec-02';
      }
   );
   $('.sec-6').click(
      function aviso3()
      {
            window.location = '/aviso-nov-2012#sec-6';
      }
   );
   $('.sec-8').click(
      function aviso4()
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
	nope : ['respond.min.js']
});

$(function formulario() { 
	var emailreg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;	
	$(".boton").click(function(){  
		$(".error").fadeOut().remove();
		
        if ($(".nombre").val() == "") {  
			$(".nombre").focus().after('<span class="error">Ingrese su nombre</span>');  
			return false;  
		}  
        if ($(".email").val() == "" || !emailreg.test($(".email").val())) {
			$(".email").focus().after('<span class="error">Ingrese un email correcto</span>');  
			return false;  
		}  
        if ($(".asunto").val() == "") {  
			$(".asunto").focus().after('<span class="error">Ingrese un asunto</span>');  
			return false;  
		}  
        if ($(".mensaje").val() == "") {  
			$(".mensaje").focus().after('<span class="error">Ingrese un mensaje</span>');   
			return false;  
		}  
    });  
	$(".nombre, .asunto, .mensaje").bind('blur keyup', function(){  
        if ($(this).val() != "") {  			
			$('.error').fadeOut();
			return false;  
		}  
	});	
	$(".email").bind('blur keyup', function(){  
        if ($(".email").val() != "" && emailreg.test($(".email").val())) {	
			$('.error').fadeOut();  
			return false;  
		}  
	});
});