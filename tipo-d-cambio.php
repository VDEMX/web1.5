<?php $active_page="tipodecambio"; ?>
<?php include("includes/head.php"); ?>
 		<title><?php echo "$sitio"?>  | Tipo de cambio</title>
 		<meta name="description" content="Tipo de cambio del Dolar y del Euro">
		<meta name="keywords" content="tipo de cambio, dolar, euro,aviso, importante, tabla">
 		<meta name="robots" content="Index, follow">
 	</head>
 	
 <body>
 <!--<?php include("includes/aviso.php"); ?>-->
 <section id="container">
 	<?php include("includes/header.php"); ?>	
 	<section id="federatas" class="active">
			<?php include("vde/tc/tc.php"); ?>	
	</section>
 	<?php include("includes/iframe.php"); ?>
 	<?php include("includes/footer.php"); ?>