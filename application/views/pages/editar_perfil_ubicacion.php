  <style>
	#map_content #map img { 
	max-width: none;
	vertical-align: baseline;
	}
	
	
	/* Bootstrap Css Map Fix*/
	#map_content #map label { 
	width: auto; display:inline; 
	} 


  </style>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCMpIyd8x6tH6UeFt4FxoiWIcuo9m6KW3M&sensor=true"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('No se puede determinar la dirección de esta ubicación.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
  
  document.getElementById('status').value = 1;
}

function updateMarkerPosition(latLng) {
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
  
  document.getElementById('ubicacion_lat_lon').value = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
  
  document.getElementById('ubicacion').value = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(<?php echo $productor['ubicacion_lat']; ?>, <?php echo $productor['ubicacion_long']; ?>);
  var map = new google.maps.Map(document.getElementById('map'), {
			scrollwheel: false,
    zoom: 15,
    center: latLng,
	mapTypeId: google.maps.MapTypeId.HYBRID
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Tu Ubicación Actual',
	icon: '<?php echo base_url(); ?>img/marker.png',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Moviendo...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Moviendo...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Movimiento Finalizado');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<body> 
	<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo base_url(); ?>productor" id="brand"></a>
			<a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Navegación"><i class="icon-reorder"></i></a>
			<ul class='main-nav'>
				<li>
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
						<li class='active'>
							<a href="<?php echo base_url(); ?>productor/editar_perfil">Editar Perfil</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>productor/configurar_cuenta">Configuración de la Cuenta</a>
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
                        <h1>Especificar Ubicación</h1>
                    </div>
                    <div class="pull-right">
                       
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="<?php echo base_url(); ?>productor/editar_perfil">Editar Perfil</a>
							<i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Especificar Ubicación</a>
                        </li>
                    </ul>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box"> 
                        	<div id="alert1">
                            </div>
                            <div class="span12" >
                                <div class="box-content nopadding" id="map_content">
                                	<br><br>

                                    <div id="map" style="height:400px; width:500px; float:left"></div>
                                    
                                    <div id="infoPanel" style="float:left; margin-left:20px;">
                                        <b>Estado de Marcador:</b>
                                        <div id="markerStatus"><i>Haz Click en el marcador y ubicalo en la posición que desees.</i></div>
                                        <b>Posición Actual:</b>
                                        <div id="info"></div>
                                        <b>Dirección más cercana:</b>
                                        <div id="address" style="min-height:100px; width:400px;"></div>
                                        
                                        <div style="margin-top:-40px;" >
                                        	<form method="post" action="<?php echo base_url(); ?>productor/editar_perfil/ubicacion" name="form_esp_ubi" >
                                                <input type="hidden" name="ubicacion_lat_lon" id="ubicacion_lat_lon">
                                                <input type="hidden" name="ubicacion" id="ubicacion">
                                                <input type="hidden" name="status" id="status" value="0">
                                                <button type="button" class="btn btn-primary" onClick="validar20()" >Guardar</button>
                                                <button type="button" class="btn" onClick="location.href='<?php echo base_url(); ?>productor/editar_perfil?nubi=1'">Cancelar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
			</div>
		</div>

	</body>
</html>