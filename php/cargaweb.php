<?php

include "conexion.php";





//Insertamos en la base de datos
$sql = "SELECT web FROM colegios ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

	while($row = mysql_fetch_assoc($result)) {
	
		//$id= $row['id'];
	
		$web = $row['web']; 

	}
	echo $web;

mysql_close($con);
?>