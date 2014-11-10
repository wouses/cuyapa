<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}

	$categoria=$_REQUEST['id'];

	$sql = 'SELECT * FROM productos where id_categoria = "'.$categoria.'"';
	$cursor = mysql_query($sql);


	if (!$num=mysql_num_rows($cursor)){

		$option = "<option value=''>No hay resultados</option>";

	}else{

		while($datos = mysql_fetch_array($cursor)){

		$option .= "<option value='".$datos['id']."'>".$datos['rubro']."</option>";

		}

		$option = "<option value=''></option>".$option;

		echo $option;

	}

?>