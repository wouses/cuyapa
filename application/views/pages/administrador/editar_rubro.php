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
						<li class="active">
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
                                <li>
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
                        <h1>Editar Rubro</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/administrador/rubro">Rubros</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Editar</a>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<?php 
							if(isset($error)){
								
								if($error==1){
							?>		 
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Debes completar todos los campos.
                            </div>
                            <?php
								}else if($error==2){
							?> 
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Debes cargar la imagen para el registro.
                            </div>
                            <?php
								}else if($error==3){
							?> 
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> El archivo cargado no es una imagen (.jpg/.png/.gif).
                            </div>
                            <?php
								}
							}
							?>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Detalles del registro</h3>
                                <a href="<?php echo base_url(); ?>administrador/rubro/eliminar/<?php echo $rubros['idproducto']; ?>" onClick="return confirm('Deseas eliminar el registro? No podras recuperar la información');" class="btn btn-danger" style="float:right"><i class="icon-trash"></i> Eliminar</a>
							</div>
							<div class="box-content"> 
								<form action="<?php echo base_url(); ?>administrador/rubro/editar" name="form_crear_rubro" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                                	<input type="hidden" name="idproducto" value="<?php echo $rubros['idproducto']; ?>">
									<div class="control-group">
                                        <label for="textfield" class="control-label">Imagen</label>
                                        <div class="controls">
                                                         <div class="fileupload <?php if($rubros['imagen']!=''){ echo 'fileupload-exists'; }else{ echo 'fileupload-new'; } ?>" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px; "><img src="<?php echo base_url(); ?>img/sin_imagen.jpg"></div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                            <?php if($rubros['imagen']!=''){ ?>
                                                            <img src="<?php echo base_url();?><?php echo $rubros['imagen']; ?>" />
                                                            <?php } ?>
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name="imagefile" id="imagefile" value="<?php echo $rubros['imagen']; ?>"></span>
                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Quitar</a>
                                                            </div>
                                                        </div>
                                                    </div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="nombre" title="Ingrese el nombre del rubro" id="textfield" class="input-xlarge" value="<?php echo $rubros['rubro']; ?>">
										</div>
									</div>
									
									<div class="control-group">
                                        <label for="textfield" class="control-label">Categor&iacute;a <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select class="chosen-select" id="id_categoria" name="id_categoria" >
												<option value="<?php echo $rubros['id_categoria']; ?>"><?php echo $rubros['categoria']; ?></option>
												<?php
													foreach($categorias as $categoria){
													
														if($categoria['id'] != $rubros['id_categoria']){	
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
																				
									</form>
								<div class="form-horizontal">                                   
                                    <div class="control-group">
                                    	
                                        <label for="textfield" class="control-label">Variedad - Uso<span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:110px; float:left;">
                                            	 <select class="chosen-select" id="id_modalidad" name="id_modalidad" >
																							
                                                    <option value=""></option>
													
                                                    <?php
                                                    
                                                    foreach($modalidades as $modalidad){
                                                    ?>
                                                        <option value="<?php echo $modalidad['id']; ?>"><?php echo $modalidad['nombre']; ?></option>
                                                    <?php		
                                                    }
                                                    ?>	
                                                </select>
                                            </div>
                                            <div style="width:110px; float:left; margin-left:5px;">
                                            	<select class="chosen-select" id="id_uso" name="id_uso" >
													<option value=""></option>
													
                                                    <?php
                                                    
                                                    foreach($usos as $uso){
                                                    ?>
                                                        <option value="<?php echo $uso['id']; ?>"><?php echo $uso['nombre']; ?></option>
                                                    <?php		
                                                    }
                                                    ?>	
                                                </select>
                                            </div>
                                            <button class="btn btn-primary" onClick="validar4();" name="cargar_modalidad_uso" style="margin-left:5px;" >Cargar</button>
                                        </div>
                                        <div class="controls">
                                            <table class="table table-hover table-nomargin table-condensed" >
                                                <thead>
                                                    <tr>
                                                        <th>Variedad</th>
                                                        <th>Uso</th>
                                                        <th class="hidden-350"><div align='center'>Acciones</div></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla-modalidad-uso">
                                                    <tr>
                                                        <td colspan="3">No hay resultados</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar5()" >Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>administrador/rubro'">Cancelar</button>
                                  
									</div>
                                </div>
							</div>
                        </div>
                    </div>
                    
                </div>
			</div>
            <!-- Trampa para que crezca sidebar -->
                <div class="row-fluid" style="visibility:hidden">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-map-marker"></i> 
								</h3>
							</div>
							<div class="box-content">
								<div class="alert alert-info">
									<h4>rata trampa</h4>
									<p>asd</p>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!-- fin de la rata trampa -->
		</div>

	</body>
</html>