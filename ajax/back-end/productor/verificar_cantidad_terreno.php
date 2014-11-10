<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	@session_start();
	
	$id_productor=$_REQUEST['id_productor'];
	$cantidad_terreno=$_REQUEST['cantidad_terreno'];
	$medida_terreno=$_REQUEST['medida_terreno']; 
	$terreno_productor=0;
	$terreno_usado=0;
	
	if(strcmp($medida_terreno, 'ha')==0){
		
		$cantidad_terreno=$cantidad_terreno*10000;
		
	}
	
	//consultar cuanto terreno tiene el productor
	$sql = 'SELECT * FROM productores WHERE id = '.$id_productor;
	$cursor = mysql_query($sql);
	
	$datos = mysql_fetch_array($cursor);
	
	$terreno_productor = $datos['cantidad_terreno'];
	
	//consultar cuanto terreno se encuentra usado actualmente
	$sql = 'SELECT ps.cantidad_terreno FROM producciones p, producciones_siembras ps WHERE p.id_productor = '.$datos['id'].' AND ps.id_produccion = p.id ';
	$cursor = mysql_query($sql);
	
	$num = mysql_num_rows($cursor);
	
	if(!$num){
		
		$terreno_usado = 0;
		
	}else{
		
		while ( $datos = mysql_fetch_array($cursor) ){
		
			$terreno_usado += $datos['cantidad_terreno'];
			
		}
		
	}
	 
	$total_disponible = $terreno_productor-$terreno_usado;
	 
	echo $total_usar = $total_disponible-$cantidad_terreno;
?>