<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	 
	$id_produccion=$_REQUEST['id_produccion'];
	$cantidad_terreno=$_REQUEST['cantidad_terreno'];
	$medida_terreno=$_REQUEST['medida_terreno'];
	$terreno_sembrado =0;
	$terreno_cosechado =0;
	
	if(strcmp($medida_terreno, 'ha')==0){
		
		$cantidad_terreno=$cantidad_terreno*10000;
		
	}
	
	//consultar cuanto terreno tiene sembrado
	$sql = 'SELECT * FROM producciones_siembras WHERE id_produccion = '.$id_produccion;
	$cursor = mysql_query($sql);
	
	while (	$datos = mysql_fetch_array($cursor) ){
	
	$terreno_sembrado += $datos['cantidad_terreno'];
	
	} 
	
	//consultar cuanto terreno tiene cosechado
	$sql = 'SELECT * FROM producciones_cosechas WHERE id_produccion = '.$id_produccion;
	$cursor = mysql_query($sql);
	
	while (	$datos = mysql_fetch_array($cursor) ){
	
	$terreno_cosechado += $datos['cantidad_terreno'];
	
	}  
	$terreno_usar = $cantidad_terreno+$terreno_cosechado;
	 
	echo $total = $terreno_sembrado-$terreno_usar;
?>