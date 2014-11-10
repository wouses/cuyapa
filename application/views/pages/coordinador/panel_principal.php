<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="<?php echo base_url(); ?>coordinador/">
						<span>Panel</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/productores_zona">
						<span>Productores</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/rubros_zona">
						<span>Rubros</span>
					</a>
				</li> 
				<li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Proyecci&oacute;n y An&aacute;lisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu"> 
						<li>
							<a href="<?php echo base_url(); ?>coordinador/proyecciones">Proyecciones</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>coordinador/estadisticas">Estad&iacute;sticas</a>
						</li>
                    </ul>
                </li>
			</ul>
			<div class="user">
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <img src="<?php echo base_url().$_SESSION['imagen']; ?>" alt="" style="height:27px;"></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url(); ?>coordinador/configurar_cuenta">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>coordinador/ayuda">Ayuda</a>
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
				include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/coordinador/barra_lateral.php';	
			}
			else{
				include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/coordinador/barra_lateral.php';			
			}
			
			?>
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Panel</h1>
					</div>
					<div class="pull-right"> 
						<ul class="stats" style="cursor:pointer" onClick="location.href='<?php echo base_url();?>coordinador/activar_productor'">
							<li class="satgreen">
								<i class="glyphicon-user_add" style="margin-top:10px; font-size:25px;"></i>
								<div class="details">
									<span class="big"><?php echo $productores_aprobar; ?></span>
									<span>Productores por Aprobar</span>
								</div>
							</li> 
						</ul>
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Panel</a>
							<i class="icon-angle-right"></i>
						</li>
					</ul>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box"> 
							<div class="box-title">
								<h3>
									<i class=" icon-table"></i>
									Producción de <?php echo $municipio['nombre']; ?>
								</h3>
							</div>
							<div class="box-content"> 
								<table class="table table-nomargin dataTable table-bordered" >
                                    <thead>
                                        <tr>
                                            <th>Rubro</th>
                                            <th>Sup. Sembrada (Ha)</th> 
                                            <th>Sup. Cosechada (Ha)</th> 
                                            <th>Rendimiento (Ton/Ha)</th>  
                                            <th>Producción (Ton)</th> 
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    	<?php foreach($categorias as $categoria){ ?>
                                    	<tr style="background:rgba(91, 197, 6, 0.5)">
                                        	<td colspan="5"><strong><?php echo $categoria['nombre']; ?></strong></td>
                                        </tr> 
                                        <?php
											$sql_pro = 'SELECT * FROM productos WHERE id_categoria = '.$categoria['id'];
											$cursor_pro = mysql_query($sql_pro);
											
											while($datos_pro = mysql_fetch_array($cursor_pro)){
												
												$sql_sembrado = 'SELECT SUM(ps.cantidad_terreno) as sembrado FROM producciones p, producciones_siembras ps WHERE p.id_producto = '.$datos_pro['id'].' AND ps.id_produccion = p.id';
												$cursor_sembrado = mysql_query($sql_sembrado); 
												$datos_sembrado = mysql_fetch_array($cursor_sembrado); 
												
												$sql_cosechado = 'SELECT SUM(pc.cantidad_terreno) as area_cosechada, SUM(cc.cantidad) as tonelada_cosechada FROM producciones p, producciones_cosechas pc, calidad_cosechas cc WHERE p.id_producto = '.$datos_pro['id'].' AND pc.id_produccion = p.id';
												$cursor_cosechado = mysql_query($sql_cosechado); 
												$datos_cosechado = mysql_fetch_array($cursor_cosechado); 
										?>                                               
                                        <tr>
                                            <th><?php echo $datos_pro['rubro']; ?></th> 
                                            <td>
											<?php 
												if($datos_sembrado['sembrado']){
													$sembrado = $datos_sembrado['sembrado']/10000;  
													echo $sembrado;
												}else{ 
													echo 0;														
												}
											?>
                                            </td> 
                                            <td>
                                            <?php 
												if(($datos_cosechado['area_cosechada']) && ($datos_sembrado['sembrado'])){
													$area_cosechada = $datos_cosechado['area_cosechada']/10000;  
													echo $area_cosechada;
												}else{ 
													echo 0;														
												}
											?>
                                            </td>
                                            <td>
											<?php  
													echo $datos_pro['rendimiento'];	 
											?>
											</td>  
                                            <td> 
											<?php 
                                                if($datos_cosechado['tonelada_cosechada']){
                                                    $tonelada_cosechada = $datos_cosechado['tonelada_cosechada']/1000;  
                                                    echo $tonelada_cosechada;
                                                }else{ 
                                                    echo 0;														
                                                }
                                            ?>
                                            </td>  
                                        </tr>  
                                        <?php
											}
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