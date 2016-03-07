<?php
header('Content-type: application/json');

//mysql_set_charset('utf8'); 


include "conexion.php";

$codigo = "Q3866006D";


$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);


	$sql2 = "SELECT web FROM colegios WHERE codigo= '$codigo' " ;
	$resultado = mysql_query($sql2) or die ("Query error: " . mysql_error());


	while($fila = mysql_fetch_assoc($resultado)) {
	$listado[] = array_map('utf8_encode', $fila);
		
	 }


	mysql_close($con);
		

echo $_GET['jsoncallback'] . '(' . json_encode($listado) . ');';


?>



