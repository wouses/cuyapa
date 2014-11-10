<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$lati = $_REQUEST['lati'];
$long = $_REQUEST['long'];
 
	function getaddress($lat,$lng){
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=true';
		$json = @file_get_contents($url);
		$data=json_decode($json);
		$status = $data->status;
		if($status=="OK")
		return $data->results[0]->address_components;
		else
		return false;
	}
	
	function quitar_tildes($cadena) {
		$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
		$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
		$texto = str_replace($no_permitidas, $permitidas ,$cadena);
		return $texto;
	}
	 
	$lat= $lati; //latitude
	$lng=  $long; //longitude
	$address= getaddress($lat,$lng);
	 
	if($address){ 
	
		$estado = quitar_tildes($address[4]->long_name);
		$municipio = quitar_tildes($address[3]->long_name); 		
		
		
		$sql_e_m = 'SELECT p.*, m.nombre as municipio, e.nombre as estado FROM productores p, estados e, municipios m, usuarios u WHERE e.nombre = "'.$estado.'" AND p.id_estado = e.id AND m.nombre = "'.$municipio.'" AND p.id_municipio = m.id AND u.id = p.id_usuario AND u.status = 1 AND p.status = 1 GROUP BY p.id ORDER BY RAND() LIMIT 9';
		$cursor_e_m = mysql_query($sql_e_m);
		 
		$num_e_m = mysql_num_rows($cursor_e_m);
		
		if($num_e_m){  
		
			$i=1;
			while($datos_e_m = mysql_fetch_array($cursor_e_m)){
							
				if($i==$num_e_m){ 
					echo $datos_e_m['id'].'$'.$datos_e_m['nombre'].'$'.$datos_e_m['imagen'].'$'.$datos_e_m['estado'].'$'.$datos_e_m['municipio'].'$'.$datos_e_m['ubicacion_lat'].'$'.$datos_e_m['ubicacion_long'].'$'.$datos_e_m['nombre'];
				
				}else{
					
					echo $datos_e_m['id'].'$'.$datos_e_m['nombre'].'$'.$datos_e_m['imagen'].'$'.$datos_e_m['estado'].'$'.$datos_e_m['municipio'].'$'.$datos_e_m['ubicacion_lat'].'$'.$datos_e_m['ubicacion_long'].'$'.$datos_e_m['nombre'].'%';
							
				}
				$i++;
			}
			 
		}else{
			
			$sql_e = 'SELECT p.*, m.nombre as municipio, e.nombre as estado FROM productores p, estados e, municipios m, usuarios u WHERE e.nombre = "'.$estado.'" AND p.id_estado = e.id AND u.id = p.id_usuario AND u.status = 1 AND p.status = 1 GROUP BY p.id ORDER BY RAND() LIMIT 9';
			$cursor_e = mysql_query($sql_e);
			
			$num_e = mysql_num_rows($cursor_e);
			
			if($num_e){
				$i=1;
				while($datos_e = mysql_fetch_array($cursor_e)){
					
					
					if($i==$num_e){
						
						echo $datos_e['id'].'$'.$datos_e['ubicacion_lat'].'$'.$datos_e['ubicacion_long'].'$'.$datos_e['nombre'];
					
					}else{
						
						echo $datos_e['id'].'$'.$datos_e['ubicacion_lat'].'$'.$datos_e['ubicacion_long'].'$'.$datos_e['nombre'].'%';
								
					}
					$i++;
				}
			}else{
				
				$sql = 'SELECT p.*, m.nombre as municipio, e.nombre as estado FROM productores p, estados e, municipios m, usuarios u WHERE e.nombre = "Aragua" AND p.id_estado = e.id AND m.nombre = "Jose Felix Ribas" AND p.id_municipio = m.id AND u.id = p.id_usuario AND u.status = 1 AND p.status = 1 GROUP BY p.id ORDER BY RAND() LIMIT 9';
				$cursor = mysql_query($sql);
				
				$num = mysql_num_rows($cursor);
				 
				$i=1;
				while($datos = mysql_fetch_array($cursor)){
								
					if($i==$num){ 
						echo $datos['id'].'$'.$datos['nombre'].'$'.$datos['imagen'].'$'.$datos['estado'].'$'.$datos['municipio'].'$'.$datos['ubicacion_lat'].'$'.$datos['ubicacion_long'].'$'.$datos['nombre'];
					
					}else{
						
						echo $datos['id'].'$'.$datos['nombre'].'$'.$datos['imagen'].'$'.$datos['estado'].'$'.$datos['municipio'].'$'.$datos['ubicacion_lat'].'$'.$datos['ubicacion_long'].'$'.$datos['nombre'].'%';
								
					}
					$i++;
				}
					
			}
		}
		
	}else{
		
		echo "error-Ubicación no encontrada";
	
	}
	 
 
?>