<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>productor" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<a href="<?php echo base_url(); ?>administrador">
						<span>Panel</span>
					</a>
				</li>
				<li>
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