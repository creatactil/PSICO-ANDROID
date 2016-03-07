<?php

include "conexion.php";


mysql_set_charset('utf8');

$id_aux = $_GET["id_aux"];


//Borramos en la base de datos
$sql = "delete from auxiliar where id_aux = '$id_aux' ";


if (@!mysql_query($sql, $con)) {
 //die('Error: ' . mysql_error());
 echo "Mensaje no borrado";
} else {

// Mostramos un mensaje, que sera el que se desplegara en nuestro mvil al concluir el guardado de datos.
 echo "Mensaje Borrado";
}

mysql_close($con);
?>