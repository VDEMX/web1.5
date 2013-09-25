<?php $active_page="contacto"; ?>
<?php include("head.php"); ?>
 		<title><?php echo "$nombre"?> | Contacto</title>
 		<meta name="description" content="Contáctenos para solicitar información de nuestros productos y servicios">
		<meta name="keywords" content="contacto, información, mensaje, diseñar, producir,distribuir,mayoreo, sistemas,equipos,alta calidad,agua, presencia, nacional, México, republica">
 		<meta name="robots" content="Index, follow">
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
 	
 	<?php include("iframe.php"); ?> 	
 	<?php include("footer.php"); ?>