<?php

$host = 'vdetest.db.5834374.hostedresource.com';
$usuario = 'vdetest';
$pass = 'Kevinz1!';

$conn = mysql_connect($host, $usuario, $pass) or die ('Error conectando a la base de datos');

$bdnombre = 'vdetest';
mysql_select_db($bdnombre);