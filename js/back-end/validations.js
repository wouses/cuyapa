//Insertar Siembra
function validar1(){
	
	var form = document.forms['form_siembra'];
	
	var cantidad_terreno = form.cantidad_terreno.value;
	var medida_terreno = form.medida_terreno.value;
	var tipo_financiamiento = form.tipo_financiamiento.value;
	var id_productor = form.id_productor.value
	
	if((cantidad_terreno != "") && (medida_terreno != "") && (tipo_financiamiento != "")){
		
		if(!isNaN(cantidad_terreno)){
			
			var div = document.createElement('div');
			
			$(div).load(path+'ajax/back-end/productor/verificar_cantidad_terreno.php',{cantidad_terreno:cantidad_terreno, medida_terreno:medida_terreno, id_productor:id_productor } , function(){
				
				if(div.innerHTML>=0){
					
					validar_confirm3(cantidad_terreno, medida_terreno, tipo_financiamiento);
					
				}else{
					
					document.getElementById('alert').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La superficie sembrada no puede ser mayor de la que dispones</div>'
					
				}
			
			});
		
		}else{
			
			document.getElementById('alert').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El campo cantidad debe ser un número.</div>'
			
		}
		
	}else{
	
		document.getElementById('alert').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
	
	}
}


function validar_confirm3(cantidad_terreno, medida_terreno, tipo_financiamiento){
	
	document.getElementById('cantidad_terreno').value = cantidad_terreno;
	document.getElementById('medida_terreno').value = medida_terreno;
	document.getElementById('tipo_financiamiento').value = tipo_financiamiento; 

	$('#modal-1').modal('hide');
	$('#modal-conf-siem').modal();
}

function enviar_registro_siembra(){
	form = document.forms['form_crear_siembra']; 
	 
	form.submit();
}

function cancelar_registro_siembra(){
	$('#modal-conf-siem').modal('hide');
	$('#modal-1').modal();
}

//Insertar calidad-cosecha
function validar2(){
	
	var calidad = document.getElementById('calidad_cosecha');
	var cantidad = document.getElementById('cantidad_cosecha');
	var id_random = document.getElementById('id_random');
	var id_produccion = document.getElementById('id_produccion');
	
	if((calidad.value != "") && (cantidad.value != "")){
		
		if(!isNaN(cantidad.value)){ 
		
		insertar_cosecha_temp( calidad.value, cantidad.value, id_random.value, id_produccion.value );
		
		calidad.selectedIndex = 0;
		
		$("#calidad_cosecha").val('').trigger("liszt:updated");
		
		cantidad.selectedIndex = 0;
		
		$("#cantidad_cosecha").val('').trigger("liszt:updated");
		
		}else{
	
			document.getElementById('alert2').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El campo cantidad para agregar cosecha debe ser un número.</div>'
		
		}
		
	}else{
	
		document.getElementById('alert2').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos cantidad y calidad para agregar cosecha.</div>'
		
	}
}

//insertar Cosecha
function validar3(){
	
	form = document.forms['form_cosecha'];
	
	var id_produccion = form.id_produccion.value;
	var id_random = form.id_random.value;
	var cantidad_terreno = form.cantidad_terreno.value;
	var medida_terreno = form.medida_terreno.value;
	
	if ((cantidad_terreno != '' ) && (medida_terreno != '' )){
		
		if(!isNaN(cantidad_terreno)){
			
			var div = document.createElement('div');
		
			$(div).load(path+'ajax/back-end/productor/verificar_calidad_cosecha_temp.php',{id_random:id_random, id_produccion:id_produccion} , function(){ 
			
				if(div.innerHTML==1){
					
					var div2 = document.createElement('div');
		
					$(div2).load(path+'ajax/back-end/productor/verificar_cantidad_sembrada.php',{cantidad_terreno:cantidad_terreno, medida_terreno:medida_terreno, id_produccion:id_produccion} , function(){
						 
						if(div2.innerHTML>=0){
								 
							
							 validar_confirm4(id_produccion, id_random, cantidad_terreno, medida_terreno);
							 
						}else{
							
							document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La cantidad cosechada no puede ser mayor a la sembrada en esta producci&oacute;n.</div>'
							
						}
					
					});
					
				}else{
					
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar al menos alguna cantidad cosechada.</div>'
					
				}
			
			});
			
		}else{
	
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El campo superficie debe ser un número.</div>'
		
		}
	}else{
		
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos para registrar la cosecha.</div>'
		
	}	
	
} 

