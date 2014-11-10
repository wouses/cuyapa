<?php
$nombre_url = str_replace(' ','_',$productor['nombre']);
$nombre_url = strtolower($nombre_url);
?>
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
                        <h1><?php echo $productor['nombre']; ?></h1>
                        <p ><?php echo $productor['tipo_cedula_rif'].'-'.$productor['cedula_rif']; ?></p>
                        <p style="margin-top:-15px;"><?php echo $parroquia['nombre'].' - '.$sector['nombre']; ?></p>
                    </div>
                    <?php
                        $nombre_url = str_replace(' ','_',$productor['nombre']);
                        $nombre_url = strtolower($nombre_url);
                    ?>
                    <div class="pull-right">
                   		<button class="btn btn-primary" ><i class="icon-signout"></i> Exportar</button>
                        <br>
                        <div class="btn-group" style="margin-top:10px;">
                            <a href="#" data-toggle="dropdown" class="btn dropdown-toggle"><i class="icon-cog"></i> Opciones <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="margin-left:-25px;">
                                <li>
                                    <a href="<?php echo base_url(); ?>coordinador/productores_zona/<?php echo $productor['id']; ?>/<?php echo $nombre_url;  ?>/editar">Editar</a>
                                </li>
								<?php if($productor['id_usuario']==0){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>coordinador/asignar_usuario_productor/<?php echo $productor['id']; ?>">Asignar Usuario</a>
                                </li>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>coordinador/productores_zona">Productores de <?php echo $municipio['nombre']; ?></a>
                       		<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#"><?php echo $productor['nombre']; ?></a>
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
									<i class="icon-ok-sign"></i> <strong>Excelente!</strong> se ha registrado la producci&oacute;n con éxito.
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

                            <div class="span12" style="margin-left:0;">
                                <div class="box-title">
                                    <h3>
                                        <i class="glyphicon-leaf"></i>
                                        Producciones
                                    </h3>
                                    <div class="pull-right" style="padding-top:0">
                                    	<button class="btn btn-lime" onClick="location.href='<?php echo base_url(); ?>coordinador/productores_zona/<?php echo $productor['id'].'/'.$nombre_url; ?>/produccion/crear'"><i class="icon-plus"></i> Crear Nueva Producción</button>
                                    </div>
                                </div>
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

                                            <tr onclick='location.href="<?php echo base_url(); ?>coordinador/productores_zona/<?php echo $productor['id'].'/'.$nombre_url.'/produccion/'.$produccion['idproduccion']; ?>"' style='cursor:pointer;' title="Click para ver detalles">
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


                            <div class="span12" style="margin-left:0; margin-top:10px;">

                                <div class="box-title" style="margin-top:10px;">
                                    <h3>
                                        <i class="glyphicon-cargo"></i>
                                        Inventario
                                    </h3>
                                </div>
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