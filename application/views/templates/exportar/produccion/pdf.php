
<html>


</head>

<body>

<?php



if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {

	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';

}

else{

	include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';

}



@session_start();

$sql = "SELECT p.nombre as produccion, pr.nombre as productor, pr.*, r.rubro as rubro, m.nombre as modalidad, u.nombre as uso FROM producciones p, productores pr, productos r, modalidades m, usos u WHERE p.id_productor=".$id." AND p.id=".$idproduccion." AND p.id_productor=pr.id AND p.id_producto=r.id AND p.id_modalidad=m.id AND p.id_uso=u.id";
$cursor = mysql_query($sql);

$produccion= mysql_fetch_array($cursor);

//SIEMBRAS
$sql = "SELECT * FROM producciones_siembras WHERE id_produccion = ".$idproduccion;
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);
$totals=0;
$si='';
$siem = '';
$siemto = '';
if($num){
	while($siembra = mysql_fetch_array($cursor)){
		$totals += $siembra['cantidad_terreno']; 

		if($siembra['cantidad_terreno']>=1000){ $siem = $siembra['cantidad_terreno']/1000; $siem.= " Ha"; }else{ $siem = $siembra['cantidad_terreno']." Mts<sup>2<sup>"; } 
		
	$si .= '
	<tr>
		<td colspan="3">'.$siem.'</td>
		<td colspan="3">'.date('d/m/Y',$siembra['fecha']).'</td>
	</tr>';

	}
	
		if($siembra['cantidad_terreno']>=1000){ $siemto = $siembra['cantidad_terreno']/1000; $siemto.= " Ha"; }else{ $siemto = $siembra['cantidad_terreno']." Mts<sup>2<sup>"; }
	
	$si .= '	
        <tr>
			<td colspan="6"><strong>Superficie Total Sembrada:</strong>'.$siemto.'</td>
		</tr>';
    
	}else{
	
	$si = '
    	<tr>
			<td colspan="6">No hay siembras registradas</td>
		</tr>';
    
	}
	
//COSECHAS

$sql = "SELECT * FROM producciones_cosechas WHERE id_produccion = ".$idproduccion;
$cursor = mysql_query($sql);
$num = mysql_num_rows($cursor);
$totalc=0;
$can='';
$canca='';
$co='';
$cose='';
$coto='';

if($num){
	while($cosecha = mysql_fetch_array($cursor)){
		$totalc += $cosecha['cantidad_terreno']; 
		
		if($cosecha['cantidad_terreno']>=1000){ $cose = $cosecha['cantidad_terreno']/1000; $cose.=" Ha"; }else{ $cose = $cosecha['cantidad_terreno']."Mts<sup>2<sup>"; }
		
		$sql_cantidad = "SELECT * FROM calidad_cosechas WHERE id_produccion_cosecha =".$cosecha['id']." ORDER BY calidad"; 
		$cursor_cantidad = mysql_query($sql_cantidad);
		
		while($cantidad = mysql_fetch_array($cursor_cantidad)){
			
			if($cantidad['cantidad']>=1000){ $can = $cantidad['cantidad']/1000; $can.=' Tn'; }else{ $can = $cantidad['cantidad'].' Kgs'; }
		
			$canca .= $cantidad['calidad']." Calidad: ".$can."<br>";
			
		}
		
		if($totalc>=1000){ $coto = $totalc/1000; $coto .= " Ha"; }else{ $coto = $totalc."Mts<sup>2<sup>"; } 

	$co .= '
	<tr>
		<td colspan="2" valign="middle">'.$cose.'</td>
		<td colspan="2">'.$canca.'</td>
		<td colspan="2" valign="middle">'.date('d/m/Y',$cosecha['fecha']).'</td>
	</tr>';

	}

	$co .='
	<tr>
		<td colspan="6"><strong>Superficie Total Cosechada:</strong>'.$coto.'</td>
	</tr>';
	
}else{
 
	$co = '
	<tr>
		<td colspan="6">No hay cosechas registradas</td>
	</tr>';
 
}
 
	

$html = '
<html>
<head>

</head>

<body>
<table width="600px"> 
	<tr>
    	<td colspan="3"><h1>Cuyapa</h1></td>
    </tr>
</table>
<br>
<br>
<table width="600px"> 
	<tr>
    	<td colspan="2">
        	Nombre: '.$produccion['productor'].'<br>
        	C&eacute;dula / RIF: '.$produccion['tipo_cedula_rif'].$produccion['cedula_rif'].'<br>
        	Producto: '.$produccion['rubro'].'<br>
        	Modalidad: '.$produccion['modalidad'].'<br>
        	Uso: '.$produccion['uso'].'<br>
		</td>
        <td colspan="3">&nbsp;</td>
        <td valign="middle">'.$fecha.'</td>
    </tr>
    <tr>
    	<td colspan="6"><h2>Producci&oacute;n - '.$produccion['produccion'].'</h2></td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="6"><strong>Siembra</strong></td>
    </tr>
    <tr bgcolor="#DDDDDD">
    	<td colspan="3">Superficie</td>
    	<td colspan="3">Fecha</td>
    </tr>
	
	'.$si.'
	    
    <tr>
			<td colspan="6">&nbsp;</td>
	</tr>
</table>


<table width="600px"> 
	<tr>
    	<td colspan="6"><strong>Cosecha</strong></td>
    </tr
    <tr bgcolor="#DDDDDD">
    	<td colspan="2">Superficie</td>
    	<td colspan="2">Cantidad</td>
    	<td colspan="2">Fecha</td>
    </tr>
	
	'.$co.'
   
</table>

   
<body>
</html>';



if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {

	require_once($_SERVER['DOCUMENT_ROOT']."/dompdf/dompdf_config.inc.php"); 

}else{

	require_once($_SERVER['DOCUMENT_ROOT']."/cuyapa/dompdf/dompdf_config.inc.php"); 

}



$dompdf = new DOMPDF();
   $dompdf->set_paper('letter','landscape');
   $dompdf->set_paper('legal','landscape');
   $dompdf->load_html($html);
   $dompdf->render();
   $dompdf->stream("Report.pdf");