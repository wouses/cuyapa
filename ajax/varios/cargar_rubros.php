<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id = $_REQUEST['id'];


$sql = 'SELECT p.* FROM productos p, productos_productores pp WHERE p.id_categoria="'.$id.'" AND p.id = pp.id_producto ORDER BY p.rubro' ;
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='rubro'><option value=''>No hay rubros asociados</option></select>";
	
}else{

	$rubros ='';
	
	while($datos = mysql_fetch_array($cursor)){
	
		$rubros .= "<option value='".$datos['id']."'>".$datos['rubro']."</option>";
		
	}	
	
	echo "<select name='rubro'>".$rubros."</select>";
}

?>