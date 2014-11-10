<?php

include 'conexion.php';

$email = $_REQUEST['email'];
$password = md5($_REQUEST['password']);

if ( strlen($email) > 0 && strlen($password) > 0 ){
	
	$sql = 'SELECT u.usuario, u.id as id, p.nombre, p.imagen FROM usuarios u, productores p WHERE u.usuario = "'.$email.'" AND u.clave = "'.$password.'" AND u.status = 1 AND u.id = p.id_usuario';
	$cursor = mysql_query($sql);
	
	if ( mysql_num_rows($cursor) == 1 ){
		$datos = mysql_fetch_array($cursor);
		$arr = array();
		$arr['id'] = $datos['id'];
		$arr['name'] = $datos['nombre'];
		$arr['email'] = $datos['usuario'];
		$arr['image'] = $datos['imagen'];

		echo json_encode($arr);
	}
}
?>