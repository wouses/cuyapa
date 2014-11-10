<?php
 
$server = 'localhost';
$bd = 'cuyapa_db';
$bd_user = 'cuyapa_user';
$bd_pass = 'productores';
	

$link = mysql_connect($server , $bd_user , $bd_pass );
mysql_select_db($bd , $link);	
?>