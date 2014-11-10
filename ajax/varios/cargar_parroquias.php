<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id = $_REQUEST['id'];

$sql = 'SELECT * FROM parroquias WHERE id_municipio="'.$id.'" ';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='parroquia'><option value=''>No hay parroquias asociadas</option></select>";
	
}else{
	
	$parroquias= "<option value=''>Seleccione</option>";
	
	while($datos = mysql_fetch_array($cursor)){
	
	$parroquias .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";
		
	}	
	
	echo "<select name='parroquia'>".$parroquias."</select>";
}

?>