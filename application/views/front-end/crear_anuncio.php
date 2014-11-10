
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

    <title><?php echo $titulo; ?></title>
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

                           <!-- <div class="language-switcher">
                                <div class="current en"><a href="/" lang="en">English</a></div>
                                <div class="options">
                                    <ul>
                                        <li class="es"><a href="#">Fran�ais</a></li>
                                        <li class="de"><a href="#">Deutsch</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.language-switcher --> 

                            <form method="get" class="site-search" action="">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Buscar" type="text" name="">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append -->
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
    <h2 class="page-header">Crear Anuncio</h2>

    <div class="content">
        <div class="row">
            <div class="span8">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa.
                </p>
            </div><!-- /.span8 -->
        </div><!-- /.row -->

        <form method="post" action="<?php echo base_url(); ?>index.php/publicidad/insertar_anuncio" enctype="multipart/form-data">
            <div class="row">
                <div class="span6">
                    <h3><strong>1.</strong> <span>Información Servicio</span></h3>

					<div class="control-group">
						<label for="textfield" class="control-label">Imagen</label>
						<div class="controls">
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
								<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
								<div>
									<span class="btn btn-file"><span class="fileupload-new">Seleccionar Imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name='imagefile' /></span>
								</div>
							</div>
						</div>
					</div>
					
                    <div class="control-group">
                        <label class="control-label" for="inputPropertyFirstName">
                            Titulo
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="titulo" value="" required>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="control-group">
                        <label class="control-label" for="inputPropertyEmail">
                            Contenido
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <textarea name="texto" required></textarea>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                </div><!-- /.span4 -->

                <div class="span6">
                    <h3><strong>2.</strong> <span>Información Contacto</span></h3>

					<div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Teléfono
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="telefono">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
					
                    <div class="control-group">
                        <label class="control-label" for="inputPropertyLocation">
                            Url
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <input type="text" name="url">
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
					
                    <div class="property-type control-group">
                        <label class="control-label" for="inputPropertyPropertyType">
                            Estado
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select name="estado">
                                <option value="">Seleccione</option>
								<option value="1">Aragua</option>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->

                    <div class="contract-type control-group">
                        <label class="control-label" for="inputPropertyContractType">
                            Municipio
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <select name="municipio">
                                <option value="">Seleccione</option>
								<option value="1">Maracay</option>
                            </select>
                        </div><!-- /.controls -->
                    </div><!-- /.control-group -->
					
					<div class="control-group">
                        <label class="control-label" for="inputPropertyNotes">
                            Dirección
                            <span class="form-required" title="This field is required.">*</span>
                        </label>
                        <div class="controls">
                            <textarea name="direccion" required></textarea>
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

                   <div class="form-actions">
				<br>
                    <input type="submit" value="Crear Anuncio" class="btn btn-primary btn-large arrow-right">
					
                </div>
                </div><!-- /.span4 -->

            </div><!-- /.row -->
        </form>
    </div><!-- /.content -->
</div><!-- /.list-your-property-form -->        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
