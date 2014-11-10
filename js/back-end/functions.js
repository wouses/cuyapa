var first = true;

var path = '//localhost/cuyapa/';


function cargar_municipios(){

	var id =document.getElementById('estado_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_municipios.php',{id:id} , function(){
		
		var estados = div.innerHTML;
		
		var select = document.getElementById("municipio_l");
select.innerHTML = estados;

		$("#municipio_l").val('').trigger("liszt:updated");
		
		});
		
	}else{
	
		var select = document.getElementById("municipio_l");
select.innerHTML = '<option value="">No hay resultados</option>';

		$("#municipio_l").val('').trigger("liszt:updated");
		
	}
}


function cargar_parroquias(){

	var id =document.getElementById('municipio_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_parroquias.php',{id:id} , function(){
		
			var parroquias = div.innerHTML;
			
			var select = document.getElementById("parroquia_l");
			select.innerHTML = parroquias;
	
			$("#parroquia_l").val('').trigger("liszt:updated");
			
		});
			
	}else{
	
		var select = document.getElementById("parroquia_l");
select.innerHTML = '<option value="">No hay resultados</option>';

		$("#parroquia_l").val('').trigger("liszt:updated");
		
	}
}

function cargar_sectores(){

	var id =document.getElementById('parroquia_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_sectores.php',{id:id} , function(){
		
			var sectores = div.innerHTML;
			
			var select = document.getElementById("sector_l");
			select.innerHTML = sectores;
	
			$("#sector_l").val('').trigger("liszt:updated");
			
		});
			
	}else{
	
		var select = document.getElementById("sector_l");
select.innerHTML = '<option value="">No hay resultados</option>';

		$("#sector_l").val('').trigger("liszt:updated");
		
	}
}
 

function cargar_rubros(){
	
	var id = document.getElementById('categoria-select').value;
	
	
	if(id){
		
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/back-end/productor/cargar_rubros.php',{id:id} , function(){
		
		var rubros = div.innerHTML;
		
		var select = document.getElementById("rubro-select");
		select.innerHTML = rubros;
		
		$("#rubro-select").val('').trigger("liszt:updated");
		
		});
		
	}else{
		
		var select = document.getElementById("rubro-select");
		select.innerHTML = '<option value="">Seleccione</option>';
		
		$("#rubro-select").val('').trigger("liszt:updated");
		
	}
}

function cargar_modalidad_producto(){

	var id = document.getElementById('rubro-select').value;
	
	var div = document.createElement('div');

	$(div).load(path+'ajax/back-end/productor/cargar_modalidad_producto.php',{id:id} , function(){
	
		var opciones = div.innerHTML;
		
		var modalidades = document.getElementById("modalidad-select");
		modalidades.innerHTML = opciones;
		
		$("#modalidad-select").val('').trigger("liszt:updated");
		/*
		var usos = document.getElementById("uso-select");
		usos.innerHTML = sel[1];
		
		$("#uso-select").val('').trigger("liszt:updated");	*/
			
	});
	
}

function cargar_uso_modalidad(){
	
	var id_producto = document.getElementById('rubro-select').value;

	var id_modalidad = document.getElementById('modalidad-select').value;
	
	var div = document.createElement('div');

	$(div).load(path+'ajax/back-end/productor/cargar_uso_modalidad.php',{id_producto:id_producto, id_modalidad:id_modalidad } , function(){
	
		var opciones = div.innerHTML;
		
		var usos = document.getElementById("uso-select");
		usos.innerHTML = opciones;
		
		$("#uso-select").val('').trigger("liszt:updated");
			
	});
		
	
}


function cargar_tipo_guia(){

	var cat =document.getElementById('categoria-select').value;
	
	if(cat){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_guias.php',{cat:cat} , function(){
		
		var sub = div.innerHTML;
		
		var select = document.getElementById("subcategoria-select");
select.innerHTML = sub;
		
		});
		
	}else{
	
		var select = document.getElementById("subcategoria-select");
select.innerHTML = '<option value="">No hay resultados</option>';

		
	}
}

