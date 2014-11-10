<style>
.chzn-search{ display:none; }
</style>
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
    
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCMpIyd8x6tH6UeFt4FxoiWIcuo9m6KW3M&sensor=true"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/gmap.js"></script
>    <script type="text/javascript">
    var map;
    $(document).ready(function(){ 
      map = new GMaps({
		scrollwheel: false,
        div: '#map',
        lat: <?php echo $productor['ubicacion_lat']; ?>,
        lng: <?php echo $productor['ubicacion_long']; ?>,
		zoom:15,
		mapTypeId: google.maps.MapTypeId.HYBRID,
		
      });
	  
      map.addMarker({
        lat: <?php echo $productor['ubicacion_lat']; ?>,
        lng: <?php echo $productor['ubicacion_long']; ?>, 
		icon: '<?php echo base_url(); ?>img/marker.png'
      });
    });
  </script> 
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
    
    $fecha = time();
    $nav_so = detect();

    $sql = 'SELECT fecha FROM productores_visitas_perfil WHERE id_productor = '.$productor['id'].' ORDER BY id DESC LIMIT 1';
    $cursor = mysql_query($sql);
    $num = mysql_num_rows($cursor);

    if($num){ 
        $datos = mysql_fetch_array($cursor);
        $fecha_ult = intval($datos['fecha'])+50;
        
        if( $fecha > $fecha_ult ){

            $sql = 'INSERT INTO productores_visitas_perfil (id_productor, fecha, sistema_operativo, navegador, version)values ('.$productor['id'].', "'.$fecha.'","'.$nav_so['os'].'", "'.$nav_so['browser'].'", "'.$nav_so['version'].'")';
            mysql_query($sql); 

        } 
    }else{
        $sql = 'INSERT INTO productores_visitas_perfil (id_productor, fecha, sistema_operativo, navegador, version)values ('.$productor['id'].', "'.$fecha.'","'.$nav_so['os'].'", "'.$nav_so['browser'].'", "'.$nav_so['version'].'")';
        mysql_query($sql);
    }
 
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
                                <li><a href="<?php echo base_url(); ?>categorias">Rubros</a></li> 
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
            <div id="content"><div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header"><?php echo $productor['nombre']; ?></h1>

                <div class="carousel property">
                	<div class="profile-pic" style="position:absolute; margin-top:190px; margin-left:20px; border:5px solid #fff; box-shadow:0 1px 1px #888;">
                    <img src="<?php if($productor['imagen']){ echo base_url().$productor['imagen']; }else{  echo base_url().'img/sin_imagen_g.jpg'; }?>" style="width:270px; height:200px;">
                    </div>
                    
                    <div class="preview">
                        <img src="<?php if($productor['imagen_portada']){ echo base_url().$productor['imagen_portada']; }else{  echo base_url().'img/fondo_perfil'.rand(1,4).'.jpg'; }?>" style="width:870px; height:420px;">
                    </div><!-- /.preview -->
					
                </div>
                <!-- /.carousel -->

                <div class="property-detail">
                    <div class="pull-left overview">
                        <div class="row">
                            <div class="span3">
                                <h2>Información</h2>

                                <table>
                                	<tr>
                                        <th>Cédula / Rif:</th>
                                        <td><?php echo $productor['tipo_cedula_rif'].'-'.$productor['cedula_rif']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Teléfono:</th>
                                        <td><?php echo $productor['telefono']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Correo:</th>
                                        <td><?php echo $productor['correo']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Estado:</th>
                                        <td><?php echo $productor['estado']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Municipio:</th>
                                        <td><?php echo $productor['municipio']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Dirección:</th>
                                        <td><?php echo $productor['direccion']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.span2 -->
                        </div>
                        <!-- /.row -->
                    </div>
					<div style="min-height:230px;">
                    <p><?php echo $productor['descripcion']; ?></p>
                     
					</div>
                    <br>
                    <h2>Nuestros Rubros</h2>

                    <div class="row">
                    	<div class="accordion" id="accordion2" style="margin-left:40px; margin-top:-10px;">
                        <?php
							$cat = ''; 
							if($productos){
								foreach($productos as $producto){
							 
									if($cat != $producto['categoria']){
										
										$cat = $producto['categoria'];
										
										echo '<h3>'.ucwords($cat).'</h3>';
										 
									}
								 
								 echo '<p>  - '.ucwords($producto['rubro']).'</p>';
								}
							}else{
								echo "<h3>No hay rubros disponibles en estos momentos</h3>";	
							}
						?>
                               
                            
                            
                        </div>
						 
                    </div>

                    <h2>Nuestra Ubicación</h2>

                    <div id="map"></div><!-- /#property-map -->
                </div>

            </div>
            <div class="sidebar span3">
               
                <div class="widget contact">
                <br>
<br>
<br>

    <div class="title">
        <h2 class="block-title">Contactar Productor</h2>
    </div><!-- /.title -->

    <div class="content" id="msj_content">
        <div id="alert1"></div>
        <form method="post" name="contacto_productor">
        <input type="hidden" name="id_usuario" value="<?php echo $productor['id_usuario']; ?>">
            <div class="control-group">
                <label class="control-label" for="inputName">
                    Nombre
                    <span class="form-required" title="Campo Obligatorio">*</span>
                </label>
                <div class="controls">
                    <input type="text" id="inputName" name="nombre" title="Ingresa tu nombre o el de la compañia que representas" style=" height:40px;">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->
            
            <div class="control-group">
                <label class="control-label" for="inputPhone">
                    Teléfono
                    <span class="form-required" title="Campo Obligatorio">*</span>
                </label>
                <div class="controls"> 
                   	<select name="codigo_telefono" title="Selecciona el código de teléfono" style="width:80px;"> 
                        <option value="">--</option> 
                        <option>0412</option>
                        <option>0414</option> 
                        <option>0424</option> 
                        <option>0416</option> 
                        <option>0426</option> 
                    </select> 
                    <input type="text" id="inputPhone" name="telefono" title="Ingresa tu número de teléfono" style="width:146px; height:40px;">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->


            <div class="control-group">
                <label class="control-label" for="inputEmail">
                    Correo 
                </label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="correo" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(.[a-zA-Z0-9-]+)*$" title="Ingresa tu correo electrónico" style=" height:40px;">
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="control-group">
                <label class="control-label" for="inputMessage">
                    Mensaje
                    <span class="form-required" title="Campo Obligatorio">*</span>
                </label>

                <div class="controls">
                    <textarea id="inputMessage" name="mensaje" title="Escribe lo que deseas decirle al productor"></textarea>
                </div><!-- /.controls -->
            </div><!-- /.control-group -->

            <div class="form-actions">
                <input type="button" class="btn btn-primary arrow-right" onClick="validar_contacto_prod();" value="Enviar">
            </div><!-- /.form-actions -->
        </form>
    </div><!-- /.content -->
</div><!-- /.widget -->
                <div class="widget properties last">
     
     			</div>
            </div>
        </div>
    </div>
</div>
    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->
