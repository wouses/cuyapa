<style>
.chzn-search{ display:none; }
</style>
<script src="<?php echo base_url(); ?>js/back-end/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript"> 
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'x'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                    'Clickea el gráfico y arrastra para hacer zoom' :
                    'Clickea el gráfico y arrastra para hacer zoom'
        },
        xAxis: {
            type: 'datetime',
            minRange: 15 * 24 * 3600000 // fourteen days
        },
        yAxis: {
            title: {
                text: 'Visitas'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'Visitas',
            pointInterval: 24 * 3600 * 1000,
            pointStart: Date.UTC(2014, 9, 1),
            data: [
                1, 2, 0, 1,    0, 0,    1, 1,    0, 3, 0,2,1,0,1 
            ]
        }]
    });
});
</script>
  <body>
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>productor" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li class='active'>
					<a href="<?php echo base_url(); ?>productor">
						<span>Panel</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url(); ?>productor/produccion">
						<span>Producciones</span>
					</a>
				</li>
                <li>
					<a href="<?php echo base_url(); ?>productor/inventario">
						<span>Inventario</span>
					</a>
				</li>
                <li>
					<a href="<?php echo base_url(); ?>productor/distribucion">
						<span>Distribución</span>
					</a>
				</li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Herramientas y Análisis</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">  
                        <li>
							<a href="<?php echo base_url(); ?>productor/herramientas/estadisticas">Estadísticas</a>
						</li>                   
						<li>
							<a href="<?php echo base_url(); ?>productor/herramientas/guias">Guias Instructivas</a>
						</li>
                        <li>
							<a href="<?php echo base_url(); ?>productor/herramientas/contactos">Contactos de Interés</a>
						</li>
                    </ul>
                </li>
                <li>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<span>Otros</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">     
                        <li>
							<a href="<?php echo base_url(); ?>productor/otros/clientes">Clientes</a>
						</li>     
                    </ul>
                </li>
			</ul>
			<div class="user">
            	<ul class="icon-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-envelope"></i><span class="label label-lightred"><?php echo $contar_mensajes; ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
                        	<?php 
							if($vp_mensajes){
								foreach($vp_mensajes as $vp_mensaje){
								?>
								<li>
									<a href="<?php echo base_url(); ?>productor/mensaje/<?php echo $vp_mensaje['id']; ?>"> 
										<div class="details">
											<div class="name"><?php echo $vp_mensaje['nombre']; ?></div>
											<div class="message">
												<?php echo $vp_mensaje['mensaje']; ?>
											</div>
										</div>
									</a>
								</li>
								<?php
								}
							}else{
							?>  
                            	<li>
                                	<a><div align="center">No hay mensajes nuevos</div></a>
                                </li>
                            <?php	
							}
							?>
                            <li>
								<a href="<?php echo base_url(); ?>productor/mensaje" class="more-messages">Centro de Mensajes <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $_SESSION['nombre']; ?> <img src="<?php echo base_url().$_SESSION['imagen']; ?>" alt="" style="height:27px;"></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo base_url(); ?>productor/editar_perfil">Editar Perfil</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>usuario/configurar_cuenta">Configuración de la Cuenta</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>productor/ayuda">Ayuda</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>cerrar_sesion">Cerrar Sesión</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="content">
		<div id="left" class="no-resize">
        <?php 
			if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
				include $_SERVER['DOCUMENT_ROOT'].'/ajax/back-end/productor/barra_lateral.php';	
			}
			else{
				include $_SERVER['DOCUMENT_ROOT'].'/cuyapa/ajax/back-end/productor/barra_lateral.php';			
			} 
		?>
		</div>
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Panel</h1>
					</div>
					<div class="pull-right">
						&nbsp;
					</div>
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							<a href="more-login.html">Panel</a>
							<i class="icon-angle-right"></i>
						</li>
					</ul>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
                    		<?php
                    			if($productor['status']==0){
                    		?>
                        	<div class="alert alert"> 
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <i class="icon-info-sign"></i> <strong>Algo que deberias saber!</strong> Se te ha creado un perfil público en nuestro portal para que establecimientos y consumidores te contacten, sin embargo esta inactivo. <br>Para activarlo por favor completa la información faltante haciendo <span style="text-decoration:underline; cursor:pointer"><strong><a href="<?php echo base_url(); ?>productor/editar_perfil" style="color:#E0C300;">Click Aqui</a></strong></span>.

                            </div>
                            <?php 
                            	}
                            ?>
							<div class="box-title">
								<h3>
									<i class="icon-group"></i>
									Visitas Perfil
								</h3>
							</div>
							<div class="box-content">
								<?php
		                			if($productor['status']==0){
		                				?>
			                				<h3>No has activado tu perfil público</h3>									
										<?php
									}else{
										?> 
											<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
										<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
                <!--
                <div class="row-fluid" >
					<div class="span6">
						<div class="box">
							<div class="box-title">
								<h3> 
									Grax
								</h3>
							</div>
							<div class="box-content"> 
                            	
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-flag"></i>
									Denuncia Gubernamental
								</h3>
							</div>
							<div class="box-content"> 
                            	<a href="#" class="btn" style="margin-top:-10px;" rel="popover" data-trigger="hover" title="" data-content="Al enviarnos una denuncia nos aseguraremos que sea recibida por los entes competentes, (Tu información ira adjunta a la misma) enviala con toda la seriedad que la misma requiere." data-original-title="Denuncias"><i class="icon-question-sign" style="size:12px;"></i> Como Funciona?</a>
                                
								<div style="margin-left:140px;">
                                <br>
                                <div class="control-group">
                                    <label for="textfield" class="control-label">Tipo de Denuncia</label>
                                    <div class="controls">
                                      <div style="width:220px; float:left">
                                      <select name="tipo_denuncia" id="tipo_denuncia" class="chosen-select" >
                                            <option value="">Seleccione</option>
                                        </select> 
                                    </div>
                                </div>
                                <br>
								<br>
                                <div class="control-group">
                                    <label for="textfield" class="control-label">Descripción</label>
                                    <div class="controls">
                                        <textarea name="descripcion_denuncia" placeholder="Describe tu problema aquí"></textarea>
                                    </div>
                                </div>
                                
								<input type="reset" class="btn" data-dismiss="modal" aria-hidden="true" value="Restablecer" >
								<button class="btn btn-primary" onClick="validar3()" >Guardar</button>
								</div>
							</div>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		</div>

	</body>
</html>