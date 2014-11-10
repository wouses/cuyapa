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
	
	$sql = 'SELECT * FROM modalidad_uso_temp WHERE id_random = "'.$id_random.'" ';
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	
	if(!$num){ $first = 1; }else{ $first = 0; }
	
	$sql = 'SELECT * FROM modalidad_uso_temp WHERE id_random = "'.$id_random.'" AND id_modalidad = "'.$modalidad.'" AND id_uso = "'.$uso.'" ';
	$cursor = mysql_query($sql);
	
	if (!$num=mysql_num_rows($cursor)){
		
		$insert = 'INSERT INTO modalidad_uso_temp (id_random, id_modalidad, id_uso) values ('.$id_random.', '.$modalidad.', "'.$uso.'" )';
		mysql_query($insert);
		
		//consultar modalidad
		
		$mod_sql = 'SELECT * FROM modalidades where id = '.$modalidad;
		$mod_cursor = mysql_query($mod_sql);
		
		$mod_datos = mysql_fetch_array($mod_cursor);
		
		$mod = $mod_datos['nombre'];
		
		$uso_sql = 'SELECT * FROM usos where id = '.$uso;
		$uso_cursor = mysql_query($uso_sql);
		
		$uso_datos = mysql_fetch_array($uso_cursor);
		
		$uso = $uso_datos['nombre'];
		
		echo $first."-ok-".$mod."-".$uso;
		
	}else{
	
		echo "Ya existe esta modalidad y uso";
		
	
	}

?>