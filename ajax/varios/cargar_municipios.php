<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id = $_REQUEST['id'];

$sql = 'SELECT * FROM municipios WHERE id_estado="'.$id.'" ';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='municipio'><option value=''>No hay municipios asociados</option></select>";
	
}else{
	
	while($datos = mysql_fetch_array($cursor)){
	
	$estados .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";
		
	}	
	
	echo "<select name='municipio'>".$estados."</select>";
}

?>