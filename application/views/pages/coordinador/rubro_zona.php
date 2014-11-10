<div id="navigation">
		<div class="container-fluid">
			<a href="#" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/">
						<span>Panel</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>coordinador/productores_zona">
						<span>Productores</span>
					</a>
				</li>
				<li class='active'>
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
                        <h1>Rubros de <?php echo $municipio['nombre']; ?></h1>
                    </div>
                    <div class="pull-right">  
                   		<p><i class="icon-signout"></i> Exportar</p><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/inventario/pdf/<?php echo $_SESSION['id']; ?>'">PDF</button><button class="btn btn-primary" onClick="location.href='<?php echo base_url();?>exportar/inventario/excel/<?php echo $_SESSION['id']; ?>'">EXCEL</button>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Rubros de <?php echo $municipio['nombre']; ?></a> 
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">  
							 
							<!--	<div class="alert">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-info-sign"></i> <strong>Algo que deberias saber!</strong> debes registrar a un cliente ( cliente o intermediario ) para poder realizar una distribución y de esta manera gestionar mejor tus producciones. Para registrar un cliente nuevo haz <a href="#" style="color:#E0C300;">Click Aquí</a>.
								</div> 
                            -->
                            <?php
							if(isset($_REQUEST['alert'])){
								
								if($_REQUEST['alert']==1){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha registrado al cliente con éxito.
								</div>
							<?php
								}else if($_REQUEST['alert']==2){ ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-warning-sign"></i> <strong>Error!</strong> no se ha podido registrar el cliente, intentalo de nuevo.
								</div>
							<?php
								}
							}
							?>
                            <div class="span12" style="margin-left:0;">
                                <div class="box-content nopadding">
                                    <table class="table table-hover table-nomargin dataTable table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Rubro</th>
                                                <th>Rendimiento</th>
                                                <th>Sup. Sembrada (Ha)</th> 
                                                <th>Sup. Cosechada (Ha)</th> 
                                                <th>Producción (Ton)</th>
                                                <th>Sup. por cosechar (Ha)</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            	foreach($rubros as $rubro){
													
													$sql_sembrado = 'SELECT SUM(ps.cantidad_terreno) as sembrado FROM producciones p, producciones_siembras ps WHERE p.id_producto = '.$rubro['idproducto'].' AND ps.id_produccion = p.id';
													$cursor_sembrado = mysql_query($sql_sembrado); 
													$datos_sembrado = mysql_fetch_array($cursor_sembrado); 
													 
													$sql_cosechado = 'SELECT SUM(pc.cantidad_terreno) as area_cosechada, SUM(cc.cantidad) as tonelada_cosechada FROM producciones p, producciones_cosechas pc, calidad_cosechas cc WHERE p.id_producto = '.$rubro['idproducto'].' AND pc.id_produccion = p.id';
													$cursor_cosechado = mysql_query($sql_cosechado); 
													$datos_cosechado = mysql_fetch_array($cursor_cosechado); 
													
                                            ?>
                                                    
                                            <tr style="cursor:pointer;" title="Click para ver detalles" onClick=" ">
                                                <td><?php echo $rubro['rubro']; ?></td> 
                                                <td>
												<?php 
													 
														echo $rubro['rendimiento'];	 
												?>
                                                </td>
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
													if($datos_cosechado['tonelada_cosechada']){
														$tonelada_cosechada = $datos_cosechado['tonelada_cosechada']/1000;  
														echo $tonelada_cosechada;
													}else{ 
														echo 0;														
													}
												?>
                                                </td>
                                                <td> 
                                                <?php 
													if(($datos_cosechado['area_cosechada']) && ($datos_sembrado['sembrado'])){
														$area_cosechada = $datos_cosechado['area_cosechada']/10000;  
														echo $sembrado-$area_cosechada;
													}else{ 
														echo 0;														
													}
												?>
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