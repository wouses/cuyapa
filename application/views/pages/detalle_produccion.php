<style>
.chzn-search{ display:none; }

.dataTables_filter, .dataTables_info, .dataTables_length{display: none;}
</style>
<body>  
	<div id="modal-conf-siem" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onClick="cancelar_registro_siembra()">×</button>
            <h3 id="myModalLabel">Confirmar Registro</h3>
        </div> 
        <div class="modal-body" style="min-height:50px;"> 
            <p style="margin-top:-5px;">¿Seguro deseas registrar esta siembra?</p> 
             
            <form action="<?php echo base_url(); ?>productor/produccion/insertar_siembra" method="POST" class="form-horizontal " name="form_crear_siembra"> 
            	 
				<input type="hidden" name="enviar" value="1">
                <input type="hidden" name="id_produccion" value="<?php echo $produccion['idproduccion']; ?>">
            	<input type="hidden" id='cantidad_terreno' name='cantidad_terreno'>
                <input type="hidden" id='medida_terreno' name='medida_terreno' >
                <input type="hidden" id='tipo_financiamiento' name='tipo_financiamiento'> 
                
            </form>
        </div> 
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="enviar_registro_siembra()">Aceptar</button>
            <button class="btn " data-dismiss="modal" onClick="cancelar_registro_siembra()">Cancelar</button>
        </div>
    </div>
    <div id="modal-conf-cose" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" onClick="cancelar_registro_cosecha()">×</button>
            <h3 id="myModalLabel">Confirmar Registro</h3>
        </div> 
        <div class="modal-body" style="min-height:50px;"> 
            <p style="margin-top:-5px;">¿Seguro deseas registrar esta cosecha?</p> 
             
            <form action="<?php echo base_url(); ?>productor/produccion/insertar_cosecha" method="POST" class="form-horizontal " name="form_crear_cosecha"> 
            	 
				<input type="hidden" name="enviar" value="1">
                <input type="hidden" name="id_produccion" value="<?php echo $produccion['idproduccion']; ?>">
                <input type="hidden" id='id_random_cn' name='id_random_cn'> 
            	<input type="hidden" id='cantidad_terreno_cn' name='cantidad_terreno_cn'>
                <input type="hidden" id='medida_terreno_cn' name='medida_terreno_cn' >
                
            </form>
        </div> 
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="enviar_registro_cosecha()">Aceptar</button>
            <button class="btn " data-dismiss="modal" onClick="cancelar_registro_cosecha()">Cancelar</button>
        </div>
    </div>
	<div id="modal-1" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Registrar Siembra</h3>
        </div>
        <form action="<?php echo base_url(); ?>productor/produccion/insertar_siembra" method="post" name="form_siembra">
        <input type="hidden" id="id_productor" name="id_productor" value="<?php echo $_SESSION['id_productor']; ?>" >
        <div class="modal-body">
            <div id="alert"></div>
            <span><i class="icon-edit"></i> Indique el área sembrada y tipo de financiamiento</span>
            <hr style="margin-top:1px;">
            <div class="control-group">
                <label for="textfield" class="control-label">Área sembrada <span class="rojito" title="Campo Obligatorio">*</span></label>
                <div class="controls">
                    <input type="text" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" name="cantidad_terreno" class="input-xlarge" placeholder="" title="Solo Números" style="width:115px; float:left" >
                    <div style="width:70px; float:left; margin-left:5px;">
                    <select name="medida_terreno" class="chosen-select" >
                        <option value="">--</option>
                        <option value="ha">Ha</option>
                        <option value="mts">Mts<sup>2</sup></option>
                    </select>
                    </div>
                </div>
            </div> 
            <br><br>
            <div class="control-group">
                <label for="textfield" class="control-label">Tipo de Financiamiento <span class="rojito" title="Campo Obligatorio">*</span></label>
                <div class="controls"> 
                    <div style="width:205px;">
                    <select name="tipo_financiamiento" class="chosen-select" >
                        <option value="">--</option>
                        <option value="1">Propio</option>
                        <option value="2">Gubernamental</option>
                        <option value="3">Privado</option>
                    </select>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        </form>
        <div class="modal-footer">
            <button class="btn btn-primary" onClick="validar1()" >Guardar</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </div>
    
    <div id="modal-2" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Registrar Cosecha</h3>
        </div>
        <div class="modal-body">
            <div id="alert1"></div>
            <span><i class="icon-edit"></i> Indique el área y cantidad cosechada</span>
            <hr style="margin-top:1px;">     
            <form action="<?php echo base_url(); ?>productor/produccion/insertar_cosecha" method="post" name="form_cosecha">
            <input type="hidden" name="id_produccion" id="id_produccion" value="<?php echo $produccion['idproduccion']; ?>">
            <input type="hidden" name="id_random" id="id_random" value="<?php echo rand(1,999); ?>">
            <div class="control-group">
                <label for="textfield" class="control-label">Área cosechada <span class="rojito" title="Campo Obligatorio">*</span></label>
                <div class="controls">
                    <input type="text" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" name="cantidad_terreno" class="input-xlarge" placeholder="" title="Solo Números" style="width:115px; float:left" >
                    <div style="width:70px; float:left; margin-left:5px;">
                    <select name="medida_terreno" class="chosen-select" >
                        <option value="">--</option>
                        <option value="ha">Ha</option>
                        <option value="mts">Mts<sup>2</sup></option>
                    </select>
                    </div>
                </div>
            </div>
            </form>
            <br>
            <br>
            <div class="control-group">
                <label for="textfield" class="control-label">Cantidad <span class="rojito" title="Campo Obligatorio">*</span></label>
                <div class="controls">
                    <input type="text" pattern="\d*" name="cantidad_cosecha" id="cantidad_cosecha" class="input-xlarge" title="Kg" placeholder="Kg" style="width:115px; float:left">	
                    <div style="width:110px; float:left; margin-left:5px;">
                    <select class="chosen-select" id="calidad_cosecha" name="calidad_cosecha" >
                        <option value="">Calidad</option>
                        <option>1era</option>
                        <option>2da</option>
                        <option>3era</option>
                        <option>Sin Calificar</option>
                    </select>
                    </div>
            		<button class="btn btn-primary" onClick="validar2();" name="cargar_calidad" style="margin-left:5px;" >Cargar</button>
                </div>
            </div>
            <div id="alert2"></div>            
             <div class="control-group">
                <div class="controls">
                    <table class="table table-hover table-nomargin table-condensed" >
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Calidad</th>
                                <th class="hidden-350">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla-cosecha-cantidad">
                            <tr>
                                <td colspan="3">No hay resultados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" onClick="validar3()" >Guardar</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
        
    </div>
    
    <div id="modal-3" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Detalle Siembra</h3>
        </div>
        <form action="<?php echo base_url(); ?>productor/produccion/editar_siembra" method="post" name="form_editar_siembra">
        <div class="modal-body">
            <div id="alert3"></div>
            <span><i class="icon-edit"></i> Consulte el área sembrada</span>
            <hr style="margin-top:1px;">
            <div class="control-group">
                <label for="textfield" class="control-label">Área sembrada</label>
                <div class="controls">
                    <input type="text" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" name="cantidad_terreno_es" id="cantidad_terreno_es" class="input-xlarge" placeholder="" title="Solo Números" style="width:115px; float:left" disabled >
                    <div style="width:70px; float:left; margin-left:5px;">
                    <select name="medida_terreno_es" class="chosen-select" id="medida_terreno_es" disabled >
                        <option value="">--</option>
                        <option value="ha">Ha</option>
                        <option value="mts">Mts<sup>2</sup></option>
                    </select>
                    </div>
                </div>
            <br><br>
            <div class="control-group">
                <label for="textfield" class="control-label">Tipo de Financiamiento</label>
                <div class="controls"> 
                    <div style="width:205px;">
                    <select name="tipo_financiamiento_es" class="chosen-select" id="tipo_financiamiento_es" disabled  >
                        <option value="">--</option>
                        <option value="1">Propio</option>
                        <option value="2">Gubernamental</option>
                        <option value="3">Privado</option>
                    </select>
                    </div>
                </div>
            </div>
            </div>
            <div style="clear:both"></div>
        </div>
        </form>
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>
    
    <div id="modal-4" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Detalle Cosecha</h3>
        </div>
        <div class="modal-body">
            <div id="alert4"></div>
            <span><i class="icon-edit"></i> Consulte área y cantidad cosechada</span>
            <hr style="margin-top:1px;">     
            <form action="<?php echo base_url(); ?>productor/produccion/editar_cosecha" method="post" name="form_editar_cosecha">
            <input type="hidden" name="id_cosecha_ec" id="id_cosecha_ec" >
            <input type="hidden" name="id_produccion" id="id_produccion" value="<?php echo $produccion['idproduccion']; ?>">
            <div class="control-group">
                <label for="textfield" class="control-label">Área cosechada</label>
                <div class="controls">
                    <input type="text" name="cantidad_terreno_ec" id="cantidad_terreno_ec" class="input-xlarge" title="Solo Números" style="width:115px; float:left" disabled >
                    <div style="width:70px; float:left; margin-left:5px;">
                    <select name="medida_terreno_ec" id="medida_terreno_ec" class="chosen-select" disabled >
                        <option value="">--</option>
                        <option value="ha">Ha</option>
                        <option value="mts">Mts<sup>2</sup></option>
                    </select>
                    </div>
                </div>
            </div>
            </form>
            <br>
           <!-- <br>
            <div class="control-group">
                <label for="textfield" class="control-label">Cantidad</label>
                <div class="controls">
                    <input type="text" pattern="\d*" name="cantidad_cosecha_ec" id="cantidad_cosecha_ec" class="input-xlarge" title="Kg" placeholder="Kg" style="width:115px; float:left">	
                    <div style="width:110px; float:left; margin-left:5px;">
                    <select class="chosen-select" id="calidad_cosecha_ec" name="calidad_cosecha_ec" >
                        <option value="">Calidad</option>
                        <option>1era</option>
                        <option>2da</option>
                        <option>3era</option>
                    </select>
                    </div>
            		<button class="btn btn-primary" onClick="validar11();" name="cargar_calidad" style="margin-left:5px;" >Cargar</button>
                </div>
            </div> -->
            <div id="alert5"></div>            
             <div class="control-group">
                <div class="controls">
                    <table class="table table-hover table-nomargin table-condensed" >
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Calidad</th> 
                            </tr>
                        </thead>
                        <tbody id="tabla-cosecha-cantidad-ec">
                            <tr>
                                <td colspan="2">No hay resultados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="modal-footer"> 
            <button class="btn btn-primary"  data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
        
    </div>
    
    
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>productor" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<a href="<?php echo base_url(); ?>productor">
						<span>Panel</span>
					</a>
				</li>
				<li class='active'>
					<a href="<?php echo base_url(); ?>productor/produccion">
						<span>Producciones</span>
					</a>
				</li>
                <li>
					<a href="<?php echo base_url(); ?>productor/inventario">
						<span>Inventario</span>
					</a>
				</li>
                <li>
					<a href="<?php echo base_url(); ?>productor/distribucion">
						<span>Distribución</span>
					</a>
				</li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Herramientas y Análisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">    
                        <li>
							<a href="<?php echo base_url(); ?>productor/herramientas/estadisticas">Estadísticas</a>
						</li>                   
						<li>
							<a href="<?php echo base_url(); ?>productor/herramientas/guias">Guias Instructivas</a>
						</li>
                        <li>
							<a href="<?php echo base_url(); ?>productor/herramientas/contactos">Contactos de Interés</a>
						</li>
                    </ul>
                </li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Otros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">     
                        <li>
							<a href="<?php echo base_url(); ?>productor/otros/clientes">Clientes</a>
						</li>     
                    </ul>
                </li>
			</ul>
			<div class="user">
            	<ul class="icon-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred"><?php echo $contar_mensajes; ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
                        	<?php 
							if($vp_mensajes){
								foreach($vp_mensajes as $vp_mensaje){
								?>
								<li>
									<a href="<?php echo base_url(); ?>productor/mensaje/<?php echo $vp_mensaje['id']; ?>"> 
										<div class="details">
											<div class="name"><?php echo $vp_mensaje['nombre']; ?></div>
											<div class="message">
												<?php echo $vp_mensaje['mensaje']; ?>
											</div>
										</div>
									</a>
								</li>
								<?php
								}
							}else{
							?>  
                            	<li>
                                	<a><div align="center">No hay mensajes nuevos</div></a>
                                </li>
                            <?php	
							}
							?>
                            <li>
								<a href="<?php echo base_url(); ?>productor/mensaje" class="more-messages">Centro de Mensajes <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <img src="<?php echo base_url().$_SESSION['imagen']; ?>" alt="" style="height:27px;"></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url(); ?>productor/editar_perfil">Editar Perfil</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>productor/configurar_cuenta">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>productor/ayuda">Ayuda</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>cerrar_sesion">Cerrar Sesión</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="content">
		<div id="left" class="no-resize">
		<?php 
			if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
				include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/productor/barra_lateral.php';	
			}
			else{
				include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/productor/barra_lateral.php';			
			} 
		?>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Producci&oacute;n - <?php echo $produccion['nombre_produccion']; ?></h1>
                        <h2 style="margin-top:-5px;"><?php echo $produccion['rubro']; ?></h2>
                        <p style="margin-top:-15px;"><?php echo $produccion['modalidad']; ?> - <?php echo $produccion['uso']; ?></p>
                    </div>
                    <div class="pull-right">
                        <p><i class="icon-signout"></i> Exportar</p><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/produccion/pdf/<?php echo $_SESSION['id']; ?>/<?php echo $produccion['idproduccion']; ?>'">PDF</button><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/produccion/excel/<?php echo $_SESSION['id']; ?>/<?php echo $produccion['idproduccion']; ?>'">EXCEL</button>
                       
                        <br>
						<!--
                        <div class="btn-group" style="margin-top:30px;">
                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i> Configuración <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="margin-left:-25px;">
                                <li>
                                    <a href="#">Editar</a>
                                </li>
                                <li>
                                	<a href="#modal-5" role="button" data-toggle="modal">Eliminar</a> 
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
						<li>
                            <a href="#">Producciones</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#"><?php echo $produccion['nombre_produccion']; ?></a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                	<div class="span12" align="center">
                    	<div class="box" align="left">
                        	<div id="alert2">
                        	<?php 
							if(isset($_REQUEST['alert'])){
								
								if($_REQUEST['alert']==1){ ?>
								<div class="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-info-sign"></i> <strong>Algo que deberias saber!</strong> Al colocar un tamaño mayor a 10.000 Mts<sup>2</sup> esta se transformara automaticamente a Hectareas (Ha).
								</div>
                            <?php
								}
							}
							?>
                            </div>
                        </div>
                        <ul class="tiles">
                            <li class="green long span4">
                                <a>
                                <span class="count">
                                <?php 
								if($siembras){
									foreach($siembras as $siembra){
										
										$metros += $siembra['cantidad_terreno'];
																					
									} 
									$suma = $metros;
									if($metros >= 10000){
										
										echo $metros = $metros/10000;
										$ta =1;
										echo " Ha"; 
										
									}else{ 
										echo $metros." Mts<sup>2</sup>";
										$ta =2;
								 	}
								}else{
									echo ":(";	
								}
								?>
                                </span>
                                <span class="name">
								<?php 
								if(!$metros){
									echo "No hay siembras";	 
								 }else{
									 
									if($ta == 1){ echo "Sembradas"; }else{ echo "Sembrados"; } 
								 }
								 ?>
                                 </span></a>
                            </li>
                            <li class="green long span4">
                                <a>
                                <span class="count">
                                 <?php 
								 if($cosechas){
									 
									 foreach($cosechas as $cosecha){
										
										$sql = "SELECT * FROM calidad_cosechas WHERE id_produccion_cosecha=".$cosecha['id'];
										$cursor= mysql_query($sql);
										
										while($datos = mysql_fetch_array($cursor)){
											
											$cantidad += $datos['cantidad'];
										}
										
									 } 
									 
									 if($cantidad >= 1000){echo $cantidad/1000; echo " Tns"; }else{ echo $cantidad." Kgs"; }
										
										
								 }else{
									echo ":("; 
								 }
								 ?>
                                 </span>
                                 <span class="name">
								 <?php 
								 if(!$cantidad){
									echo "No hay cosechas";	 
								 }else{
									 
								 	if($cantidad >= 1000){ echo "Cosechadas"; }else{ echo "Cosechados"; }
								 
								 }
								 ?></span></a>
                            </li>
                            <li class="green long span4">
                                <a>
                                <span class="count">
                                <?php
                                if($siembras && $cosechas){
								
									foreach($cosechas as $cosecha){
										
								
										$porcentaje += $cosecha['cantidad_terreno'];
											
										
									}
									
									$resultado = ($porcentaje*100)/$suma;
									
									echo number_format($resultado, 2);
									
									echo " %";
								}else{
									echo ":(";	
								}?>
                                 </span>
                                 <span class="name"><?php if($siembras && $cosechas){ echo "Superficie Cosechada"; }else{ echo "Imposible calcular"; } ?></span></a>
                            </li>
                        </ul>
                    
                    	<div style="clear:both"></div>
                    </div>
                    <div class="span12" style="margin-top:15px;">
                        <div class="span5">
                            <div class="box">
                                <div class="box-title">
                                    <h3>
                                        Siembra
                                    </h3>
                                    <div align="right" >
                                        <a href="#modal-1" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus"></i> Nueva</a>
                                    </div>
                                </div>
                                <div class="box-content nopadding">
                                    <table class="table table-hover dataTable table-nomargin table-bordered" id="tabla1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Superficie</th>
                                                <th class='hidden-480'>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>	
                                            <?php
                                            if($siembras){
                                            	$j=1;
                                                foreach($siembras as $siembra){
                                            
                                            ?>											
                                            <tr style='cursor:pointer;' title="Click para ver detalles" onClick="cargar_detalle_siembra(<?php echo $siembra['id']; ?>)"> 
                                            	<td class='hidden-480'><?php echo $j; ?></td>
                                                <td><?php if($siembra['cantidad_terreno'] >= 10000){ echo $siembra['cantidad_terreno']/10000; echo " Ha"; }else{ echo $siembra['cantidad_terreno']." Mts<sup>2</sup>"; }?></td>
                                                <td class='hidden-480'><?php echo date('d/m/Y', $siembra['fecha']); ?></td>
                                            </tr>
                                            <?php
													$j++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div class="span6">
                            <div class="box">
                                <div class="box-title">
                                    <h3>
                                        Cosecha
                                    </h3>
                                    <div align="right">
                                        <a href="#modal-2" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus"></i> Nueva</a>
                                    </div>
                                </div>
                                <div class="box-content nopadding">
                                    <table class="table table-hover dataTable table-nomargin table-bordered" id="tabla2">
                                        <thead>
                                            <tr>
                                            	<th>#</th>
                                                <th>Superficie</th>
                                                <th class='hidden-480'>Cosechado</th>
                                                <th class='hidden-480'>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>												
                                            <?php
                                            if($cosechas){
                                            	$i=1;
                                                foreach($cosechas as $cosecha){
                                            
                                            ?>								
                                            <tr style='cursor:pointer;' title="Click para ver detalles" onClick="cargar_detalle_cosecha(<?php echo $cosecha['id']; ?>)" >
                                            	<td class='hidden-480'><?php echo $i; ?></td>
                                                <td><?php if($cosecha['cantidad_terreno'] >= 10000){ echo $cosecha['cantidad_terreno']/10000; echo " Ha"; }else{ echo $cosecha['cantidad_terreno']." Mts2"; }?></td>
                                                <td class='hidden-480'>
												<?php 
												
												$sql = "SELECT * FROM calidad_cosechas WHERE id_produccion_cosecha=".$cosecha['id'];
												$cursor= mysql_query($sql);
												$cantidad = 0;
												while($datos = mysql_fetch_array($cursor)){
													
													$cantidad += $datos['cantidad'];
												}
												
												if($cantidad >= 1000){echo $cantidad/1000; echo " Tns"; }else{ echo $cantidad." Kgs"; }
												
												?>
                                                </td>
                                                <td class='hidden-480'><?php echo date('d/m/Y', $cosecha['fecha']); ?></td>
                                            </tr>
                                            <?php
                                            		$i++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		</div>
		</div>

	</body>
</html>