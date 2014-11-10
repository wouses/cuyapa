
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

                                       <a class="btn btn-primary btn-large list-your-property  arrow-right" href="<?php echo base_url(); ?>acceso">Ingresar</a> <a class="btn btn-primary btn-large list-your-property" href="<?php echo base_url(); ?>registro">Registrate</a>
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
                                <li><a href="<?php echo base_url(); ?>productores" class="active">Productores</a></li>
                                <li><a href="<?php echo base_url(); ?>categorias">Rubros</a></li>
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
<!--
                            <form method="get" class="site-search" action="<?php echo base_url(); ?>buscar">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Buscar" type="text" name="q">
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

    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header">Productores</h1>
                              
                <div class="properties-grid">
                    <div class="row" style="margin-top:-20px;">
                        <?php
							if($productores){
								
								foreach($productores as $productor){
						?>
                                    <div class="property span3">
                                        <div class="image" style="height:200px;">
                                            <div class="content"  style="height:200px;" >
                                                <a href="<?php echo base_url().$productor['id'].'/'.str_replace(' ', '_', $productor['nombre']); ?>"></a>
                                                <img src="<?php if($productor['imagen']){ echo base_url().$productor['imagen']; }else{  echo base_url().'img/sin_imagen.jpg'; }?>" alt="" height="height:200px">
                                            </div><!-- /.content --> 
                                            <div class="reduced">Ver más </div><!-- /.reduced -->
                                        </div><!-- /.image -->
                            
                                        <div class="title">
                                            <h2><a href="<?php echo base_url().$productor['id'].'/'.str_replace(' ', '_', $productor['nombre']); ?>"><?php echo $productor['nombre']; ?></a></h2>
                                        </div><!-- /.title -->
                            
                                        <div class="location"><?php echo $productor['municipio'].', '.$productor['estado']; ?></div><!-- /.location --> 
                                    </div><!-- /.property -->
						<?php
								}
							}else{
								?>
                                <div class="span9" align="center">
                                	<img src="<?php echo base_url(); ?>img/no_result_prod.png">
                                	<h1>Productores no encontrados</h1>
                                    <hr style="widht:700px;" align="center">
                                    <p>No hemos encontrado nada como lo que buscas, intenta con alguna otra zona o rubro</p>
                                </div>
                                <?php
							}
						?>
                    </div><!-- /.row -->
                </div><!-- /.properties-grid -->
                <div class="pagination pagination-centered">
                </div><!-- /.pagination -->            
</div>
                <div class="sidebar span3">
                    <h2>&nbsp;</h2>
                <div class="property-filter widget">
                    <div class="content">
                        <form method="post" action="<?php echo base_url(); ?>productores">
                        <input type="hidden" name="send" value="1">
                                                           
                            <div class="control-group">
                                <label class="control-label">
                                    Municipio
                                </label>
                                <div class="controls">
                                    <select id="municipio_l" name="municipio"> 
                                        <option value="40">Jose Felix Ribas</option> 
                                    </select>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
    
                            <div class="type control-group">
                                <label class="control-label" for="inputType">
                                    Categor&iacute;a
                                </label>
                                <div class="controls">
                                    <select id="categoria_l" name="categoria" onChange="cargar_rubros();">
                                		<option value="">Seleccione</option>
                                        <?php 
											foreach($categorias as $categoria){
										?> 
                                        	<option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                                        <?php 
											}
										?> 
                                    </select>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
    
                            <div class="type control-group">
                                <label class="control-label" for="inputType">
                                    Rubro
                                </label>
                                <div class="controls">
                                    <select id="rubro_l" name="rubro"> 
                                    </select>
                                </div><!-- /.controls -->
                            </div><!-- /.control-group -->
    
                            <div class="form-actions">
                                <input type="submit" value="Conseguir!" class="btn btn-primary btn-large">
                            </div><!-- /.form-actions -->
                        </form>
                    </div><!-- /.content -->
                </div><!-- /.property-filter -->
                
           
            </div>
        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