function validar_confirm4(id_produccion, id_random, cantidad_terreno, medida_terreno){
	
	document.getElementById('id_produccion').value = id_produccion;
	document.getElementById('id_random_cn').value = id_random;
	document.getElementById('cantidad_terreno_cn').value = cantidad_terreno; 
	document.getElementById('medida_terreno_cn').value = medida_terreno; 

	$('#modal-2').modal('hide');
	$('#modal-conf-cose').modal();
}

function enviar_registro_cosecha(){
	form = document.forms['form_crear_cosecha']; 
	 
	form.submit();
}

function cancelar_registro_cosecha(){
	$('#modal-conf-cose').modal('hide');
	$('#modal-2').modal();
}


//insertar modalidad-uso - Rubro
function validar4(){
	
	var modalidad = document.getElementById('id_modalidad');
	var uso = document.getElementById('id_uso');
	var id_random = document.getElementById('id_random');
	
	if((modalidad.value != "") && (uso.value != "")){
	 	
		insertar_modalidad_uso_temp( modalidad.value, uso.value, id_random.value );
		
		modalidad.selectedIndex = 0;
		uso.selectedIndex = 0;
		
		$("#id_modalidad").val('').trigger("liszt:updated");
		$("#id_uso").val('').trigger("liszt:updated");
				
	}else{
	
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos modalidad y uso para agregarlo correctamente.</div>'
		
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	}
}

//insertar rubro
function validar5(){

	form = document.forms['form_crear_rubro'];
	
	var nombre = form.nombre.value;
	var id_categoria = form.id_categoria.value; 
	if(form.imagefile.value){
	var imagen = form.imagefile.value;
	}else{
	var imagen = '';	
	}
	var id_random = form.id_random.value;
	
	if ((nombre != '' ) && (id_categoria != '' )){
		
		if(imagen != ''){
			tipo_imagen = imagen.split('.');
			
			var ext =new Array("png","jpeg","gif","jpg");
			var filter =$.inArray(tipo_imagen[1], ext)
			  
			if(filter != -1 ){ 
			
				var div = document.createElement('div');
		
				$(div).load(path+'ajax/back-end/administrador/verificar_modalidad_uso_temp.php',{id_random:id_random} , function(){
					
					if(div.innerHTML==1){
						
						form.submit();
						
					}else{
						
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar al menos alguna modalidad-uso.</div>'
						
						document.body.scrollTop = document.documentElement.scrollTop = 0;
						
					}
				
				});
					 
			}else{
				
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La imagen debe tener un formato valido (.png, .jpg, .gif)</div>'
				document.body.scrollTop = document.documentElement.scrollTop = 0;	
				
			
			}
		}else{
			
			var div = document.createElement('div');
		
			$(div).load(path+'ajax/back-end/administrador/verificar_modalidad_uso_temp.php',{id_random:id_random} , function(){
				
				if(div.innerHTML==1){
					
					form.submit();
					
				}else{
					
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar al menos alguna modalidad-uso.</div>'
					
					document.body.scrollTop = document.documentElement.scrollTop = 0;
					
				}
			
			});
		}
	}else{
		
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
			
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	}
	
}

//crear producción
function validar6(){
	
	form = document.forms['form_produccion'];
	
	var nombre = form.nombre.value;
	var id_categoria = form.id_categoria.value;
	var id_producto = form.id_producto.value;
	var id_modalidad = form.id_modalidad.value;
	var id_uso = form.id_uso.value; 
	
	if((nombre != "") && (id_categoria != "") && (id_producto != "") && (id_modalidad != "") && (id_uso != "")){
	 	 
		validar_confirm2(nombre, id_categoria, id_producto, id_modalidad, id_uso);
		 	
	}else{
	
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
		
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	}
}



function validar_confirm2(nombre, id_categoria, id_producto, id_modalidad, id_uso){
	
	document.getElementById('nombre').value = nombre;
	document.getElementById('id_categoria').value = id_categoria;
	document.getElementById('id_producto').value = id_producto;
	document.getElementById('id_modalidad').value = id_modalidad;
	document.getElementById('id_uso').value = id_uso;

	$('#modal-pro').modal();
}

function enviar_registro_produccion(){
	form = document.forms['form_crear_produccion']; 
	 
	form.submit();
}


