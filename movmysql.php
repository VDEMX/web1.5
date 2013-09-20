<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<title>Documento sin t&iacute;tulo</title>
<?
$name=$_REQUEST['name'];
$product =$_REQUEST['product'];
$nameprov= $_REQUEST['nameprov'];
$totalprice  = $_REQUEST['totalprice'];
$numfact  = $_REQUEST['numfact']; 


//Connect To Database
//$hostname= 'ip-173-201-34-119.ip.secureserver.net';
//$username="root";
//$password="Vde38ex0";

$conexion = mysql_connect("ip-173-201-34-119.ip.secureserver.net","root","Vde38ex0") 
 or die ("No se puede conectar con el servidor");
mysql_select_db("movfinancieros")
or die ("No se puede seleccionar la base de datos");
   
			//mysql_query("select * from Movimientos")

		
		mysql_query("INSERT INTO Movimientos (nombre, articulos, proveedor, total, numfactura) 
					VALUES ('$name', '$product', '$nameprov','$totalprice','$numfact')");
	
		   
		 mysql_close ($conexion);

      print ("Datos Grabados Correctamente");
   ?>
<span class="borde"></span>