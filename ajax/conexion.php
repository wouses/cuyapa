
<?php
header("Content-Type: text/html;charset=utf-8");
 //**************Datos para la base de datos.**********************
     $db_servidor="localhost";
     $db_usuario="root";
     $db_contrasena="";
     $db_db="cuyapa";
     //****************************************************************
	 
	 //-----------------CONEXION A LA BD
$dbh=mysql_connect ($db_servidor, $db_usuario, $db_contrasena) or die ('No se puede conectar a la Base de Datos debido a: ' . mysql_error());
mysql_select_db ($db_db);
//---------------------------------

@session_start();

?>