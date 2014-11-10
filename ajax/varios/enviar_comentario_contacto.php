<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$sistema_operativo = $_REQUEST['sistema_operativo'];
$navegador = $_REQUEST['navegador'];
$version = $_REQUEST['version'];
$correo = $_REQUEST['correo'];
$solicitud = $_REQUEST['solicitud'];
$mensaje = $_REQUEST['mensaje']; 

$fecha = time();


$sql = 'INSERT INTO contacto (correo, solicitud, mensaje, sistema_operativo, navegador, version, fecha, status) VALUES ("'.$correo.'", "'.$solicitud.'", "'.$mensaje.'","'.$sistema_operativo.'", "'.$navegador.'", "'.$version.'", "'.$fecha.'",0)';
mysql_query($sql);

return "ok";

?>