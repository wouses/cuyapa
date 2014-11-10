var first = true;

var path = '//localhost/cuyapa/';

function solucion_consumidor(){ 

	document.getElementById("btn_so_con").className = "btn btn-primary btn-large list-your-property active";
	document.getElementById("btn_so_con").style.background = "#ccc";
	document.getElementById("btn_so_prod").className = "btn btn-primary btn-large list-your-property";
	document.getElementById("btn_so_prod").style.background = "#5bc506";
	
	document.getElementById("so_con").style.display = "block";
	document.getElementById("so_prod").style.display = "none";
	
}

function solucion_productor(){ 

	document.getElementById("btn_so_con").className = "btn btn-primary btn-large list-your-property";
	document.getElementById("btn_so_con").style.background = "#5bc506";
	document.getElementById("btn_so_prod").className = "btn btn-primary btn-large list-your-property active";
	document.getElementById("btn_so_prod").style.background = "#ccc";
	
	document.getElementById("so_con").style.display = "none";
	document.getElementById("so_prod").style.display = "block";
	
}


function cargar_municipios(){

	var id =document.getElementById('estado_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_municipios.php',{id:id} , function(){
		
			var municipios = div.innerHTML;
			
			var select = document.getElementById("municipio_l");
			select.innerHTML = municipios;
	
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

function cargar_parcelamientos(){

	var id =document.getElementById('sector_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_parcelamientos.php',{id:id} , function(){
		
			var sectores = div.innerHTML;
			
			var select = document.getElementById("parcelamiento_l");
			select.innerHTML = sectores;
	
			$("#parcelamiento_l").val('').trigger("liszt:updated");
			
		});
			
	}else{
	
		var select = document.getElementById("parcelamiento_l");
select.innerHTML = '<option value="">No hay resultados</option>';

		$("#parcelamiento_l").val('').trigger("liszt:updated");
		
	}
}

function cargar_rubros(){

	var id =document.getElementById('categoria_l').value;
	
	if(id){
	
		var div = document.createElement('div');
		
		$(div).load(path+'ajax/varios/cargar_rubros.php',{id:id} , function(){
			
			var rubros = div.innerHTML;
			
			var select = document.getElementById("rubro_l");
			select.innerHTML = rubros;
	
			$("#rubro_l").val('').trigger("liszt:updated");
			
		});
			
	}else{
	
		var select = document.getElementById("rubro_l");
select.innerHTML = '<option value="">No hay resultados</option>';

		$("#rubro_l").val('').trigger("liszt:updated");
		
	}
}


function doChosen() {
        $(".chzn-select").chosen();
        $(".chzn-select-deselect").chosen({allow_single_deselect:true});
    }
 

function validar_contacto_prod(){
	form = document.forms['contacto_productor'];
	
	var nombre = form.nombre.value; 
	var codigo_telefono = form.codigo_telefono.value;
	var telefono = form.telefono.value;
	var correo = form.correo.value;
	var mensaje = form.mensaje.value;
	var id_usuario = form.id_usuario.value;
	
	if ((nombre != '' ) && (codigo_telefono != '' ) && (telefono != '' ) && (mensaje != '' )){
		
		if(!isNaN(telefono)){
			
			var div = document.createElement('div');
		
				$(div).load(path+'ajax/varios/enviar_mensaje_productor.php',{nombre:nombre, telefono:codigo_telefono+telefono, correo:correo, mensaje:mensaje, id_usuario:id_usuario} , function(){
				
					document.getElementById('msj_content').innerHTML='<div class="alert alert-success"><i class="icon-ok-sign"></i> <strong>Excelente!</strong> Tu mensaje ha sido enviado al productor.</div>'
				
				});
			
			
			
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> El teléfono debe ser númerico.</div>'
			
		}
		
		
	}else{
			
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
		
	}
	
}

function mostrarFormComentario(){
	
	document.getElementById('preComentario').style.display='none';
	
	document.getElementById('formComentario').style.display='block';
	
}

function enviarComentario(){ 
	
	var sistema_operativo = document.getElementById('sistema_operativo').value; 
	var navegador = document.getElementById('navegador').value; 
	var version = document.getElementById('version').value; 
	var email = document.getElementById('email_com').value; 
	var sentimiento = document.getElementById('sentimiento_com').value; 
	var asunto = document.getElementById('asunto_com').value; 
	var opinion = document.getElementById('opinion_com').value; 
	var ubicacion = 'portal';
 
	
	if( (email != '' ) && ( sentimiento != '') && ( asunto != '') && ( opinion != '')  ){
		
		if ( email.search("[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.][a-zA-Z]{2,}") == 0 ){
			
			var div = document.createElement('div');
		 
			$(div).load(path+'ajax/varios/enviar_comentario.php',{sistema_operativo:sistema_operativo, navegador:navegador, version:version, email:email, sentimiento:sentimiento, asunto:asunto, opinion:opinion, ubicacion:ubicacion} , function(){
			 
				document.getElementById('formComentario').innerHTML='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-ok-sign"></i> <strong>Gracias!</strong> Tu comentario ha sido enviado.</div>'
			
			}); 
			
		}else{
			
			document.getElementById('alert_com').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar un correo válido.</div>'
			
		}		
		
	}else{
		
		document.getElementById('alert_com').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
		
	}
	
}

function enviarComentarioContacto(){ 
	
	var sistema_operativo = document.getElementById('sistema_operativo').value; 
	var navegador = document.getElementById('navegador').value; 
	var version = document.getElementById('version').value; 
	var correo = document.getElementById('correo').value; 
	var solicitud = document.getElementById('solicitud').value;  
	var mensaje = document.getElementById('mensaje').value;  
 
	
	if( (correo != '' ) && ( solicitud != '') && ( mensaje != '') ){
		
		if ( correo.search("[a-zA-Z0-9]+@[a-zA-Z0-9]+[\.][a-zA-Z]{2,}") == 0 ){
			
			var div = document.createElement('div');
		 
			$(div).load(path+'ajax/varios/enviar_comentario_contacto.php',{sistema_operativo:sistema_operativo, navegador:navegador, version:version, correo:correo, solicitud:solicitud, mensaje:mensaje} , function(){
			 
				document.getElementById('contact-form').innerHTML='<h2>Tu mensaje se envio con éxito.</h2>';
			
			}); 
			
		}else{
			
			document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes ingresar un correo válido.</div>'
			
		}		
		
	}else{
		
		document.getElementById('alert1').innerHTML='<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><i class="icon-warning-sign"></i> <strong>Error!</strong> Debes completar todos los campos obligatorios.</div>'
		
	}
	
}