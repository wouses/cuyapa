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
				<li class='active'>
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
                        <h1>Mis Producciones</h1>
                    </div>
                    <div class="pull-right">
                        <button class="btn-block btn btn-lime btn-large" onClick="location.href='<?php echo base_url(); ?>productor/produccion/crear'"><i class="icon-plus"></i> Crear Nueva Producción</button>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Producciones</a>
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
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha realizado el registro con éxito.
								</div>
							<?php
								}else if($_REQUEST['alert']==2){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha editado el registro con éxito.
								</div>
							<?php
								}else if($_REQUEST['alert']==3){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha eliminado el registro con éxito.
								</div>
							<?php
								}else if($_REQUEST['alert']==4){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-warning-sign"></i> <strong>Error!</strong> Ya existe este registro.
								</div>
							<?php
								}
							}
							?>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered" >
									<thead>
										<tr>
											<th>Nombre</th>
											<th class='hidden-480'>Categor&iacute;a</th>
											<th class='hidden-480'>Rubro</th>
											<th class='hidden-350'>Variedad</th>
											<th class='hidden-1024'>Uso</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach($producciones as $produccion){
										
										?>
												
										<tr onclick='location.href="<?php echo base_url(); ?>productor/produccion/<?php echo $produccion['idproduccion']; ?>"' style='cursor:pointer;' title="Click para ver detalles">
											<td><?php echo '<span style="visibility:hidden">'.$produccion['idproduccion'].'</span>';  echo $produccion['nombre_produccion']; ?></td>
											<td class='hidden-480'><?php echo $produccion['categoria']; ?></td>
											<td class='hidden-480'><?php echo $produccion['rubro']; ?></td>
											<td class='hidden-350'><?php echo $produccion['modalidad']; ?></td>
											<td class='hidden-1024'><?php echo $produccion['uso']; ?></td>
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