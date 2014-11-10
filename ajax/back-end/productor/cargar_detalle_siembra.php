<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$id=$_REQUEST['id'];
	
	$siembra_sql = 'SELECT * FROM producciones_siembras WHERE id = '.$id;
	$siembra_cursor = mysql_query($siembra_sql);
	
	if ($num=mysql_num_rows($siembra_cursor)){
	
		$siembra_datos = mysql_fetch_array($siembra_cursor);
		
		switch($siembra_datos['tipo_financiamiento']){
			case 1 : 
				$tipo_financiamiento = '<option value="1">Propio</option><option value="2">Gubernamental</option>     <option value="3">Privado</option>';
			break;
			
			case 2 : 
				$tipo_financiamiento = '<option value="2">Gubernamental</option><option value="1">Propio</option><option value="3">Privado</option>';
			break;
			
			case 3 : 
				$tipo_financiamiento = '<option value="3">Privado</option><option value="1">Propio</option><option value="2">Gubernamental</option>';
			break;
			
		}
		
		if($siembra_datos['cantidad_terreno']>=10000){
			
			$cantidad = $siembra_datos['cantidad_terreno']/10000;
			
			$medida = '<option value="ha">Ha</option><option value="mts">Mts<sup>2</sup></option>';
			
			echo $var = $cantidad.'-'.$medida.'-'.$tipo_financiamiento;
			
		}else{
			
			$cantidad = $siembra_datos['cantidad_terreno'];
			
			$medida = '<option value="mts">Mts<sup>2</sup></option><option value="ha">Ha</option>';
			
			echo $var = $cantidad.'-'.$medida.'-'.$tipo_financiamiento;
						
		}
		
	}else{
		
		echo $var = "error";
				
	}
	
	

?>