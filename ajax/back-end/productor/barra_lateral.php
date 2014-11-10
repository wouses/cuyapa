<?php
	if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		include $_SERVER['DOCUMENT_ROOT'].'/ajax/conexion.php';
	}
	else{
		include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/conexion.php';
	}
?>
<div id="modal-comentario" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" >×</button>
        <h3 id="myModalLabel">Enviar Comentario</h3>
    </div> 
    <div class="modal-body" style="min-height:50px;"> 
    	<div id="alert_com"></div>
        <span><i class="icon-edit"></i> Envianos tus informes de errores, fallas, sugerencias y dudas, te lo agradeceremos.</span>
		<hr style="margin-top:1px;"> 
         <form method="post" name="form-enviar-comentario">
            <input type="hidden" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>" name="nav_so" id="nav_so_com">
            <input type="hidden" value="Productor" name="ubicacion" id="ubicacion_com">
            <div class="control-group">
                <label class="control-label" for="inputLoginLogin">
                    Correo Electrónico:
                    <span class="form-required rojito" title="Campo obligatorio.">*</span>
                </label>

                <div class="controls">
                    <input type="email" name="email" id="email_com" required title="Ingresa tu correo electrónico" style="height:26px; width:215px;" value="<?php echo $_SESSION['usuario']; ?>" >
                </div>
                <!-- /.controls -->
            </div>
            
            <div class=" control-group">
                <label class="control-label" for="inputType">
                    Me siento
                    <span class="form-required rojito" title="Campo obligatorio.">*</span>
                </label>
                <div class="controls">
                	<div style="width:230px; ">
                        <select name="sentimiento" id="sentimiento_com" class="chosen-select" title="Selecciona como te sientes con respecto a tu comentario" >
                            <option value="">---</option>
                            <option>Molesto</option>
                            <option>Confundido</option>
                            <option>Feliz</option>
                            <option>Entretenido</option>
                            <option>Impresionado</option>
                            <option>Sorprendido</option>
                            <option>Decepcionado</option>
                            <option>Frustrado</option>
                            <option>Curioso</option>
                            <option>Indiferente</option>
                        </select> 
                     </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputType">
                    El Comentario es Sobre
                    <span class="form-required rojito" title="Campo obligatorio.">*</span>
                </label>
                <div class="controls">
                	<div style="width:230px; ">
                        <select name="asunto" id="asunto_com" class="chosen-select" title="Selecciona sobre que es tu comentario" >
                            <option value="">---</option>
                            <option>Diseño</option>
                            <option>Funcionalidad</option>
                            <option>Una idea</option>
                            <option>Un error</option>
                            <option>Otro</option> 
                        </select> 
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPropertyNotes">
                    Danos tú Opinión
                    <span class="form-required rojito" title="Campo obligatorio.">*</span>
                </label>
                <div class="controls">
                    <textarea name="opinion" id="opinion_com" required title="Explicanos la situación" style="max-height:150px; min-width:216px; max-width:216px;"> </textarea>
                </div> 
            </div>  
        </form>
    </div> 
    <div class="modal-footer"> 
        <button class="btn btn-primary" aria-hidden="true" onClick="enviarComentarioBackend()">Aceptar</button>
        <button class="btn " data-dismiss="modal" >Cancelar</button>
    </div>
</div>
<div id="modal-conf-com" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3 id="myModalLabel">Comentario Enviado</h3>
    </div> 
    <div class="modal-body" style="min-height:50px;"> 
        <p style="margin-top:-5px;">Gracias por tu colaboración, estaremos en contacto contigo.</p> 
          
    </div> 
    <div class="modal-footer"> 
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Aceptar</button> 
    </div>
</div>
<!--
<form action="<?php echo base_url(); ?>productor/buscar" method="get" class='search-form'>
    <div class="search-pane">
        <input type="text" name="q" placeholder="Buscar">
        <button type="submit"><i class="icon-search"></i></button>
    </div>
</form> -->
<div class="subnav" style="margin-top:-5px;"> 
    <ul class="subnav-menu">
        <li class="satgreen">
            <div style="padding:20px; color:#fff; cursor:pointer" onClick="abrir_form_com();">
                <i class="glyphicon-comments"></i> Envianos tu comentario<br> 
                <div align="center"><strong>Click Aqui!</strong></div>
            </div>
		</li>
    </ul>
