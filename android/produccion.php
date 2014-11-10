<?php

include 'conexion.php';

$id_productor = $_REQUEST['id'];
  
$sql = 'SELECT prod.id as id, prod.nombre as nombre, p.rubro, m.nombre as modalidad, u.nombre as uso FROM producciones prod, productos p, modalidades m, usos u  WHERE prod.id_productor = '.$id_productor.' AND prod.id_producto = p.id AND prod.id_modalidad = m.id AND prod.id_uso = u.id GROUP BY prod.id ORDER BY prod.id';
$cursor = mysql_query($sql);

if ( mysql_num_rows($cursor) ){
	
	$arr = array();
	
	while($datos = mysql_fetch_array($cursor)){
	
		$arr2 = array();
		$arr2['id'] = $datos['id'];
		$arr2['nombre'] = $datos['nombre'];
		$arr2['rubro'] = $datos['rubro'];
		$arr2['modalidad'] = $datos['modalidad'];
		$arr2['uso'] = $datos['uso'];
		
		$arr[] = $arr2;
	}

	echo json_encode($arr);
}

?>