<?php
header('Content-type: application/json');

include "conexion.php";

$numero = $_GET["numero"];



//SELECCION TODAS LAS CIRCULARES DEL numero INTRODUCIDO Y FAVORITO
$sql = "SELECT * FROM auxiliar WHERE numero='$numero' AND favorito LIKE 'SI' ";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

//$records = array();
$listado = array();



// Bucle para seleccionar todos los mensajes correspondiente al numero introducido
	while($row = mysql_fetch_assoc($result)) {
	//$listado[] = $row;

	//$id= $row['id'];
	$registro = $row['registro']; 
	//$codigo = $row['codigo'];
	$estado = $row['estado'];
	//$nombre = $row['nombre'];
	//$numero2 = $row['numero2'];
	$id_aux = $row['id_aux'];
	//$cial = $row['cial'];
	
	$sql2 = "SELECT id, registro, titulo, texto, nombre_centro, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, enlace, firma, '$estado' AS estado, $id_aux AS id_aux FROM mensajes WHERE registro='$registro' " ;
	$resultado = mysql_query($sql2, $con);
	

	
	while($fila = mysql_fetch_assoc($resultado)) {
	
	
	$listado[] = array_map('utf8_encode', $fila); 
		
		
	 } 
	 }
	 
	 //ordena de mas a menos la lista
	 arsort($listado);
	 
	 
	// print_r($listado);

	
	
	
	 mysql_close($con);


echo $_GET['jsoncallback'] . '(' . json_encode($listado) . ');';
?>