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
                        <li class="active">
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
                        <h1>Usos</h1>
                    </div>
                    <div class="pull-right">
                        <button class="btn-block btn btn-lime btn-large" onClick="location.href='<?php echo base_url(); ?>administrador/uso/crear'"><i class="icon-plus"></i> Crear Nuevo Uso</button>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Usos</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<?php 
							if(isset($_REQUEST['alert'])){ 
							
								if($_REQUEST['alert']==1){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> Se ha realizado el registro con exito.
								</div>
							<?php
								}else if($_REQUEST['alert']==2){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Error!</strong> Ya existe este registro.
								</div>
							<?php
								}else if($_REQUEST['alert']==3){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> Se ha editado el registro con exito.
								</div>
							<?php
								}else if($_REQUEST['alert']==4){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Error!</strong> Se ha editado el registro, pero no se pudo modificar la imagen.
								</div>
							<?php
								}else if($_REQUEST['alert']==5){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> Se ha eliminado el registro con exito.
								</div>
							<?php
								}
							
							}
							?>  
                       
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>Nombre</th>
										</tr>
									</thead>
									<tbody>
										<?php
										
										foreach($usos as $uso){
										
										?>
												
										<tr onClick="location.href='<?php echo base_url(); ?>administrador/uso/editar/<?php echo $uso['id']; ?>'" style="cursor:pointer;">
											<td><?php echo $uso['nombre']; ?></td>
										</tr>
										<?php
											
											}
										?>
									</tbody>
								</table>
							</div>
                        </div>
                    </div>
                </div>
		</div>
		</div>

	</body>
</html>