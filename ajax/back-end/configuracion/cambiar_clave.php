<?php

	function validar_clave($clave){
	   if(strlen($clave) < 6){
		  return false;
	   } 
	   if (!preg_match('`[a-z]`',$clave)){ 
		  return false;
	   }
	   if (!preg_match('`[A-Z]`',$clave)){ 
		  return false;
	   }
	   if (!preg_match('`[0-9]`',$clave)){ 
		  return false;
	   } 
	   return true;
	} 
	
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
	
	$clave_nueva=$_REQUEST['clave_nueva'];
	$clave_nueva2=$_REQUEST['clave_nueva2'];
	$clave=md5($_REQUEST['clave']);
	
	$sql = 'SELECT * FROM usuarios WHERE id = '.$_SESSION['id'];
	$cursor = mysql_query($sql);
	
	$datos = mysql_fetch_array($cursor);
	
	if(strcmp($datos['clave'],$clave)==0){
		
		if(strcmp($clave_nueva, $clave_nueva2)==0){
		
			if(validar_clave($clave_nueva)){
				
				$sql = 'UPDATE usuarios SET clave = "'.md5($clave_nueva).'" WHERE id = '.$_SESSION['id'];
				mysql_query($sql);
				echo true; 
	
			}else{
				
				echo 'error-La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.';
				
			}
		
		}else{ 
			echo 'error-La clave nueva y su confirmaci&oacute;n no coinciden.';
			
		}
	
	}else{
	
		echo 'error-Has ingresado una clave incorrecta, vuelve a intentarlo.';
		
	}

?>