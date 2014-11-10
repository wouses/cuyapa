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

    <title><?php echo $titulo; ?></title>
    
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-49336306-1', 'cuyapa.com');
	  ga('send', 'pageview');
	
	</script>
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
                                            <div class="logo">
                                                <a href="<?php echo base_url(); ?>" title="Cuyapa">
                                                    <img src="img/logo.png" alt="Cuyapa" width="170">
                                                </a>
                                            </div><!-- /.logo -->

                                        </div><!-- /.logo-wrapper -->
                                    </div><!-- /.row -->
                                </div><!-- /.navbar-inner -->
                            </div><!-- /.navbar -->
                        </div><!-- /.container -->
                    </div><!-- /#header-inner -->
                </div><!-- /#header -->
            </div><!-- /#header-wrapper -->

           
            <!-- CONTENT -->
            <div id="content"><div class="map-wrapper">
                <div class="map">
                    <div id="map2" class="map-inner" style="background:center url(<?php echo base_url(); ?>img/fondo_nd<?php echo rand ( 1 , 2); ?>.jpg);">
                    	<div style=" margin-left:auto; margin-right:auto; width:100%; text-align:center; padding-top:40px;">
                       	 <h1 style="position:relative; line-height:55px; color:#fff; font-size:50px; text-shadow:1px 1px 4px #444;">Cuyapa está disponible solo para su uso en Venezuela.</h1>
                         <br>
<br>

                         <p style="color:#fff; font-size:20px;  text-shadow:1px 1px 4px #444;">Envianos tu correo para mayor información.</p>
                         <input type="text"><input type="submit" class="btn btn-primary btn-small">
                        </div>
                    </div><!-- /.map-inner -->
            </div><!-- /.map -->
        </div><!-- /.map-wrapper -->
        
        <div class="container">
            <div id="main">
                <div class="row">
                    <div class="span12" align="center">
                 
                	<p>&nbsp;</p>
                    <h2 style="font-size:30px;">Ayudando a conectar productores agrícolas y consumidores en todo el territorio nacional.</h2>
                    <p>&nbsp;</p>  
                      
                     
                    </div>
                </div><!-- /.bottom-inner -->
            </div><!-- /.bottom -->
        </div><!-- /.bottom-wrapper -->    
	</div><!-- /#content -->
</div><!-- /#wrapper-inner -->

<div id="footer-wrapper">
    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>Hecho con cariño en La Victoria, Edo. Aragua, Venezuela. <img src="<?php echo base_url(); ?>img/g.png"></p> 
                </div><!-- /.copyright -->
                <div class="span6 copyright">
                    <p style="float:right; font-size:10px;">© 2014 Cuyapa</p> 
                </div><!-- /.copyright -->


                <div class="span6 share">
                    <div class="content"> 
                    </div><!-- /.content -->
                </div><!-- /.span6 -->
            </div><!-- /.row -->
        </div><!-- /#footer-inner -->
    </div><!-- /#footer -->
</div><!-- /#footer-wrapper -->
</div><!-- /#wrapper -->
</div><!-- /#wrapper-outer -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.ezmark.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.currency.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/retina.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/carousel.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>libraries/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>libraries/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>libraries/iosslider/_src/jquery.iosslider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>libraries/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/realia.js"></script>

<script>
/*function initialize() {
	var input = document.getElementById('ubicacion');
	var autocomplete = new google.maps.places.Autocomplete(input);
}

google.maps.event.addDomListener(window, 'load', initialize);
*/
</script>
</body>
</html>

