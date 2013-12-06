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
		$("#ranimg, #Table_01, #map, #productos-nuevos, #contacto, #acercade, #fotovoltaicos, #ax, #federatas, #servicios, #mc_embed_signup").hide();
		$("#iframe").show();
	});	
	//acordión del menú táctil
	$('ul').accordion();
    
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
    $('.vbox-close').click(
      function ocultar()
      {
           $(".vbox-overlay").toggle();
      }
   );
   $(".box1").click(function box1(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box2, #box3, #box4, #box5, #box6").hide();
		$("#box1").addClass("active");
	});	
	$(".box2").click(function box2(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box1,#box3, #box4, #box5, #box6").hide();
		$("#box2").addClass("active");
	});	
	$(".box3").click(function box3(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box1, #box2, #box4, #box5, #box6").hide();
		$("#box3").addClass("active");
	});	
	$(".box4").click(function box4(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box1, #box2, #box3, #box5, #box6").hide();
		$("#box4").addClass("active");
	});	
	$(".box5").click(function box5(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box1, #box2, #box3, #box5, #box6").hide();
		$("#box5").addClass("active");
	});	
	$(".box6").click(function box6(){
		//quitar la clase .active al boton que la tenga:
		$(".active").removeClass("active");
		//agregar la clase .active al boton al que hicimos click:
		$(this).addClass("active");
		//esconder el mapa
		$("#box1, #box2, #box3, #box4, #box5").hide();
		$("#box6").addClass("active");
	});	
}

//Alto automatico en los iframes
function calcHeight()
{
	 //Cojo la altura en nuestra página
	 var the_height=
	 document.getElementById
	('iframe').contentWindow.
	 document.body.scrollHeight;
	//Cambio la altura del iframe
	 document.getElementById('iframe')
	.height= the_height;
}

//Detectar el iPad
if( navigator.userAgent.match( /iPad/i ) ) 
{
  	//Simular el evento hover al hacer click en pantallas táctiles
    var myLinks = document.getElementsByClassName('liga');
	for(var i = 0; i < myLinks.length; i++){
	   myLinks[i].addEventListener('touchstart', function(){this.className = "hover";}, false);
	   myLinks[i].addEventListener('touchend', function(){this.className = "";}, false);
	}
}

//Detectar el iPhone y el iPod
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



// Formulario de contacto
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