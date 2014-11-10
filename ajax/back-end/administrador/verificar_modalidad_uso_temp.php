<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$id_random=$_REQUEST['id_random'];
	
	$sql = 'SELECT * FROM modalidad_uso_temp WHERE id_random = "'.$id_random.'" ';
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	
	if(!$num){
	
		echo 0;
		
	}else{
	
		echo 1;
		
	
	}

?>