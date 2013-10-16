<?php
	$sitio = "Villarreal Divisi&oacute;n Equipos S.A. de C.V.";
	//FTP
	$url = "http://vde.com.mx/";
	//Local
	//$url = "http://192.168.1.105:8888/";
	$nombre = "VDE";
	
	//server
	//$host = 'vdetest.db.5834374.hostedresource.com';
	//$usuario = 'vdetest';
	//$pass = 'Kevinz1!';
	
	//local
	$host = 'localhost';
	$usuario = 'root';
	$pass = 'root';
	
	$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');
	
	$bdnombre = 'vdetest';
	mysql_select_db($bdnombre);
?>