<?php
$con = mysql_connect("ip-173-201-34-119.ip.secureserver.net","vde","vde38ex0");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("movfinancieros", $con);

$result = mysql_query("SELECT * FROM Movimientos");

echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Producto</th>
<th>Nombre de Proveedor</th>
<th>Precio</th>
<th>Numero de Factura</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Product'] . "</td>";
  echo "<td>" . $row['nameprov'] . "</td>";
  echo "<td>" . $row['totalprice'] . "</td>";
  echo "<td>" . $row['numfact'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>
