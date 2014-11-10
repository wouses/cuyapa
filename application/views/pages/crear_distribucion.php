<style>
.ced .chzn-search{ display:none; }
</style>
<body>
	<div id="modal-dis" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Confirmar Registro</h3>
        </div> 
        <div class="modal-body" style="min-height:50px;">
            <div id="alert"></div>
            <p style="margin-top:-5px;">¿Seguro deseas registrar esta distribución?</p> 
             
            <form action="<?php echo base_url(); ?>productor/distribucion/crear" method="POST" class="form-horizontal " name="form_crear_distribucion"> 
            
				<input type="hidden" name="enviar" value="1">
            	<input type="hidden" id='cliente' name='cliente'>
                <input type="hidden" id='dist' name='dist' > 
                <input type="hidden" id='cant' name='cant' > 
                
            </form>
        </div> 
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="enviar_registro_distribucion()">Aceptar</button>
            <button class="btn " data-dismiss="modal" aria-hidden="true" >Cancelar</button>
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
				<li>
					<a href="<?php echo base_url(); ?>productor/produccion">
						<span>Producciones</span>
					</a>
				</li>
                <li>
					<a href="<?php echo base_url(); ?>productor/inventario">
						<span>Inventario</span>
					</a>
				</li>
                <li class='active'>
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
                        <h1>Crear Distribución</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/distribucion">Distribución</a>
							<i class="icon-angle-right"></i>
                        </li> 
                        <li>
                            <a href="#">Crear</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<div id="alert1">
								<?php 
                                if(isset($error)){
                                    
                                    if($error==1){
                                ?>	
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.
                                </div>
                                <?php
                                    }
                                }
                                ?>	
                            </div>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Completa los siguientes campos</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>productor/distribucion/cliente/crear" method="POST" class="form-horizontal " name="form_distribucion">
									
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Cliente <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                              <div style="width:205px; float:left" >
                                              <select name="cliente" id="cliente" class="chosen-select" title="Selecciona al cliente o intermediario" >
                                                    <?php if(!$clientes){ ?>
                                                    <option value="">No hay clientes registrados</option>
                                                    <?php }else{ ?>
                                                    <option value="">--</option>
													<?php
															 foreach($clientes as $cliente){
													?>
                                                    			<option value="<?php echo $cliente['id']; ?>"><?php echo strtoupper($cliente['tipo_cedula_rif']).'-'.$cliente['cedula_rif'].' / '.$cliente['nombre']; ?></option>
                                                    <?php 
															 }
														  }
													?> 
                                                </select> 
                                            </div> &nbsp; <a href="#" class="btn" rel="popover" data-trigger="hover" title="" data-content="El cliente debe de estar registrado antes de realizar la distribución. ( En la barra superior->otros->clientes ) " data-original-title="Clientes"><i class="icon-question-sign" style="size:16px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                    
										<label for="textfield" class="control-label">Rubros Disponibles <span class="rojito" title="Campo Obligatorio">*</span></label>
										 
                                        <div class="controls">
                                            <table class="table table-hover table-nomargin table-condensed" >
                                                <thead>
                                                    <tr>
                                                        <th>Rubro</th>
                                                        <th>Variedad</th>
                                                        <th class="hidden-350">Uso</th>
                                                        <th>Calidad</th>
                                                        <th>Cantidad Disponible</th>
                                                        <th>Cantidad a Vender</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla-cosecha-cantidad">
                                                	<?php if(!$inventarios){ ?>
                                                    <tr>
                                                        <td colspan="6">No hay resultados</td>
                                                    </tr>
                                                    <?php }else{ 
															foreach($inventarios as $inventario){
													?>
														
                                                    <tr>
                                                        <td><?php echo $inventario['rubro']; ?></td>
                                                        <td><?php echo $inventario['modalidad']; ?></td>
                                                        <td><?php echo $inventario['uso']; ?></td>
                                                        <td><?php echo $inventario['calidad']; ?></td>
                                                        <td>
														<?php 
														if($inventario['cantidad']>=1000){
															$cantidad_inv = $inventario['cantidad']/1000;
															echo $cantidad_inv.' Ton';
														}else{
															echo $inventario['cantidad'].' Kgs';
														}?>
                                                        </td>
                                                        <td>
                                                        <input type="hidden" name="id[]" value="<?php echo $inventario['id']; ?>" >
                                                        <input type="text" name="cantidad[]" id="cantidad" class="input-small num_only" style="float:left; margin-right:3px;" pattern="\d*" title="ingrese la cantidad a vender">
                                                        <div style="width:65px; float:left" class="ced">
                                                          <select name="unidad_peso[]" id="peso_<?php echo $inventario['id']; ?>" class="chosen-select" title="Unidad de peso" >
                                                          		<option value="kgs">Kgs</option>
                                                                <?php if($inventario['cantidad']>1000){ ?>
                                                                <option value="ton">Ton</option>
                                                                <?php } ?>
                                                            </select> 
                                                        </div>
                                            			</td>
                                                    </tr>   
															    
													<?php
															}
													}
													?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> 
									
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar22()">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>productor/distribucion'">Cancelar</button>
									</div>
								</form>
							</div>
                        </div>
                    </div>
                </div>
		</div>
	</div>

	</body>
</html>