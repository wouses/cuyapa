
<html>


</head>

<body>

<?php



if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {

	include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';

}

else{

	include $_SERVER['DOCUMENT_ROOT'].'cuyapa/ajax/conexion.php';

}



@session_start();

$sql = "SELECT * FROM productores WHERE id = ".$id;
$cursor = mysql_query($sql);

$productor= mysql_fetch_array($cursor);


$sql = "SELECT p.rubro as rubro, i.calidad as calidad, i.cantidad as cantidad FROM productos p, inventario i WHERE i.id_productor=".$id." AND p.id=i.id_producto";
$cursor = mysql_query($sql);

while($inventario = mysql_fetch_array($cursor)){
	
 $var .= '<tr style="border-bottom:1px solid #f9f9f9;">
	<td colspan="2">'.$inventario['rubro'].'</td>
	<td colspan="2">'.$inventario['cantidad'].'</td>
	<td colspan="2">'.$inventario['calidad'].'</td>
 </tr>';

}

$ruta = base_url().'img/back-end/logo.png';

echo $html = '
<html>


</head>

<body>
<table width="600px"> 
	<tr>
    	<td colspan="3"><h1>Cuyapa</h1></td>
    </tr>
</table>
<br>
<table width="600px"> 
	<tr>
    	<td>
        	Nombre: '.$productor['nombre'].'<br>
        	C&eacute;dula / RIF: '.$productor['tipo_cedula_rif'].''.$productor['cedula_rif'].'<br>
		</td>
        <td colspan="4">&nbsp;</td>
        <td>'.$fecha.'</td>
    </tr>
    <tr>
    	<td colspan="6"><h2>Inventario</h2></td>
    </tr>
</table>
<table width="600px" border="1" bordercolor="#000" cellspacing="0" cellpadding="0"> 
    <tr bgcolor="#DDDDDD">
    	<td colspan="2">Rubro</td>
    	<td colspan="2">Cantidad</td>
    	<td colspan="2">Calidad</td>
    </tr>
    
	'.$var.'
    
</table>
<body>
</html>';


require_once($_SERVER['DOCUMENT_ROOT']."cuyapa/dompdf/dompdf_config.inc.php");

$dompdf = new DOMPDF();
   $dompdf->set_paper('letter','landscape');
   $dompdf->set_paper('legal','landscape');
   $dompdf->load_html($html);
   $dompdf->render();
   $dompdf->stream("Report.pdf");