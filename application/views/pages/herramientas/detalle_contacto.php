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
                <li class='active'>
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
                        <li class='active'>
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
                        <h1>Información de Contacto</h1>
                    </div>
                    
                </div>
                <div class="breadcrumbs">
                    <ul>
                    	<li>
                            <a href="<?php echo base_url(); ?>productor/herramientas/contactos">Contactos de Inter&eacute;s</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#"><?php echo $contacto['titulo']; ?></a>
                        </li>
                    </ul>
                </div>

                <div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-content">
								<div class="row-fluid">
									<div class="span4">
										<a href="img/demo/shop/4.jpg" class="colorbox-image big cboxElement"> <img src="<?php if(isset($contacto['imagen'])){  echo base_url().'img/sin_imagen_g.jpg'; } else { echo base_url().$contacto['imagen'];  } ?>" alt=""> </a>
										 
									</div>
									<div class="span8">
										<div class="product-details">
											<h4><?php echo $contacto['titulo']; ?></h4>
                                          <p style="width:350px; text-align:justify">
                                            <?php echo $contacto['texto']; ?>
                                            <br><br>
											<?php if((isset($contacto['categoria']))||(isset($contacto['producto']))){
											
												echo "<i class='icon-star'></i> <strong>Especializado para: </strong>";
												
												if(isset($contacto['categoria'])){
													
												echo $contacto['categoria'];
												
												}
												
												if((isset($contacto['categoria']))&&(isset($contacto['producto']))){
													echo " - ";	
												}
												
												if(isset($contacto['producto'])){
													
												echo $contacto['producto'];
												
												}
											}?>
                                            </p>
                                            
											<div class="price">
											<i class="icon-phone"></i> <?php echo $contacto['telefono']; ?>
											</div> 
                                            <p style="margin-top:5px;">
                                            <i class="icon-share"></i> <?php echo $contacto['url']; ?>
                                            </p> 
										  <div class="sizes">
												<h5><i class="icon-map-marker"></i> Dirección:</h5>
												<p style="width:350px; text-align:justify; margin-top:-5px;">
                                                <?php echo $contacto['direccion']; ?>
                                                <br>
												<span style="color:#999"><strong><?php echo $contacto['municipio'].' - '.$contacto['estado']; ?></strong></span>
                                                </p>
											</div>
											<div class="actions">
												<a href="<?php echo base_url(); ?>productor/herramientas/contactos" class="btn btn-large btn-primary">Regresar</a>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>
</html>