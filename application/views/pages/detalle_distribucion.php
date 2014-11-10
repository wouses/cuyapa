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
                <li class='active'>
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
                        <h1>Detalle Distribución</h1>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/distribucion">Distribución</a>
                       		<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Detalle</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box"> 
                            <div class="span12" >
                                <div class="box-content "> 
                                    <h1><?php echo $distribucion['nombre']; ?></h1>
                                    <p><strong>Cédula / RIF:</strong> <?php echo $distribucion['tipo_cedula_rif'].'-'.$distribucion['cedula_rif']; ?></p>
                                    <p><strong>Dirección:</strong> <?php echo $distribucion['direccion']; ?></p>
                                    <p><strong>Fecha:</strong> <?php echo $distribucion['fecha']; ?></p> 
									
                                    <br>
                                    
                                    <p><strong>Rubros:</strong></p> 
                                    <div class="box-content nopadding">
                                        <table class="table table-hover table-nomargin table-bordered" >
                                            <thead>
                                                <tr>
                                                    <th>Rubro</th>
                                                    <th>Variedad</th>
                                                    <th>Uso</th> 
                                                    <th>Cantidad</th> 
                                                    <th>Calidad</th>  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach($productos_distribucion as $producto){
                                                
                                                ?>
                                                        
                                                <tr>
                                                    <td><?php echo $producto['rubro']; ?></td>
                                                    <td><?php echo $producto['modalidad']; ?></td>
                                                    <td><?php echo $producto['uso']; ?></td>
                                                    <td>
													<?php 
														if($producto['cantidad'] >= 1000){
															$cantidad = $producto['cantidad'] / 1000;
															
															echo $cantidad.' Ton';
														}else{
															echo $producto['cantidad'].' Kgs';
														} 
													?>
                                                    </td>
                                                    <td><?php echo $producto['calidad']; ?></td>
                                                    
                                                </tr>
                                                <?php
                                                    
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
									</div>
                                    <a href="<?php echo base_url(); ?>productor/distribucion" class="btn btn-primary" style="float:right"> Regresar</a> 
                                    
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
		</div>
		</div>

	</body>
</html>