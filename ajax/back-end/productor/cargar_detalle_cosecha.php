<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$id=$_REQUEST['id'];
	
	$cosecha_sql = 'SELECT * FROM producciones_cosechas WHERE id = '.$id;
	$cosecha_cursor = mysql_query($cosecha_sql);
	$var=0;
	$var2=0;
	
	if ($num=mysql_num_rows($cosecha_cursor)){
	 
	 	$cosecha_datos = mysql_fetch_array($cosecha_cursor);
		
		if($cosecha_datos['cantidad_terreno']>=10000){
			
			$cantidad = $cosecha_datos['cantidad_terreno']/10000;
			
			$medida = '<option value="ha">Ha</option><option value="mts">Mts<sup>2</sup></option>';
			
			$var = $cantidad.'-'.$medida;

			
		}else{
			
			$cantidad = $cosecha_datos['cantidad_terreno'];
			
			$medida = '<option value="mts">Mts<sup>2</sup></option><option value="ha">Ha</option>';
			
			$var = $cantidad.'-'.$medida;
				
		}
		
		
		$calidad_sql = 'SELECT * FROM calidad_cosechas WHERE id_produccion_cosecha = '.$cosecha_datos['id'].' ORDER BY calidad';
		$calidad_cursor = mysql_query($calidad_sql);
		
		$calidad_num = mysql_num_rows($calidad_cursor);
		
		$i=1;
		while($calidad_datos = mysql_fetch_array($calidad_cursor)){
		
			if($i==$calidad_num){
				
				$var2 .= $cosecha_datos['id_produccion'].'-'.$calidad_datos['cantidad'].'-'.$calidad_datos['calidad'];
				$i++;
			
			}else{
			
				$var2 .= $cosecha_datos['id_produccion'].'-'.$calidad_datos['cantidad'].'-'.$calidad_datos['calidad'].'%';
				$i++;
			
			}
			 
		}
		
		 echo $var.'$'.$var2;
 
	}else{
		
		$var = "error";
		
		$arr[] = $var;	
	}
		

?>