<?php
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Report.xls");
?>
<html>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 0.5cm 0;
	text-align: justify;
}
</style>

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
?>
<table width="600px"> 
	<tr>
    	<td colspan="3"><img src="<?php echo base_url(); ?>img/back-end/logo.png" width="200" height="100" ></td>
    </tr>
</table>
<br>
<br>
<br>
<br>
<br>
<table width="600px"> 
	<tr>
    	<td>
        	Nombre: <?php echo $productor['nombre']; ?><br>
        	C&eacute;dula / RIF: <?php echo $productor['tipo_cedula_rif'].$productor['cedula_rif'];?><br>
		</td>
        <td colspan="4">&nbsp;</td>
        <td><?php echo $fecha; ?></td>
    </tr>
    <tr>
    	<td colspan="6"><h2>Inventario</h2></td>
    </tr>
    <tr bgcolor="#DDDDDD">
    	<td colspan="2">Rubro</td>
    	<td colspan="2">Cantidad</td>
    	<td colspan="2">Calidad</td>
    </tr>
    <?php
	$sql = "SELECT p.rubro as rubro, i.calidad as calidad, i.cantidad as cantidad FROM productos p, inventario i WHERE i.id_productor=".$id." AND p.id=i.id_producto";
	$cursor = mysql_query($sql);
	
	while($inventario = mysql_fetch_array($cursor)){
	?>
    
     <tr style="border-bottom:1px solid #f9f9f9;">
    	<td colspan="2"><?php echo $inventario['rubro']; ?></td>
    	<td colspan="2"><?php echo $inventario['cantidad']; ?></td>
    	<td colspan="2"><?php echo $inventario['calidad']; ?></td>
     </tr>
    
    <?php	
	}
	?>
    
</table>
<body>
</html>
