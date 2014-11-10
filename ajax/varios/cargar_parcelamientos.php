<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$id = $_REQUEST['id'];

$sql = 'SELECT * FROM parcelamientos WHERE id_sector="'.$id.'" ';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='parcelamiento'><option value=''>No hay parcelamientos asociados</option></select>";
	
}else{
	
	$parcelamientos= "<option value=''>Seleccione</option>";
	
	while($datos = mysql_fetch_array($cursor)){
	
	$parcelamientos .= "<option value='".$datos['id']."'>".$datos['nombre']."</option>";
		
	}	
	
	echo "<select name='parcelamiento'>".$parcelamientos."</select>";
}

?>