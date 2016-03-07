<?php

header('Content-type: application/json');

include "conexion.php";

$usuario = $_GET["usuario"];

$sql = "SELECT correo, pass FROM acceso WHERE correo='$usuario' ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$fila = mysql_num_rows($result);

if ($fila == 0){

$res = ("Usuario no registrado");
echo  json_encode($res) ;
	
}else{

$records = array();

while($row = mysql_fetch_assoc($result)) {
	$records[] = array_map('utf8_encode',$row);
	
	$headers = "From: Creatactil\r\n";	
	$destinatario = $usuario; 
	$asunto = "Contraseña olvidada"; 
	$contraseña = $row ["pass"]; 
	$cuerpo = utf8_decode("Los datos de su cuenta son:\r\n Contraseña: $contraseña");

	mail($destinatario,utf8_decode($asunto),$cuerpo,$headers); 
	
	echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';
}

}




mysql_close($con);


?>