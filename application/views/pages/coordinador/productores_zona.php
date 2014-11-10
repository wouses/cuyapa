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
				<li class='active'>
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
                        <h1>Productores de <?php echo $municipio['nombre']; ?></h1>
                    </div>
                    <div class="pull-right">  
                   		<button class="btn btn-primary" ><i class="icon-signout"></i> Exportar</button> 
                        <br> 
                        <div class="btn-group" style="margin-top:10px;">
                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i> Opciones <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="margin-left:-25px;">
                                <li>
                                    <a href="<?php echo base_url(); ?>coordinador/registrar_productor">Crear Productor</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>coordinador/asignar_usuario_productor">Asignar Usuario</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>coordinador/activar_productor">Activar Cuenta</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Productores de <?php echo $municipio['nombre']; ?></a> 
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
								}else if($_REQUEST['alert']==3){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha asignado el usuario a el productor con éxito.
								</div>
							<?php
								}else if($_REQUEST['alert']==4){ ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha registrado el productor con éxito.
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
                                                <th>Cédula / RIF</th>
                                                <th>Nombre</th> 
                                                <th>Sup. Terreno Total (Ha)</th> 
                                                <th>Sup. Sembrada (Ha)</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            	foreach($productores as $productor){ 
													
												$nombre_url = str_replace(' ','_',$productor['nombre']);
												$nombre_url = strtolower($nombre_url);
                                            ?>
                                                    
                                            <tr style="cursor:pointer;" title="Click para ver detalles" onClick="location.href='<?php echo base_url().'coordinador/productores_zona/'.$productor['id'].'/'.$nombre_url; ?>' ">
                                                <td><?php echo $productor['tipo_cedula_rif'].'-'.$productor['cedula_rif']; ?></td> 
                                                <td><?php echo $productor['nombre']; ?></td> 
                                                <td><?php echo $productor['cantidad_terreno']/10000; ?></td>
                                                <td><?php echo $productor['sembrado']/10000; ?></td>  
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