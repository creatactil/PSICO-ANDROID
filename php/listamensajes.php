<?php
header('Content-type: application/json');

include "conexion.php";

$numero = $_GET["numero"];

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);


/*COMPROBAR SI TIENE PERMISO PARA VER CIRCULARES
$sql0 = "SELECT permiso FROM familiar WHERE numero='$numero'";
$result0 = mysql_query($sql0) or die ("Query error: " . mysql_error());

	while ($casilla = mysql_fetch_assoc($result0)){
		$permiso = $casilla['permiso'];
		if ($permiso == 1){
		
		$numero=1;
		}
	}*/

//SELECCION TODAS LAS CIRCULARES DEL numero INTRODUCIDO
$sql = "SELECT * FROM auxiliar WHERE numero='$numero' AND favorito NOT LIKE 'SI' ORDER BY estado, id_aux DESC";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

//$records = array();
$listado = array();



// Bucle para seleccionar todos los mensajes correspondiente al numero introducido
	while($row = mysql_fetch_assoc($result)) {
	
		//$id= $row['id'];
	
		$registro = $row['registro']; 
		$numero = $row['numero'];
		$estado = $row['estado'];
		$nombre = $row['nombre'];
		$id_aux = $row['id_aux'];
	
	
		$sql2 = "SELECT id, registro, titulo, texto, nombre_centro, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, enlace, firma, '$estado' AS estado, '$nombre' AS nombre, $id_aux AS id_aux FROM mensajes WHERE registro='$registro' " ;
		$resultado = mysql_query($sql2, $con);
	
	
	
		while($fila = mysql_fetch_assoc($resultado)) {
	
	
		$listado[] = array_map('utf8_encode', $fila); 
		
		
		} 
	}
	 
	 //ordena de mas a menos la lista
	// arsort($listado);
	 
	 
	// print_r($listado);

	
	
	
	 mysql_close($con);


echo $_GET['jsoncallback'] . '(' . json_encode($listado) . ');';
?>