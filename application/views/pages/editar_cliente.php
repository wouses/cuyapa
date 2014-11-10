<body>
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
                <li class='active'>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Otros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">     
                        <li class='active'>
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
                        <h1>Editar Cliente</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/otros/clientes">Clientes</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Editar</a>
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
                                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.
                                </div>
                                <?php
                                    }
                                }
                                ?>	
                            </div> 
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Detalles del registro</h3>
                                <a href="<?php echo base_url(); ?>administrador/otros/cliente/eliminar/<?php echo $clientes['id']; ?>" onClick="return confirm('Deseas eliminar el registro? No podras recuperar la información');" class="btn btn-danger" style="float:right"><i class="icon-trash"></i> Eliminar</a>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>productor/otros/cliente/editar" method="POST" class="form-horizontal" name="form_editar_distribucion" >
									<input type="hidden" name="id" value="<?php echo $clientes['id']; ?>" >
									<div class="control-group">
                                        <label for="textfield" class="control-label">Cédula / RIF <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                              <div style="width:65px; float:left" class="ced">
                                              <select name="tipo_cedula_rif" id="tipo_cedula_rif" class="chosen-select" title="Tipo de documento del cliente" >
                                                    <?php if(!isset($clientes['tipo_cedula_rif'])){ ?>
                                                    <option value="">--</option>
                                                    <?php }else{ ?>
                                                    <option><?php echo $clientes['tipo_cedula_rif']; ?></option>
                                                    <?php } ?>
                                                    <?php if($clientes['tipo_cedula_rif']!='V'){ ?><option>V</option><?php } ?>
                                                    <?php if($clientes['tipo_cedula_rif']!='E'){ ?><option>E</option><?php } ?>
                                                    <?php if($clientes['tipo_cedula_rif']!='J'){ ?><option>J</option><?php } ?>
                                                </select> 
                                            </div>
                                            <input type="text" title="Número de cédula o RIF del cliente"  name="cedula_rif" value="<?php if(isset($clientes['cedula_rif'])){ echo $clientes['cedula_rif']; } ?>"  id="cedula_rif"  maxlength="10" class="input-xlarge" style="width:200px; margin-left:5px;">
                                        </div>
                                    </div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="nombre" id="nombre" class="input-xlarge" title="Nombre del cliente" value="<?php if(isset($clientes['nombre'])){ echo $clientes['nombre']; } ?>">
										</div>
									</div>
                                    <div class="control-group">
                                        <label for="textarea" class="control-label">Dirección Fiscal o Referencial</label>
                                        <div class="controls">
                                            <textarea name="direccion" id="direccion" class="input-xlarge" style="height:90px;" title="Dirección fiscal o referencial del cliente"><?php if(isset($clientes['direccion'])){ echo $clientes['direccion']; } ?></textarea>
                                        </div>
                                    </div> 
																	
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar23()">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>productor/otros/clientes'">Cancelar</button>
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