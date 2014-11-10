<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$cat = $_REQUEST['cat'];

$sql = 'SELECT * FROM guias WHERE categoria="'.$cat.'" ';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if(!$num){

	echo "<select name='guias'><option value=''>No hay guias registradas</option></select>";
	
}else{
	
	while($datos = mysql_fetch_array($cursor)){
	
	$guias .= "<option>".$datos['subcategoria']."</option>";
		
	}	
	
	echo "<option value=''>Seleccione</option>".$guias;
}

?>