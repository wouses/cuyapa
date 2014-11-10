
<body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>administrador" id="brand"></a>
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
                        <h1>Editar Productor</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                    	<li>
                            <a href="<?php echo base_url(); ?>coordinador/productores_zona">Productores de <?php echo $municipio['nombre']; ?></a>
                       		<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Editar Produtor</a>
                        </li>
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
								<i class="icon-warning-sign"></i> <strong>Error!</strong> Este productor ya se encuentra registrado.
							</div>
							<?php
								}
							}
							?>
                            </div>
                        	<div class="box-title">
								<h3><i class="icon-edit"></i>Modifica los campos que desees</h3>
							</div>
							<div class="box-content">
								<form action="<?php echo base_url(); ?>coordinador/registrar_productor" method="POST" class="form-horizontal" name="form_registro_productor_coordinador">
                                <input type="hidden" name="enviar" value="1">

                                    <div id="pro-cont">

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Nombre <span class="rojito" title="Campo Obligatorio">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="nombre" id="nombre" class="input-xlarge" value="<?php echo $productor['nombre']; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Cédula / RIF
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="tipo_cedula_rif" name="tipo_cedula_rif" >
                                                        <option><?php echo $productor['tipo_cedula_rif']; ?></option>
                                                        
                                                        <?php if($productor['tipo_cedula_rif']!='V'){ ?><option>V</option><?php } ?>
                                                        <?php if($productor['tipo_cedula_rif']!='E'){ ?><option>E</option><?php } ?>
                                                        <?php if($productor['tipo_cedula_rif']!='J'){ ?><option>J</option><?php } ?>
                                                    </select>
                                                </div>
                                                <input type="text" name="cedula_rif" id="cedula_rif" class="input-medium num_only" style="float:left; margin-left:5px;" maxlength="9" value="<?php echo $productor['cedula_rif']; ?>" >
                                            </div><!-- /.controls -->
                                        </div>

                                        <?php if(isset($productor['telefono'])){  $telefono = explode('-',$productor['telefono']); } ?>
                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Teléfono
                                            </label>
                                            <div class="controls">
                                                <div style="width:115px; float:left;">
                                                    <select class="chosen-select" id="codigo_telefono" name="codigo_telefono" >
														<option><?php echo $telefono[0]; ?></option>
                                                         
                                                        <?php if($telefono[0]!='0412'){ ?><option>0412</option><?php } ?>
                                                        <?php if($telefono[0]!='0414'){ ?><option>0414</option><?php } ?>
                                                        <?php if($telefono[0]!='0424'){ ?><option>0424</option><?php } ?>
                                                        <?php if($telefono[0]!='0416'){ ?><option>0416</option><?php } ?>
                                                        <?php if($telefono[0]!='0426'){ ?><option>0426</option><?php } ?>
                                                    </select>
                                                </div>
                                                <input type="text" pattern="\d*" name="telefono" id="telefono" class="input-medium num_only"  maxlength="7" style="float:left; margin-left:5px;" value="<?php echo $telefono[1]; ?>" >
                                            </div><!-- /.controls -->
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="inputPropertyPropertyType">
                                            Área de Terreno
                                            <span class="rojito" title="Campo obligatorio">*</span>
                                            </label>
                                            <div class="controls">
                                                <input type="text" pattern="\d*" title="Ingresa el tamaño de tu terreno" name="cantidad_terreno" id="cantidad_terreno" class="input-small num_only" style="float:left;">
                                                <div style="width:175px; float:left; margin-left:5px;">
                                                    <select class="chosen-select" id="medida_terreno" name="medida_terreno" >
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
                                            </div><!-- /.controls -->
                                        </div>

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Municipio
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select name="municipio" id="municipio_l" onChange="cargar_parroquias();" class="chosen-select">
													<?php
                                                    if(isset($municipio_sel)){ ?>
                                                            <option value="<?php echo $municipio_sel['id']; ?>"><?php echo $municipio_sel['nombre']; ?></option>
                                                    <?php
                                                    }else{ ?>
                                                    <option value="">Seleccione</option>
                                                        <?php
                                                            echo "<option value='".$municipio['id']."'>".$municipio['nombre']."</option>";
                                                     } ?>
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Parroquia
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select name="parroquia" onChange="cargar_sectores();" id="parroquia_l"  class="chosen-select">
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Sector
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select  name="sector" onChange="cargar_parcelamientos();" id="sector_l" class="chosen-select">
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Parcelamiento
                                            <span class="rojito" title="Campo obligatorio">*</span></label>
                                            <div class="controls">
                                                <div style="width:285px;">
                                                <select name="parcelamiento" id="parcelamiento_l"  class="chosen-select">
                                                </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label for="textfield" class="control-label">Dirección Fiscal o de Referencia </label>
                                            <div class="controls">
                                                <textarea name="direccion" title="Ingresa dirección fiscal o de referencia" style="max-height:90px; max-width:270px;"class="input-xlarge"></textarea>
                                            </div>
                                        </div>


									</div>
									<div class="form-actions">
										<button type="button" class="btn btn-primary" onClick="validar24()">Guardar</button>
										<button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>coordinador'">Cancelar</button>
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