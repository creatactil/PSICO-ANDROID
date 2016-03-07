<?php

include "conexion.php";

mysql_set_charset('utf8');


$registro = $_POST['registro']; 
$numero = $_POST['numero'];

$fecha = date("Y/m/d H:i"); 

	
		//Insertamos en la base de datos en la tabla AUXILIAR
		$sql0 = "UPDATE  auxiliar SET  firma =  1 WHERE  registro = '$registro' AND numero='$numero' ";
		mysql_query($sql0, $con);
		
		
		//Insertamos en la base de datos en la tabla FIRMA
		$sql = "INSERT INTO firma (registro, fecha, numero) ";
		$sql .= "VALUES ('$registro', '$fecha', '$numero') ON DUPLICATE KEY UPDATE numero='$numero' ";

				if (@!mysql_query($sql, $con)) {
				 //die('Error: ' . mysql_error());
				echo "Error de Conexión"; 


				} else {
				 echo "La circular ha sido firmada";

				}

	
		
	
mysql_close($con);
?>