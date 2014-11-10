<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

 
		$sql_e_m = 'SELECT p.*, m.nombre as municipio, e.nombre as estado FROM productores p, estados e, municipios m, usuarios u WHERE e.nombre = "Aragua" AND p.id_estado = e.id AND m.nombre = "Jose Felix Ribas" AND p.id_municipio = m.id AND u.id = p.id_usuario AND u.status = 1 AND p.status = 1 GROUP BY p.id ORDER BY RAND() LIMIT 9';
		$cursor_e_m = mysql_query($sql_e_m);
		
		$num_e_m = mysql_num_rows($cursor_e_m);
		 
		$i=1;
		while($datos_e_m = mysql_fetch_array($cursor_e_m)){
						
			if($i==$num_e_m){ 
				echo $datos_e_m['id'].'$'.$datos_e_m['nombre'].'$'.$datos_e_m['imagen'].'$'.$datos_e_m['estado'].'$'.$datos_e_m['municipio'].'$'.$datos_e_m['ubicacion_lat'].'$'.$datos_e_m['ubicacion_long'].'$'.$datos_e_m['nombre'];
			
			}else{
				
				echo $datos_e_m['id'].'$'.$datos_e_m['nombre'].'$'.$datos_e_m['imagen'].'$'.$datos_e_m['estado'].'$'.$datos_e_m['municipio'].'$'.$datos_e_m['ubicacion_lat'].'$'.$datos_e_m['ubicacion_long'].'$'.$datos_e_m['nombre'].'%';
						
			}
			$i++;
		}
		 
		
	 
 
?>