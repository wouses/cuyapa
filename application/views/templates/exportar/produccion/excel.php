<?php
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Expires: 0");
header("Content-Disposition: attachment;filename=Reporte_produccion.xls");
header("Cache-Control: max-age=0");
?>
<html>

<head>
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
<meta charset="utf-8">
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
    	<td colspan="2">
        	Nombre: <?php echo $produccion['productor']; ?><br>
        	C&eacute;dula / RIF: <?php echo $produccion['tipo_cedula_rif'].$produccion['cedula_rif'];?><br>
        	Producto: <?php echo $produccion['rubro'];?><br>
        	Modalidad: <?php echo $produccion['modalidad'];?><br>
        	Uso: <?php echo $produccion['uso'];?><br>
		</td>
        <td colspan="3">&nbsp;</td>
        <td valign="middle"><?php echo $fecha; ?></td>
    </tr>
    <tr>
    	<td colspan="6"><h2>Producci&oacute;n - <?php echo $produccion['produccion'];?></h2></td>
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
    <?php
	$sql = "SELECT * FROM producciones_siembras WHERE id_produccion = ".$idproduccion;
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	$totals=0;
	
	if($num){
		while($siembra = mysql_fetch_array($cursor)){
			$totals += $siembra['cantidad_terreno']; 
	?>
    	
		<tr>
			<td colspan="3"><?php if($siembra['cantidad_terreno']>=1000){ echo $siembra['cantidad_terreno']/1000; echo "Ha"; }else{ echo $siembra['cantidad_terreno']."Mts<sup>2<sup>"; } ?></td>
			<td colspan="3"><?php echo date('d/m/Y',$siembra['fecha']); ?></td>
		</tr>
	<?php
		}
	?>
		<tr>
			<td colspan="6"><strong>Superficie Total Sembrada:</strong><?php if($totals>=1000){ echo $totals/1000; echo "Ha"; }else{ echo $totals."Mts<sup>2<sup>"; } ?></td>
		</tr>
    <?php
	}else{
	?>
    	<tr>
			<td colspan="6">No hay siembras registradas</td>
		</tr>
    <?php
	}
	?>
    <tr>
			<td colspan="6">&nbsp;</td>
	</tr>
</table>


<table width="600px"> 
	<tr>
    	<td colspan="6"><strong>Cosecha</strong></td>
    </tr
    ><tr bgcolor="#DDDDDD">
    	<td colspan="2">Superficie</td>
    	<td colspan="2">Cantidad</td>
    	<td colspan="2">Fecha</td>
    </tr>
    <?php
	$sql = "SELECT * FROM producciones_cosechas WHERE id_produccion = ".$idproduccion;
	$cursor = mysql_query($sql);
	$num = mysql_num_rows($cursor);
	$totalc=0;
	$can='';
	
	if($num){
		while($cosecha = mysql_fetch_array($cursor)){
			$totalc += $cosecha['cantidad_terreno']; 
	?>
    	
		<tr>
			<td colspan="2" valign="middle"><?php if($cosecha['cantidad_terreno']>=1000){ echo $cosecha['cantidad_terreno']/1000; echo "Ha"; }else{ echo $cosecha['cantidad_terreno']."Mts<sup>2<sup>"; } ?></td>
			<td colspan="2">
			<?php 
				$sql_cantidad = "SELECT * FROM calidad_cosechas WHERE id_produccion_cosecha =".$cosecha['id']." ORDER BY calidad"; 
				$cursor_cantidad = mysql_query($sql_cantidad);
				
				while($cantidad = mysql_fetch_array($cursor_cantidad)){
					
					if($cantidad['cantidad']>=1000){ $can = $cantidad['cantidad']/1000; $can.=' Tn'; }else{ $can = $cantidad['cantidad'].' Kgs'; }
				
					echo $cantidad['calidad']." Calidad: ".$can."<br>";
					
				}
			
			?>
            </td>
			<td colspan="2" valign="middle"><?php echo date('d/m/Y',$cosecha['fecha']); ?></td>
		</tr>
	<?php
		}
	?>
    	<tr>
			<td colspan="6"><strong>Superficie Total Cosechada:</strong><?php if($totalc>=1000){ echo $totalc/1000; echo "Ha"; }else{ echo $totalc."Mts<sup>2<sup>"; } ?></td>
		</tr>
    <?php 
	}else{
	?>
    	<tr>
			<td colspan="6">No hay cosechas registradas</td>
		</tr>
    <?php
	}
	?>
</table>

   
<body>
</html>
