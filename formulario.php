<?php $active_page="contacto"; ?>
<?php include("head.php"); ?>
<?php include("send.php"); ?>
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
 	<section>
	 	<form class='contacto' method='POST' accept-charset='UTF-8'  action=''>
            <div><label>Nombre:</label><input type='text'tabindex='1' class='nombre' name='nombre' value='<?php echo $_POST['nombre']; ?>'><?php echo $error1 ?></div>
            <div><label>Correo electrónico:</label><input tabindex='2' type='email' class='email' name='email' value='<?php echo $_POST['email']; ?>'><?php echo $error2 ?></div>
            <div><label>Asunto:</label><input tabindex='3' type='text' class='asunto' name='asunto' value='<?php echo $_POST['asunto']; ?>'><?php echo $error3 ?></div>
            <div><label>Mensaje:</label><textarea tabindex='4' rows='6' class='mensaje' name='mensaje'><?php echo $_POST['mensaje']; ?></textarea><?php echo $error4 ?></div>
            <div><input tabindex='5' type='submit' value='Enviar Mensaje' class='button' name='boton'></div>
            <?php echo $result; ?>
        </form>	
 	</section>
 	<section>
	 	<p>Si desea información de nuestros productos y servicios, mándenos sus datos en el formulario y a la brevedad nuestro departamento de ventas se pondrá en contacto con usted. También puede utilizarlo para hacernos llegar cualquier duda o sugerencia.</p>
			<h2>Oficinas generales</h2>
			<adress>Morelos 905 Sur, 67350 Allende, N.L., México. <br>
			<strong>Teléfonos:</strong><br>
			Conmutador: <strong><a href="tel:01-826-2680-800">01 (826) 2680 800</a></strong>, Ventas: <strong><a href="tel:01-826-2680-801">01 (826) 2680 801</a></strong>, Teléfono sin costo: <strong><a href="tel:01-800-71-26622">01-800-71-BOMBA</a></strong> y <strong><a href="tel:01-800-71-26622">01-800-832-6600</a></strong>
                    </adress>
 	</section>
</section>
 	
 	<?php include("iframe.php"); ?> 	
 	<?php include("footer.php"); ?>