function doChosen() {
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
}

function insertar_cosecha_temp( calidad, cantidad, id_random, id_produccion ){
	var div = document.createElement('div');
		
	 $(div).load(path+'ajax/back-end/productor/insertar_calidad_cosecha_temp.php',{calidad:calidad, cantidad:cantidad, id_random:id_random, id_produccion:id_produccion} , function(){
		
		if(div.innerHTML.search('ok')!=-1){
			 
			var dato = div.innerHTML.split('-');
			
			//Eliminar primera fila
			if(dato[0]==1){
				document.getElementById("tabla-cosecha-cantidad").deleteRow(0);
			}
			
			//Insertar fila con datos
			var table=document.getElementById("tabla-cosecha-cantidad");
			var row=table.insertRow(0);
			var cell1=row.insertCell(0);
			var cell2=row.insertCell(1);
			var cell3=row.insertCell(2);
			cell1.innerHTML= cantidad+' Kg';
			cell2.innerHTML= calidad;
			cell3.innerHTML="<div align='center'><a onclick='eliminar_calidad_cosecha_temp(this, "+id_random+", "+id_produccion+", \""+calidad+"\")' style='color:red; cursor:pointer;'><i class='icon-remove'></i> Eliminar</a></div>";
			
			/*var x=document.getElementById('tabla-cosecha-cantidad').rows[0].cells;
			x[0].innerHTML = "New";*/
			
		}else{
			
			var msj = div.innerHTML;
			
			document.getElementById('alert2').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-warning-sign"></i> <strong>Error!</strong>'+msj+'</div>'
			
		}
		
	});
}

function eliminar_calidad_cosecha_temp(node, id_random, id_produccion, calidad){

	var i=node.parentNode.parentNode.rowIndex;
	document.getElementById('tabla-cosecha-cantidad').deleteRow(i);
	
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/productor/eliminar_calidad_cosecha_temp.php',{calidad:calidad, id_random:id_random, id_produccion:id_produccion} , function(){

		var tabla = document.getElementById('tabla-cosecha-cantidad');
		cantFilas = tabla.rows.length;
		
		if(cantFilas<1){
			
			var row=tabla.insertRow(0);
			var cell1=row.insertCell(0);
			cell1.setAttribute("colspan",3);
			cell1.innerHTML="No hay Resultados";
		}
		
		
	});
	
}


function insertar_modalidad_uso_temp( modalidad, uso, id_random ){
	
	var div = document.createElement('div');
		
	 $(div).load(path+'ajax/back-end/administrador/insertar_modalidad_uso_temp.php',{modalidad:modalidad, uso:uso, id_random:id_random} , function(){
		
		if(div.innerHTML.search('ok')!=-1){
			
			var dato = div.innerHTML.split('-');
			
			//Eliminar primera fila
			if(dato[0]==1){
				document.getElementById("tabla-modalidad-uso").deleteRow(0);
			}
			
			//Insertar fila con datos
			var table=document.getElementById("tabla-modalidad-uso");
			var row=table.insertRow(0);
			var cell1=row.insertCell(0);
			var cell2=row.insertCell(1);
			var cell3=row.insertCell(2);
			cell1.innerHTML= dato[2];
			cell2.innerHTML= dato[3];
			cell3.innerHTML="<div align='center'><a onclick='eliminar_modalidad_uso_temp(this, "+id_random+", "+modalidad+", \""+uso+"\")' style='color:red; cursor:pointer;'><i class='icon-remove'></i> Eliminar</a></div>";
			
			/*var x=document.getElementById('tabla-cosecha-cantidad').rows[0].cells;
			x[0].innerHTML = "New";*/
			
		}else{
			
			var msj = div.innerHTML;
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-warning-sign"></i> <strong>Error!</strong>'+msj+'</div>'
			
			document.body.scrollTop = document.documentElement.scrollTop = 0;
			
		}
		
	});
}

