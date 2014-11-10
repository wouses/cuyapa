
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
			<div style="width:100%;">
			</div>
<div class="container">
    <div>
        <div id="main">
			<h1>Anunciate en Cuyapa!</h1>
			<div class="pricing">
				<h1 class="page-header">Como Funciona?</h1>
				
				<div class="row">
					<div class="span4">
						<div class="column">
							<h2>Creas un Anuncio en Cuyapa</h2>
							<div class="content">
								<ul class="unstyled">
								<li>Eres el propietario de una empresa que brinda algún servicio a productores agrícolas del país, imaginemos que eres un vendedor de semillas y las ofreces por un precio especial al mayor!</li>
								</ul>
							</div><!-- /.content -->
						</div><!-- /.column -->
					</div><!-- /.span4 -->
			
					<div class="span4">
						<div class="column promoted">
							<h2>Pagas a Cuyapa para que lo muestre</h2>
							<div class="content">
								<ul class="unstyled">
								<li>Activas el anuncio e indicas a que productores quieres que se muestre, por ejemplo de una zona o de un rubro en específico para que los productores que lo vean realmente sean los interesados en contactarte.</li>
								</ul>
							</div><!-- /.content -->
						</div><!-- /.column -->
					</div><!-- /.span4 -->
			
					<div class="span4">
						<div class="column">
							<h2>Los Productores adecuados ven el anuncio</h2>
							<div class="content">
								<ul class="unstyled">
								<li>Cuyapa se encarga de mostrar tú anuncio solo a los productores con las características que tu especificaste. y que tengan la mayor probabilidad de requerir tus servicios, en el caso de que seas un vendedor de semillas al momento que el productor vaya a sembrar vera tu anuncio y necesitara contactarte. Es Publicidad Efectiva!</li>
								</ul>
							</div><!-- /.content -->
						</div><!-- /.column -->
					</div><!-- /.span4 -->
				</div><!-- /.row -->
			</div>
			
			 <div align="center"><a class="btn btn-primary btn-large list-your-property  arrow-right" href="<?php echo base_url(); ?>index.php/publicidad/crear_anuncio">Crear Anuncio</a></div>
			    
	  </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
