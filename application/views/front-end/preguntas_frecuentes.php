
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
                                                    <img src="img/logo.png" alt="Cuyapa" width="170">
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
                    <div id="main">
                        <div class="faq">
                            <h2 class="page-header">Soluciones Rápidas a Preguntas Frecuentes</h2>
                            <div class="content">
                                <div class="row">
                                    <div class="span6">
                                        <h2>General</h2>
                        
                                        <div class="accordion" id="faq1">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapse1">
                                                        <span class="sign"></span> ¿Donde está disponible Cuyapa?
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse1" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                       <p> Actualmente solo está disponible para productores agrícolas ubicados Municipio José Félix Ribas en el Estado Aragua (Venezuela), ya que por los momentos contamos con las herramientas para esta zona en específico, más adelante se dara alcance a todo el país. estamos trabajando lograrlo!</p>
                                                        
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapse2">
                                                        <span class="sign"></span> ¿Como registrarme en Cuyapa?
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse2" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <p>Como productor agrícola dirigete a la página de <a href="<?php echo base_url(); ?>registro">Registro</a> y comienza a disfrutar de todos los beneficios que te ofrecemos de manera gratuita, </p>
                                                        <p>Si eres un consumidor o comerciante, no es necesario una cuenta en cuyapa, puedes contactar a los productores directamente desde nuestro portal.</p>
                                                        <p>
                                                        Si tienes dudas al respecto de como manejamos tu información puedes revisar nuestra <a href="<?php echo base_url(); ?>privacidad">Política de Privacidad</a>.</p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#collapse3">
                                                        <span class="sign"></span> ¿Qué ventajas me ofrece Cuyapa?
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse3" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        
                                                        <p>
                                                        <u>Productor</u>
                                                        <br>
                                                        - Puedes tener un perfil público en nuestro portal para que consumidores y comerciantes te contacten para adquirir tus productos.
                                                        <br>
                                                        - Puedes gestionar tus producciones a través de nuestra plataforma para que lleves un mejor control de las mismas.
                                                        <br>
                                                        - Atención directa con las instituciones encargadas del bienestar de los produtores y la Producción Nacional ( MPPAT, FONDAS, INSAI, entre otros ).
                                                        </p>
                                                        
                                                        <p>
                                                        <u>Consumidor o Comerciante</u>
                                                        <br>
                                                        - Puedes conocer a los productores agrícolas más cercanos a ti, y contactarlos para adquirir sus productos directamente, evitando intermediarios, mejorando el precio y mucho más fresco.
                                                        </p>
                                                                                                                
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                         
                                        </div><!-- /.accordion -->
                        
                                        <h2>Comercios o Consumidores</h2>
                        
                                        <div class="accordion" id="faq2">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse6">
                                                        <span class="sign"></span> ¿Como puedo comprar rubros?
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse6" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                       <p>Nosotros brindamos el enlace entre productores y consumidores pero no tomamos parte en ninguna transacción, cada productor cuenta con un perfil público donde ofrece sus sus rubros.</p>
                                                        <p>Accede al perfil del productor que deseas y contactalo enviandole un mensaje o llamandolo para coordinar cualquier negociación.</p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse7">
                                                        <span class="sign"></span> ¿Quien se encarga del envio?
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse7" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <p>Como no tomamos parte en la transacción entre el productor y el comerciante, ambos deberan coordinar como se va a llevar a cabo el envio de los rubros</p>
                                                        <p> 
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse8">
                                                        <span class="sign"></span> El productor no ha contestado mi solicitud
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse8" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        
                                                        <p>A muchos productores no les ha sido fácil la transición al uso de las aplicaciones web, por lo tanto quizas no ha ingresado y no ha visto tu mensaje o solicitud, te recomendamos contactarlo directamente al número telefónico indicado en su perfil.
                                                        </p>
                                                        
                                                        <p>Si ha sido imposible contactarlo, intenta con otro productor cercano a ti, hay muchos y con rubros de muy buena calidad.
                                                        </p>
                                                                                                                
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group --> 
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#collapse9">
                                                        <span class="sign"></span> Tengo un reclamo sobre un productor
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse9" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        
                                                        <p>Cualquier queja relacionada a un productor podemos llevarla a las entidades pertinentes, escribenos en la página de <a href="<?php echo base_url(); ?>contacto">Contacto</a> los detalles para informarlo al coordinador encargado del sector del productor en cuestión.
                                                        </p>
                                                        
                                                        <p>Sin embargo siempre recomendamos un acuerdo entre el comerciante y productor.
                                                        </p>
                                                                                                                
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group --> 
                                        </div><!-- /.accordion -->
                                    </div><!-- /.span6 -->
                        
                                    <div class="span6">
                                        <h2>Productores</h2>
                        
                                        <div class="accordion" id="faq3">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse11">
                                                        <span class="sign"></span> Ya aparezco registrado en Cuyapa
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse11" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        Muchos productores fueron registrados en Cuyapa por coordinadores del Ministerio del Poder Popular para la Agricultura y Tierras (MPPAT), por lo tanto escribenos en la página de <a href="<?php echo base_url(); ?>contacto">Contacto</a> para asignarte el usuario y puedas disfrutar de los beneficios de Cuyapa.
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                        
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse12">
                                                        <span class="sign"></span> Mi perfil tiene información erronea
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse12" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <p>La información mostrada en tu perfil es cargada directamente por ti como productor, ingresa a tu cuenta y en la parte superior derecha podras editar tu perfil.</p>

                                                        <p>Si tienes problemas con el panel de productor, dirigete a la sección interna de ayuda donde podras conseguir videos instructivos y ayuda mas específica.</p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->

                                             <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse13">
                                                        <span class="sign"></span> No aparezco en el portal web
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse13" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <p>Para poder aparecer en el portal web y ofrecer tus rubros deberas activar tu perfil público completandolo desde el panel de productor</p>

                                                        <p>Ingresa y completa tu perfil, si tienes problemas con el panel de productor, dirigete a la sección interna de ayuda donde podras conseguir videos instructivos y ayuda mas específica. </p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->

                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#collapse14">
                                                        <span class="sign"></span> Donde consigo la aplicación para android
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                        
                                                <div id="collapse14" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <p>La aplicación de Cuyapa para android la podras descargar directamente desde la Play Store (mercado de aplicaciones de google) o ingresando en el siguiente enlace</p>

                                                        <p>Si tienes problemas con la aplicación android, dirigete a la sección ayuda del panel de productor donde podras conseguir videos instructivos y ayuda mas específica. </p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->
                                        </div>
                                         
                        
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div><!-- /#content -->
        </div><!-- /#wrapper-inner -->