//Editar Perfil General
function validar7(){
	
	form = document.forms['form_perfil_general'];
	
	
	var logo = form.imagefile.value;
	var portada = form.imagefile2.value;
	var nombre = form.nombre.value;
	var tipo_cedula_rif = form.tipo_cedula_rif.value;
	var cedula_rif = form.cedula_rif.value;
	var descripcion = form.descripcion.value;
	var codigo_telefono = form.codigo_telefono.value;
	var telefono = form.telefono.value; 
	var direccion = form.direccion.value;
	var productor = form.productor.value;
	
	if( (nombre != "") && (tipo_cedula_rif != "") && (cedula_rif != "") && (codigo_telefono != "") && (telefono != "") && (direccion != "")){
		
		if(!isNaN(telefono)){
			
			if(!isNaN(cedula_rif)){ 
			
				if((logo != '' )){ 
					
					tipo_imagen = logo.split('.');
							
					var ext =new Array("png","jpeg","gif","jpg","JPG","JPEG","GIF","PNG");
					var filter =$.inArray(tipo_imagen[1], ext)
					  
					if(filter == -1 ){
				
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las im&aacute;genes deben tener un formato valido (.png, .jpg, .gif)</div>'
						document.body.scrollTop = document.documentElement.scrollTop = 0;	
						
						return;
					}
				}	
				
				if(portada != '' ){
				
					tipo_imagen = portada.split('.');
							
					var ext =new Array("png","jpeg","gif","jpg","JPG","JPEG","GIF","PNG");
					var filter =$.inArray(tipo_imagen[1], ext)
					  
					if(filter == -1 ){
				
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las im&aacute;genes deben tener un formato valido (.png, .jpg, .gif)</div>'
						document.body.scrollTop = document.documentElement.scrollTop = 0;	
						
						return;
					}
				}
				
				form.submit();
				
			}else{
				
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> C&eacute;dula o RIF debe ser un número.</div>'
				document.body.scrollTop = document.documentElement.scrollTop = 0;
	
				
			}
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Tel&eacute;fono debe ser un número.</div>'
			document.body.scrollTop = document.documentElement.scrollTop = 0;

			
		}
		
	}else{
		
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
		
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	}
	
	
}


//Editar Perfil General
function validar7sd(){
	
	form = document.forms['form_perfil_general'];
	
	
	var logo = form.imagefile.value;
	var portada = form.imagefile2.value;
	var nombre = form.nombre.value;
	var tipo_cedula_rif = form.tipo_cedula_rif.value;
	var cedula_rif = form.cedula_rif.value;
	var descripcion = form.descripcion.value;
	var codigo_telefono = form.codigo_telefono.value;
	var telefono = form.telefono.value;
	var correo = form.correo.value;
	var direccion = form.direccion.value;
	var productor = form.productor.value;
	
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/productor/verificar_imagenes_perfil.php',{productor:productor} , function(){
		
		var imagenes = div.innerHTML.split('-');
		
		if((imagenes[0]==1) && (logo=='')){
			logo = 'si';
		}
		
		if((imagenes[1]==1) && (portada=='')){
			portada = 'si';
		}
	 	
		
		if( (nombre != "") && (tipo_cedula_rif != "") && (cedula_rif != "") && (descripcion != "") && (codigo_telefono != "") && (telefono != "") && (correo != "") && (direccion != "")){
			
			if(logo != 'si'){
				
				tipo_imagen = logo.split('.');
			
				var ext =new Array("png","jpeg","gif","jpg");
				var filter =$.inArray(tipo_imagen[1], ext)
				  
				if(filter != -1 ){
					
					if(portada != 'si'){
				
						tipo_imagen2 = portada.split('.');
						
						var ext2 =new Array("png","jpeg","gif","jpg");
						var filter2 =$.inArray(tipo_imagen2[1], ext2)
						  
						if(filter2 != -1 ){
							
							if(!isNaN(telefono)){
								form.submit();
							}else{
								
								document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Tel&eacute;fono debe ser un número.</div>'
								document.body.scrollTop = document.documentElement.scrollTop = 0;
				
								
							}
							
						}else{
					
							document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las im&aacute;genes deben tener un formato valido (.png, .jpg, .gif)</div>'
							document.body.scrollTop = document.documentElement.scrollTop = 0;	
							
						
						}
					}else{
						if(!isNaN(telefono)){
							form.submit();
						}else{
							
							document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Tel&eacute;fono debe ser un número.</div>'
							document.body.scrollTop = document.documentElement.scrollTop = 0;
			
							
						}
					}
					
					
				}else{
			
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las im&aacute;genes deben tener un formato valido (.png, .jpg, .gif)</div>'
					document.body.scrollTop = document.documentElement.scrollTop = 0;	
					
				
				}
			}else{
			
				if(portada != 'si'){
				
					tipo_imagen2 = portada.split('.');
					
					var ext2 =new Array("png","jpeg","gif","jpg");
					var filter2 =$.inArray(tipo_imagen2[1], ext2)
					  
					if(filter2 != -1 ){
						
						if(!isNaN(telefono)){
							form.submit();
						}else{
							
							document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Tel&eacute;fono debe ser un número.</div>'
							document.body.scrollTop = document.documentElement.scrollTop = 0;
			
							
						}
						
					}else{
				
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las im&aacute;genes deben tener un formato valido (.png, .jpg, .gif)</div>'
						document.body.scrollTop = document.documentElement.scrollTop = 0;	
						
					
					}
				}else{
					
					if(!isNaN(telefono)){
						
						form.submit();
						
					}else{
						
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Tel&eacute;fono debe ser un número.</div>'
						document.body.scrollTop = document.documentElement.scrollTop = 0;
		
						
					}
				}
			}
					
		}else{
		
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos y cargar las imagenes.</div>'
			
			document.body.scrollTop = document.documentElement.scrollTop = 0;
			
		}
	
	});
	
	
}