function eliminar_modalidad_uso_temp(node, id_random, modalidad, uso){

	var i=node.parentNode.parentNode.rowIndex;
	document.getElementById('tabla-modalidad-uso').deleteRow(i);
	
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/administrador/eliminar_modalidad_uso_temp.php',{modalidad:modalidad, uso:uso, id_random:id_random} , function(){

		var tabla = document.getElementById('tabla-modalidad-uso');
		cantFilas = tabla.rows.length;
		if(cantFilas<1){
			
			var row=tabla.insertRow(0);
			var cell1=row.insertCell(0);
			cell1.setAttribute("colspan",3);
			cell1.innerHTML="No hay Resultados";
		}
		
		
	});
	
}

function cargar_detalle_siembra(id){
	 
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/productor/cargar_detalle_siembra.php',{id:id} , function(){
			
		var dato = div.innerHTML.split('-');
				
		document.getElementById('cantidad_terreno_es').value=dato[0];
		
		document.getElementById('id_siembra').value = id;
		
		var medida = document.getElementById('medida_terreno_es');
		medida.innerHTML = dato[1];
		
		var financiamiento = document.getElementById('tipo_financiamiento_es');
		financiamiento.innerHTML = dato[2];
		
		$("#medida_terreno_es").val('').trigger("liszt:updated");
		
		$("#tipo_financiamiento_es").val('').trigger("liszt:updated");
		
		$('#modal-3').modal();
		
	});
	
	
}

function cargar_detalle_cosecha(id){
	
	var tabla = document.getElementById('tabla-cosecha-cantidad-ec'); 
	 
	for(var i = tabla.rows.length - 1; i > 0; i--)
	{
		tabla.deleteRow(i);
	}
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/productor/cargar_detalle_cosecha.php',{id:id} , function(){
 
		var separa = div.innerHTML.split('$');
		
		var dato = separa[0].split('-');
		//colocar superficie cosechada 
		
		document.getElementById('id_cosecha_ec').value=id;
				
		document.getElementById('cantidad_terreno_ec').value=dato[0];
		
		var cosecha = document.getElementById('medida_terreno_ec');
		cosecha.innerHTML = dato[1];
		
		$("#medida_terreno_ec").val('').trigger("liszt:updated");
		
		//colocar cantidades y calidad cosechadas
		
		var dato2 = separa[1].split('%');	
		var count = dato2.length; 
		
		if(count>=1){
			document.getElementById("tabla-cosecha-cantidad-ec").deleteRow(0);
		}  
		 
		for (var i=0;i<count;i++){
						
			var cal_cant = dato2[i].split('-'); 
				
			//Insertar fila con datos
			var table=document.getElementById("tabla-cosecha-cantidad-ec");
			var row=table.insertRow(0);
			var cell1=row.insertCell(0);
			var cell2=row.insertCell(1); 
			cell1.innerHTML= cal_cant[1]+' Kg';
			cell2.innerHTML= cal_cant[2];
			 
		}
		 
		$('#modal-4').modal();
		
	});
	
}

