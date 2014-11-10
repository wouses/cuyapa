<body>
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
				<li class='active'>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Registros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>administrador/crear_usuario">Usuarios</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/categoria">Categorías</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/rubro">Rubros</a>
						</li>
						<li class='dropdown-submenu'>
							<a href="#" data-toggle="dropdown" class='dropdown-toggle'>Recursos</a>
							<ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>administrador/guia">Guias</a>
                                </li>
                                <li class='active'>
                                    <a href="<?php echo base_url(); ?>administrador/probabilidad_exito">Probabilidad de Éxito</a>
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
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Base de Datos</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url(); ?>administrador/base_datos/exportar">Exportar</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>administrador/base_datos/importar">Importar</a>
						</li>
                    </ul>
                </li>
               <li>
					<a href="<?php echo base_url(); ?>administrador/auditoria">
						<span>Auditoria</span>
					</a>
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
			<form action="#" method="GET" class='search-form'>
				<div class="search-pane">
					<input type="text" name="search" placeholder="Buscar">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Sección 1</span></a>
				</div>
				<ul class="subnav-menu">
					<li class='dropdown'>
						<a href="#" data-toggle="dropdown">Atajo 1</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">sub atajo 1</a>
							</li>
							<li>
								<a href="#">sub atajo 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
					<li>
						<a href="#">Atajo 3</a>
					</li>
					<li>
						<a href="#">Atajo 4</a>
					</li>
				</ul>
			</div>
			
			<div class="subnav subnav-hidden">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-right"></i><span>Sección 2</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<a href="#">Atajo 1</a>
					</li>
					<li>
						<a href="#">Atajo 2</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Probabilidades de Éxito</h1>
                    </div>
                    <div class="pull-right">
                        <button class="btn-block btn btn-lime btn-large" onClick="location.href='<?php echo base_url(); ?>administrador/probabilidad_exito/crear'"><i class="icon-plus"></i> Crear Nueva Probabilidad de Éxito</button>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Probabilidades de Éxito</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                        	<?php 
							if(isset($_REQUEST['alert'])){
								echo "<br>";
							
								if($_REQUEST['alert']==1){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> se ha realizado el registro con exito.
								</div>
							<?php
								}else if($_REQUEST['alert']==2){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Error!</strong> se ha realizado el registro, pero no se pudo guardar la imagen.
								</div>
							<?php
								}else if($_REQUEST['alert']==3){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> se ha editado el registro con exito.
								</div>
							<?php
								}else if($_REQUEST['alert']==4){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Error!</strong> se ha editado el registro, pero no se pudo modificar la imagen.
								</div>
							<?php
								}else if($_REQUEST['alert']==5){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Excelente!</strong> se ha eliminado el registro con exito.
								</div>
							<?php
								}
							
							}
							?>                       
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>Estado</th>
											<th>Municipio</th>
											<th class='hidden-480'>Fecha Inicio</th>
											<th class='hidden-480'>Fecha Final</th>
											<th>Producto</th>
										</tr>
									</thead>
									<tbody>
										<?php
										
										foreach($probabilidades as $probabilidad){
										
										?>
												
										<tr onClick="location.href='<?php echo base_url(); ?>administrador/probabilidad_exito/editar/<?php echo $probabilidad['idprobabilidad']; ?>'" style="cursor:pointer;">
											<td><?php echo $probabilidad['estado']; ?></td>
											<td><?php echo $probabilidad['municipio']; ?></td>
											<td class='hidden-480'><?php echo $probabilidad['fecha_inicio']; ?></td>
											<td class='hidden-480'><?php echo $probabilidad['fecha_final']; ?></td>
											<td><?php echo $probabilidad['rubro']; ?></td>
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