</div> 
<div class="subnav">
    <div class="subnav-title">
        <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Producciones</span></a>
    </div>
    <ul class="subnav-menu">
    <?php
        $sql_producciones = 'SELECT * FROM producciones WHERE id_productor = '.$_SESSION['id'].' AND status = 0 LIMIT 4';
        $cursor_producciones = mysql_query($sql_producciones);
        
        $num_producciones = mysql_num_rows($cursor_producciones);
        
        if($num_producciones){
            
            while($producciones_s = mysql_fetch_array($cursor_producciones)){
    ?>
        <li>
            <a href="<?php echo base_url().'productor/produccion/'.$producciones_s['id']; ?>"><?php echo $producciones_s['nombre']; ?></a>
        </li>
    <?php
            }
			
			$sql_producciones2 = 'SELECT * FROM producciones WHERE id_productor = '.$_SESSION['id'].' AND status = 0 ';
			$cursor_producciones2 = mysql_query($sql_producciones2);
			
			$num_producciones2 = mysql_num_rows($cursor_producciones2);
			
			if($num_producciones2>=5){
				?>
            <li>
                <a href="<?php echo base_url().'productor/produccion'; ?>"><strong>Ver todas <i class="icon-angle-right"></i></strong></a>
            </li>
                <?php
				
			}
        }else{
    ?>
        <li>
            <a href="<?php echo base_url().'productor/produccion'; ?>">No hay producciones</a>
        </li>                
    <?php
        }
    ?>
    </ul>
</div>
<div class="subnav">
    <div class="subnav-title">
        <a href="#" class="toggle-subnav"><i class="icon-angle-down"></i><span>Inventario</span></a>
    </div>
    <div class="subnav-content" style="display: block;">
        
            <?php 
			
			$sql_inventario = 'SELECT p.rubro, m.nombre as modalidad, u.nombre as uso, SUM(inv.cantidad) as cantidad, inv.calidad FROM productos p, modalidades m, usos u, inventario inv WHERE inv.id_productor = '.$_SESSION['id'].' AND inv.id_producto=p.id AND inv.id_modalidad=m.id AND inv.id_uso=u.id GROUP BY inv.id_producto, inv.id_modalidad, inv.id_uso LIMIT 4';
			$cursor_inventario = mysql_query($sql_inventario);
			$num_inventario = mysql_num_rows($cursor_inventario);
			
            
            if($num_inventario){
                ?>
                <ul class="quickstats">
                <?php
				while($datos = mysql_fetch_array($cursor_inventario)){
					
					?>
					<li>
						<span class="value"><?php if($datos['cantidad'] >= 1000){ echo ceil($datos['cantidad'])/1000; echo '<span style="font-size:12px">Ton</span>'; }else{ echo ceil($datos['cantidad']).'<span style="font-size:12px">Kgs</span>';  } ?></span>
						<span class="name"><?php echo $datos['rubro']; ?><br /><?php echo $datos['modalidad']; ?></span>
					</li>
					<?php
					$calidad[$datos['calidad']] = $datos['cantidad'];
					
					$rubro = $datos['rubro'];
					$modalidad = $datos['modalidad'];
					$uso = $datos['uso'];
				}
				
				?> 
      			</ul>
            </div>
                <?php 
			
            }else{
            ?>
            </div>
   			<ul class="subnav-menu" style="margin-top:-15px;">
            	<li style="text-align:left;"><a href="<?php echo base_url().'productor/inventario'; ?>">No hay inventario</a></li>
            </ul>
            <?php
            }
            ?>
    
    <?php
	$sql_producciones3 = 'SELECT * FROM producciones WHERE id_productor = '.$_SESSION['id'].' AND status = 0 GROUP BY id_producto, id_modalidad, id_uso ';
	$cursor_producciones3 = mysql_query($sql_producciones3);
	
	$num_producciones3 = mysql_num_rows($cursor_producciones3);
	
	
    if($num_producciones3>=4){
	?> 

	<ul class="subnav-menu" style="margin-top:-5px;">
		<li>
			<a href="<?php echo base_url().'productor/inventario'; ?>"><strong>Ver todo el inventario <i class="icon-angle-right"></i></strong></a>
		</li>
	</ul>
		<?php
		
	}
	?>
</div>
<?php
$sql_anunciante = 'SELECT * FROM anunciantes ORDER BY RAND() LIMIT 2';
$cursor_anunciante = mysql_query($sql_anunciante);

$num_anunciante = mysql_num_rows($cursor_anunciante);

if($num_anunciante){
?>
<div class="subnav">
    <div class="subnav-title">
        <a href="#" class="toggle-subnav"><i class="icon-angle-down"></i><span>Anunciantes</span><span class="icon-bullhorn"></span> </a>
    </div>
    <div class="subnav-content">
        <ul class="userlist">
        <?php
            while ($anunciante_s = mysql_fetch_array($cursor_anunciante)){
        ?>
            <li>
                <a href="#"><img src="<?php echo base_url().$anunciante_s['imagen']; ?>" alt=""></a>
                <div class="user">
                    <span class="name">
                        <?php echo $anunciante_s['titulo']; ?>
                    </span>
                    <span class="position">
                        <?php echo $anunciante_s['texto']; ?>
                    </span>
                </div>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>
</div>
<?php
}
?>

