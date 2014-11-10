<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id_usuario = $_REQUEST['id_usuario'];
$nombre = $_REQUEST['nombre'];
$telefono = $_REQUEST['telefono'];
$correo = $_REQUEST['correo'];
$mensaje = $_REQUEST['mensaje'];

$sql = 'INSERT INTO mensajes_productor (id_usuario, nombre, telefono, correo, mensaje, status) VALUES ('.$id_usuario.', "'.$nombre.'", "'.$telefono.'", "'.$correo.'", "'.$mensaje.'",0)';
mysql_query($sql);

return "ok";

?>