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
			<form action="<?php echo base_url(); ?>productor/buscar" method="get" class='search-form'>
				<div class="search-pane">
					<input type="text" name="q" placeholder="Buscar">
					<button type="submit"><i class="icon-search"></i></button>
				</div>
			</form>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Producciones</span></a>
				</div>
				<ul class="subnav-menu">
                <?php
					$sql_producciones = 'SELECT * FROM producciones WHERE id_productor = '.$_SESSION['id'].' AND status = 0';
					$cursor_producciones = mysql_query($sql_producciones);
					
					$num_producciones = mysql_num_rows($cursor_producciones);
					
					if($num_producciones){
						
						while($producciones_s = mysql_fetch_array($cursor_producciones)){
				?>
					<li>
						<a href="<?php echo base_url().'productor/produccion/'.$producciones_s['id']; ?>"><?php echo $producciones_s['nombre']; ?></a>
					</li>
                <?php
						}
					}else{
				?>
                	<li>
						<a href="<?php echo base_url().'productor/produccion'; ?>">No hay producciones</a>
					</li>                
                <?php
					}
				?>
				</ul>
			</div>
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class="toggle-subnav"><i class="icon-angle-down"></i><span>Inventario</span></a>
				</div>
				<div class="subnav-content" style="display: block;">
					<ul class="quickstats">
                    	<?php 
						$sql_inventario = 'SELECT * FROM inventario WHERE id_productor ='.$_SESSION['id'].' group by id_producto';
						$cursor_inventario = mysql_query($sql_inventario);
						
						$num_inventario = mysql_num_rows($cursor_inventario);
						
						if($num_inventario){
							
							while($inventario_s = mysql_fetch_array($cursor_inventario)){
								
								$sql_proin = 'SELECT * FROM inventario WHERE id_productor ='.$_SESSION['id'].' AND id_producto ='.$inventario_s['id_producto'];
								$cursor_proin = mysql_query($sql_proin);
								$cantidadi = 0;
								
								while($cantidad_productoi = mysql_fetch_array($cursor_proin)){
									
									$cantidadi += $cantidad_productoi['cantidad'];
									
								}
								
								$sql_producto = 'SELECT * FROM productos WHERE id='.$inventario_s['id_producto'];
								$cursor_producto = mysql_query($sql_producto);
								
								$productoi = mysql_fetch_array($cursor_producto); 
								
								
								
						?>
						<li>
							<span class="value"><?php if($cantidadi >= 1000){ echo $cantidadi/1000; echo '<span style="font-size:12px">Ton</span>'; }else{ echo $cantidadi.'<span style="font-size:12px">Kgs</span>';  } ?></span>
							<span class="name"><?php echo $productoi['rubro']; ?></span>
						</li>
                        <?php
							}
						}else{
						?>
                        <li style="text-align:left;">No hay inventario</li>
                        <?php
						}
						?>
					</ul>
				</div>
			</div>
            <?php
			$sql_anunciante = 'SELECT * FROM anunciantes ORDER BY RAND() LIMIT 2';
			$cursor_anunciante = mysql_query($sql_anunciante);
			
			$num_anunciante = mysql_num_rows($cursor_anunciante);
			
			if($num_anunciante){
			?>
            <div class="subnav">
				<div class="subnav-title">
					<a href="#" class="toggle-subnav"><i class="icon-angle-down"></i><span>Anunciantes</span><span class="icon-bullhorn"></span> </a>
				</div>
				<div class="subnav-content">
					<ul class="userlist">
                    <?php
						while ($anunciante_s = mysql_fetch_array($cursor_anunciante)){
					?>
						<li>
							<a href="#"><img src="<?php echo base_url().$anunciante_s['imagen']; ?>" alt=""></a>
							<div class="user">
								<span class="name">
									<?php echo $anunciante_s['titulo']; ?>
								</span>
								<span class="position">
									<?php echo $anunciante_s['texto']; ?>
								</span>
							</div>
						</li>
                    <?php
						}
					?>
					</ul>
				</div>
			</div>
            <?php
			}
			?>
		</div>
		<div id="main">
			<div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Editar Producción</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/produccion">Producciones</a>
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
								<form action="<?php echo base_url(); ?>productor/produccion/crear" method="POST" class="form-horizontal " name="form_crear_produccion" >
									<input type="hidden" name="enviar" value="1">
									<input type="hidden" name="productor" value="<?php echo $_SESSION['id']; ?>">
									<div class="control-group">
										<label for="textfield" class="control-label">Nombre</label>
										<div class="controls">
											<input type="text" name="nombre" id="nombre" class="input-xlarge" data-rule-required="true" value="<?php if(isset($nombre)){ echo $nombre; } ?>">
										</div>
									</div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Categoría</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_categoria" id="categoria-select" class="chosen-select" onChange="cargar_rubros()">
												<?php if(isset($categoria_sel)){ ?>
                                                    <option value="<?php echo $categoria_sel['id']; ?>"><?php echo $categoria_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value=""></option>
                                                <?php } ?>
                                                <?php foreach($categorias as $categoria){ 
                                                	
                                                	if(isset($categoria_sel)){
														
														if($categoria_sel['id'] != $categoria['id']){
												?>
													
													<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
												<?php
														}
													}else{
												?>
													
													<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
												<?php	
													}
												}	
                                               	?>	
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Rubro</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_producto" id="rubro-select" class="chosen-select" onChange="cargar_modalidad_producto()">
                                            	<?php if(isset($rubro_sel)){ ?>
                                                    <option value="<?php echo $rubro_sel['idproducto']; ?>"><?php echo $rubro_sel['rubro']; ?></option>
                                                <?php }else{ ?>
                                                    <option value=""></option>
                                                <?php } 
													
														if(isset($rubros)){ 
                                                        
                                                        	foreach($rubros as $rubro){ 
                                                            
                                                         	   if($rubro_sel['idproducto'] != $rubro['idproducto']){
												?>
													
													<option value="<?php echo $rubro['idproducto']; ?>"><?php echo $rubro['rubro']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Modalidad</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_modalidad" id="modalidad-select" class="chosen-select" onChange="cargar_uso_modalidad()">
                                               <?php if(isset($modalidad_sel)){ ?>
                                                    <option value="<?php echo $modalidad_sel['id']; ?>"><?php echo $modalidad_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value=""></option>
                                                <?php } 
													
														if(isset($modalidades)){ 
                                                        
                                                        	foreach($modalidades as $modalidad){ 
                                                            
                                                         	   if($modalidad_sel['id'] != $modalidad['id']){
												?>
													
													<option value="<?php echo $modalidad['id']; ?>"><?php echo $modalidad['nombre']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="textfield" class="control-label">Uso</label>
                                        <div class="controls">
                                            <div style="width:285px;">
                                            <select name="id_uso" id="uso-select" class="chosen-select">
                                               <?php if(isset($uso_sel)){ ?>
                                                    <option value="<?php echo $uso_sel['id']; ?>"><?php echo $uso_sel['nombre']; ?></option>
                                                <?php }else{ ?>
                                                    <option value=""></option>
                                                <?php } 
													
														if(isset($usos)){ 
                                                        
                                                        	foreach($usos as $uso){ 
                                                            
                                                         	   if($uso_sel['id'] != $uso['id']){
												?>
													
													<option value="<?php echo $uso['id']; ?>"><?php echo $uso['nombre']; ?></option>
												<?php
																}
                                                        
															}
												 		 }
												 ?>
                                            </select>
                                           	</div>
                                        </div>
                                    </div>
									
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar6()">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>productor/produccion'">Cancelar</button>
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