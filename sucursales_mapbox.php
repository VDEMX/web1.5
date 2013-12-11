<?php $active_page="oficinas"; ?>
<?php include("includes/head.php"); ?>
 		<title><?php echo "$nombre"?> | Sucursales</title>
 		<meta name="description" content="Contamos con presencia a nivel nacional">
		<meta name="keywords" content="diseñar, producir,distribuir,mayoreo, sistemas,equipos,alta calidad,agua, presencia, nacional, México, republica">
 		<meta name="robots" content="Index, follow">
 		
 		<!-- Para el mapa -->
		<link href='http://api.tiles.mapbox.com/mapbox.js/v0.6.6/mapbox.css' rel='stylesheet'>
		<script src='http://api.tiles.mapbox.com/mapbox.js/v0.6.6/mapbox.js'></script>
 	</head>
 	
 <body>
 <section id="container">
 	
 	<?php include("includes/header.php"); ?>
 	
 	<section id="map" class="content active">
		<script>
		  mapbox.auto('map', 'arkev.map-wrldqnu7');
		</script>		
	</section>
 	
 	<?php include("includes/iframe.php"); ?> 	
 	<?php include("includes/footer.php"); ?>