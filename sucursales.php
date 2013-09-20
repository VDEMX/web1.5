<?php $active_page="oficinas"; ?>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
 	<head>  
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; target-densitydpi=device-dpi;">
 		<title>VDE | Sucursales</title>
 		<meta name="description" content="Contamos con presencia a nivel nacional" />
		<meta name="keywords" content="diseñar, producir,distribuir,mayoreo, sistemas,equipos,alta calidad,agua, presencia, nacional, México, republica">
 		<meta name="robots" content="Index, follow" />
 		
 		<!-- Estilos -->
 		<link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.1/normalize.css" media="all">
 		<link rel="stylesheet" href="css/styles.css" media="all">	
 		<!-- Modernizr -->
 		<script src="http://modernizr.com/downloads/modernizr.js"></script>
 		<script>
var myLinks = document.getElementsByTagName('a');
for(var i = 0; i < myLinks.length; i++){
   myLinks[i].addEventListener('touchstart', function(){this.className = "hover";}, false);
   myLinks[i].addEventListener('touchend', function(){this.className = "";}, false);
}
 		</script>
 	</head>
 	
 <body>
 <section id="container">
 	
 	<?php include("header.php"); ?>
 	
 	<section id="map" class="content active">
 		<div id="tooltips">
	 		<div id="tooltip-01"><a href="#"></a></div>	
			<div id="tooltip-02"><a href="#"></a></div>	
			<div id="tooltip-03"><a href="#"></a></div>	
			<div id="tooltip-04"><a href="#"></a></div>	
			<div id="tooltip-05"><a href="#"></a></div>	
			<div id="tooltip-06"><a href="#"></a></div>
			<div id="tooltip-07"><a href="#"></a></div>	
 		</div>
	</section>
 	
 	<!-- !Iframe -->
 	<iframe src="machote.html" width="800" height="450" name="contenido" frameborder="0" valign="top" bgcolor="#6796C2" class="content inactive"></iframe>
 	
 	<?php include("footer.php"); ?>