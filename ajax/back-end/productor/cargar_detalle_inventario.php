<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$producto=$_REQUEST['producto'];
	$modalidad=$_REQUEST['modalidad'];
	$uso=$_REQUEST['uso']; 
	
	$calidad['1era']=0;
	$calidad['2da']=0;
	$calidad['3era']=0;
	$calidad['Sin Calificar']=0;
	
	$sql = 'SELECT p.rubro, m.nombre as modalidad, u.nombre as uso, SUM(inv.cantidad) as cantidad, inv.calidad FROM productos p, modalidades m, usos u, inventario inv WHERE inv.id_producto=p.id AND p.id = '.$producto.' AND inv.id_modalidad=m.id AND m.id = '.$modalidad.' AND inv.id_uso=u.id  AND u.id = '.$uso.' GROUP BY inv.calidad';
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	
	while($datos = mysql_fetch_array($cursor)){
		
		$calidad[$datos['calidad']] = $datos['cantidad'];
		
		$rubro = $datos['rubro'];
		$modalidad = $datos['modalidad'];
		$uso = $datos['uso'];
	}
	
	echo $calidad['1era'].'-'.$calidad['2da'].'-'.$calidad['3era'].'-'.$calidad['Sin Calificar'].'-'.$rubro.'-'.$modalidad.'-'.$uso;
	

?>