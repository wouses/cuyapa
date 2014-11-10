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
				<li>
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
                        <li>
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
                <li class="active">
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
                        <h1>Comentarios</h1>
                    </div>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="#">Comentarios</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box"> 
                            <div class="span12" >
								<?php 
                                if(isset($_REQUEST['alert'])){
                                    
                                    if($_REQUEST['alert']==1){ ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <i class="icon-ok-sign"></i> <strong>Excelente!</strong> El comentario ha sido eliminado con éxito.
                                    </div>
                                <?php
                                    }
                                }
                                ?>
                                <div class="box-content nopadding">
                                    <table class="table table-hover table-nomargin dataTable table-bordered" >
                                        <thead>
                                            <tr>
                                            	<th width="50px">#</th>
                                                <th>Enviado por</th>
                                                <th>desde</th> 
                                                <th>Fecha</th> 
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=1;
                                            foreach($comentarios as $comentario){
                                            
                                            ?>    
                                            <tr style="cursor:pointer;" title="Click para ver detalles" onClick="location.href='<?php echo base_url(); ?>administrador/comentario/<?php echo $comentario['id']; ?>';">
                                            	<td><?php echo $i; ?></td>
                                                <td><?php echo $comentario['correo']; ?></td>
                                                <td><?php echo $comentario['ubicacion']; ?></td>  
                                                <td><?php echo $comentario['fecha']; ?></td>  
                                                <td>
												<?php 
													if($comentario['status']==0){
														echo "No Leido";
													}else{
														echo "Leido";	
													}; 
												?>
                                                </td> 
                                            </tr>
                                            <?php
                                                $i++;
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