function cargar_detalle_inventario(producto, modalidad, uso){
	
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/productor/cargar_detalle_inventario.php',{producto:producto, modalidad:modalidad, uso:uso} , function(){
		 
		var datos = div.innerHTML.split('-');
		
		document.getElementById('producto_inv').innerHTML = datos[4];	
		document.getElementById('modalidad_inv').innerHTML = datos[5];	
		document.getElementById('uso_inv').innerHTML = datos[6];	
		
		if(datos[0]!=''){
			if(datos[0]>=1000){
				document.getElementById('1era').innerHTML = datos[0]/1000+' Ton';
			}else{ 
				if(datos[0]>0){
					document.getElementById('1era').innerHTML = datos[0]+' Kgs';
				}else{
					document.getElementById('1era').innerHTML = '0 Kgs';
				}
			}
		}else{
			document.getElementById('1era').innerHTML = '0 Kgs';
		}
		
		if(datos[1]!=''){
			if(datos[1]>=1000){
				document.getElementById('2da').innerHTML = datos[1]/1000+' Ton';
			}else{
				if(datos[1]>0){
					document.getElementById('2da').innerHTML = datos[1]+' Kgs';
				}else{
					document.getElementById('2da').innerHTML = '0 Kgs';
				} 
			}
		}else{
			document.getElementById('2da').innerHTML = '0 Kgs';
		}
		
		if(datos[2]!=''){
			if(datos[2]>=1000){
				document.getElementById('3era').innerHTML = datos[2]/1000+' Ton';
			}else{
				if(datos[2]>0){
					document.getElementById('3era').innerHTML = datos[2]+' Kgs';
				}else{
					document.getElementById('3era').innerHTML = '0 Kgs';
				}
			}
		}else{
			document.getElementById('3era').innerHTML = '0 Kgs';
		}
		
		if(datos[3]!=''){
			if(datos[3]>=1000){
				document.getElementById('SinCalificar').innerHTML = datos[3]/1000+' Ton';
			}else{
				if(datos[3]>0){
					document.getElementById('SinCalificar').innerHTML = datos[3]+' Kgs';
				}else{
					document.getElementById('SinCalificar').innerHTML = '0 Kgs';
				}
			}
		}else{
			document.getElementById('SinCalificar').innerHTML = '0 Kgs';
		}
 
		$('#modal-inv').modal();
		
	});
	
}

function habilitarEdicionCorreo(usuario){
	
	document.getElementById('alert1').innerHTML='<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button> <i class="icon-info-sign"></i> <strong>Atenci&oacute;n!</strong> Al editar el correo electrónico te enviaremos una confirmación para verificar que es el tuyo. ( luego podrás acceder a Cuyapa con el )</div>'
	
	document.getElementById('editar_correo').innerHTML='<form action="'+path+'usuario/cambiar_correo" method="post" name="form_conf_correo"><input type="hidden" name="usuario" value="'+usuario+'"><label for="textfield" class="control-label"><strong>Correo:</strong></label>  <div class="control-group"><label for="textfield" class="control-label">Nuevo correo electrónico</label><div class="controls"><input type="email" name="usuario_nuevo" title="Ingresa el nuevo correo electrónico" class="input-xlarge"></div></div><div class="control-group"><label for="textfield" class="control-label">Clave</label><div class="controls"><input type="password" name="clave" title="Ingresa tu clave de Cuyapa" class="input-xlarge"></div></div>  <button type="button" class="btn" onClick="cancelarEdicion(\''+usuario+'\')" >Cancelar</button>&nbsp;<button type="button" class="btn btn-primary" onClick="validar15()" >Guardar Cambios</button></form>';
	
	document.getElementById('editar_clave').innerHTML='<label for="textfield" class="control-label"><strong>Clave:</strong></label> <div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionClave(\''+usuario+'\');" ><i class="icon-edit"></i> Editar</button></div>';
 
}

function habilitarEdicionClave(usuario){
	
	document.getElementById('alert1').innerHTML='<div class="alert"><button type="button" class="close" data-dismiss="alert">×</button> <i class="icon-info-sign"></i> <strong>Atenci&oacute;n!</strong> La clave debe contener m&iacute;nimo 6 caracteres, un n&uacute;mero, una letra mayúscula y una minúscula.</div>'
	
	document.getElementById('editar_correo').innerHTML='<label for="textfield" class="control-label"><strong>Correo:</strong> '+usuario+'</label><div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionCorreo(\''+usuario+'\');" ><i class="icon-edit"></i> Editar</button></div>';
	
	document.getElementById('editar_clave').innerHTML='<form action="'+path+'usuario/cambiar_clave" method="post" name="form_conf_clave"><input type="hidden" name="usuario" value="'+usuario+'"><label for="textfield" class="control-label"><strong>Clave:</strong></label>  <div class="control-group"><label for="textfield" class="control-label">Clave Actual</label><div class="controls"><input type="password" name="clave" title="Ingresa tu clave actual de Cuyapa" class="input-xlarge"></div></div>  <div class="control-group"><label for="textfield" class="control-label">Clave Nueva</label><div class="controls"><input type="password" name="clave_nueva" title="Ingresa la nueva clave" class="input-xlarge"></div></div>  <div class="control-group"><label for="textfield" class="control-label">Repetir Clave Nueva</label><div class="controls"><input type="password" name="clave_nueva2" title="Repite la nueva clave" class="input-xlarge"></div></div>  <button type="button" class="btn" onClick="cancelarEdicion(\''+usuario+'\')" >Cancelar</button>&nbsp;<button type="button" class="btn btn-primary" onClick="validar14()" ><i class="icon-edit"></i> Guardar Cambios</button></form>';
	
}

