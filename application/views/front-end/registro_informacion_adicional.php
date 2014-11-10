
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Cuyapa.com">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/realia-gray-green.css" type="text/css" id="color-variant-default">
	
    <title>Cuyapa | Registro</title>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script>
	function initialize() {
		var input = document.getElementById('ubicacion');
		var autocomplete = new google.maps.places.Autocomplete(input);
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
	</script>
</head>
<body>
<div id="wrapper-outer" >
    <div id="wrapper">
        <div id="wrapper-inner">
            <!-- HEADER -->
            <div id="header-wrapper">
                <div id="header">
                    <div id="header-inner">
                        <div class="container">
                            <div class="navbar">
                                <div class="navbar-inner">
                                    <div class="row">
                                        <div class="logo-wrapper span4">
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Toggle navigation</a>

                                            <div class="logo">
                                                <a href="<?php echo base_url(); ?>" title="Cuyapa">
                                                    <img src="<?php echo base_url(); ?>img/logo.png" alt="Cuyapa" width="170">
                                                </a>
                                            </div><!-- /.logo -->

                                        </div><!-- /.logo-wrapper -->

                                       <a class="btn btn-primary btn-large list-your-property  arrow-right" href="<?php echo base_url(); ?>index.php/acceso">Ingresar</a> <a class="btn btn-primary btn-large list-your-property" href="<?php echo base_url(); ?>index.php/registro">Registrate</a>
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

            <!-- NAVIGATION -->
            <div id="navigation">
                <div class="container">
                    <div class="navigation-wrapper">
                        <div class="navigation clearfix-normal">

                            <ul class="nav">
                                <li><a href="<?php echo base_url(); ?>">Inicio</a></li>
                                <li><a href="<?php echo base_url(); ?>nosotros">Conoce Cuyapa</a></li>
                                <li><a href="<?php echo base_url(); ?>productores">Productores</a></li>
                                <li><a href="<?php echo base_url(); ?>rubros">Rubros</a></li>
                            </ul><!-- /.nav -->

                           <!--  
                            <form method="get" class="site-search" action="">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Buscar" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append  
                            </form><!-- /.site-search -->
                        </div><!-- /.navigation -->
                    </div><!-- /.navigation-wrapper -->
                </div><!-- /.container -->
            </div><!-- /.navigation -->

           <!-- CONTENT -->
            <div id="content">
<div class="container">
    <div>
        <div id="main">
            <div class="list-your-property-form">
    <h2 class="page-header">Completa tu Registro</h2>

    <div class="content">
        <div class="row">
            <div class="span8">
                <p>
                    Necesitamos información adicional para completar tu registro y asi poder brindarte una mejor experiencia en Cuyapa, en caso de no saber completar los campos que te solicitamos consulta el <a href="#">Video de Ayuda</a>.
                </p>
                
            </div><!-- /.span8 -->
        </div><!-- /.row -->
        <?php if(isset($error)){ ?>
        <div class="row">
            <div class="span12">
                <?php if($error==1){  ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Parece que has modificado el correo electrónico por uno que ya existe.
                </div>
                <?php }else if($error==2){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Parece que has modificado la Cédula/Rif por una que ya existe.
                </div>
                <?php }else if($error==3){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.
                </div>
                <?php }else if($error==4){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> No hemos podido cargar tu imagen, debido a su tama&ntilde;o.
                </div>
                <?php }else if($error==5){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> La imagen debe tener un formato valido (.jpg /.png /.gif).
                </div>
                <?php }?>
            </div><!-- /.span8 -->
        </div><!-- /.row -->
		<?php } ?>
        <form method="post" action="<?php base_url(); ?>insertar_productor" enctype="multipart/form-data">
            <div class="row">
                <div class="span4">
                    <h3><strong>1.</strong> <span>Información Básica</span></h3>

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyFirstName">
                            Nombre
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required title="Ingresa tu nombre, el de tu compañia o cooperativa">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Cédula o Rif
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <select name="tipo_cedula_rif" required title="Selecciona el tipo de documento">
                                <?php if(!$tipo_cedula_rif){ ?>
								<option value="">--</option>
                                <?php }else{ ?>
								<option><?php echo $tipo_cedula_rif; ?></option>
								<?php } ?>
								<?php if($tipo_cedula_rif!='V'){ ?><option>V</option><?php } ?>
								<?php if($tipo_cedula_rif!='E'){ ?><option>E</option><?php } ?>
								<?php if($tipo_cedula_rif!='J'){ ?><option>J</option><?php } ?>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
						&nbsp;
                        </label>
                        <div class="controls">
                            <input type="text" title="Ingresa tu cédula o rif" name="cedula_rif" value="<?php echo $cedula_rif; ?>" maxlength="9" class="num_only" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyEmail">
                            Correo Electrónico
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(.[a-zA-Z0-9-]+)*$" title="Ingresa tu correo electrónico" name="usuario" value="<?php echo $usuario; ?>" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    
                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Teléfono
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <select name="codigo_telefono" title="Selecciona el código de teléfono" required>
								<?php if(!$codigo_telefono){ ?>
								<option value="">--</option>
                                <?php }else{ ?>
								<option><?php echo $codigo_telefono; ?></option>
								<?php } ?>
								<?php if($codigo_telefono!='0412'){ ?><option>0412</option><?php } ?>
                                <?php if($codigo_telefono!='0414'){ ?><option>0414</option><?php } ?>
                                <?php if($codigo_telefono!='0424'){ ?><option>0424</option><?php } ?>
                                <?php if($codigo_telefono!='0416'){ ?><option>0416</option><?php } ?>
                                <?php if($codigo_telefono!='0426'){ ?><option>0426</option><?php } ?> 
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
						&nbsp;
                        </label>
                        <div class="controls">
                            <input type="text" pattern="\d*" title="Ingresa tu número de teléfono" name="telefono" value="<?php if(isset($telefono)){ echo $telefono; }?>" class="num_only"  maxlength="7" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
 
                </div><!-- /.span4 -->

                <div class="span4">
                    <h3><strong>2.</strong> <span>Información Terreno</span></h3>
                    
                    <div class="property-type control-group">
                    	<label class="control-label" for="inputPropertyPropertyType">
                            Área de Terreno
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" pattern="\d*" title="Ingresa el tamaño de tu terreno" name="cantidad_terreno" value="<?php if(isset($cantidad_terreno)){ echo $cantidad_terreno; }?>" class="num_only" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

					<div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
						&nbsp;
                        </label>
                        <div class="controls"> 
                            <select name="medida_terreno" required title="Selecciona la medida del tamaño de tu terreno">
                            <?php if(isset($medida_terreno)){ ?>
                            	<option value="<?php echo $medida_terreno; ?>">
								<?php if($medida_terreno=="m2"){ 
								 echo "Metros Cuadrados (Mts<sub>2</sub>)"; 
								} else if($medida_terreno=="ha"){
								 echo "Hectareas (Ha)";
								} else {
                                 echo "--";
                                } ?>
                                </option>
								<?php if($medida_terreno!='m2'){ ?><option value="m2">Metros Cuadrados (Mts<sub>2</sub>)</option><?php } ?>
								<?php if($medida_terreno!='ha'){ ?><option value="ha">Hectareas (Ha)</option><?php } ?>
                            <?php } else{ ?>
								<option value="">Medida</option>
								<option value="m2">Metros Cuadrados (Mts<sub>2</sub>)</option>
								<option value="ha">Hectareas (Ha)</option>
							<?php } ?>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    
					<!--
                    <div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Ubicación
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="ubicacion" id="ubicacion" value="<?php if(isset($ubicacion)){ echo $ubicacion; }?>"  autocomplete="off" required title="Ingresa tu dirección para la Geolocalización">
                        </div><!-- /.controls 
                    </div><!-- /.control-group -->
                     
                    <!--
                    <div class="control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Estado
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <select name="estado" onChange="cargar_municipios();" id="estado_l" title="Selecciona tu Estado">
                            <?php if(isset($estado_sel)){ ?>
									<option value="<?php echo $estado_sel['id']; ?>"><?php echo $estado_sel['nombre']; ?></option>
                            <?php 
									foreach($estados as $estadoo){
											
										if($estadoo['id'] != $estado_sel['id'] ){
											echo "<option value='".$estadoo['id']."'>".$estadoo['nombre']."</option>";
										}
									}
							
								}else{ ?>
                                <option value="">Seleccione</option>
									<?php
                                    foreach($estados as $estadoo){
                                    	
                                    	echo "<option value='".$estadoo['id']."'>".$estadoo['nombre']."</option>";
									
                                    }
								 }
								?>
                            </select>
                        </div><!-- /.controls
                    </div><!-- /.control-group 

                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Municipio
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls" id="municipio_cont">
                            <select name="municipio" onChange="cargar_parroquias();" id="municipio_l" title="Selecciona tu Municipio">
								<?php
								if(isset($municipio_sel)){ ?>
                                        <option value="<?php echo $municipio_sel['id']; ?>"><?php echo $municipio_sel['nombre']; ?></option>
                                <?php 
									/*foreach($municipios as $munici){
										
										if($munici['id'] != $municipio_sel['id']){
											echo "<option value='".$munici['id']."'>".$munici['nombre']."</option>";
										}
									}*/
								}else{ ?>
                                <option value="">Seleccione</option>
									<?php 
                                    	echo "<option value='40'>Jose Felix Ribas</option>"; 
								 } ?>
                            </select>
                        </div><!-- /.controls 
                    </div><!-- /.control-group -->
                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Parroquia
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls"> 
                            <select name="parroquia" onChange="cargar_sectores();" id="parroquia_l" title="Selecciona tu Parroquia">
								<?php 
                                if(isset($parroquia_sel)){ ?>
                                        <option value="<?php echo $parroquia_sel['id']; ?>"><?php echo $parroquia_sel['nombre']; ?></option>
                                <?php 
									foreach($parroquias as $parro){
										
										if($parro['id'] != $parroquia_sel['id']){
											echo "<option value='".$parro['id']."'>".$parro['nombre']."</option>";
										}
									}
								}else{ ?>
                                <option value="">Seleccione</option>
                                    <?php
                                    foreach($parroquias as $parro){
                                        
                                        echo "<option value='".$parro['id']."'>".$parro['nombre']."</option>";
                                    
                                    }
                                 } ?>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    
                    
                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Sector
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls" id="municipio_cont">
                            <select name="sector" onChange="cargar_parcelamientos();" id="sector_l" title="Selecciona tu Sector">
                                <?php if(isset($sector_sel)){ ?>
                                        <option value="<?php echo $sector_sel['id']; ?>"><?php echo $sector_sel['nombre']; ?></option>
                                <?php 
                                    foreach($sectores as $sector){
                                        
                                        if($sector['id'] != $sectores_sel['id']){
                                            echo "<option value='".$sector['id']."'>".$sector['nombre']."</option>";
                                        }
                                    }
                                } ?>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
                    <!--
                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Parcelamiento
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls" id="municipio_cont">
                            <select name="parcelamiento" id="parcelamiento_l" title="Selecciona tu Parcelamiento">
								<?php if(isset($parcelamiento_sel)){ ?>
                                        <option value="<?php echo $parcelamiento_sel['id']; ?>"><?php echo $parcelamiento_sel['nombre']; ?></option>
                                <?php 
									foreach($parcelamientos as $parcel){
										
										if($parcel['id'] != $parcelamiento_sel['id']){
											echo "<option value='".$parcel['id']."'>".$parcel['nombre']."</option>";
										}
									}
								} ?>
                            </select>
                        </div><!-- /.controls
                    </div><!-- /.control-group -->
                    					
					<div class="control-group">
                        <label class="control-label" for="inputPropertyNotes">
                            Dirección Fiscal o Referencial
                            <span class="form-required" title="Campo obligatorio.">*</span>
                        </label>
                        <div class="controls">
                            <textarea name="direccion" required title="Ingresa tu dirección fiscal o de referencia" style="max-height:120px; max-width:370px;"><?php if(isset($direccion)){ echo $direccion; }?></textarea>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <!-- <div class="bedrooms control-group">
                        <label class="control-label" for="inputPropertyBedrooms">
                            Parcela
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="parcela" required>
                        </div><!-- /.controls 
                    </div><!-- /.control-group 

                   <div class="control-group">
                        <label class="control-label" for="inputPropertyBathrooms">
                            Tipo Productor
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select name="tipo_productor">
                                <option value="">Seleccione</option>
                                <option>Seleccione</option>
                                <option value="">Seleccione</option>
                            </select>
                        </div><!-- /.controls
                    </div><!-- /.control-group --> 

                   
                </div><!-- /.span4 -->

                <div class="span4">
				
                    <h3><strong>3.</strong> <span>Carga una foto</span></h3>
					<div class="control-group">
						<label for="textfield" class="control-label"></label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url(); ?>img/sin_imagen.jpg" /></div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                </div>
								<div>
									<span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name='imagefile' /></span>
								</div>
							</div>
						</div>
					</div>
                    
                <div class="form-actions">
				<br>
                    <input type="submit" value="Culminar Registro" class="btn btn-primary btn-large arrow-right">
					
                </div>
                <!-- /.form-actions -->
                </div><!-- /.span4 -->
            </div><!-- /.row -->
			<input type="hidden" name="clave" value="<?php echo $clave; ?>" >
        </form>
        <p>&nbsp;</p>
    </div><!-- /.content -->
</div><!-- /.list-your-property-form -->        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->