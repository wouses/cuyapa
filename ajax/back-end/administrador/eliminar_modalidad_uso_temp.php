<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$modalidad=$_REQUEST['modalidad'];
	$uso=$_REQUEST['uso'];
	$id_random=$_REQUEST['id_random'];
	
	$sql = 'DELETE FROM modalidad_uso_temp WHERE id_random = "'.$id_random.'" AND id_modalidad = "'.$modalidad.'" AND id_uso = "'.$uso.'"';
	mysql_query($sql);

?>