<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49336306-1', 'cuyapa.com');
  ga('send', 'pageview');

</script>
<body class='login'>
	<div class="wrapper">
		<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/back-end/logo.png" alt="" class='retina-ready'></a></h1> 
		<div class="login-body">
        	<?php
            if(isset($err)){ ?>
                <div class="alert alert-error" style="margin-bottom:-20px;">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> No se encontro ningún usuario con ese correo electrónico en Cuyapa.
                </div>
            <?php
            }
            ?>
			<h2>REINICIO DE CLAVE</h2>
			<form action="<?php echo base_url(); ?>reinicio_clave" method='post'>
				<div class="control-group">
                	<p>Ingresa el correo electrónico que usaste al unirte a Cuyapa y te enviaremos las instrucciones para reiniciar tu clave. <br> 
                	Por razones de seguridad no conocemos tu clave. 
                    </p>
					<div class="email controls">
						<input type="text" name='email' placeholder="Correo Electrónico" class='input-block-level' style="float:left; width:220px;">
					<input type="submit" value="Enviar" class='btn btn-primary'>
					</div>
				</div>  
			</form> 
			<div class="forget">
				<a href="<?php echo base_url(); ?>acceso"><span>Regresar</span></a>
			</div>
		</div>
	</div>
</body>

</html>