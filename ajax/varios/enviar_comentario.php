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
$email = $_REQUEST['email'];
$sentimiento = $_REQUEST['sentimiento'];
$asunto = $_REQUEST['asunto'];
$opinion = $_REQUEST['opinion'];
$ubicacion = $_REQUEST['ubicacion'];

$fecha = time();


$sql = 'INSERT INTO comentarios (correo, id_usuario, sentimiento, asunto, opinion, ubicacion, sistema_operativo, navegador, version, fecha, status) VALUES ("'.$email.'", "'.$_SESSION['id'].'", "'.$sentimiento.'", "'.$asunto.'", "'.$opinion.'", "'.$ubicacion.'", "'.$sistema_operativo.'", "'.$navegador.'", "'.$version.'", "'.$fecha.'",0)';
mysql_query($sql);

return "ok";

?>