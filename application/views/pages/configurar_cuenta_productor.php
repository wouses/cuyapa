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
						<li class='active'>
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
                        <h1>Configurar Cuenta</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/configurar_cuenta">Configurar Cuenta</a>
							
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<div id="alert1">
                                                         
                            </div>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Informacion de la cuenta</h3>
							</div>
							<div class="box-content"> 
                                <div class="control-group" id="editar_correo">
                                    <label for="textfield" class="control-label"><strong>Correo:</strong> <?php echo $usuario['usuario']; ?><?php if($usuario['status']==0){ echo ' (esperando confirmación)'; }?></label> 
                                            <div align="right" style="margin-top:-28px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionCorreo('<?php echo $usuario['usuario']; ?>');" ><i class="icon-edit"></i> Editar</button></div>
                                </div>
                                
                                <hr>

                                <div class="control-group" id="editar_clave">
                                    <label for="textfield" class="control-label"><strong>Clave</strong> </label>
                                    <div align="right" style="margin-top:-28px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionClave('<?php echo $usuario['usuario']; ?>');" ><i class="icon-edit"></i> Editar</button></div>
                                </div>

								<hr>
                                <br>
                                <div class="control-group">
                                    <blockquote>
                                        <p>Tipo de Cuenta</p>
                                        <?php switch($usuario['tipo']) { 

                                            case 1: echo '<small>'.'Productor'.'</small>';break;
                                            case 2: echo '<small>'.'Coordinador'.'</small>';break;
                                            case 3: echo '<small>'.'Administrador'.'</small>';break;


                                        } ?>
                                    <br>
                                        <p>Fecha Creación</p>
                                        <?php 
										echo '<small>'.date('d/m/Y', $usuario['fecha']).'</small>';                                      	?>
<!--
                                    <br>
                                        <p>Último Acceso</p>
                                        <?php echo '<small>asd</small>'; ?>
                                    </blockquote>-->
                                </div> 
							</div>
                        </div>
                    </div>
                </div>
                <!-- la trampita para que crezca la barra lateral-->
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
									 
								</div>
							</div>
						</div>
					</div>
				</div>
                
			</div>
		</div> 
	</body>
</html>