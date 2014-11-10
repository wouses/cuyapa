
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
                                                    <img src="<?php echo base_url(); ?>img/logo.png" alt="Cuyapa" width="170px">
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
                                <li><a href="<?php echo base_url(); ?>productores">Productores</a></li>
                                <li><a href="<?php echo base_url(); ?>categorias" class="active">Rubros</a></li>
                            </ul><!-- /.nav -->

                           <!-- 
                            <form method="get" class="site-search" action="<?php echo base_url(); ?>buscar">
                                <div class="input-append">
                                    <input title="Enter the terms you wish to search for." class="search-query span2 form-text" placeholder="Buscar" type="text" name="q">
                                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                                </div><!-- /.input-append 
                            </form>  /.site-search -->
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
                <h1 class="page-header">Productores de <?php echo ucfirst($rubro['rubro']); ?></h1>
                              
                <div class="properties-grid">
                    <div class="row"  style="margin-top:-20px;">
                    <?php
					
						foreach($productores as $productor){
					?>
                        <div class="property span3">
                            <div class="image" style="height:200px;">
                                <div class="content"  style="height:200px;" >
                                    <a href="<?php echo base_url().$productor['id'].'/'.str_replace(' ', '_', $productor['nombre']); ?>"></a>
                                    <img src="<?php if($productor['imagen']){ echo base_url().$productor['imagen']; }else{  echo base_url().'img/sin_imagen_g.jpg'; }?>" alt="" height:"180px">
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
					?>
                    </div><!-- /.row -->
                </div><!-- /.properties-grid -->
                <div class="pagination pagination-centered">
                <ul>
                <?php echo $this->pagination->create_links(); ?>
                 </ul>
                </div><!-- /.pagination -->            
</div>
                <div class="sidebar span3">
                   
           
                </div>
            </div>
        </div>
    </div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
