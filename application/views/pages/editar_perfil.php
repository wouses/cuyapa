<style>
.ced .chzn-search{ display:none; }
 /* Bootstrap Css Map Fix*/
#thirds33 #mapita img { 
 max-width: none;
vertical-align: baseline;
}


/* Bootstrap Css Map Fix*/
#thirds33 #mapita label { 
  width: auto; display:inline; 
} 


</style> 

<script src="http://maps.google.com/maps/api/js?key=AIzaSyCMpIyd8x6tH6UeFt4FxoiWIcuo9m6KW3M&sensor=true&libraries=places"></script>
<script src="<?php echo base_url(); ?>js/gmap.js"></script>

<script>
function initialize() {
	var input = document.getElementById('ubicacion');
	var autocomplete = new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
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
						<li class='active'>
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
						<h1>Editar Perfil</h1>
					</div>
					<div class="pull-right">
						&nbsp;
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="#">Editar Perfil</a>
						</li>
					</ul>
				</div>
				<div class="row-fluid">
                    <div class="span12">
                    	<div class="box">
                        	<div id="alert1">
								<?php if(isset($productor['descripcion'])){
                                    if(($productor['descripcion']=='')&&(!isset($error))){
                                ?>
                                <div class="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-info-sign"></i> <strong>Algo que deberias saber!</strong> El perfil es tu portal al público para que conozcan de ti, de tus productos y darles la posibilidad de contactarte.
                                </div>
                                <?php
                                    }
                                }?>
                                <?php if(isset($error)){
                                    if($error=='1'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-info-sign"></i> <strong>Excelente!</strong> El perfil ha sido actualizado con éxito.
                                </div>
                                <?php
                                    }else if($error=='2'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> El producto ha sido agregado con éxito.
                                </div>
                                <?php
                                    }else if($error=='3'){
                                ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-warning-sign"></i> <strong>Error!</strong> El producto ya se encuentra agregado.
                                </div>
                                <?php
									}else if($error=='4'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> El producto ha sido eliminado con éxito.
                                </div>
                                <?php
                                    }else if($error=='5'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> Las redes sociales han sido agregadas con éxito.
                                </div>
                                <?php
                                    }else if($error=='6'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> Los datos de ubicación y terreno han sido actualizados con éxito.
                                </div>
                                <?php
                                    }else if($error=='7'){
                                ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-warning-sign"></i> <strong>Error!</strong> La especificación de tu ubicación no pudo ser guardada, intentalo de nuevo.
                                </div>
                                <?php
                                    }else if($error=='8'){
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> Hemos guardado la especificación de tu ubicación con éxito.
                                </div>
                                <?php
                                    }
                                }?>
                        	</div>
                        
                        <br>
                        	 
                            <div class="box-content nopadding">
                                <div class="tabs-container"> 
                                    <ul class="tabs tabs-inline tabs-top" style="margin-bottom:-2px;" id="mytab">
                                        <li <?php if(!isset($enviar)){ ?> class="active" <?php } if(isset($enviar)){ if($enviar==1){ ?> class="active" <?php }} ?>>
                                            <a href="#first11" data-toggle="tab"><i class="icon-pencil"></i> General</a>
                                        </li>
                                        <li <?php if(isset($enviar)){ if($enviar==2){ ?> class="active" <?php }} ?>>
                                            <a href="#second22" data-toggle="tab"><i class="icon-truck"></i> Rubros</a>
                                        </li>
                                        <li <?php if(isset($enviar)){ if($enviar==3){ ?> class="active" <?php }} ?>>
                                            <a href="#thirds33" data-toggle="tab"><i class="icon-globe"></i> Ubicaci&oacute;n y Terreno</a>
                                        </li>
                                        <li <?php if(isset($enviar)){ if($enviar==4){ ?> class="active" <?php }} ?>>
                                            <a href="#fourth44" data-toggle="tab"><i class="icon-facebook"></i> Redes Sociales</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content padding tab-content-bottom">
                                    <div class="tab-pane <?php if(!isset($enviar)){ echo 'active'; } if(isset($enviar)){ if($enviar==1){ echo 'active'; } }?>" id="first11" style="padding-left:25px;">
                                     
                                    <form action="<?php echo base_url(); ?>productor/editar_perfil" method="post" enctype="multipart/form-data" name="form_perfil_general">
                                    <input type="hidden" name="enviar" value="1">
                                    <input type="hidden" name="productor" value="<?php echo $_SESSION['id']; ?>">
                                        <div style="width:600px;">
                                        	<div style="float:left; margin-right:100px;">
                                                <div class="control-group">
                                                    <label for="textfield" class="control-label">Logo Corporativo</label>
                                                    <div class="controls">
                                                         <div class="fileupload <?php if($productor['imagen']!=''){ echo 'fileupload-exists'; }else{ echo 'fileupload-new'; } ?>" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px; "><img src="<?php echo base_url(); ?>img/sin_imagen.jpg"></div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                            <?php if($productor['imagen']!=''){ ?>
                                                            <img src="<?php echo base_url();?><?php echo $productor['imagen']; ?>" />
                                                            <?php } ?>
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name="imagefile" id="imagefile" value="<?php echo $productor['imagen']; ?>"></span>
                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onClick='eliminarImagenPerfil(<?php echo $productor['id']; ?>,1);'>Quitar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="float:left;">
                                                <div class="control-group">
                                                    <label for="textfield" class="control-label">Fondo Portada</label>
                                                    <div class="controls">
                                                         <div class="fileupload <?php if($productor['imagen_portada']!=''){ echo 'fileupload-exists'; }else{ echo 'fileupload-new'; } ?>" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px; "><img src="<?php echo base_url(); ?>img/sin_imagen.jpg"></div>
                                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                                            <?php if($productor['imagen_portada']!=''){ ?>
                                                            <img src="<?php echo base_url();?><?php echo $productor['imagen_portada']; ?>" />
                                                            <?php } ?>
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name="imagefile2" value=""></span>
                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onClick='eliminarImagenPerfil(<?php echo $productor['id']; ?>,2);'>Quitar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                        <hr>
                                        <div style="float:left; margin-right:30px;">   
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="nombre" title="Su nombre o el de la compañia" id="nombre" class="input-xlarge" data-rule-required="true" value="<?php if(isset($productor['nombre'])){ echo $productor['nombre']; } ?>">
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Cédula / RIF <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                <div class="controls">
                                                  <div style="width:65px; float:left" class="ced">
                                                  <select name="tipo_cedula_rif" id="tipo_cedula_rif" class="chosen-select" >
                                                        <?php if(!isset($productor['tipo_cedula_rif'])){ ?>
                                                        <option value="">--</option>
                                                        <?php }else{ ?>
                                                        <option><?php echo $productor['tipo_cedula_rif']; ?></option>
                                                        <?php } ?>
                                                        <?php if($productor['tipo_cedula_rif']!='V'){ ?><option>V</option><?php } ?>
                                                        <?php if($productor['tipo_cedula_rif']!='E'){ ?><option>E</option><?php } ?>
                                                        <?php if($productor['tipo_cedula_rif']!='J'){ ?><option>J</option><?php } ?>
                                                    </select> 
                                                    </div>
                                                    <input type="text" title="Número de cédula o RIF"  name="cedula_rif" value="<?php if(isset($productor['cedula_rif'])){ echo $productor['cedula_rif']; } ?>"  id="cedula_rif"  maxlength="9" class="input-xlarge num_only" style="width:200px; margin-left:5px;">
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label for="textarea" class="control-label">Sobre Nosotros</label>
                                                <div class="controls">
                                                    <textarea name="descripcion" id="descripcion" class="input-xlarge" style="height:90px;" placeholder="Breve descripción sobre tú negocio" title="Breve descripción sobre tú negocio" maxlength="750" ><?php if(isset($productor['descripcion'])){ echo $productor['descripcion']; } ?></textarea>
                                                </div>
                                            </div> 
                                        
                                        </div>
                                        <div style="float:left; ">
                                            
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Teléfono <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                <div class="controls">
                                                <?php if(isset($productor['telefono'])){  $telefono = explode('-',$productor['telefono']); } ?>
                                                  <div style="width:65px; float:left" class="ced">
                                                  <select name="codigo_telefono" id="codigo_telefono" class="chosen-select" >
                                                        <?php if(!isset($telefono[0])){ ?>
                                                        <option value="">--</option>
                                                        <?php }else{ ?>
                                                        <option><?php echo $telefono[0]; ?></option>
                                                        <?php } ?>
                                                        <?php if($telefono[0]!='0412'){ ?><option>0412</option><?php } ?>
                                                        <?php if($telefono[0]!='0414'){ ?><option>0414</option><?php } ?>
                                                        <?php if($telefono[0]!='0424'){ ?><option>0424</option><?php } ?>
                                                        <?php if($telefono[0]!='0416'){ ?><option>0416</option><?php } ?>
                                                        <?php if($telefono[0]!='0426'){ ?><option>0426</option><?php } ?>
                                                    </select> 
                                                    </div>
                                                    <input type="text" title="Número de contacto(solo numeros)"  name="telefono"  id="telefono" value="<?php if(isset($telefono[1])){ echo $telefono[1]; } ?>" maxlength="7"  pattern="\d*" class="input-xlarge num_only" style="width:200px; margin-left:5px;">
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label for="textfield" class="control-label">Correo</label>
                                                <div class="controls">
                                                    <input type="text" name="correo" title="Correo electrónico" id="correo" class="input-xlarge" value="<?php if(isset($productor['correo'])){ echo $productor['correo']; } ?>" readonly> <a href="#" class="btn" style="margin-top:-10px;" rel="popover" data-trigger="hover" title="" data-content="El correo electronico esta directamente asociado a tu cuenta, por lo que deberas modificarlo en 'Configuración de la Cuenta' " data-original-title="Correo no editable"><i class="icon-question-sign" style="size:12px;"></i></a>
                                                </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                <label for="textarea" class="control-label">Dirección Fiscal o Referencial <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                <div class="controls">
                                                    <textarea name="direccion" id="direccion" class="input-xlarge" style="height:90px;" title="Donde te encuentras ubicado"><?php if(isset($productor['direccion'])){ echo $productor['direccion']; } ?></textarea>
                                                </div>
                                            </div> 
                                                <button type="button" style="float:right; margin-right:30px;" class="btn btn-primary" onClick="validar7()">Guardar</button>
                                            </div>                            
                                   		</div>
                                    </form> 
                                    
                                    <div class="tab-pane <?php if(isset($enviar)){ if($enviar==2){ echo 'active'; }} ?>" id="second22">
                                    	<div class="span11">
                                    		<h3 style="padding-top:0;margin-top:0px;">Agregar Rubro</h3>
                                            <form method="post" action="<?php echo base_url(); ?>productor/editar_perfil" name="form_perfil_productos">
                                            <input type="hidden" name="enviar" value="2">
                                            <table border="0">
                                                <tr>
                                                    <td>
                                                        <div class="control-group">
                                                            <label for="textfield" class="control-label">Categoría <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                            <div class="controls">
                                                                <div style="width:285px;">
                                                                <select name="id_categoria" id="categoria-select" class="chosen-select" onChange="cargar_rubros()">
                                                                        <option value=""></option>
                                                                    
                                                                    <?php 
                                                                    foreach($categorias as $categoria){ 
                                                                        
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
                                                    </td>
                                                    <td>
                                                        <div class="control-group">
                                                        <label for="textfield" class="control-label">Rubro <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                        <div class="controls">
                                                            <div style="width:285px;">
                                                            <select name="id_producto" id="rubro-select" class="chosen-select" onChange="cargar_modalidad_uso()">
                                                                <option value=""></option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div style="margin-top:10px;">
                                                            <button type="button" class="btn btn-primary" onClick="validar8()">Agregar</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            </form>
                                        </div>
                                         <div class="span11" style="margin-left:0px;">
                                            <div class="box-content nopadding">
                                                <table class="table table-bordered table-condensed dataTable dataTable-noheader ">
                                                    <thead>
                                                        <tr>
                                                            <th>Categoría</th>
                                                            <th>Rubro</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>  
                                                    	<?php
														
															foreach ( $productos as $producto ){
														?>
                                                        <tr style="cursor:pointer;">
                                                            <td><?php echo $producto['categoria']; ?></td>
                                                            <td><?php echo $producto['rubro']; ?></td>
                                                            <td>
                                                            <div align='center'>
                                                            
                                                            <a onClick="document.getElementById('myForm').submit();" style='color:red; cursor:pointer;'><i class='icon-remove'></i> Eliminar</a>
                                                            </div>
                                                            </td>
                                                            <form id="myForm" action="<?php echo base_url(); ?>productor/editar_perfil" method="post">
                                                            	<input type="hidden" name="enviar" value="21" />
                                                                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>" />
                                                            
                                                       		</form>
                                                        </tr>
                                                        
                                                        <?php
															}
														?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane <?php if(isset($enviar)){ if($enviar==3){ echo 'active'; }} ?>" id="thirds33" >
                                    	<form method="post" action="<?php echo base_url(); ?>productor/editar_perfil" name="form_perfil_ubi">
                                        <input type="hidden" name="enviar" value="3">
                                        <input type="hidden" name="estado" value="4">
                                        <input type="hidden" name="municipio" value="40">
                        				<table width="600px">
                                        	<tr>
                                               <!-- <td>
                                               		<div class="control-group">
                                                        <label for="textfield" class="control-label">Municipio <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                        <div class="controls">
                                                            <div style="width:285px;">
                                                            <select name="municipio" id="municipio_l" title="Selecciona tu Municipio" class="chosen-select" onChange="cargar_parroquias();">
																<?php 
																if(isset($municipio_sel)){ ?>
                                                                    <option value="<?php echo $municipio_sel['id']; ?>"><?php echo $municipio_sel['nombre']; ?></option>
																	<?php 
                                                                    foreach($municipios as $municipio){
                                                                        
																		if($municipio['id'] != $municipio_sel['id']){
																			echo "<option value='".$municipio['id']."'>".$municipio['nombre']."</option>";
																		}
                                                               		}
                                                           		}	
															?>
                                                       		</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>-->
                                                <td>
                                               		<div class="control-group">
                                                        <label for="textfield" class="control-label">Parroquia <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                        <div class="controls">
                                                            <div style="width:285px;">
                                                            <select name="parroquia" id="parroquia_l" title="Selecciona tu Parroquia" class="chosen-select" onChange="cargar_sectores();">
																<?php 
																if(isset($parroquia_sel)){ ?>
                                                                    <option value="<?php echo $parroquia_sel['id']; ?>"><?php echo $parroquia_sel['nombre']; ?></option>
																	<?php 
                                                                    foreach($parroquias as $parroquia){
                                                                        
																		if($parroquia['id'] != $parroquia_sel['id']){
																			echo "<option value='".$parroquia['id']."'>".$parroquia['nombre']."</option>";
																		}
                                                               		}
                                                           		}	
																?>
                                                       		</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                             </tr>
                                        	<tr>
                                                <td>
                                               		<div class="control-group">
                                                        <label for="textfield" class="control-label">Sectores <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                        <div class="controls">
                                                            <div style="width:285px;">
                                                            <select name="sector" id="sector_l" title="Selecciona tu Sector" class="chosen-select" >
																<?php 
																if(isset($sector_sel)){ ?>
                                                                    <option value="<?php echo $sector_sel['id']; ?>"><?php echo $sector_sel['nombre']; ?></option>
																	<?php 
                                                                    foreach($sectores as $sector){
                                                                        
																		if($sector['id'] != $sector_sel['id']){
																			echo "<option value='".$sector['id']."'>".$sector['nombre']."</option>";
																		}
                                                               		}
                                                           		}	
																?>
                                                       		</select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                             </tr>
                                             <tr>
                                                <td>
                                                	<hr>
                                                    
                                                    <div class="control-group">
                                                        <label for="textfield" class="control-label">Área de Terreno <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                        <div class="controls">
                                                        	<input type="text" name="cantidad_terreno" id="cantidad_terreno" pattern="\d*" title="Ingresa el tamaño de tu terreno" class="input-xlarge num_only" style="width:130px; float:left;" value="<?php echo $cantidad_terreno; ?>">
                                                            <div style="width:125px; float:left; margin-left:15px;" class="ced">
                                                          <select name="medida_terreno" id="medida_terreno" required title="Selecciona la medida del tamaño de tu terreno" class="chosen-select" > 
                                                                <?php 
                                                                    if($medida_terreno=='mts'){?>
                                                                        <option value="mts">Metros Cuadrados (Mts<sub>2</sub>)</option>
                                                                        <option value="ha">Hectareas (Ha)</option>
                                                                <?php 
                                                                    } 
                                                                ?>

                                                                <?php 
                                                                    if($medida_terreno=='ha'){?>
                                                                    <option value="ha">Hectareas (Ha)</option>
                                                                    <option value="mts">Metros Cuadrados (Mts<sub>2</sub>)</option>
                                                                <?php 
                                                                    } 
                                                                ?>
                                                            </select> 
                                                            </div>
                                                        </div>
                                                        <div style="clear:both"></div>
                                                        
                                                   <p style=" width:400px"><span style="color:#FF0027; margin-top:-15px;">El área de terreno es confidencial y solo la utilizamos para ayudarte a gestionar tus producciones.</span></p>
                                                    </div>
                                            	</td>
                                            </tr>
                                            <tr>
                                            	<td >
                                                <hr>
                                                <div class="control-group">
                                                    <label for="textfield" class="control-label">Ubicación <span class="rojito" title="Campo Obligatorio">*</span></label>
                                                    <div class="controls">
                                                        <input type="text" name="ubicacion" title="Especifica tu ubicación para ubicarte en mapas de google" id="ubicacion" class="input-xlarge" value="<?php if(isset($productor['ubicacion'])){ echo $productor['ubicacion']; } ?>"><a href="#" class="btn" style="position:absolute;margin-left: 2px;" rel="popover" data-trigger="hover" title="" data-content="Al colocar tu ubicación se autocompletaran diferentes ubicaciones para ubicarte en los mapas de google, elige la que más se aproxime (podras ser más específico despues).  " data-original-title="Ubicación"><i class="icon-question-sign" style="size:12px;"></i></a>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td colspan="2"><button type="button" class="btn btn-primary" onClick="validar13()" >Guardar</button></td>
                                            </tr>
                                            <tr>
                                            	<td colspan="2">
                                               		<br>
                                                	<p><strong>Vista previa de tu ubicación</strong> <a href="<?php echo base_url(); ?>productor/editar_perfil/ubicacion" style="color:#FF0027 !important;">¿No es esta la ubicación específica de tu propiedad? CLICK AQUI</a></p>
                                                     
                                                    <div id="map_ubi2"><img border="0" src="//maps.googleapis.com/maps/api/staticmap?center=<?php echo $productor['ubicacion_lat'] ?>,<?php echo $productor['ubicacion_long'] ?>&zoom=15&size=600x300&markers=color:red%7Clabel:Productor%7C<?php echo $productor['ubicacion_lat'] ?>,<?php echo $productor['ubicacion_long'] ?>&sensor=false&maptype=hybrid" alt="Puntos de interés en Lower Manhattan"></div>
                                                </td>
                                            </tr>
                                        </table>
                                        </form>
                                    </div>
                                    <div class="tab-pane <?php if(isset($enviar)){ if($enviar==4){ echo 'active'; }} ?>" id="fourth44">
                                  		<form method="post" action="<?php echo base_url(); ?>productor/editar_perfil" name="form_perfil_rs">
                                        <input type="hidden" name="enviar" value="4">
                                        <table border="0">
                                            <tr>
                                            	<td>
                                                	<div align="center">
                                                		<img src="<?php echo base_url(); ?>img/facebook_square.png" style="margin-top:-14px;">
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="control-group">
                                                <label for="textfield" class="control-label">Facebook</label>
                                                <div class="controls">
                                                        <input type="url" name="url_facebook" title="Ingresa la url" id="url_facebook" class="input-xlarge" value="<?php if(isset($redes_sociales)){ echo $redes_sociales['facebook']; } ?>" placeholder="Ingresa la url"> 
                                                    </div>
                                                </div>
                                                </td>
                                           	</tr>
                                            <tr>
                                            	<td>
                                                	<div align="center">
                                                		<img src="<?php echo base_url(); ?>img/twitter_square.png" style="margin-top:-14px;">
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="control-group">
                                                <label for="textfield" class="control-label">Twitter</label>
                                                <div class="controls">
                                                        <input type="url" name="url_twitter" title="Ingresa la url" id="url_twitter" class="input-xlarge" value="<?php if(isset($redes_sociales)){ echo $redes_sociales['twitter']; } ?>" placeholder="Ingresa la url"> 
                                                    </div>
                                                </div>
                                                </td>
                                           	</tr>
                                            <tr>
                                            	<td>
                                                	<div align="center">
                                                		<img src="<?php echo base_url(); ?>img/google_square.png" style="margin-top:-14px;">
                                                    </div>
                                                </td>
                                                <td>
                                                <div class="control-group">
                                                <label for="textfield" class="control-label">Google +</label>
                                                <div class="controls">
                                                        <input type="url" name="url_google" title="Ingresa la url" id="url_google" class="input-xlarge" value="<?php if(isset($redes_sociales)){ echo $redes_sociales['google']; } ?>" placeholder="Ingresa la url"> 
                                                    </div>
                                                </div>
                                                </td>
                                           	</tr>
                                            
                                            <tr>
                                                <td colspan="2">
                                                    <div >
                                                        <button type="button" class="btn btn-primary" onClick="validar12()" style="float:right; " >Guardar</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        </form>
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