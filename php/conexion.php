<?php
header('Content-type: application/json');

$server = "qvb701.micolegioapp.com";
$username = "qvb701";
$password = "Gines1112";
$database = "qvb701";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);

?>