<?php

include "conexion.php";

mysql_set_charset('utf8');

$id_aux = $_GET["id_aux"];

//$dni = $_GET["dni"];
//$registro = $_GET["registro"];


//Pasamos mensaje a favorito
$sql = "UPDATE auxiliar SET favorito='SI' WHERE id_aux = '$id_aux' ";


if (@!mysql_query($sql, $con)) {
 //die('Error: ' . mysql_error());
 echo "Error no añadido";
} else {

// Mostramos un mensaje, que sera el que se desplegara en nuestro mvil al concluir el guardado de datos.
 echo "Añadido a favorito";
}



mysql_close($con);
?>