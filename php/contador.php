<?php

include "conexion.php";

mysql_set_charset('utf8');

$numero = $_GET["numero"];
$registro = $_GET["registro"];

echo $numero;
echo $registro;

//Insertamos en la base de datos
$sql = "SELECT * FROM auxiliar WHERE registro = '$registro' and numero='$numero' ";

$result = mysql_query($sql, $con);


	$row = mysql_fetch_assoc($result);
	
	$numero = $row['numero'];
	
	$estado = $row['estado']; 
	


	if ($estado==0) {
	
	$sql2 = "SELECT contador FROM mensajes WHERE registro = '$registro' ";

	$result2 = mysql_query($sql2, $con);
	
	$row = mysql_fetch_assoc($result2);
	
	$contador = $row['contador'];
	
	$contador = $contador + 1;
	
	echo $contador;
	
	$sql3 = "UPDATE mensajes SET contador='$contador' WHERE registro = '$registro' " ;
	mysql_query($sql3, $con);
	
	} 

mysql_close($con);
?>