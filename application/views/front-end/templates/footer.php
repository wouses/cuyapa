
<div id="footer-wrapper">
    <div id="footer-top">
        <div id="footer-top-inner" class="container">
            <div class="row">
                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Nosotros</h2>
                    </div><!-- /.title -->

                    <div class="content" style="margin-top:-15px;">
                        <ul class="nav_foot">
                            <li><a href="<?php echo base_url(); ?>nosotros">Conoce Cuyapa</a></li>
                            <li><a href="<?php echo base_url(); ?>preguntas_frecuentes">Preguntas Frecuentes</a></li> 
                            <li><a href="<?php echo base_url(); ?>privacidad">Política de Privacidad</a></li>
                            <li><a href="<?php echo base_url(); ?>terminos_condiciones">Terminos y Condiciones</a></li> 
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span3">
                    <div class="title">
                        <h2 class="block-title">Comunidad</h2>
                    </div><!-- /.title -->

                    <div class="content" style="margin-top:-15px;"> 
                        <ul class="nav_foot">
                            <li><a href="http://productoreslocales.wordpress.com/" target="_blank">Blog</a></li>
                            <li><a href="http://twitter.com/cuyapa_vzla" target="_blank">Twitter</a></li> 
                            <li><a href="<?php echo base_url(); ?>contacto">Contactanos</a></li> 
                        </ul>
                    </div><!-- /.content -->
                </div><!-- /.widget -->
                <div class="widget span5">
                    <div >
                        <h2 style="color:#fff; margin:45px 30px;">Ayudando a conectar productores agrícolas y consumidores.</h2>
                    </div><!-- /.title -->

                    <div class="content" style="margin-top:-15px;"> 
                        <!-- <ul class="nav_foot">
                            <li><a href="#">Descripción</a></li> 
                            <li><a href="#">Como Funciona</a></li> 
                        </ul> -->
                    </div><!-- /.content -->
                </div><!-- /.widget -->

                <div class="widget span1">
                    <div class="title">
                        <h2 class="block-title"></h2>
                    </div><!-- /.title -->

                    <div class="content">
                        
                    </div><!-- /.content -->
                </div><!-- /.widget -->
            </div><!-- /.row -->
        </div><!-- /#footer-top-inner -->
    </div><!-- /#footer-top -->

    <div id="footer" class="footer container">
        <div id="footer-inner">
            <div class="row">
                <div class="span6 copyright">
                    <p>Hecho con cariño en La Victoria, Edo. Aragua. <img src="<?php echo base_url(); ?>img/g.png"></p>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/gmap3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/gmap3.infobox.min.js"></script>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49336306-1', 'cuyapa.com');
  ga('send', 'pageview');

</script>
<script>

        //When DOM loaded we attach click event to button
        $(document).ready(function() {
            
            //attach keypress to input
            $('.num_only').keydown(function(event) {
                // Allow special chars + arrows 
                if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 
                    || event.keyCode == 27 || event.keyCode == 13 
                    || (event.keyCode == 65 && event.ctrlKey === true) 
                    || (event.keyCode >= 35 && event.keyCode <= 39)){
                        return;
                }else {
                    // If it's not a number stop the keypress
                    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                        event.preventDefault(); 
                    }   
                }
            });
            
        });

    </script>
</body>
</html>