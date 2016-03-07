<?php

header('Content-type: application/json');

include "conexion.php";

$regid = $_GET["regid"];
$numero = $_GET["numero"];

$sql = "SELECT gcm_regid FROM gcm_devices WHERE gcm_regid = '$regid' ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());
$fila = mysql_num_rows($result);

if ($fila == 0){

$sql4 = "INSERT INTO gcm_devices (numero, gcm_regid ) ";
$sql4 .= "VALUES ('$numero', '$regid' )  ";
mysql_query($sql4);
	
}else{



}

mysql_close($con);


?>