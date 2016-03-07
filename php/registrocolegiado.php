<?php

include "conexion.php";

mysql_set_charset('utf8');  

$numero = $_POST["numero"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$regid = $_POST["regid"];
$pass = $_POST["pa1"];
$isla = $_POST["isla"];

	
		
	$sql0 = "SELECT numero, correo FROM colegiados WHERE numero='$numero' AND correo='$correo'";
	$result0 =mysql_query($sql0, $con);
	$fila = mysql_num_rows($result0);
		
		
	
	/*$sql6 = "SELECT * FROM gcm_devices WHERE numero='$numero'";
	$result6 =mysql_query($sql6, $con);
	$fila6 = mysql_num_rows($result6);*/
	
	//echo $fila6;
	
	/*$sql7 = "SELECT dispositivo FROM colegiados WHERE numero='$numero'";
	$result7 =mysql_query($sql7, $con);
	
			while($row = mysql_fetch_assoc($result7)) {
	
		
			$fila7 = $row['dispositivo']; 
			
			}*/
	
	
	//echo $fila7;
	
	
	if ($fila == 0){
	
	
		echo "DATOS ERRONEOS. Compruebe su número de colegiado o correo electronico. Si continúa con este error póngase en contacto con el Colegio Oficial de Dentistas de S/C de Tenerife.";
	
	
	}else{
	
	
		//Insertamos en la tabla colegiados
		$sql = "UPDATE colegiados SET nombre='$nombre', apellidos='$apellidos', movil='$telefono' WHERE numero='$numero'";

		mysql_query($sql, $con);
		
		//Insertamos Grupo Isla
		
		$sql4 = "INSERT INTO numgrupo (numero, grupo ) ";
		$sql4 .= "VALUES ('$numero',  '$isla'  ) ON DUPLICATE KEY 
		UPDATE  grupo='$isla' ";
		mysql_query($sql4, $con);
		
		
				
				
 		//Insertamos en la tabla ACCESO	
		$sql1 = "INSERT INTO acceso (numero, correo, pass ) ";
		$sql1 .= "VALUES ('$numero', '$correo', '$pass'  ) ON DUPLICATE KEY 
		UPDATE  correo='$correo', pass='$pass' ";
		mysql_query($sql1, $con);
			
			
		if (empty($regid)){	
		
		//variable vacia no hacemos nada
		
		}else{
		//Insertamos en la tabla GCM_DEVICES
		$sql2 = "INSERT INTO gcm_devices (numero, gcm_regid ) ";
		$sql2 .= "VALUES ('$numero', '$regid' ) ON DUPLICATE KEY 
		UPDATE  numero='$numero' ";
		mysql_query($sql2, $con);
		}
		
		$sql9 = "DELETE FROM gcm_devices WHERE gcm_regid ='' ";
		mysql_query($sql9, $con);
		
		$sql8 = "DELETE FROM gcm_devices WHERE gcm_regid ='OK' ";
		mysql_query($sql8, $con);
		
		
		
		$nombreapellidos = $apellidos.', '.$nombre;
		
		//Insertar aviso en tabla auxiliar
			$sql3 = "INSERT INTO auxiliar ( id_aux, numero, registro, estado, nombre) ";
			$sql3 .= "VALUES ('', $numero, '0',  '0', '$nombreapellidos') ";
			
			mysql_query($sql3, $con);
		
		
		

				// Mostramos un mensaje, que sera el que se desplegara en nuestro móvil al concluir el guardado de datos.
				echo "DATOS GUARDADOS.\nBienvenid@,\na partir de ahora la entidad le enviará notificaciones, comunicados individuales, circulares generales, pdf, imágenes, invitaciones a eventos, asambleas, cursos, comunicados por grupos de interés, etc., a los dispositivos móviles, tablets/Ipads y ordenadores, en tiempo real y con una notificación sonora.\n
En caso de uso desde un ordenador, la ruta es: app.dentef.com";
	}

mysql_close($con);
?>