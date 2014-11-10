<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}
 
$producciones[] = array ("Rubro", "1era", "2da", "3era", "Sin Clasificar");
 
$sql_rubro = 'SELECT p.rubro, p.id as id_rubro, m.nombre as modalidad, m.id as id_modalidad, u.nombre as uso, u.id as id_uso FROM productos p, modalidades m, usos u, producciones pro WHERE pro.id_producto=p.id AND pro.id_modalidad=m.id AND pro.id_uso=u.id AND pro.id_productor = '.$_SESSION['id'].' GROUP BY pro.id_producto, pro.id_modalidad, pro.id_uso';
$cursor_rubro = mysql_query($sql_rubro);
$num_rubro = mysql_num_rows($cursor_rubro);
$i=1;

while($datos_rubro = mysql_fetch_array($cursor_rubro)){
	 
	$rubro = $datos_rubro['rubro'];
	$modalidad = $datos_rubro['modalidad'];
	$uso = $datos_rubro['uso'];
	
	$rmu = $rubro.' ('.$modalidad.'-'.$uso.')';
	 
	$produccion = $rmu;
	
	$sql_cal_cant= 'SELECT cc.calidad as calidad, SUM(cc.cantidad) as cantidad FROM producciones pro, producciones_cosechas pc, calidad_cosechas cc WHERE pro.id_producto ='.$datos_rubro['id_rubro'].' AND pro.id_uso ='.$datos_rubro['id_uso'].' AND pro.id_modalidad = '.$datos_rubro['id_modalidad'].' AND pc.id_produccion = pro.id AND cc.id_produccion_cosecha = pc.id GROUP BY cc.calidad';
	$cursor_cal_cant = mysql_query($sql_cal_cant);
	 
	while($datos_cal_cant = mysql_fetch_array($cursor_cal_cant)){
			
			switch($datos_cal_cant['calidad']){
			
			case '1era': $primera = round($datos_cal_cant['cantidad']); break;
			
			case '2da': $segunda = round($datos_cal_cant['cantidad']); break;
			
			case '3era': $tercera = round($datos_cal_cant['cantidad']); break;
			
			case 'Sin Clasificar': $sc = round($datos_cal_cant['cantidad']); break;
				
			}
		  
		 
	}
	
	if(!$primera){ $primera=0;}
	if(!$segunda){ $segunda=0;}
	if(!$tercera){ $tercera=0;}
	if(!$sc){ $sc=0;}
	
	$producciones[$i] = array ($produccion , $primera, $segunda, $tercera, $sc);
	
	$produccion = '';
	$primera = '';
	$segunda = '';
	$tercera = '';
	$sc = '';
	$i++;
	 
}
	 
 
echo json_encode( $producciones );
?>