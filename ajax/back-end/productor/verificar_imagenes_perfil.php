<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	 
	$id_productor=$_REQUEST['productor'];
	
		
	$sql = 'SELECT * FROM productores WHERE id = '.$id_productor;
	$cursor = mysql_query($sql);
	
	$datos = mysql_fetch_array($cursor);
	
	if ($datos['imagen']){
		$valor1 = 1;
	}else{
		$valor1 = 0;
	}
	 
	if ($datos['imagen_portada']){
		$valor2 = 1;
	}else{
		$valor2 = 0;
	}
	
	echo $valor1.'-'.$valor2;
?>