function cancelarEdicion(usuario){
	
	document.getElementById('alert1').innerHTML='';
	
	document.getElementById('editar_correo').innerHTML='<label for="textfield" class="control-label"><strong>Correo:</strong> '+usuario+'</label><div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionCorreo(\''+usuario+'\');" ><i class="icon-edit"></i> Editar</button></div>';
	
	document.getElementById('editar_clave').innerHTML='<label for="textfield" class="control-label"><strong>Clave:</strong></label> <div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionClave(\''+usuario+'\');" ><i class="icon-edit"></i> Editar</button></div>';
}

function cambiar_clave(clave, clave_nueva, clave_nueva2, usuario){
	
	var div = document.createElement('div');
		
	$(div).load(path+'ajax/back-end/configuracion/cambiar_clave.php',{clave:clave, clave_nueva:clave_nueva, clave_nueva2:clave_nueva2} , function(){
		
		if(div.innerHTML.search('error')!=-1){
		 
			var datos = div.innerHTML.split('-');
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> '+datos[1]+'</div>';
			
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-ok-sign"></i> <strong>Excelente!</strong> La clave ha sido cambiada con éxito.</div>'
			
			document.getElementById('editar_clave').innerHTML='<label for="textfield" class="control-label"><strong>Clave:</strong></label> <div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionClave(\''+usuario+'\');" ><i class="icon-edit"></i> Editar</button></div>';
		
			
		}
	});
	
}

function cambiar_correo(clave, usuario_nuevo, usuario){
	
	var div = document.createElement('div');
		
	$(div).load(path+'cambiar_correo',{clave:clave, usuario_nuevo:usuario_nuevo} , function(){
		
		if(div.innerHTML.search('error')!=-1){
		 
			var datos = div.innerHTML.split('-');
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> '+datos[1]+'</div>';
			
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-ok-sign"></i> <strong>Excelente!</strong> El correo electrónico ha sido cambiado con éxito, por favor accede a el para confirmar el cambio.</div>'
			
			document.getElementById('editar_correo').innerHTML='<label for="textfield" class="control-label"><strong>Correo:</strong> '+usuario_nuevo+' (esperando confirmación)</label><div align="right" style="margin-top:-30px;"><button type="button" class="btn btn-primary" onClick="habilitarEdicionCorreo(\''+usuario_nuevo+'\');" ><i class="icon-edit"></i> Editar</button></div>';
			
			location.href=path+'confirmacion_cambio_correo/'+usuario_nuevo;		
			
		}
	});
	
}

function cargar_rubro_categoria_productor(){
	
	val = document.getElementById('categoria').value;
	
	alert(val);
	
}

function tipo_usuario_form(){
	
	var tipo_usuario =document.getElementById('tipo_usuario').value;
	
	switch(tipo_usuario){
		
		case '1' : {  
			document.getElementById('pro-cont').style.display='inline';
			document.getElementById('coord-cont').style.display='none';
			document.getElementById('admin-cont').style.display='none';
		}
		break;	
		
		case '2' :  {  
			document.getElementById('pro-cont').style.display='none';
			document.getElementById('coord-cont').style.display='inline';
			document.getElementById('admin-cont').style.display='none';
		}
		break;
		
		case '3' :  {
			document.getElementById('pro-cont').style.display='none';
			document.getElementById('coord-cont').style.display='none';
			document.getElementById('admin-cont').style.display='inline';
		}
		break;
	}
}

function abrir_form_com(){
	$('#modal-comentario').modal();	
}

