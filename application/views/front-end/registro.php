
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
                                <li><a href="<?php echo base_url(); ?>productores">Productores</a></li>
                                <li><a href="<?php echo base_url(); ?>rubros">Rubros</a></li>
                            </ul><!-- /.nav -->
<!--
                            <form method="get" class="site-search" action="">
                                <div class="input-append">
                                    <input title="Ingresa lo que deseas buscar en Cuyapa" class="search-query span2 form-text" placeholder="Buscar" type="text" name="">
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
            <h1 class="page-header">Únete como productor agrícola a Cuyapa.</h1>
            <div class="login-register">
<div class="row">
<div class="span4">
    <ul class="tabs nav nav-tabs">
        <li><a href="#acceso">Acceso</a></li>
        <li class="active"><a href="#registro">Registro</a></li>
    </ul>
    <!-- /.nav -->

    <div class="tab-content">
        <div class="tab-pane" id="acceso">
            <form method="post" action="<?php echo base_url(); ?>identificar">
                <div class="control-group">
                    <label class="control-label" for="inputLoginLogin">
                        Correo Electrónico:
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="email" name="usuario" required title="Ingresa tu correo electrónico">
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->

                <div class="control-group">
                    <label class="control-label" for="inputLoginPassword">
                        Clave:
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="password" name="clave" required title="Ingresa tu clave">
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->

                <div class="form-actions">
                    <input type="submit" value="Acceder" class="btn btn-primary arrow-right">
                </div>
                <!-- /.form-actions -->
            </form>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane active" id="registro">
        	<?php if(isset($error)){ ?>
				<?php if($error==1){ ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Las claves no coinciden, vuelve a intentarlo.
                </div>
                <?php }else if($error==2){  ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Este correo ya ha sido utilizado.
                </div>
                <?php }else if($error==3){  ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Esta Cédula/Rif ya ha sido utilizada.
                </div>
                <?php }else if($error==4){  ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Por favor completa todos los campos.
                </div>
                <?php }else if($error==5){  ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.
                </div>
                <?php } ?>
            <?php } ?>
            <form method="post" action="<?php base_url(); ?>registro">
            	<input type="hidden" name="send" value="1">
                
                <div class="control-group">
                    <label class="control-label">
                        Nombre
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="text" name="nombre" value="<?php if(isset($nombre)){ echo $nombre; } ?>" required title="Ingresa tu nombre, el de tu compañia o cooperativa">
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->
				
				<div class="control-group">
                    <label class="control-label">
                        Cédula o RIF
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
						<select style="width:60px;" name="tipo_cedula_rif" class="no-search" title="Selecciona el tipo de documento">
							<?php if(isset($tipo_cedula_rif)){ ?>
                            	<option><?php if($tipo_cedula_rif){ echo $tipo_cedula_rif; } else { echo "--"; }?></option>
								<?php if($tipo_cedula_rif!='V'){ ?><option>V</option><?php } ?>
								<?php if($tipo_cedula_rif!='E'){ ?><option>E</option><?php } ?>
								<?php if($tipo_cedula_rif!='J'){ ?><option>J</option><?php } ?>
                            <?php } else{ ?>
								<option value="">--</option>
								<option>V</option>
								<option>E</option>
								<option>J</option>
							<?php } ?>
						</select>
						<input type="text" title="Ingresa tu cédula o rif" name="cedula_rif" value="<?php if(isset($cedula_rif)){ echo $cedula_rif; } ?>" style="width:265px;" maxlength="9" class=" num_only" required>
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->

                <div class="control-group">
                    <label class="control-label">
                        Correo Electrónico
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="email" name="usuario" title="Ingresa tu correo electrónico" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(.[a-zA-Z0-9-]+)*$" value="<?php if(isset($usuario)){ echo $usuario; } ?>" required>
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->
				<div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-info-sign"></i> <strong>Atenci&oacute;n!</strong> La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Clave:
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="password" name="clave" required title="Ingresa tu clave">
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->

				<div class="control-group">
                    <label class="control-label" for="inputRegisterEmail">
                        Repetir Clave:
                        <span class="form-required" title="Campo obligatorio.">*</span>
                    </label>

                    <div class="controls">
                        <input type="password" name="clave2" required title="Repite la clave">
                    </div>
                    <!-- /.controls -->
                </div>
                <!-- /.control-group -->
                
                <div class="form-actions">
                    <input type="submit" value="Registrar" class="btn btn-primary arrow-right">
                </div>
                <!-- /.form-actions -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.span4-->

<div class="span8">
    <h2 class="page-header">Porque ser parte de Cuyapa?</h2>

    <div class="images row">
        <div class="item span2">
            <img src="<?php echo base_url(); ?>img/negocio.png" alt="">

            <h3>Tu Negocio <br>en linea</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="<?php echo base_url(); ?>img/estadistica.png" alt="">

            <h3>Gestiona tus producciones</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="<?php echo base_url(); ?>img/dispositivos.png" alt="">

            <h3>Conectate desde cualquier lugar</h3>
        </div>
        <!-- /.item -->
        <div class="item span2">
            <img src="<?php echo base_url(); ?>img/dinero.png" alt="">

            <h3>Genera más<br>ingresos</h3>
        </div>
        <!-- /.item -->
    </div>
    <!-- /.row -->

    <hr class="dotted">

    <p>
       Cuyapa es una comunidad que te ayuda a mejorar la forma en que gestionas tus producciones, el como interactuas con los consumidores y a ingresar exitosamente al Mercado Nacional.
    </p>

    <p> Actualmente solo está disponible para productores agrícolas ubicados Municipio José Félix Ribas en el Estado Aragua (Venezuela), ya que por los momentos contamos con las herramientas para esta zona en específico, más adelante se dara alcance a todo el país. estamos trabajando lograrlo!</p>

    <ul class="unstyled ">
        <li>
                                        <span class="inner">
                                            <strong>Tu negocio en linea</strong><br>

                                                Todos los sectores económicos han migrado exitosamente a internet, Buscamos lograr lo mismo contigo para que puedas vender tus rubros a través de internet.

                                        </span>
        </li>

        <li>
                                        <span class="inner">
                                            <strong>Gestiona tus producciones</strong><br>
                                                Sabemos que el ser un productor agrícola no es solo el vender tus rubros, por eso hemos creado toda una plataforma para ayudarte a mejorar la forma en que gestionas tus producciones, analizar estadísticas de las mismas y asi lograr mejorarlas.
                                        </span>
        </li>

        <li>
                                        <span class="inner">
                                            <strong>Conectate desde cualquier lugar</strong><br>
                                                Queremos que puedas acceder desde la mayor cantidad de formas a Cuyapa por lo que te ofrecemos una aplicación web y una aplicación android, para que puedas conectarte en donde y cuando quieras. 
                                        </span>
        </li>
        
        <li>
                                        <span class="inner">
                                            <strong>Genera más ingresos</strong><br>
                                                Todas nuestras ventajas están enfocadas en ayudarte a que generes más beneficios y ademas Cuyapa es totalmente Grátis. Unete Ahora! 
                                        </span>
        </li>
    </ul>
</div>
</div>
<!-- /.row -->
</div><!-- /.login-register -->        </div>
    </div>
</div>

    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
