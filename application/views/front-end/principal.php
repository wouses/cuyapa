<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Cuyapa.com">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> 
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css">
    <link rel="stylesheet" href="libraries/chosen/chosen.css" type="text/css">
    <link rel="stylesheet" href="libraries/bootstrap-fileupload/bootstrap-fileupload.css" type="text/css">
    <link rel="stylesheet" href="libraries/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css" type="text/css">
    <link rel="stylesheet" href="css/realia-gray-green.css" type="text/css" id="color-variant-default">

    <title>Cuyapa</title>
    
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCMpIyd8x6tH6UeFt4FxoiWIcuo9m6KW3M&sensor=true"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/gmap.js"></script>
    <script type="text/javascript">
		var path = '//localhost/cuyapa/';
		var map;
		$(document).ready(function(){ 
		  map = new GMaps({
			scrollwheel: false,
			div: '#map',
			lat: 10.224545908823114,
			lng: -67.31806120629886,
			zoom: 13,
			mapTypeId: google.maps.MapTypeId.HYBRID
			
		  });
	
		  GMaps.geolocate({
			success: function(position){
				map.setCenter(position.coords.latitude, position.coords.longitude);
				
				var lati = position.coords.latitude;
				var long = position.coords.longitude; 
				var list_prod = '';
				var div = document.createElement('div');
				 
				$(div).load(path+'ajax/varios/cargar_productores_geo.php',{lati:lati, long:long} , function(){
					 
					datos = div.innerHTML.split('%');
					 
					num = datos.length; 
					 
					for(i=0; i<num; i++){ 
						
						productor = datos[i].split('$'); 
						 
						if(productor[2]==''){
						productor[2]='img/sin_imagen.jpg';	
						}
						
						var prod = productor[7].replace(" ","_");
					
						map.addMarker({
							lat: productor[5],
							lng: productor[6],
							icon: 'img/marker.png',
							title: productor[7], 
							
							infoWindow: {
								content: '<div class="infobox"><div class="image"><img src="'+path+productor[2]+'" width="74" alt=""></div><div class="title"><a href="'+path+productor[0]+'/'+prod+'">'+productor[7]+'</a></div><div class="area"><span class="value">'+productor[4]+' - '+productor[3]+'</span></div><div class="price"> </div><div class="link"><a href="'+path+productor[0]+'/'+prod +'">Ver más</a></div></div>' 
							}
							});
							 
							list_prod = list_prod+'<div class="property span3"><div class="image" style="height:200px;"><div class="content"  style="height:200px;" ><a href="'+path+productor[0]+'/'+prod+'"></a><img src="'+path+productor[2]+'" alt="" height="180px"></div><div class="reduced">Ver más </div></div><div class="title"><h2><a href="'+path+productor[0]+'/'+prod +'">'+productor[7]+'</a></h2></div><div class="location">'+productor[4]+' - '+productor[3]+'</div></div>';
						}
				
					document.getElementById('prod_geo').innerHTML= list_prod;
				
				});
			  
			},
			error: function(error){
				
			  document.getElementById('alert-principal').style.display= 'block';
			  document.getElementById('title-prin').innerHTML= 'Productores que pueden interesarte';
				
		      var list_prod = '';
			  var div = document.createElement('div');
			  $(div).load(path+'ajax/varios/cargar_productores_sin_geo.php',{} , function(){
					 	 
					datos = div.innerHTML.split('%');
					
					num = datos.length; 
					
					for(i=0; i<num; i++){
						
						productor = datos[i].split('$'); 
						
						if(productor[2]==''){
						productor[2]='img/sin_imagen.jpg';	
						}
						
						var prod = productor[7].replace(" ","_");
					
						map.addMarker({
							lat: productor[5],
							lng: productor[6],
							icon: 'img/marker.png',
							title: productor[7], 
							
							infoWindow: {
								content: '<div class="infobox"><div class="image"><img src="'+path+productor[2]+'" width="74" alt=""></div><div class="title"><a href="'+path+productor[0]+'/'+prod+'">'+productor[7]+'</a></div><div class="area"><span class="value">'+productor[4]+' - '+productor[3]+'</span></div><div class="price"> </div><div class="link"><a href="'+path+productor[0]+'/'+prod+'">Ver más</a></div></div>' 
							}
						});
						 
						list_prod = list_prod+'<div class="property span3"><div class="image" style="height:200px;"><div class="content"  style="height:200px;" ><a href="'+path+productor[0]+'/'+prod+'"></a><img src="'+path+productor[2]+'" alt="" height="200px"></div><div class="reduced">Ver más </div></div><div class="title"><h2><a href="'+path+productor[0]+'/'+prod+'">'+productor[7]+'</a></h2></div><div class="location">'+productor[4]+' - '+productor[3]+'</div></div>';
					}
				
					document.getElementById('prod_geo').innerHTML= list_prod;
					
					
				
				});	
			},
			not_supported: function(){
				
			   document.getElementById('alert-principal').style.display= 'block';
			   document.getElementById('title-prin').innerHTML= 'Productores que pueden interesarte';
			   
			   var list_prod = '';
			   var div = document.createElement('div');
			   $(div).load(path+'ajax/varios/cargar_productores_sin_geo.php',{} , function(){
					 	 
					datos = div.innerHTML.split('%');
					
					num = datos.length; 
					
					for(i=0; i<num; i++){
						
						productor = datos[i].split('$'); 
						
						if(productor[2]==''){
						productor[2]='img/sin_imagen.jpg';	
						}
						
						var prod = productor[7].replace(" ","_");
					
						map.addMarker({
							lat: productor[5],
							lng: productor[6],
							icon: 'img/marker.png',
							title: productor[7], 
							
							infoWindow: {
								content: '<div class="infobox"><div class="image"><img src="'+path+productor[2]+'" width="74" alt=""></div><div class="title"><a href="'+path+productor[0]+'/'+prod+'">'+productor[7]+'</a></div><div class="area"><span class="value">'+productor[4]+' - '+productor[3]+'</span></div><div class="price"> </div><div class="link"><a href="'+path+productor[0]+'/'+prod+'">Ver más</a></div></div>' 
							}
						});
						 
						list_prod = list_prod+'<div class="property span3"><div class="image" style="height:200px;"><div class="content"  style="height:200px;" ><a href="'+path+productor[0]+'/'+prod+'"></a><img src="'+path+productor[2]+'" alt="" height="200px"></div><div class="reduced">Ver más </div></div><div class="title"><h2><a href="'+path+productor[0]+'/'+prod+'">'+productor[7]+'</a></h2></div><div class="location">'+productor[4]+' - '+productor[3]+'</div></div> ';
						
						
					}
				
					document.getElementById('prod_geo').innerHTML= list_prod;
					
					
				
				});
			},
			always: function(){			 
				
			}
		  });
		}); 
		
	</script>
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-49336306-1', 'cuyapa.com');
	  ga('send', 'pageview');
	
	</script>
    <style>
	.infobox {
line-height:1.35;
overflow:hidden;
white-space:nowrap;
} 
	.chzn-container{
	border: 1px solid #ccc;	
	}
	 
	</style>
