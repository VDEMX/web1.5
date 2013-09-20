<?PHP
$hostname= 'ip-173-201-34-119.ip.secureserver.net:80';
//$hostname= 'localhost';
$username="root";
$password="Vde38ex0";

$conexion = mysql_connect($hostname,$username,$password) or die (mysql_error());
mysql_select_db("movfinancieros") or die ("No se puede seleccionar la base de datos");


//$sql = "SELECT * FROM Movimientos  "; 
$sql = "show tables  "; 
$rs = mysql_query($sql);

while($row = mysql_fetch_assoc($rs))
   $arr[] = $row;

 
echo "TABLAS <pre>"; print_r($arr); echo "</pre>";

?>