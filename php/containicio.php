<?php

include "conexion.php";


$numero = $_GET["numero"];


//Insertamos en la base de datos
$sql = "SELECT estado FROM auxiliar where  numero='$numero' and estado=0";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$fila = mysql_num_rows($result);



	echo $fila;



mysql_close($con);
?>