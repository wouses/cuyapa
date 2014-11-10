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
                        <h1>Asignar Usuario a Productor</h1>
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
                            <a href="#">Asignar Usuario a Productor</a> 
                        </li>
                    </ul>
                </div> 
                <div class="row-fluid">
                    <div class="span12"> 
						<div class="box">
                        	<div id="alert1"> 
							
							</div>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Completa los siguientes campos</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>coordinador/asignar_usuario_productor" method="POST" class='form-horizontal' name="form_asignar_usuario_productor"> 
									<input type="hidden" name="enviar" id="enviar" value="1" >
									<input type="hidden" id="id_productor" name="id_productor" value="<?php if(isset($id_productor)){ echo $id_productor; } ?>" >
                                    <div class="control-group">
										<label for="textfield" class="control-label">Correo Electrónico
										<span class="rojito" title="Campo obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="correo" id="correo" class="input-xlarge" >
										</div>
									</div> 
                                    <div class="control-group">
										<label for="textfield" class="control-label">Clave
										<span class="rojito" title="Campo obligatorio">*</span></label>
										<div class="controls">
											<input type="password" name="clave" id="clave" class="input-xlarge" >
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Confirmar Clave
										<span class="rojito" title="Campo obligatorio">*</span></label>
										<div class="controls">
											<input type="password" name="clave2" id="clave2" class="input-xlarge" >
										</div>
									</div>
									
									<?php if(!isset($id_productor)){ ?>
									<hr>
									<div id="alert2"> 
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPropertyPropertyType">
										Buscar Productor
										<span class="rojito" title="Campo obligatorio">*</span>
										</label>
										<div class="controls">
											<div style="width:115px; float:left;">
												<select class="chosen-select" id="tipo_cedula_rif" name="tipo_cedula_rif" >
													
													<option value="">--</option>
													<option>V</option>
													<option>E</option>
													<option>J</option>
												</select> 
											</div>  
											<input type="text" name="cedula_rif" id="cedula_rif" class="input-medium num_only" style="float:left; margin-left:5px;" maxlength="9" onkeydown="if (event.keyCode == 13) document.getElementById('btn-buscar-prod').click()" > 
											<button type="button" id="btn-buscar-prod" class="btn" style="margin-left:5px;" onClick="buscarProductor();">Buscar</button>
										</div><!-- /.controls -->
                                    </div>
									<div id="prod-info" style="display:none">
										<div class="control-group">
											<label for="textfield" class="control-label">Nombre</label>
											<div class="controls">
												<input type="text" name="nombre" id="nombre" class="input-xlarge" disabled>
											</div>
										</div>  
									</div>
                                    <?php } ?>
									<div class="control-group">
										<a href="javascript:void(0)" role="button" class="btn btn-primary" onCLick="validar25()" >Asignar Cuenta</a> 
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