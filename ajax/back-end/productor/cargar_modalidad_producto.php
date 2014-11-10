<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$id=$_REQUEST['id'];
	
	$mod_uso_sql = 'SELECT * FROM modalidad_uso_productos WHERE id_producto = '.$id;
	$mod_uso_cursor = mysql_query($mod_uso_sql);
	
	if ($num=mysql_num_rows($mod_uso_cursor)){
	
		while( $mod_uso_datos = mysql_fetch_array($mod_uso_cursor) ){
		
		
		$sql = 'SELECT * FROM modalidades WHERE id = "'.$mod_uso_datos['id_modalidad'].'"';
		$cursor = mysql_query($sql);
						
		$datos = mysql_fetch_array($cursor);
		
		$mod .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";	
					
		$mod = "<option value=''></option>".$mod;	

		}
	}else{
		$mod = "<option value=''>No hay resultados</option>";		
	}
		
	echo $mod;

?>