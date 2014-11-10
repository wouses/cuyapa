<?php

function validar_clave($clave){
	   if(strlen($clave) < 6){
		  echo 0;
	   } 
	   if (!preg_match('`[a-z]`',$clave)){ 
		  echo 0;
	   }
	   if (!preg_match('`[A-Z]`',$clave)){ 
		  echo 0;
	   }
	   if (!preg_match('`[0-9]`',$clave)){ 
		  echo 0;
	   } 
	   echo 1;
} 



validar_clave($_REQUEST['clave']);

?>