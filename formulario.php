<?php $active_page="contacto"; ?>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
 	<head>  
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; target-densitydpi=160dpi;">
 		<title>VDE | Contacto</title>
 		<meta name="description" content="Contáctenos para solicitar información de nuestros productos y servicios" />
		<meta name="keywords" content="contacto, información, mensaje, diseñar, producir,distribuir,mayoreo, sistemas,equipos,alta calidad,agua, presencia, nacional, México, republica">
 		<meta name="robots" content="Index, follow" />
 		
 		<!-- Estilos -->
 		<link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.1/normalize.css" media="all">
 		<link rel="stylesheet" href="css/styles.css" media="all">
		
 		<!-- Modernizr -->
 		<script src="http://modernizr.com/downloads/modernizr.js"></script>
 	</head>
 	
 <body>
 <section id="container">
 	<?php include("header.php"); ?>	
 	<section id="contacto" class="content active">
 	<h2 class="titulo">Contáctenos</h2>
		<p>Si desea información de nuestros productos y servicios, mándenos sus datos en el formulario y a la brevedad nuestro departamento de ventas se pondrá en contacto con usted. También puede utilizarlo para hacernos llegar cualquier duda o sugerencia.</p>
		<form action="send.php" method="post" id="myform">
				<fieldset>
					<section>
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" title="Nombre" tabindex="1" required>
						<label for="email">E-mail</label>
						<input type="email" name="mail" id="mail" tabindex="2" title="Correo electrónico" pattern="^[a-zA-Z0-9.!#$%&amp;'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
						<label for="empresa">Empresa</label>
						<input type="text" name="empresa" id="empresa" tabindex="3" title="Empresa">
						<div id="respuesta"></div>
					</section>
					<section>
					<label for="mensaje">Mensaje</label>
					<textarea name="mensaje" title="Mensaje" tabindex="4" id="mensaje" required></textarea>
					<input class="submit" type="submit" name="submit" value="enviar">
					</section>
				</fieldset>
		</form>		
	</section>
 	
 	<!-- !Iframe -->
 	<iframe src="machote.html" width="800" height="450" name="contenido" frameborder="0" valign="top" bgcolor="#6796C2" class="content inactive"></iframe>
 	
 	<?php include("footer.php"); ?>