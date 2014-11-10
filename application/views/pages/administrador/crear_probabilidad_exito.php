<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>administrador" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<a href="<?php echo base_url(); ?>administrador">
						<span>Panel</span>
					</a>
				</li>
				<li class='active'>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Registros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>administrador/crear_usuario">Usuarios</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/categoria">Categorías</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/rubro">Rubros</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Recursos</a>
							<ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>administrador/guia">Guias</a>
                                </li>
                                <li class='active'>
                                    <a href="<?php echo base_url(); ?>administrador/probabilidad_exito">Probabilidad de Éxito</a>
                                </li>
							</ul>
						</li>
                    </ul>
                </li>
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Proyecci&oacute;n y An&aacute;lisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
                    	<li>
							<a href="<?php echo base_url(); ?>administrador/productores_zona">Productores por Zona</a>
						</li>
                        <li>
							<a href="<?php echo base_url(); ?>administrador/rubros_zona">Rubros por Zona</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/proyecciones">Proyecciones</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/estadisticas">Estad&iacute;sticas</a>
						</li>
                    </ul>
                </li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Base de Datos</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>administrador/base_datos/exportar">Exportar</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/base_datos/importar">Importar</a>
						</li>
                    </ul>
                </li>
               <li>
					<a href="<?php echo base_url(); ?>administrador/auditoria">
						<span>Auditoria</span>
					</a>
				</li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <img src="<?php echo base_url().$_SESSION['imagen']; ?>" alt="" style="height:27px;"></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url(); ?>administrador/configurar_cuenta">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/ayuda">Ayuda</a>
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
			<form action="#" method="GET" class='search-form'>
				<div class="search-pane">
					<input type="text" name="search" placeholder="Buscar">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Sección 1</span></a>
				</div>
				<ul class="subnav-menu">
					<li class='dropdown'>
						<a href="#" data-toggle="dropdown">Atajo 1</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">sub atajo 1</a>
							</li>
							<li>
								<a href="#">sub atajo 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
					<li>
						<a href="#">Atajo 3</a>
					</li>
					<li>
						<a href="#">Atajo 4</a>
					</li>
				</ul>
			</div>
			
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Sección 2</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="#">Atajo 1</a>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Crear Probabilidad de Éxito</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/administrador/rubro">Probabilidad de Éxito</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Crear</a>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<?php 
							if(isset($error)){
								
								if($error==1){
							?>		
                            <br>
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Debes completar todos los campos.
                            </div>
                            <?php
								}else if($error==2){
							?>
                            <br>
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> La fecha de inicio no puede ser menor o igual a la fecha final.
                            </div>
                            <?php
								}else if($error==3){
							?>
                            <br>
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> El archivo cargado no es una imagen (.jpg/.png/.gif).
                            </div>
                            <?php
								}
							}
							?>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Completa los siguientes campos</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>administrador/probabilidad_exito/crear" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="enviar" value="1">
									<div class="control-group">
                                        <label for="textfield" class="control-label">Estado</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_estado" id="estado_l" class="chosen-select" onChange="cargar_municipios()">
												<?php if(isset($estado_sel)){ ?>
                                                    <option value="<?php echo $estado_sel['id']; ?>"><?php echo $estado_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value="">Seleccione</option>
                                                <?php } ?>
                                                <?php foreach($estados as $estado){ 
                                                	
                                                	if(isset($estado_sel)){
														
														if($estado_sel['id'] != $estado['id']){
												?>
													
													<option value="<?php echo $estado['id']; ?>"><?php echo $estado['nombre']; ?></option>
												<?php
														}
													}else{
												?>
													
													<option value="<?php echo $estado['id']; ?>"><?php echo $estado['nombre']; ?></option>
												<?php	
													}
												}	
                                               	?>	
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Municipio</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_municipio" id="municipio_l" class="chosen-select" onChange="cargar_municipios()">
												<?php if(isset($municipio_sel)){ ?>
                                                    <option value="<?php echo $municipio_sel['id']; ?>"><?php echo $municipio_sel['nombre']; ?></option>
                                                <?php 
														foreach($municipios as $municipio){ 
                                                	
														
															if($municipio_sel['id'] != $municipio['id']){
												?>
													
													<option value="<?php echo $municipio['id']; ?>"><?php echo $municipio['nombre']; ?></option>
												<?php
															}
													
														}
                                               		
													 }else{ ?>
                                                    <option value="">Seleccione</option>
                                                <?php } ?>
                                                
                                            </select>
                                            
                                           	</div>
                                        </div>
                                    </div>
									<br>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Fecha Inicio</label>
                                        <div class="controls">
                                            <input type="text" name="fecha_inicio" id="datepicker" class="input-medium datepick" value="<?php if(isset($fecha_inicio)){ echo $fecha_inicio; } ?>">
                                            
                                        </div>
                                    </div>	
                                    
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Fecha Final</label>
                                        <div class="controls">
                                            <input type="text" name="fecha_final" id="datepicker" class="input-medium datepick" value="<?php if(isset($fecha_final)){ echo $fecha_final; } ?>">
                                            
                                        </div>
                                    </div>	
                                    
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Categoría</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_categoria" id="categoria-select" class="chosen-select" onChange="cargar_rubros()">
												<?php if(isset($categoria_sel)){ ?>
                                                    <option value="<?php echo $categoria_sel['id']; ?>"><?php echo $categoria_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value="">Seleccione</option>
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
                                    <br>

                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Rubro</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_producto" id="rubro-select" class="chosen-select" onChange="cargar_modalidad_uso()">
                                            	<?php if(isset($rubro_sel)){ ?>
                                                    <option value="<?php echo $rubro_sel['idproducto']; ?>"><?php echo $rubro_sel['rubro']; ?></option>
                                                <?php }else{ ?>
                                                    <option value="">Seleccione</option>
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
                                </div>			
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>administrador/probabilidades_exito'">Cancelar</button>
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