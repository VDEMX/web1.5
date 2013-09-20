<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<?php include("globals.php"); ?>
 	<head>  
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; target-densitydpi=160dpi;">
 		
 		<!-- Estilos -->
 		<link rel="stylesheet" href="http://necolas.github.io/normalize.css/2.1.1/normalize.css" media="all">
 		<link rel="stylesheet" href="<?php echo "$url"?>css/styles.css" media="all">
 		<?php if ($active_page=="Inicio") echo " <link rel='stylesheet' href='css/flexslider.css' media='all'>"; ?>
		
 		<!-- Modernizr -->
 		<script src="http://modernizr.com/downloads/modernizr.js"></script>
 		
 		<!--iOS app-->
 		<meta name="apple-mobile-web-app-capable" content="yes">
 		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
 		
 		<!-- favicon -->
 		<link rel="icon" type="image/x-icon" href="<?php echo "$url"?>favicon.ico">
 		
 		<!-- 57x57 (precomposed) for iPhone 3GS, 2011 iPod Touch and older Android devices -->
 		<link rel="apple-touch-icon-precomposed" href="<?php echo "$url"?>favicon.png">
 		
 		<!-- 72x72 (precomposed) for 1st generation iPad, iPad 2 and iPad mini -->
 		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo "$url"?>favicon.png">
 		
 		<!-- 114x114 (precomposed) for iPhone 4, 4S, 5 and 2012 iPod Touch -->
 		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo "$url"?>favicon.png">
 		
 		<!-- 144x144 (precomposed) for iPad 3rd and 4th generation -->
 		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo "$url"?>favicon.png">
 		
 		 	
 		<!-- Splash Screen -->	
 		<!-- iPhone 3GS, 2011 iPod Touch -->
 		<link rel="apple-touch-startup-image" href="startup-320x460.png" media="screen and (max-device-width : 320px)">
 		
 		<!-- iPhone 4, 4S and 2011 iPod Touch -->
 		<link rel="apple-touch-startup-image" href="startup-640x920.png" media="(max-device-width : 480px) and (-webkit-min-device-pixel-ratio : 2)">
 		
 		<!-- iPhone 5 and 2012 iPod Touch -->
 		<link rel="apple-touch-startup-image" href="startup-640x1096.png" media="(max-device-width : 548px) and (-webkit-min-device-pixel-ratio : 2)">
 		
 		<!-- iPad landscape -->
 		<link rel="apple-touch-startup-image" sizes="1024x748" href="startup-1024x748.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : landscape)">
 		
 		<!-- iPad Portrait -->
 		<link rel="apple-touch-startup-image" sizes="768x1004" href="startup-768x1004.png" media="screen and (min-device-width : 481px) and (max-device-width : 1024px) and (orientation : portrait)">