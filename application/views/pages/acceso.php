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
            if(isset($_REQUEST['err'])){ ?>
                <div class="alert alert-error" style="margin-bottom:-20px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-warning-sign"></i> <strong>Error!</strong> Correo electronico o clave incorrecta.
                </div>
            <?php
            } 
            if(isset($_REQUEST['cambio_clave'])){ 
				if($_REQUEST['cambio_clave']==1){
			?>
                <div class="alert alert-success" style="margin-bottom:-20px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> Se te han enviado las instrucciones para cambiar la clave, por favor revisa tu correo electrónico.
                </div>
            <?php
				}else if($_REQUEST['cambio_clave']==2){
			?>
                <div class="alert alert-success" style="margin-bottom:-20px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <i class="icon-ok-sign"></i> <strong>Excelente!</strong> La clave ha sido cambiada con éxito, ingresa a tu cuenta.
                </div>
            <?php
				}
            }
            ?>
			<h2>INGRESA</h2>
			<form action="<?php echo base_url(); ?>identificar" method='post'>
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='usuario' placeholder="Correo Electrónico" class='input-block-level'>
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
						<input type="password" name="clave" placeholder="Clave" class='input-block-level'>
					</div>
				</div>
				<div class="submit">
					<!-- <div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="green" id="remember"> <label for="remember">Recuerdame</label>
					</div> -->
					<input type="submit" value="Ingresar" class='btn btn-primary'>
				</div>
			</form>
			<div class="forget">
				<a href="<?php echo base_url(); ?>reinicio_clave"><span>Olvidaste tu clave?</span></a>
			</div>
		</div>
	</div>
</body>

</html>