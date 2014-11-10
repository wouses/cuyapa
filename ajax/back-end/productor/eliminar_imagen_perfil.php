<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}

	$id=$_REQUEST['id_productor'];
	$tipo=$_REQUEST['tipo'];

	$sql = 'SELECT * FROM productores where id = "'.$id.'"';
	$cursor = mysql_query($sql);

 	$datos = mysql_fetch_array($cursor);

 	if($tipo==1){
 		if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
			unlink($_SERVER['DOCUMENT_ROOT'].$datos['imagen']); 
		}else{
			unlink($_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$datos['imagen']);  
		} 

		$sql = 'UPDATE productores SET imagen = "" WHERE id = "'.$id.'" ';
		mysql_query($sql);

 	}else{
 		if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
			unlink($_SERVER['DOCUMENT_ROOT'].$datos['imagen_portada']); 
		}else{
			unlink($_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$datos['imagen_portada']);  
		}  

		$sql = 'UPDATE productores SET imagen_portada = "" WHERE id = "'.$id.'" ';
		mysql_query($sql);
 	}

 	echo 1;
?>