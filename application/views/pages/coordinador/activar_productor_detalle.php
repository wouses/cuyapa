<div id="modal-act" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Confirmar Acción</h3>
	</div> 
	<div class="modal-body" style="min-height:50px;"> 
		<p style="margin-top:-5px;">¿Seguro deseas activar esta cuenta?</p> 
	</div> 
	<div class="modal-footer"> 
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="location.href='<?php echo base_url();?>coordinador/activar_productor/<?php echo $productor['id_usuario'].'/'.$productor['nombre']; ?>/1'">Aceptar</button>
		<button class="btn " data-dismiss="modal" >Cancelar</button>
	</div>
</div>
<div id="modal-eli" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3 id="myModalLabel">Confirmar Acción</h3>
	</div> 
	<div class="modal-body" style="min-height:50px;"> 
		<p style="margin-top:-5px;">¿Seguro deseas eliminar esta cuenta?</p> 
	</div> 
	<div class="modal-footer"> 
		<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="location.href='<?php echo base_url();?>coordinador/activar_productor/<?php echo $productor['id_usuario'].'/'.$productor['nombre']; ?>/0'">Aceptar</button>
		<button class="btn " data-dismiss="modal">Cancelar</button>
	</div>
</div>
<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/">
						<span>Panel</span>
					</a>
				</li>
				<li class='active'>
					<a href="<?php echo base_url(); ?>coordinador/productores_zona">
						<span>Productores</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/rubros_zona">
						<span>Rubros</span>
					</a>
				</li> 
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Proyecci&oacute;n y An&aacute;lisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu"> 
						<li>
							<a href="<?php echo base_url(); ?>coordinador/proyecciones">Proyecciones</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>coordinador/estadisticas">Estad&iacute;sticas</a>
						</li>
                    </ul>
                </li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <img src="<?php echo base_url().$_SESSION['imagen']; ?>" alt="" style="height:27px;"></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url(); ?>coordinador/configurar_cuenta">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>coordinador/ayuda">Ayuda</a>
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
				include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/coordinador/barra_lateral.php';	
			}
			else{
				include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/coordinador/barra_lateral.php';			
			}
			
			?>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Aprobar Productor</h1>
                    </div>
                    <div class="pull-right">  
                   		&nbsp;
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                    	<li>
                            <a href="<?php echo base_url(); ?>coordinador/productores_zona">Productores de <?php echo $municipio['nombre']; ?></a> 
                       		<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>coordinador/activar_productor">Activar Cuenta</a> 
							<i class="icon-angle-right"></i>
                        </li> 
                        <li>
                            <a href="#"><?php echo $productor['nombre']; ?></a> 
                        </li>
                    </ul>
                </div> 
                <div class="row-fluid">
                    <div class="span12"> 
						<div class="box">
							<div class="box-title">
								<h3>Información Básica</h3>
							</div>
							<div class="box-content">
								<form action="#" method="POST" class='form-horizontal'> 
                                    <div class="control-group">
										<label for="textfield" class="control-label">Nombre</label>
										<div class="controls">
											<input type="text" name="nombre" id="nombre" class="input-xlarge" value="<?php echo $productor['nombre']; ?>" disabled>
										</div>
									</div> 
                                    <div class="control-group">
										<label for="textfield" class="control-label">Cédula o RIF</label>
										<div class="controls">
											<input type="text" name="cedula_rif" id="cedula_rif" class="input-xlarge" value="<?php echo $productor['tipo_cedula_rif'].'-'.$productor['cedula_rif']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Correo Electrónico</label>
										<div class="controls">
											<input type="text" name="correo" id="correo" class="input-xlarge" value="<?php echo $productor['correo']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Teléfono</label>
										<div class="controls">
											<input type="text" name="telefono" id="telefono" class="input-xlarge" value="<?php echo $productor['telefono']; ?>" disabled>
										</div>
									</div>
								</form>
							</div>
							
							<div class="box-title">
								<h3>Información Terreno</h3>
							</div>
							<div class="box-content">
								<form action="#" method="POST" class='form-horizontal'> 
                                    <div class="control-group">
										<label for="textfield" class="control-label">Area Terreno</label>
										<div class="controls">
											<input type="text" name="area_terreno" id="area_terreno" class="input-xlarge" value="<?php 
											if($productor['cantidad_terreno']>=10000){
												echo $productor['cantidad_terreno']/10000;
												echo ' Ha';
											}else{
												echo $productor['cantidad_terreno'].' Mts2';
											}
											?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Municipio</label>
										<div class="controls">
											<input type="text" name="municipio" id="municipio" class="input-xlarge" value="<?php echo $productor['municipio']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Parroquia</label>
										<div class="controls">
											<input type="text" name="parroquia" id="parroquia" class="input-xlarge" value="<?php echo $productor['parroquia']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Sector</label>
										<div class="controls">
											<input type="text" name="sector" id="sector" class="input-xlarge" value="<?php echo $productor['sector']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Parcelamiento</label>
										<div class="controls">
											<input type="text" name="parcelamiento" id="parcelamiento" class="input-xlarge" title="Nombre del cliente" value="<?php echo $productor['parcelamiento']; ?>" disabled>
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Dirección Fiscal o Referencial</label>
										<div class="controls">
											<textarea name="direccion" id="direccion" class="input-xlarge" value="" disabled><?php echo $productor['direccion']; ?></textarea>
										</div>
									</div>
									<div class="control-group">
										<a href="#modal-act" role="button" class="btn btn-primary" data-toggle="modal" >Activar Cuenta</a>
										<a href="#modal-eli" role="button" class="btn btn-danger" data-toggle="modal" >Eliminar Cuenta</a> 
										<button type="button" class="btn">Cancelar</button>
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