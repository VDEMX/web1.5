<?php $active_page="oficinas"; ?>
<?php include("head.php"); ?>
 		<title><?php echo "$sitio"?> | Sucursales</title>
 		<meta name="description" content="Contamos con presencia a nivel nacional">
		<meta name="keywords" content="diseñar, producir,distribuir,mayoreo, sistemas,equipos,alta calidad,agua, presencia, nacional, México, republica">
 		<meta name="robots" content="Index, follow">
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
 	
 	<?php include("iframe.php"); ?> 
 	<?php include("footer.php"); ?>