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
            if(isset($_REQUEST['err'])){
				if($_REQUEST['err']==1){
				 ?>
                    <div class="alert alert-error" style="margin-bottom:-20px;">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon-warning-sign"></i> <strong>Error!</strong> Las claves no coinciden.
                    </div> 
				<?php
				}else if($_REQUEST['err']==2){
				 ?>
                    <div class="alert alert-error" style="margin-bottom:-20px;">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                        <i class="icon-warning-sign"></i> <strong>Error!</strong> La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.
                    </div> 
				<?php
				}
            }else{
			?>
            <div class="alert alert-warning" style="margin-bottom:-20px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <i class="icon-info-sign"></i> <strong>Atenci&oacute;n!</strong> La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.
            </div>
        	<?php
			}
            ?>
			<h2 >REINICIO DE CLAVE</h2>
			<form action="<?php echo base_url(); ?>cambiar_clave" method='post'>
            	<input type="hidden" name="email" value="<?php echo $usuario; ?>">
            	<input type="hidden" name="cod_conf" value="<?php echo $cod_conf; ?>">
                <div class="control-group">
                   <p>Coloca tu nueva clave para tu cuenta en Cuyapa. </p>
                </div>
                <div class="control-group">
                    <div class="pw controls">
                        <input type="password" name="clave" placeholder="Nueva Clave" class='input-block-level'>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="pw controls">
                        <input type="password" name="clave2" placeholder="Repite la Clave" class='input-block-level'>
                    </div>
                </div> 
                
                <div class="submit"> 
                    <input type="submit" value="Cambiar" class='btn btn-primary'>
                </div>
                <br>

			</form>  
		</div>
	</div>
</body>

</html>