</head>
<body>
<?php 
	$ip_info = (unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']))); 

	if((strcmp($ip_info['geoplugin_countryCode'],'VE')!=0) && (strcmp($ip_info['geoplugin_countryCode'],'US')!=0)) {
		//header("Location: ".base_url()."no_disponible");
	}


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
                                            <a href="#nav" class="hidden-desktop" id="btn-nav">Navegación</a>

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
                                <li><a href="<?php echo base_url(); ?>categorias">Rubros</a></li>
                            </ul><!-- /.nav -->
 
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
            
            <div id="alert-principal" style="display:none;">
            Actualmente Cuyapa se encuentra disponible solamente en algunos municipios del estado Aragua. <a href="<?php echo base_url(); ?>nosotros"><strong>¿Por qu&eacute;?</strong></a>
            </div>

            <!-- CONTENT -->
            <div id="content"><div class="map-wrapper">
    <div class="map">
        <div id="map" class="map-inner"></div><!-- /.map-inner -->

        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="property-filter pull-right">
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
                </div><!-- /.span3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.map -->
</div><!-- /.map-wrapper -->
<div class="container">
    <div id="main">
        <div class="row">
            <div class="span9">
                <h1 class="page-header" id="title-prin">Productores Cerca de T&iacute;</h1>
                <div class="properties-grid">
                    <div class="row" id="prod_geo" style="margin-top:-20px;">
                      <div align="center" class="span9" style="margin-top:40px;"><img src="<?php echo base_url(); ?>img/loading.gif"> Cargando Productores</div>
                    </div><!-- /.row -->
                </div><!-- /.properties-grid -->
            </div>
            <div class="sidebar span3">
            		<br>
                    <div class="property-filter property-filter-white property-filter-point widget" id="preComentario" onClick="mostrarFormComentario()">
                    	<div class="content">
                            <h3 style="margin-top:-10px;">Envianos tu Comentario</h3> 
                            <div align="center">
                                <img src="<?php echo base_url();?>img/coments.png">
                            </div>
                        </div>
                    </div>
                    <div class="property-filter property-filter-white widget" id="formComentario" style="display:none">
                        <div class="content">
                        	<div id="alert_com"></div> 
                        	<form method="post" name="form-enviar-comentario">
                            <input type="hidden" value="<?php echo $nav_so['os']; ?>" name="sistema_operativo" id="sistema_operativo">
                            <input type="hidden" value="<?php echo $nav_so['browser']; ?>" name="navegador" id="navegador">
                            <input type="hidden" value="<?php echo $nav_so['version']; ?>" name="version" id="version">
                            <div class="control-group">
                                <label class="control-label" for="inputLoginLogin">
                                    Correo Electrónico:
                                    <span class="form-required" title="Campo obligatorio.">*</span>
                                </label>
            
                                <div class="controls">
                                    <input type="email" name="email" id="email_com" required title="Ingresa tu correo electrónico" style="height:26px; width:215px;">
                                </div>
                                <!-- /.controls -->
                            </div>
                            <div class="type control-group">
                                <label class="control-label" for="inputType">
                                    Me siento
                                    <span class="form-required" title="Campo obligatorio.">*</span>
                                </label>
                                <div class="controls">
                                    <select name="sentimiento" id="sentimiento_com" class="no-search" title="Selecciona como te sientes con respecto a tu comentario" >
                                        <option value="">---</option>
                                        <option>Molesto</option>
                                        <option>Confundido</option>
                                        <option>Feliz</option>
                                        <option>Entretenido</option>
                                        <option>Impresionado</option>
                                        <option>Sorprendido</option>
                                        <option>Decepcionado</option>
                                        <option>Frustrado</option>
                                        <option>Curioso</option>
                                        <option>Indiferente</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="type control-group">
                                <label class="control-label" for="inputType">
                                    El Comentario es Sobre
                                    <span class="form-required" title="Campo obligatorio.">*</span>
                                </label>
                                <div class="controls">
                                    <select name="asunto" id="asunto_com" class="no-search" title="Selecciona sobre que es tu comentario" >
                                        <option value="">---</option>
                                        <option>Diseño</option>
                                        <option>Funcionalidad</option>
                                        <option>Una idea</option>
                                        <option>Un error</option>
                                        <option>Otro</option> 
                                    </select> 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPropertyNotes">
                                    Danos tú Opinión
                                    <span class="form-required" title="Campo obligatorio.">*</span>
                                </label>
                                <div class="controls">
                                    <textarea name="opinion" id="opinion_com" required title="Explicanos la situación" style="max-height:150px; min-width:216px; max-width:216px;"> </textarea>
                                </div> 
                            </div> 
                            <div class="form-actions">
                                <input type="button" value="Enviar Comentario" class="btn btn-primary btn-large" onClick="enviarComentario()">
                            </div><!-- /.form-actions -->
                            </form>
                        </div><!-- /.content -->
                    </div><!-- /.property-filter --> 
            </div>
        </div>
        <p>&nbsp;</p>
	 </div>
</div>

<div class="bottom-wrapper">
    <div class="bottom container">
        <div class="bottom-inner row">
		
            <h1 align="left">Cuyapa tu Soluci&oacute;n Agr&iacute;cola</h1>
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
                    <p>Los productos agrícolas locales siembre son más frescos y económicos porque no tarda tiempo entre intermediarios, el precio puede reducirse casi a la mitad! eso es una gran diferencia.</p> 
                </div><!-- /.item -->
    
                <div class="item span4">
                    <img src="<?php echo base_url(); ?>img/corazon.png" alt="">
                    <h2><a>Apoya la Producción Nacional</a></h2>
                    <p>Cuyapa es un gran esfuerzo por ayudar a la producción nacional a ofrecer productos agrícolas frescos y de muy buena calidad al mercado, utilizar la plataforma es un granito de arena y lo apreciamos.</p> 
                </div><!-- /.item -->
            </div>
            
        </div><!-- /.bottom-inner -->
    </div><!-- /.bottom -->
</div><!-- /.bottom-wrapper -->    </div><!-- /#content -->
</div><!-- /#wrapper-inner -->

