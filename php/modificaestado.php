<?php

include "conexion.php";

mysql_set_charset('utf8');

$numero = $_GET["numero"];
$registro = $_GET["registro"];
 
$sql = "UPDATE auxiliar SET estado=1 WHERE registro = '$registro' and numero='$numero' ";
mysql_query($sql, $con);


mysql_close($con);
?>