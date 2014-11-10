<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$calidad=$_REQUEST['calidad'];
	$cantidad=$_REQUEST['cantidad'];
	$id_random=$_REQUEST['id_random'];
	$id_produccion=$_REQUEST['id_produccion'];
	
	$sql = 'SELECT * FROM calidad_cosechas_temp WHERE id_random = "'.$id_random.'" AND id_produccion = "'.$id_produccion.'"';
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	
	if(!$num){ $first = 1; }else{ $first = 0; }
	
	$sql = 'SELECT * FROM calidad_cosechas_temp WHERE id_random = "'.$id_random.'" AND id_produccion = "'.$id_produccion.'" AND calidad = "'.$calidad.'" ';
	$cursor = mysql_query($sql);
	
	if (!$num=mysql_num_rows($cursor)){
		
		$insert = 'INSERT INTO calidad_cosechas_temp (id_random, id_produccion, calidad, cantidad) values ('.$id_random.', '.$id_produccion.', "'.$calidad.'", '.$cantidad.' )';
		mysql_query($insert);
		
		echo $first."-ok";
		
	}else{
	
		echo "Ya existe un registro en esta cosecha con la misma calidad";
		
	
	}

?>