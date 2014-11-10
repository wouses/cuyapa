<body>
	<?php 
		if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
			include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/administrador/modal_bd.php';	
		}
		else{
			include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/administrador/modal_bd.php';			
		} 
	?>
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
				<li class="active">
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Registros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>administrador/usuario">Usuarios</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/categoria">Categorías</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/rubro">Rubros</a>
						</li> 
                        <li>
							<a href="<?php echo base_url(); ?>administrador/variedad">Variedad</a>
						</li>
                        <li>
							<a href="<?php echo base_url(); ?>administrador/uso">Uso</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Recursos</a>
							<ul class="dropdown-menu">
                                <li class="active">
                                    <a href="<?php echo base_url(); ?>administrador/guia">Guias</a>
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
					<a href="<?php echo base_url(); ?>administrador/comentarios">
						<span>Comentarios</span>
					</a>
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
							<a href="#modal-1" data-toggle="modal">Importar</a>
						</li>
                    </ul>
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
			<?php 
			
			if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
				include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/administrador/barra_lateral.php';	
			}
			else{
				include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/administrador/barra_lateral.php';									
			}
			
			?>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Crear Gu&iacute;a</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>administrador/guia">Gu&iacute;s</a>
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
                                <strong>Error!</strong> Debes completar todos los campos obligatorios.
                            </div>
                            <?php
								}else if($error==2){
							?>
                            <br>
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Debes cargar el archivo para el registro.
                            </div>
                            <?php
								}else if($error==3){
							?>
                            <br>
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> El archivo cargado no es un formato valido (.pdf).
                            </div>
                            <?php
								}
							}
							?>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Completa los siguientes campos</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>administrador/guia/crear" method="POST" class="form-horizontal form-validate" novalidate id="aaa" enctype="multipart/form-data">
                                <input type="hidden" name="enviar" value="1">
									<div class="control-group">
                                        <label for="textfield" class="control-label">Archivo</label>
                                        <div class="controls">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="input-append">
                                                    <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Seleccionar Archivo</span><span class="fileupload-exists">Cambiar</span><input type="file" name="docfile"></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Nombre</label>
										<div class="controls">
											<input type="text" name="nombre" title="Ingrese el nombre de la guia" id="textfield" class="input-xlarge" data-rule-required="true" value="<?php if(isset($nombre)){ echo $nombre; } ?>">
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
                                        <label for="textfield" class="control-label">Rubro</label>
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
										<label for="select" class="control-label">Tipo</label>
										<div class="controls">
                                            <div style="width:285px;">
                                                <select name="tipo" id="tipo" class="chosen-select">
                                                        <?php if($tipo){ ?>
                                                            <option><?php echo $tipo; ?></option>
                                                        <?php }else{ ?>	
                                                            <option value="">Seleccione</option>
                                                        <?php } ?>
                                                        
                                                        <?php if((isset($tipo)) && ($tipo!='Plaga')){ ?>
                                                        <option>Plaga</option>
                                                        <?php } else if (!isset($tipo)) { ?>
                                                        <option>Plaga</option>
                                                        <?php } ?>
                                                         <?php if((isset($tipo)) && ($tipo!='Otra')){ ?>
                                                        <option>Otra</option>
                                                        <?php } else if (!isset($tipo)) { ?>
                                                        <option>Otra</option>
                                                        <?php } ?>										
                                               </select>
                                           </div>
										</div>
									</div>
									
														
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>administrador/rubro'">Cancelar</button>
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