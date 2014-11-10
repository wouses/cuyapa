<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$id_producto=$_REQUEST['id_producto'];
	$id_modalidad=$_REQUEST['id_modalidad'];
	
	$mod_uso_sql = 'SELECT * FROM modalidad_uso_productos WHERE id_producto = '.$id_producto.' AND id_modalidad = '.$id_modalidad;
	$mod_uso_cursor = mysql_query($mod_uso_sql);
	
	if ($num=mysql_num_rows($mod_uso_cursor)){
	
		while( $mod_uso_datos = mysql_fetch_array($mod_uso_cursor) ){
		
		
		$sql = 'SELECT * FROM usos WHERE id = "'.$mod_uso_datos['id_uso'].'"';
		$cursor = mysql_query($sql);
						
		$datos = mysql_fetch_array($cursor);
		
		$uso .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";	
					
		$uso = "<option value=''></option>".$uso;	

		}
	}else{
		$uso = "<option value=''>No hay resultados</option>";		
	}
	
	
	echo $uso;

?>