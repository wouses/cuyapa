<body>
	<div id="modal-pro" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Confirmar Registro</h3>
        </div> 
        <div class="modal-body" style="min-height:50px;">
            <div id="alert"></div>
            <p style="margin-top:-5px;">¿Seguro deseas registrar esta producción?</p> 
             
            <form action="<?php echo base_url(); ?>productor/produccion/crear" method="POST" class="form-horizontal " name="form_crear_produccion"> 
            	
				<input type="hidden" name="productor" value="<?php echo $_SESSION['id_productor']; ?>">
				<input type="hidden" name="enviar" value="1">
            	<input type="hidden" id='nombre' name='nombre'>
                <input type="hidden" id='id_categoria' name='id_categoria' >
                <input type="hidden" id='id_producto' name='id_producto'>
                <input type="hidden" id='id_modalidad' name='id_modalidad'>
                <input type="hidden" id='id_uso' name='id_uso'>
                
            </form>
        </div> 
        <div class="modal-footer">  
        	<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="enviar_registro_produccion()">Aceptar</button>
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
                        <h1>Crear Producción</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/produccion">Producciones</a>
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
								<form action="<?php echo base_url(); ?>productor/produccion/crear" method="POST" class="form-horizontal " name="form_produccion"> 
									<div class="control-group">
										<label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="nombre" id="nombre" class="input-xlarge" data-rule-required="true" value="<?php if(isset($nombre)){ echo $nombre; } ?>">
										</div>
									</div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Categoría <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_categoria" id="categoria-select" class="chosen-select" onChange="cargar_rubros()">
												<?php if(isset($categoria_sel)){ ?>
                                                    <option value="<?php echo $categoria_sel['id']; ?>"><?php echo $categoria_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value=""></option>
                                                <?php } ?>
                                                <?php foreach($categorias as $categoria){ 
                                                	
                                                	if(isset($categoria_sel)){
														
														if($categoria_sel['id'] != $categoria['id']){
												?>
													
													<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
												<?php
														}
													}else{
												?>
													
													<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
												<?php	
													}
												}	
                                               	?>	
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Rubro <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_producto" id="rubro-select" class="chosen-select" onChange="cargar_modalidad_producto()">
                                            	<?php if(isset($rubro_sel)){ ?>
                                                    <option value="<?php echo $rubro_sel['idproducto']; ?>"><?php echo $rubro_sel['rubro']; ?></option>
                                                <?php }
													
														if(isset($rubros)){ 
                                                        
                                                        	foreach($rubros as $rubro){ 
                                                            
                                                         	   if($rubro_sel['idproducto'] != $rubro['idproducto']){
												?>
													
													<option value="<?php echo $rubro['idproducto']; ?>"><?php echo $rubro['rubro']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Variedad <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_modalidad" id="modalidad-select" class="chosen-select" onChange="cargar_uso_modalidad()">
                                               <?php if(isset($modalidad_sel)){ ?>
                                                    <option value="<?php echo $modalidad_sel['id']; ?>"><?php echo $modalidad_sel['nombre']; ?></option>
                                                <?php }
													
														if(isset($modalidades)){ 
                                                        
                                                        	foreach($modalidades as $modalidad){ 
                                                            
                                                         	   if($modalidad_sel['id'] != $modalidad['id']){
												?>
													
													<option value="<?php echo $modalidad['id']; ?>"><?php echo $modalidad['nombre']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Uso <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_uso" id="uso-select" class="chosen-select">
                                               <?php if(isset($uso_sel)){ ?>
                                                    <option value="<?php echo $uso_sel['id']; ?>"><?php echo $uso_sel['nombre']; ?></option>
                                                <?php }
													
														if(isset($usos)){ 
                                                        
                                                        	foreach($usos as $uso){ 
                                                            
                                                         	   if($uso_sel['id'] != $uso['id']){
												?>
													
													<option value="<?php echo $uso['id']; ?>"><?php echo $uso['nombre']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
									
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar6()">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>productor/produccion'">Cancelar</button>
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