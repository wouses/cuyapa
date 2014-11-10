<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script>
function initialize() {
	var input = document.getElementById('ubicacion');
	var autocomplete = new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
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
						<li class="active">
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
                        <h1>Crear Usuario</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/administrador/usuario">Usuarios</a>
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
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Las claves deben de ser iguales.
                            </div>
                            <?php
								}else if($error==2){
							?> 
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> Ya existe un usuario con ese nombre.
                            </div>
                            <?php
								}else if($error==3){
							?> 
                        	<div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Error!</strong> No se ha podido procesar el registro.
                            </div>
                            <?php
								}
							}
							?>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Completa los siguientes campos</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>administrador/usuario/crear" method="POST" class="form-horizontal">
                                <input type="hidden" name="enviar" value="1">
									<div class="control-group">
										<label for="textfield" class="control-label">Correo Electrónico <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="usuario" id="usuario" class="input-xlarge" >
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Contrase&ntilde;a <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="password" name="password" id="password" class="input-xlarge" >
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Repetir Contrase&ntilde;a <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="password" name="password2" id="password2" class="input-xlarge">
										</div>
									</div>

									<div class="control-group">
                                        <label for="textfield" class="control-label">Tipo de Usuario <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select class="chosen-select" id="tipo_usuario" name="tipo_usuario" onChange="tipo_usuario_form()" >
                                                
                                                <option value="1">Productor</option>
                                                <option value="2">Coordinador</option>
                                                <option value="3">Administrador</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="pro-cont">
                                        <hr>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="nombre" id="textfield" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Cédula / RIF
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="tipo_cedula_rif" name="tipo_cedula_rif" >
                                                        <option>V</option>
                                                        <option>E</option>
                                                        <option>J</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="cedula_rif" id="cedula_rif" class="input-medium" style="float:left; margin-left:5px;" maxlength="10" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Teléfono
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="codigo_telefono" name="codigo_telefono" >
                                                        <option>0412</option>
                                                        <option>0414</option>
                                                        <option>0424</option>
                                                        <option>0416</option>
                                                        <option>0426</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="telefono" id="telefono" class="input-medium" style="float:left; margin-left:5px;" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Área de Terreno
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls"> 
                                                <input type="text" name="cantidad_terreno" id="cantidad_terreno" class="input-small" style="float:left;" > 
                                                <div style="width:175px; float:left; margin-left:5px;">
                                                    <select class="chosen-select" id="medida_terreno" name="medida_terreno" >
                                                        
                                                 	<option value="m2">Metros Cuadrados (Mts<sub>2</sub>)</option>
													<option value="ha">Hectareas (Ha)</option>
                                                    </select> 
                                                </div>  
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Ubicacion
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">  
                           						 <input type="text" name="ubicacion" id="ubicacion" autocomplete="off" title="Ingresa dirección para la Geolocalización" class="input-xlarge" >
                                            </div><!-- /.controls -->
                                        </div> 
                            
                            			<div class="control-group">
                                            <label for="textfield" class="control-label">Estado
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                    <select name="estado" onChange="cargar_municipios();" id="estado_l" title="Selecciona tu Estado" class="chosen-select"> 
                                                        <option value="">Seleccione</option>
														<?php
                                                        foreach($estados as $estadoo){
                                                            
                                                            echo "<option value='".$estadoo['id']."'>".$estadoo['nombre']."</option>";
                                                        
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Municipio
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select name="municipio" id="municipio_l" title="Selecciona tu Municipio" class="chosen-select"> 
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Dirección Fiscal o de Referencia
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <textarea name="direccion" title="Ingresa dirección fiscal o de referencia" style="max-height:90px; max-width:270px;"class="input-xlarge"></textarea>
                                            </div>
                                        </div>
                                        
                                        
									</div>	
                                    
                                    <div id="coord-cont" style="display:none">
                                        <hr>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="nombre" id="textfield" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Cédula / RIF
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="tipo_cedula_rif" name="tipo_cedula_rif" >
                                                        <option>V</option>
                                                        <option>E</option>
                                                        <option>J</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="cedula_rif" id="cedula_rif" class="input-medium" style="float:left; margin-left:5px;" maxlength="10" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Teléfono
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="codigo_telefono" name="codigo_telefono" >
                                                        <option>0412</option>
                                                        <option>0414</option>
                                                        <option>0424</option>
                                                        <option>0416</option>
                                                        <option>0426</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="telefono" id="telefono" class="input-medium" style="float:left; margin-left:5px;" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Institución </label>
                                            <div class="controls">
                                                <input type="text" name="institucion" id="institucion" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Cargo </label>
                                            <div class="controls">
                                                <input type="text" name="cargo" id="cargo" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                            
                            			<div class="control-group">
                                            <label for="textfield" class="control-label">Estado
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                    <select name="estado" onChange="cargar_municipios();" id="estado_l" title="Selecciona tu Estado" class="chosen-select"> 
                                                        <option value="">Seleccione</option>
														<?php
                                                        foreach($estados as $estadoo){
                                                            
                                                            echo "<option value='".$estadoo['id']."'>".$estadoo['nombre']."</option>";
                                                        
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Municipio
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select name="municipio" id="municipio_l" title="Selecciona tu Municipio" class="chosen-select"> 
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Tipo de Coordinador<span class="rojito" title="Campo Obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select class="chosen-select" id="tipo_coord" name="tipo_coord" >
                                                    <option value=""></option>
                                                    <option value="1">Coord de Zona</option>
                                                    <option value="2">Centro de Acopio</option> 
                                                </select>
                                                </div>
                                            </div>
                                        </div>
									</div>	
                                    
                                    <div id="admin-cont" style="display:none">
                                        <hr>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="nombre" id="textfield" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Cédula / RIF
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="tipo_cedula_rif" name="tipo_cedula_rif" >
                                                        <option>V</option>
                                                        <option>E</option>
                                                        <option>J</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="cedula_rif" id="cedula_rif" class="input-medium" style="float:left; margin-left:5px;" maxlength="10" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Teléfono
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="codigo_telefono" name="codigo_telefono" >
                                                        <option>0412</option>
                                                        <option>0414</option>
                                                        <option>0424</option>
                                                        <option>0416</option>
                                                        <option>0426</option>
                                                    </select> 
                                                </div>  
                                                <input type="text" name="telefono" id="telefono" class="input-medium" style="float:left; margin-left:5px;" > 
                                            </div><!-- /.controls -->
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Institución </label>
                                            <div class="controls">
                                                <input type="text" name="institucion" id="institucion" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Cargo </label>
                                            <div class="controls">
                                                <input type="text" name="cargo" id="cargo" class="input-xlarge" >
                                            </div>
                                        </div>
                                        
									</div>						
									<div class="form-actions">
										<input type="hidden" name="send" value="1">
										<button type="submit" class="btn btn-primary">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>administrador/usuario'">Cancelar</button>
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