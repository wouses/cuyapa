<body>
	<div id="modal-inv" class="modal hide in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Detalle Inventario</h3>
        </div> 
        <div class="modal-body">
            <div id="alert"></div>
            <h4 style="margin-top:-5px;"><span id='producto_inv'></span></h4>
            <p style="margin-top:-5px;"><span id='modalidad_inv'></span> - <span id='uso_inv'></span></p>
             
            <table border="0" class="table table-hover table-nomargin table-condensed">
           		<thead>
                    <tr>
                        <th>Calidad</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
            	<tr>
                	<th width="150px">1era</th>
                	<td><div id='1era'></div></td>
                </tr>
                <tr>
                	<th>2da</th>
                	<td><div id='2da'></div></td>
                </tr>
                <tr>
                	<th>3era</th>
                	<td><div id='3era'></div></td>
                </tr>
                <tr>
                	<th>Sin Calificar</th>
                	<td><div id='SinCalificar'></div></td>
                </tr>
            </table>
        </div> 
        <div class="modal-footer"> 
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
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
                <li class='active'>
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
                        <h1>Inventario</h1>
                    </div>
                    <div class="pull-right">
                       <p><i class="icon-signout"></i> Exportar</p><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/inventario/pdf/<?php echo $_SESSION['id']; ?>'">PDF</button><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/inventario/excel/<?php echo $_SESSION['id']; ?>'">EXCEL</button>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Inventario</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box"> 
                            <div class="span12" >
                                <div class="box-content nopadding">
                                    <table class="table table-hover table-nomargin dataTable table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Rubro</th>
                                                <th>Variedad</th>
                                                <th>Uso</th>
                                                <th>Cantidad General</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            foreach($inventarios as $inventario){
                                            
                                            ?>
                                                    
                                            <tr style="cursor:pointer;" title="Click para ver detalles" onClick="cargar_detalle_inventario(<?php echo $inventario['id_producto']; ?>,<?php echo $inventario['id_modalidad']; ?>,<?php echo $inventario['id_uso']; ?>)">
                                                <td><?php echo $inventario['rubro']; ?></td>
                                                <td><?php echo $inventario['modalidad']; ?></td>
                                                <td><?php echo $inventario['uso']; ?></td>
                                                <td>
												<?php 
												if($inventario['cantidad']>1000){
													$cantidad_inv = $inventario['cantidad']/1000;
													echo $cantidad_inv.' Ton';
												}else{
													echo $inventario['cantidad'].' Kgs';
												}?>
                                                </td>
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
		</div>

	</body>
</html>