<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$usuario_nuevo=$_REQUEST['usuario_nuevo'];
	$clave=md5($_REQUEST['clave']);
	
	$sql = 'SELECT * FROM usuarios WHERE id = '.$_SESSION['id'];
	$cursor = mysql_query($sql);
	
	$datos = mysql_fetch_array($cursor);
	
	if(strcmp($datos['clave'],$clave)==0){
	
		/*$sql = 'UPDATE usuarios SET usuario = "'.$usuario_nuevo.'", SET status = 0 WHERE id = '.$_SESSION['id'];
		mysql_query($sql);
		
		// Varios destinatarios
		$para  = $usuario_nuevo;
		
		// subject
		$titulo = 'Cambio de Correo Electrónico';
		
		// message
		$mensaje = '
		aqui el mensaje
		';
		
		
		// Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Cabeceras adicionales
		$cabeceras .= 'To: Contacto Smith Perforaciones<contacto@smithperforaciones.com>' . "\r\n";
		$cabeceras .= 'From: '.$_REQUEST['name'].' <'.$_REQUEST['email'].'>' . "\r\n";
		
		// Mail it
		//mail($para, $titulo, $mensaje, $cabeceras);

		*/
		echo true;
	
	}else{
	
		echo 'error-Has ingresado una clave incorrecta, vuelve a intentarlo.';
		
	}

?>