//Editar perfil productos
function validar8(){
	
	form = document.forms['form_perfil_productos'];
	
	var id_categoria = form.id_categoria.value;
	var id_producto = form.id_producto.value;
	
	if((id_categoria != "") && (id_producto != "")){
	 	
		form.submit();
				
	}else{
	
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
		
		document.body.scrollTop = document.documentElement.scrollTop = 0;
		
	}
}




//Insertar calidad-cosecha
function validar11(){ 

	var calidad = document.getElementById('calidad_cosecha_ec');
	var cantidad = document.getElementById('cantidad_cosecha_ec');
	var id_random = document.getElementById('id_random2');
	var id_produccion = document.getElementById('id_produccion');
	
	if((calidad.value != "") && (cantidad.value != "")){
		
		if(!isNaN(cantidad.value)){
		
		insertar_cosecha_temp_editar( calidad.value, cantidad.value, id_random.value, id_produccion.value );
		
		
		calidad.selectedIndex = 0;
		
		$("#calidad_cosecha_ec").val('').trigger("liszt:updated");
		
		cantidad.selectedIndex = 0;
		
		$("#cantidad_cosecha_ec").val('').trigger("liszt:updated");
		
		}else{
	
			document.getElementById('alert5').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El campo cantidad para agregar cosecha debe ser un número.</div>'
		
		}
		
	}else{
	
		document.getElementById('alert5').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos cantidad y calidad para agregar cosecha.</div>'
		
	}
}

//Insertar redes sociales - perfil productor
function validar12(){ 
	form = document.forms['form_perfil_rs']; 
	 
	var facebook = document.getElementById('url_facebook');
	var twitter = document.getElementById('url_twitter');
	var google = document.getElementById('url_google');
	
		if(facebook.value != ""){
			var regex=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/i;
			 
			if(!regex.test(facebook.value)){
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las redes sociales deben ser urls validas (ej. "https://www.facebook.com/miusuario" ).</div>'
			
			return false;
			} 
		}
		
		if(twitter.value != ""){
			var regex=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/i;
			 
			if(!regex.test(twitter.value)){
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las redes sociales deben ser urls validas (ej. "https://www.facebook.com/miusuario" ).</div>'
			
			return false;
			} 
		}
		
		if(google.value != ""){
			var regex=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,3}|info|mobi|aero|asia|name)(:\d{2,5})?(\/)?((\/).+)?$/i;
			 
			if(!regex.test(google.value)){
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las redes sociales deben ser urls validas (ej. "https://www.facebook.com/miusuario" ).</div>'
			
			return false;
			} 
		} 
			
	form.submit();
}

