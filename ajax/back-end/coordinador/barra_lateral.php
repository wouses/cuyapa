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
            <input type="hidden" value="coordinador" name="ubicacion" id="ubicacion_com">
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
            <div class="control-group">
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
                        <select name="asunto" id="asunto_com" class="chosen-select  " title="Selecciona sobre que es tu comentario" >
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
        <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Productores</span></a>
    </div>
	<?php 
    
	$municipioCoord = $_SESSION['id_municipio'];
	
	$sql = "select count(productores.id) as cant_prod from productores where productores.id_municipio = '".$municipioCoord."'"; 
	$ejecuta = mysql_query($sql);	 
	$resultado = mysql_fetch_array($ejecuta); 
		
	?>
    <div class="subnav-content" >
   		<ul class="quickstats">
        
            <li>
                <span class="value"><?php echo $resultado['cant_prod'];?></span>
                <span class="name">Registrados</span>
            </li>
             
        </ul>
   </div>   
</div>

<div class="subnav">
    <div class="subnav-title">
        <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Rubros</span></a>
    </div>
	 <?php 
	
	$sql = "select count(producciones.id) as cant_rubro from productores, producciones where productores.id_municipio = '".$municipioCoord."' and productores.id = producciones.id_productor";
	
	$ejecuta = mysql_query($sql);		
	
	$resultado = mysql_fetch_array($ejecuta);
		
	?>
    <div class="subnav-content" >
   		<ul class="quickstats">
        
            <li>
                <span class="value"><?php echo $resultado['cant_rubro'];?></span>
                <span class="name">En producción</span>
            </li>
             
        </ul>
   </div> 
</div> 

<div class="subnav">
    <div class="subnav-title">
        <a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Sembrado</span></a>
    </div>
	 <?php 
				
	$sql = "select sum(producciones_siembras.cantidad_terreno) as cant_siembra from producciones_siembras, productores, producciones where productores.id_municipio = '".$municipioCoord."' and producciones.id_productor = productores.id and producciones_siembras.id_produccion = producciones.id ";
	
	$ejecuta = mysql_query($sql);		
	
	$resultado = mysql_fetch_array($ejecuta);
		
	?>
    <div class="subnav-content" >
   		<ul class="quickstats">
        
            <li>
                <span class="value">
				<?php 
				if($resultado['cant_siembra']>=10000){
					echo number_format($resultado['cant_siembra']/10000, 2, '.', ' '); 
				}else{
					echo $resultado['cant_siembra'];
				} 
				?>
				</span>
                <span class="name">
				<?php 
				if($resultado['cant_siembra']>=10000){
					echo 'Hectareas';
				}else{
					echo 'Metros cuadrados';
				} 
				?> 
				</span>
            </li>
             
        </ul>
   </div>
</div>