function enviarComentarioBackend(){ 
	
	var nav_so = document.getElementById('nav_so_com').value; 
	var email = document.getElementById('email_com').value; 
	var sentimiento = document.getElementById('sentimiento_com').value; 
	var asunto = document.getElementById('asunto_com').value; 
	var opinion = document.getElementById('opinion_com').value; 
	var ubicacion = document.getElementById('ubicacion_com').value; 
	
	if( (email != '' ) && ( sentimiento != '') && ( asunto != '') && ( opinion != '')  ){
		
		if ( email.search("[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.][a-zA-Z]{2,}") == 0 ){
			
			var div = document.createElement('div');
		 
			$(div).load(path+'ajax/varios/enviar_comentario.php',{nav_so:nav_so, email:email, sentimiento:sentimiento, asunto:asunto, opinion:opinion, ubicacion:ubicacion} , function(){
			 	
				$('#modal-comentario').modal('hide')
				$('#modal-conf-com').modal(); 
				
				var sentimiento = document.getElementById('sentimiento_com').value=''; 
				var asunto = document.getElementById('asunto_com').value=''; 
				var opinion = document.getElementById('opinion_com').value=''; 
				
				
				$("#sentimiento_com").val('').trigger("liszt:updated");
				
				$("#asunto_com").val('').trigger("liszt:updated");
							
			
			}); 
			
		}else{
			
			document.getElementById('alert_com').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar un correo válido.</div>'
			
		}		
		
	}else{
		
		document.getElementById('alert_com').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
		
	}
	
}

function eliminar_siembra(){
	
	if(confirm('Deseas eliminar el registro? No podras recuperar la información')){
			
			var id_siembra = document.getElementById('id_siembra').value;
			
			location.href=path+'coordinador/productores_zona/produccion/eliminar_siembra/'+id_siembra;		
	} 
	
}

function eliminar_cosecha(){
	
	if(confirm('Deseas eliminar el registro? No podras recuperar la información')){
			
			var id_cosecha = document.getElementById('id_cosecha_ec').value;
			 
			location.href=path+'coordinador/productores_zona/produccion/eliminar_cosecha/'+id_cosecha;		
	} 
	
}

function buscarProductor(){

	var tipo_cedula_rif = document.getElementById('tipo_cedula_rif').value; 
	var cedula_rif = document.getElementById('cedula_rif').value; 

	if( (tipo_cedula_rif != '') && (cedula_rif != '') ){

		var div = document.createElement('div');
			 
		$(div).load(path+'ajax/back-end/coordinador/buscar_productor.php',{tipo_cedula_rif:tipo_cedula_rif, cedula_rif:cedula_rif} , function(){
			
			var dato = div.innerHTML.split('-');
			 
			if(dato[0].search('error')!=-1){
				
				document.getElementById('prod-info').style.display='none';
				
				if(dato[1]==1){
					document.getElementById('alert2').innerHTML='<div class="alert alert-error" style="margin-top:-21px"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> No se encontro productor con la cédula-rif ingresada</div>';
				}else if(dato[1]==2){
					document.getElementById('alert2').innerHTML='<div class="alert alert-error" style="margin-top:-21px"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El productor ya tiene un usuario asignado</div>';
				}
			}else{ 		  
				document.getElementById('nombre').value=dato[0]; 
				document.getElementById('id_productor').value=dato[1]; 
				
				document.getElementById('prod-info').style.display='block';
				document.getElementById('alert2').innerHTML='';
			 
			}
		}); 

	}else{

		document.getElementById('alert2').innerHTML='<div class="alert alert-error" style="margin-top:-21px"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar una cédula válida.</div>';
				

	}

}

function eliminarImagenPerfil(id_productor, tipo){

	var div = document.createElement('div');
			 
	$(div).load(path+'ajax/back-end/productor/eliminar_imagen_perfil.php',{id_productor:id_productor, tipo:tipo} , function(){
		
		if(div.innerHTML == 1){

			return;
		}
		 
		 
	}); 

}
 