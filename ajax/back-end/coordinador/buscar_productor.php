<?php
if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
}
else{
	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
}

$tipo_cedula_rif = $_REQUEST['tipo_cedula_rif'];
$cedula_rif = $_REQUEST['cedula_rif'];

$sql = 'SELECT * FROM productores WHERE tipo_cedula_rif="'.$tipo_cedula_rif.'" AND cedula_rif="'.$cedula_rif.'"';
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);

if($num){
	$datos = mysql_fetch_array($cursor);	
	if($datos['id_usuario']==0){
		echo $datos['nombre'].'-'.$datos['id'];
	}else{
		echo 'error-2';
	}
}else{  
	echo 'error-1';
} 
?>