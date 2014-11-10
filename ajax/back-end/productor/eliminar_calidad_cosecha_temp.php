<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$calidad=$_REQUEST['calidad'];
	$id_random=$_REQUEST['id_random'];
	$id_produccion=$_REQUEST['id_produccion'];
	
	echo $sql = 'DELETE FROM calidad_cosechas_temp WHERE id_random = "'.$id_random.'" AND id_produccion = "'.$id_produccion.'" AND calidad = "'.$calidad.'"';
	mysql_query($sql);

?>