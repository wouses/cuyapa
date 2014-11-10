<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id = $_REQUEST['id'];

$sql = 'SELECT * FROM sectores WHERE id_parroquia="'.$id.'" ';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='sector'><option value=''>No hay sectores asociados</option></select>";
	
}else{
	
	$sectores= "<option value=''>Seleccione</option>";
	
	while($datos = mysql_fetch_array($cursor)){
	
	$sectores .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";
		
	}	
	
	echo "<select name='sector'>".$sectores."</select>";
}

?>