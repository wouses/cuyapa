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
<?php

    function detect()
    {
        $browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
        $os=array("WIN","MAC","LINUX");
        
        # definimos unos valores por defecto para el navegador y el sistema operativo
        $info['browser'] = "OTHER";
        $info['os'] = "OTHER";
        
        # buscamos el navegador con su sistema operativo
        foreach($browser as $parent)
        {
            $s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
            $f = $s + strlen($parent);
            $version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
            $version = preg_replace('/[^0-9,.]/','',$version);
            if ($s)
            {
                $info['browser'] = $parent;
                $info['version'] = $version;
            }
        }
        
        # obtenemos el sistema operativo
        foreach($os as $val)
        {
            if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
                $info['os'] = $val;
        }
        
        # devolvemos el array de valores
        return $info;
    }

    $nav_so = detect();

?>
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
                                <div class="span12">
                                    <?php
                                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado"); 
                                    ?>
                               		<h1 class="page-header"><?php echo "Feliz ".$dias[date('w')]." desde el equipo de ayuda de Cuyapa,<br> estamos aqui para ayudar."; ?></h1>
                                    <div class="span8" style=" margin-left:auto; margin-right:auto; width:850px;">
                                    	Somos un grupo de estudiantes de ingeniería de la Universidad Politecnica Territorial de Aragua "Federico Brito Figueroa" (UPTA-FBF) y estamos dispuestos a ayudarte y solucionar cualquier inquietud.
                                        <br><br>

                                        Para información sobre nosotros y sobre el proyecto te invitamos a visitar la página de <a href="<?php echo base_url(); ?>nosotros">Nosotros</a> y nuestro <a href="<?php echo base_url(); ?>Blog">Blog</a>.
                                        <br><br>

										Para cualquier duda o inquietud puedes revisar las <a href="<?php echo base_url(); ?>preguntas_frecuentes">Preguntas Frecuentes</a>, para respuestas rápidas escribenos al <a href="https://twitter.com/cuyapa_vzla">Twitter</a>.<br>  
                                    </div>

                                </div>

                                <div id="main" class="span9">
                                    <div class="contact-form" id="contact-form"> 

                                        <h2>Necesitas más ayuda? envianos un mensaje.</h2>
                                        <div id="alert1"></div>
                                        
                                        <form name="" action="#" method="post">
                                            <input type="hidden" value="<?php echo $nav_so['os']; ?>" name="sistema_operativo" id="sistema_operativo">
                                            <input type="hidden" value="<?php echo $nav_so['browser']; ?>" name="navegador" id="navegador">
                                            <input type="hidden" value="<?php echo $nav_so['version']; ?>" name="version" id="version">  

                                            <div class="control-group">
                                                <div>
                                                    <label class="control-label">En que necesitas ayuda?
                                                        <span class="form-required" title="Campo Obligatorio">*</span>
                                                        <br>
                                                        <span style ="color:#B3B3B3; font-size:14px">Esto nos ayuda a encontrar la respuesta lo más rapida posible. </span>
                                                    </label>
                                                </div>
                                                <div class="controls"> 
                                                    <select  name="solicitud" id="solicitud" value="" style="width:100%" class="no-search "> 
                                                        <option value="">Por favor selecciona una...</option>
                                                        <option value="ingreso">No puedo ingresar a mi cuenta</option>
                                                        <option value="registro">Tengo una pregunta antes de registrarme</option>
                                                        <option value="funcionalidad">Quiero solicitar una nueva funcionalidad</option> 
                                                        <option value="correo">No estoy recibiendo los correos de cuyapa</option>
                                                        <option value="confundido">Estoy confundido sobre el funcionamiento de algo</option>
                                                        <option value="roto">Creo que algo esta roto</option>
                                                        <option value="otro">Otro</option> 
                                                    </select> 
                                                </div> 
                                            </div>  
                                             
                                            <div class="control-group">
                                                <div>
                                                    <label class="control-label">Cual es tu pregunta, mensaje o error?
                                                        <span class="form-required" title="Campo Obligatorio">*</span>
                                                        <br>
                                                        <span style ="color:#B3B3B3; font-size:14px">Comparte todos los detalles, mientras más nos expliques más rápido podremos solucionarlo.</span>
                                                    </label>
                                                </div>
                                                <div class="controls">
                                                    <span class="wpcf7-form-control-wrap your-message">
                                                        <textarea name="mensaje" id="mensaje" cols="40" rows="10" style="width:100%"></textarea>

                                                    </span>
                                                </div>
                                            </div>

                                            <div class="control-group email">
                                                <div>
                                                    <label class="control-label">Correo electrónico
                                                        <span class="form-required" title="Campo Obligatorio">*</span>
                                                        <br>
                                                        <span style ="color:#B3B3B3; font-size:14px">A través de este correo te contactaremos, verifica que sea correcto.</span>
                                                    </label>
                                                </div>
                                                <div class="controls">
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input type="text" name="correo" id="correo" value="" size="40" style="width:100%">
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <input type="button" class="btn btn-primary arrow-right" value="Enviar Mensaje" onClick="enviarComentarioContacto();">
                                            </div> 
                                        </form> 
                                    </div>

                                    <div style="border-left:4px solid #ccc; margin-left:10px; padding-left:5px;">
                                                
                                        <h2 style=" color:#848282; font-size:14px;">Te atenderemos de lunes a viernes en horario de oficina, con respuestas limitadas los fines de semana.</h2>                       
                                    </div>
                                                    
                                </div>                                            
                                
                            </div>
                        </div> 
                 	</div>
                </div>
            </div>
             

        </div><!-- /#content -->
    </div><!-- /#wrapper-inner -->