//Validar perfil - ubicación
function validar13(){ 
	form = document.forms['form_perfil_ubi']; 

	var estado = form.estado.value;
	var municipio = form.municipio.value;
	var parroquia = form.parroquia.value;
	var sector = form.sector.value; 
	var cantidad_terreno = form.cantidad_terreno.value;
	var medida_terreno = form.medida_terreno.value;
	var ubicacion = form.ubicacion.value;
	 	
		if((estado != "") && (municipio != "") && (parroquia != "") && (sector != "") && (cantidad_terreno != "") && (medida_terreno != "") && (ubicacion != "")){
			
			if(!isNaN(cantidad_terreno)){
				form.submit();
			}else{
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El área de terreno debe ser un número.</div>'
			
			}
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}


//Validar perfil - especificar ubicacion
function validar20(){ 

	
	form = document.forms['form_esp_ubi']; 
	
	var status = document.getElementById('status').value;
	var ubicacion = document.getElementById('ubicacion').value;
	
	
		if(status != 0) { 
			form.submit(); 
				
		}else{
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La ubicación que deseas guardar es la que tenemos actualmente de ti.</div>'
			
		}
}


//Validar configurar cuenta - cambio clave
function validar14(){ 
	form = document.forms['form_conf_clave']; 
	
	var clave = form.clave.value;
	var clave_nueva = form.clave_nueva.value;
	var clave_nueva2 = form.clave_nueva2.value; 
	var usuario = form.usuario.value; 
	
		if((clave != "") && (clave_nueva != "") && (clave_nueva2 != "")){
		 
			if(clave_nueva.length>= 6 ){
				
				if(clave_nueva === clave_nueva2){
					if(clave != clave_nueva){
						cambiar_clave(clave, clave_nueva, clave_nueva2, usuario);	 
					}else{
					
						document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La clave nueva no puede ser igual a la actual, intenta con alguna otra.</div>'
					
					}
				}else{
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La clave nueva no concuerda con la confirmación de la clave nueva, intentalo de nuevo.</div>' 
				}
			}else{
				
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> La clave nueva debe ser de minimo 6 caracteres.</div>'
				
			}
		}else{
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
			
		}
}


//Validar configurar cuenta - cambio correo
function validar15(){ 
	form = document.forms['form_conf_correo']; 
	
	var clave = form.clave.value;
	var usuario_nuevo = form.usuario_nuevo.value;
	var usuario = form.usuario.value;
	
		if((clave != "") && (usuario_nuevo != "")){
			
			if ( usuario_nuevo.search("[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.][a-zA-Z]{2,}") == 0 ){
						
				cambiar_correo(clave, usuario_nuevo, usuario);
			}else{
				
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes colocar un correo v&aacute;lido.</div>'
					
			}
						
		}else{
				
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos.</div>'
			
		}
}

//Validar distribucion - crear cliente
function validar16(){ 
	form = document.forms['form_cliente_distribucion']; 
	
	var tipo_cedula_rif = form.tipo_cedula_rif.value;
	var cedula_rif = form.cedula_rif.value;
	var nombre = form.nombre.value;
	var direccion = form.direccion.value; 
	
		if((tipo_cedula_rif != "") && (cedula_rif != "") && (nombre != "")){
			 
			validar_confirm1(tipo_cedula_rif, cedula_rif, nombre, direccion);
		 
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}

function validar_confirm1(tipo_cedula_rif, cedula_rif, nombre, direccion){
	
	document.getElementById('tipo_cedula_rif_cli').value = tipo_cedula_rif;
	document.getElementById('cedula_rif_cli').value = cedula_rif;
	document.getElementById('nombre_cli').value = nombre;
	document.getElementById('direccion_cli').value = direccion;

	$('#modal-cli-dis').modal();
}

function enviar_registro_cliente(){
	form = document.forms['form_crear_cliente_distribucion']; 
	 
	form.submit();
}



//Validar administrador - crear categoria
function validar17(){ 
	form = document.forms['form_crear_categoria']; 
	 
	var nombre = form.nombre.value; 
	
		if((nombre != "")){
			 
			form.submit();
		 
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}

//Validar administrador - crear variedad
function validar18(){ 
	form = document.forms['form_crear_variedad']; 
	 
	var nombre = form.nombre.value; 
	
		if((nombre != "")){
			 
			form.submit();
		 
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}

//Validar administrador - crear variedad
function validar19(){ 
	form = document.forms['form_crear_uso']; 
	 
	var nombre = form.nombre.value; 
	
		if((nombre != "")){
			 
			form.submit();
		 
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}

//Validar administrador - crear variedad
function validar21(){ 
	form = document.forms['form_importar_bd']; 
	 
	var archivo = form.archivo.value; 
	
		if((archivo != "")){
			 
			form.submit();
		 
		}else{
			
			document.getElementById('alert_ibd').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes cargar un archivo para restaurar la base de datos.</div>'
			
		}
}


//Validar crear distribucion
function validar22(){ 
	form = document.forms['form_distribucion']; 
	 
	var cliente = form.cliente.value;   
	var id = form.elements['id[]'];
	var cantidad = form.elements['cantidad[]'];
	var unidad_peso = form.elements['unidad_peso[]'];
	var suma = 0; 
	var cont = 0;
	
	if(cantidad.length){
		alert('entre 1');
		var dist = new Array();
		var j = 0;
		for(i=0 ; i < cont; i++){ 
			if(cantidad[i].value > 0){
				 if(cantidad[i].value>1000){
					var x=1; 
				 }
				dist[j] = [ id[i].value , cantidad[i].value , unidad_peso[i].value ]; 
				suma ++;
				j++;
			}
			
		}
	}else{ 
	
		if(cantidad.value){ 
			var dist = new Array();
			var j = 0;
			if(cantidad.value>1000){ 
				var x=1; 
			}
			 
			dist[j] = [ id.value , cantidad.value , unidad_peso.value ];
			suma=1;
				
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes definir una cantidad a distribuir en alguno de tus rubros disponibles.</div>'
			return;
		}
	}
	
	
	if(x==1){
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> la cantidad no debe ser mayor a lo disponible en inventario.</div>'
		return;	
	}
	  
	if((suma > 0) && (cliente != '')){
		$('#modal-dis').modal();
		document.getElementById('cliente').value = cliente;
		document.getElementById('dist').value = dist;
		document.getElementById('cant').value = cantidad.length;
		
	}else{
	
		if( cliente == '' ){
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes seleccionar un cliente para la distribución.</div>'
		}else{
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes definir una cantidad a distribuir en alguno de tus rubros disponibles.</div>'
			
		}
	}
		
}

function enviar_registro_distribucion(){
	form = document.forms['form_crear_distribucion']; 
	 
	form.submit();
}


function validar23(){ 
	form = document.forms['form_editar_distribucion']; 
	 
	var tipo_cedula_rif = form.tipo_cedula_rif.value; 
	var cedula_rif = form.cedula_rif.value; 
	var nombre = form.nombre.value; 
	var direccion = form.direccion.value; 
	
		if((tipo_cedula_rif != "") && (cedula_rif != "") && (nombre != "") && (direccion != "")){
			 
			form.submit();
		 
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
			
		}
}

//Insertar productor (coordinador)
function validar24(){
	
	var form = document.forms['form_registro_productor_coordinador'];
	
	var nombre = form.nombre.value;
	var tipo_cedula_rif = form.tipo_cedula_rif.value;
	var cedula_rif = form.cedula_rif.value;
	var codigo_telefono = form.codigo_telefono.value;
	var telefono = form.telefono.value;
	var cantidad_terreno = form.cantidad_terreno.value;
	var medida_terreno = form.medida_terreno.value;
	var municipio = form.municipio.value;
	var sector = form.sector.value; 
	var direccion = form.direccion.value; 
	
	if((nombre != "") && (tipo_cedula_rif != "") && (cedula_rif != "") && (cantidad_terreno != "") && (medida_terreno != "") && (municipio != "") && (sector != "") ){
 
 		var div = document.createElement('div');
			
		$(div).load(path+'ajax/back-end/coordinador/verificar_productor.php',{tipo_cedula_rif:tipo_cedula_rif , cedula_rif:cedula_rif  } , function(){
			
			if(div.innerHTML==1){ 
			 	form.submit();
			}else{
				document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Esta Cédula/RIF ya pertenece a un productor registrado.</div>'
		
			}
		
		});
			
	}else{
	
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos.</div>'
		
	}
}

//asignar usuario productor
function validar25(){
	
	var form = document.forms['form_asignar_usuario_productor'];

	var id_productor = form.id_productor.value; 
	
	var correo = form.correo.value;
	var clave = form.clave.value;
	var clave2 = form.clave2.value; 
	
	if(id_productor){
	
		if((correo != "") && (clave != "") && (clave2 != "")){
		
			if ( correo.search("[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.][a-zA-Z]{2,}") == 0 ){
				if(clave.localeCompare(clave2)==0){
				
					var div = document.createElement('div');
						
					$(div).load(path+'ajax/back-end/coordinador/validar_clave.php',{ clave:clave } , function(){
						
						form.submit();
					});
				}else{
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Las claves no coinciden.</div>'			
				}
			}else{
					document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El correo que ingreso no es válido.</div>'			
			}
		}else{
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar los campos obligatorios.</div>'
		}
	}else{
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes buscar el productor al que deseas asignar el usuario.</div>'
	}
}


