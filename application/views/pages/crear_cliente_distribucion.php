<style>
.ced .chzn-search{ display:none; }
</style>
<body>
	<div id="modal-cli-dis" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Confirmar Registro</h3>
        </div> 
        <div class="modal-body" style="min-height:50px;">
            <div id="alert"></div>
            <p style="margin-top:-5px;">¿Seguro deseas registrar este cliente?</p> 
             
            <form action="<?php echo base_url(); ?>productor/otros/cliente/crear" method="POST" class="form-horizontal " name="form_crear_cliente_distribucion"> 
            
				<input type="hidden" name="enviar" value="1">
            	<input type="hidden" id='tipo_cedula_rif_cli' name='tipo_cedula_rif_cli'>
                <input type="hidden" id='cedula_rif_cli' name='cedula_rif_cli' >
                <input type="hidden" id='nombre_cli' name='nombre_cli'>
                <input type="hidden" id='direccion_cli' name='direccion_cli'>
                
            </form>
        </div> 
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" onClick="enviar_registro_cliente()">Aceptar</button>
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
                        <h1>Crear Cliente</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul> 
                        <li>
                            <a href="<?php echo base_url(); ?>productor/distribucion">Clientes</a><i class="icon-angle-right"></i>
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
								<form action="<?php echo base_url(); ?>productor/otros/cliente/editar" method="POST" class="form-horizontal " name="form_cliente_distribucion">
									
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Cédula / RIF <span class="rojito" title="Campo Obligatorio">*</span></label>
                                        <div class="controls">
                                              <div style="width:65px; float:left" class="ced">
                                              <select name="tipo_cedula_rif" id="tipo_cedula_rif" class="chosen-select" title="Tipo de documento del cliente" >
                                                    <?php if(!isset($cliente['tipo_cedula_rif'])){ ?>
                                                    <option value="">--</option>
                                                    <?php }else{ ?>
                                                    <option><?php echo $cliente['tipo_cedula_rif']; ?></option>
                                                    <?php } ?>
                                                    <?php if($cliente['tipo_cedula_rif']!='V'){ ?><option>V</option><?php } ?>
                                                    <?php if($cliente['tipo_cedula_rif']!='E'){ ?><option>E</option><?php } ?>
                                                    <?php if($cliente['tipo_cedula_rif']!='J'){ ?><option>J</option><?php } ?>
                                                </select> 
                                            </div>
                                            <input type="text" title="Número de cédula o RIF del cliente"  name="cedula_rif" value="<?php if(isset($cliente['cedula_rif'])){ echo $cliente['cedula_rif']; } ?>"  id="cedula_rif"  maxlength="9"  class="num_only input-xlarge" style="width:200px; margin-left:5px;">
                                        </div>
                                    </div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
										<div class="controls">
											<input type="text" name="nombre" id="nombre" class="input-xlarge" title="Nombre del cliente" value="<?php if(isset($nombre)){ echo $nombre; } ?>">
										</div>
									</div>
                                    <div class="control-group">
                                        <label for="textarea" class="control-label">Dirección Fiscal o Referencial</label>
                                        <div class="controls">
                                            <textarea name="direccion" id="direccion" class="input-xlarge" style="height:90px;" title="Dirección fiscal o referencial del cliente"><?php if(isset($productor['direccion'])){ echo $productor['direccion']; } ?></textarea>
                                        </div>
                                    </div> 
									
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar16()">Guardar</button>
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