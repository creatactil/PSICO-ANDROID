<?php

header('Content-type: application/json');

include "conexion.php";

$usuario = $_GET["usuario"];
$pass = $_GET["pa2"];



$sql = "SELECT * FROM acceso WHERE correo = '$usuario' AND pass = '$pass' ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());
$fila = mysql_num_rows($result);

			if ($fila == 0){

				$res = ("error");
				echo  json_encode($res) ;
	
			}else{

				$resultado = array();

				while($row = mysql_fetch_assoc($result)) {
				
				$numero = $row["numero"];
				
				}
				
				$sql2 = "SELECT * FROM colegiados WHERE numero = '$numero' ";
				$result2 = mysql_query($sql2, $con);
				
								
				while($row = mysql_fetch_assoc($result2)) {
				$resultado[] = array_map('utf8_encode',$row);
	
				}
			}

mysql_close($con);

//print_r($records);

echo $_GET['jsoncallback'] . '(' . json_encode($resultado) . ');';
?>