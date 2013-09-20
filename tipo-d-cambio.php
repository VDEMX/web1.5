<?php $active_page="tipodecambio"; ?>
<?php include("head.php"); ?>
 		<title><?php echo "$sitio"?>  | Tipo de cambio</title>
 		<meta name="description" content="Tipo de cambio del Dolar y del Euro">
		<meta name="keywords" content="tipo de cambio, dolar, euro,aviso, importante, tabla">
 		<meta name="robots" content="Index, follow">
 	</head>
 	
 <body>
 <section id="container">
 	<?php include("header.php"); ?>	
 	<section id="federatas" class="active">
			<?php include("vde/tc/tc.php"); ?>	
	</section>
 	
 	<?php include("iframe.php"); ?>
 	<?php include("footer.php"); ?>