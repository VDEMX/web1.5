<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formulario</title>
</head>

<body>
<?php
//capturo las variables cuando se aprieta el boton enviar
$nombre=$_POST['nombre'];
$email=$_POST['email'];
if($nombre!="" and $email!=""){
//cambiar los parametros de conexion
mysql_connect("localhost","root","root");
//colocar el nombre de la base de datos
mysql_select_db("Pruebas-DB");
//hago la insercion a la base de datos
mysql_query("insert into prueba-test-a (nombre,email) values('$nombre','$email')");
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="286" border="1" align="center" bordercolor="#000000">
    <tr>
      <td width="81">Nombre</td>
      <td width="189"><label>
        <input type="text" name="nombre" id="nombre" />
      </label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label>
        <input type="text" name="email" id="email" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="button" id="button" value="Enviar" />
      </label></td>
    </tr>
  </table>
</form>
</body>
</html>