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
                                <li><a href="<?php echo base_url(); ?>nosotros" class="active">Conoce Cuyapa</a></li>
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
                            <div class="row">
                                <div class="span6">
                               		<h1 class="page-header">Sobre Cuyapa!</h1>
                                     
                                    <h3>Ayudando a conectar a productores agrícolas y consumidores.</h3>
                                    <p>Cuyapa funciona para productores y consumidores, queremos ayudar a los productores a vender más mientras se les brinda a los consumidores los productos por menos.</p>
                                    <p>Si eres consumidor o un comercio podras disfrutar de una plataforma donde encontraras a productores agrícolas locales y contactarlos para obtener hortalizas, frutas y vegetales; más fresco y económico.</p>
                                    <p>
                                    Si eres un productor estamos aquí para ayudarte a gestionar tus producciones mientras creamos un enlace en linea para que interactues con consumidores y comercios. </p>
                                    <p>Todo esto de manera gratuita para impulsar el comercio justo y la producción nacional.</p>
                                    <h3>Cuyapa se expande rápidamente.</h3>
                                    <p>
                                    Cuyapa es una iniciativa que surgió en la UPTA-FBF en La Victoria, Estado Aragua, para promover e incentivar la producción agrícola, actualmente disponible solamente en Aragua pero con la visión de expanderse por todo el territorio nacional. </p> 
                                    <p>Puedes conocer más detalles sobre Cuyapa en nuestro <a href="http://productoreslocales.wordpress.com/" target="_blank">Blog</a>.</p> 
                                    
                                </div>
                                <div class="span6">
                                    <img src="<?php echo base_url(); ?>img/img_nosotros.jpg" width="450px" height="450px" style="border:15px solid #fff; margin-top:40px; margin-left:30px;">
                                </div>
                            </div> 
                     	</div>
                    </div>
                </div>
                <br><br>
                <div class="bottom-wrapper">
                    <div class="bottom container">
                        <div class="bottom-inner row">
                        
                        <h1 align="left">Cuyapa tu Solución Agrícola</h1>
                        <p>&nbsp;</p>
                        
                        <div class="bottom-inner ">
                            <div class="span12">
                                <a class="btn btn-primary btn-large list-your-property active" style="background:#ccc;" onClick="solucion_productor()" id="btn_so_prod">Productor</a> <a class="btn btn-primary btn-large list-your-property" onClick="solucion_consumidor()" id="btn_so_con">Consumidor o Comerciante</a>
                            </div>
                        </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>   
                        
                        <div class="bottom-inner row" id="so_prod">
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/negocio.png" alt="">
                                <h2><a>Negocio en Linea</a></h2>
                                <p>Al registrarte obtienes un portal en linea para ofrecer tus productos, mostrar tu información y asi puedan contactarte potenciales clientes de todo el país.</p> 
                            </div><!-- /.item -->
                
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/estadistica.png" alt="">
                                <h2><a>Gestiona tus Producciones</a></h2>
                                <p>Te brindamos una plataforma donde llevar el control de tus producciones, manejo de inventario, distribuciones y estadísticas para llevar un mejor control y aumentar tu producción.</p> 
                            </div><!-- /.item -->
                
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/dispositivos.png" alt="">
                                <h2><a>Desde Cualquier Lugar</a></h2>
                                <p>Queremos brindarte la mayor cantidad de vias para acceder a tu producción en cuyapa, por lo que te ofrecemos un portal web adabtable a la mayoria de dispositivos y navegadores como tambien una aplicación android</p> 
                            </div><!-- /.item -->
                        </div>
                        <div class="bottom-inner row" id="so_con" style="display:none;">
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/mapa.png" alt="">
                                <h2><a>Encuentra Productos y Productores</a></h2>
                                <p>Descubre productos y productores agrícolas que estan cerca de ti, muchas veces grandes productos y productores que desconoces.</p> 
                            </div><!-- /.item -->
                
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/cartera.png" alt="">
                                <h2><a>Ahorra Dinero</a></h2>
                                <p>Los productos agrícolas locales siembre son más frescos y económicos porque no tarde tiempo entre intermediarios, el precio puede reducirse casi a la mitad! eso es una gran diferencia.</p> 
                            </div><!-- /.item -->
                
                            <div class="item span4">
                                <img src="<?php echo base_url(); ?>img/corazon.png" alt="">
                                <h2><a>Apoya la Producción Nacional</a></h2>
                                <p>Cuyapa es un gran esfuerzo por ayudar a la producción nacional a ofrecer productos agrícolas frescos y de muy buena calidad al mercado, utilizar la plataforma es un granito de arena y lo apreciamos.</p> 
                            </div><!-- /.item -->
                        </div> 
                    </div><!-- /.bottom-inner -->
                </div><!-- /.bottom -->
            </div>
    
        </div><!-- /#content -->
    </div><!-- /#wrapper-inner -->
