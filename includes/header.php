<input type="checkbox" class="cssmenu-check toggle" id="cssmenu-check">
<nav class="cssmenu" id="cssmenu">
	<?php include("menu.php"); ?>
</nav>
<div class="page-wrap">
	<header class="main-header">
		<label for="cssmenu-check" class="toggle-menu toggle"><div class="btn-navbar"><div class="icon-menu"></div> Menú</div></label>
		<hgroup>
			<a href="/inicio"><img src="<?php echo "$url"?>images/logo-vde.png" alt="Logo"></a>
			<h1><?php echo "$sitio"?></h1> 
		</hgroup>
			<!--[if IE 9]><div id="menu"><![endif]-->
			<!--[if !(IE 9)]><!--><nav id="menu"><!--<![endif]-->
				<?php include("menu.php"); ?>
			<!--[if IE 9]></div><![endif]-->
			<!--[if !(IE 9)]><!--></nav><!--<![endif]-->
	</header>