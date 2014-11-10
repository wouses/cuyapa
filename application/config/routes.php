<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
	

//FRONT - END

$route['default_controller'] = "principal"; 
$route['404_override'] = 'principal/pre_cuatro_cero_cuatro';
$route['404'] = 'principal/cuatro_cero_cuatro';
$route['productor/404'] = 'productor/cuatro_cero_cuatro';
$route['coordinador/404'] = 'coordinador/cuatro_cero_cuatro';
$route['404'] = 'principal/cuatro_cero_cuatro';
$route['404'] = 'principal/cuatro_cero_cuatro';
$route['contacto'] = "principal/contacto";
$route['nosotros'] = "principal/nosotros";
$route['productores'] = "principal/productores";
$route['categorias'] = "principal/categorias";
$route['rubros/(:any)'] = "principal/rubros/$1";
$route['productores/(:any)/(:any)'] = "principal/productores_rubro/$1/$2";
$route['preguntas_frecuentes'] = "principal/preguntas_frecuentes";
$route['privacidad'] = "principal/privacidad";
$route['terminos_condiciones'] = "principal/terminos_condiciones";
$route['registro'] = "principal/registro";
$route['registro_informacion_adicional'] = "principal/registro_informacion_adicional";
$route['insertar_productor'] = "principal/insertar_productor";
$route['culminacion_registro/(:any)'] = "principal/culminacion_registro/$1";
$route['confirmacion_correo/(:any)/(:any)'] = "principal/confirmacion_correo/$1/$2";
$route['publicidad']="principal/publicidad";
$route['publicidad/crear_anuncio']="principal/crear_anuncio";
$route['publicidad/insertar_anuncio']="principal/insertar_anuncio";
$route['acceso'] = "principal/acceso";
$route['reinicio_clave'] = "principal/reinicio_clave"; 
$route['reinicio_clave/(:any)/(:any)'] = "principal/cambio_clave/$1/$2";
$route['cambiar_clave'] = "principal/nueva_clave";
$route['cambiar_correo'] = "usuario/cambiar_correo";
$route['confirmacion_cambio_correo/(:any)'] = "principal/confirmacion_cambio_correo/$1";
$route['identificar'] = "usuario/identificar_usuario";
$route['cerrar_sesion'] = "usuario/cerrar_sesion";
$route['no_disponible'] = "principal/no_disponible";
$route['(:num)/(:any)'] = "principal/perfil/$1";


//BACK - END 
		
	//Productor
	
		$route['productor']="productor";
		$route['productor/produccion']="productor/produccion";
		$route['productor/produccion/(:num)']="productor/detalle_produccion/$1";
		$route['productor/produccion/crear']="productor/crear_produccion";
		$route['productor/produccion/editar/(:num)']="productor/editar_produccion/$1";
		$route['productor/produccion/insertar']="productor/insertar_produccion";
		$route['productor/produccion/insertar_siembra']="productor/insertar_siembra";
		$route['productor/produccion/editar_siembra']="productor/editar_siembra";
		$route['productor/produccion/insertar_cosecha']="productor/insertar_cosecha";
		$route['productor/produccion/editar_cosecha']="productor/editar_cosecha";
		$route['productor/produccion/eliminar/(:num)']="productor/eliminar_produccion/$1";
		$route['productor/inventario'] = "productor/inventario";
		$route['productor/distribucion'] = "productor/distribucion";
		$route['productor/distribucion/crear'] = "productor/crear_distribucion";
		$route['productor/distribucion/(:num)'] = "productor/detalle_distribucion/$1";
		$route['productor/distribucion/cliente/(:num)/agregar_distribucion'] = "productor/distribucion";
		$route['productor/mensaje'] = "productor/mensaje";
		$route['productor/mensaje/(:num)'] = "productor/mensaje_detalle/$1";
		$route['productor/eliminar_mensaje/(:num)'] = "productor/eliminar_mensaje/$1";
		$route['productor/editar_perfil'] = "productor/editar_perfil";
		$route['productor/editar_perfil/ubicacion'] = "productor/editar_perfil_ubicacion"; 
		$route['productor/configurar_cuenta'] = "usuario/configurar_cuenta";		
		
		$route['productor/herramientas/estadisticas'] = "productor/estadisticas";
		$route['productor/herramientas/guias'] = "productor/buscar_guias";
		$route['productor/herramientas/contactos'] = "productor/contactos_interes";
		$route['productor/herramientas/contactos/(:num)/(:any)'] = "productor/detalle_contactos_interes/$1/$2"; 
		
		$route['productor/otros/clientes'] = "productor/cliente";
		$route['productor/otros/cliente/crear']="productor/crear_cliente";
		$route['productor/otros/cliente/editar']="productor/editar_cliente";
		$route['productor/otros/cliente/editar/(:num)']="productor/editar_cliente/$1";
		$route['productor/otros/cliente/eliminar/(:num)']="productor/eliminar_categoria/$1";
		
		//Exportar
		$route['exportar/inventario/(pdf|excel)/(:num)'] = "exportar/inventario/$1/$2";
		$route['exportar/produccion/(pdf|excel)/(:num)/(:num)'] = "exportar/produccion/$1/$2/$3";
	
	
	//Coordinador
	
		$route['coordinador']="coordinador";
		$route['coordinador/configurar_cuenta'] = "usuario/configurar_cuenta";
		
		$route['coordinador/registrar_productor'] = "coordinador/registrar_productor";
		$route['coordinador/editar_productor/(:num)'] = "coordinador/editar_productor/$1";
		$route['coordinador/asignar_usuario_productor'] = "coordinador/asignar_usuario_productor";
		$route['coordinador/asignar_usuario_productor/(:num)'] = "coordinador/asignar_usuario_productor/$1";
		$route['coordinador/activar_productor'] = "coordinador/activar_productor_listado";
		$route['coordinador/activar_productor/(:num)/(:any)/([0-1])'] = "coordinador/activar_eliminar_productor/$1/$3";
		$route['coordinador/activar_productor/(:num)/(:any)'] = "coordinador/activar_productor_detalle/$1";
		
		$route['coordinador/productores_zona'] = "coordinador/productores_zona";  
		$route['coordinador/productores_zona/(:num)/(:any)/produccion/crear'] = "coordinador/crear_produccion/$1"; 
		$route['coordinador/productores_zona/(:num)/(:any)/produccion/(:num)'] = "coordinador/detalle_produccion/$1/$3";
		$route['coordinador/productores_zona/(:num)/(:any)/editar'] = "coordinador/editar_productor/$1";
		$route['coordinador/productores_zona/(:num)/(:any)'] = "coordinador/detalles_productor_zona/$1";    
		 
		$route['coordinador/productores_zona/produccion/insertar_siembra']="coordinador/insertar_siembra"; 
		$route['coordinador/productores_zona/produccion/insertar_cosecha']="coordinador/insertar_cosecha";
		$route['coordinador/productores_zona/produccion/eliminar_produccion/(:num)']="coordinador/eliminar_produccion/$1";  
		$route['coordinador/productores_zona/produccion/eliminar_siembra/(:num)']="coordinador/eliminar_siembra/$1"; 
		$route['coordinador/productores_zona/produccion/eliminar_cosecha/(:num)']="coordinador/eliminar_cosecha/$1";
		
		$route['coordinador/rubro_zona'] = "coordinador/rubros_zona"; 
		 
		
	
	//Administrador
	
		$route['administrador']="administrador";
		$route['administrador/configurar_cuenta'] = "usuario/configurar_cuenta";
		
		$route['administrador/categoria']="administrador/categoria";
		$route['administrador/categoria/crear']="administrador/crear_categoria";
		$route['administrador/categoria/editar']="administrador/editar_categoria";
		$route['administrador/categoria/editar/(:num)']="administrador/editar_categoria/$1";
		$route['administrador/categoria/eliminar/(:num)']="administrador/eliminar_categoria/$1";
		
		$route['administrador/uso']="administrador/usos";
		$route['administrador/uso/crear']="administrador/crear_uso";
		$route['administrador/uso/editar']="administrador/editar_uso";
		$route['administrador/uso/editar/(:num)']="administrador/editar_uso/$1";
		$route['administrador/uso/eliminar/(:num)']="administrador/eliminar_uso/$1";
	
		$route['administrador/variedad']="administrador/modalidad";
		$route['administrador/variedad/crear']="administrador/crear_modalidad";
		$route['administrador/variedad/editar']="administrador/editar_modalidad";
		$route['administrador/variedad/editar/(:num)']="administrador/editar_modalidad/$1";
		$route['administrador/variedad/eliminar/(:num)']="administrador/eliminar_modalidad/$1";
		
		$route['administrador/rubro']="administrador/rubro";
		$route['administrador/rubro/crear']="administrador/crear_rubro";
		$route['administrador/rubro/editar']="administrador/editar_rubro";
		$route['administrador/rubro/editar/(:num)']="administrador/editar_rubro/$1";
		$route['administrador/rubro/eliminar/(:num)']="administrador/eliminar_rubro/$1";
		
		$route['administrador/guia']="administrador/guia";
		$route['administrador/guia/crear']="administrador/crear_guia";
		$route['administrador/guia/editar']="administrador/editar_guia";
		$route['administrador/guia/editar/(:num)']="administrador/editar_guia/$1";
		$route['administrador/guia/eliminar/(:num)']="administrador/eliminar_guia/$1";
		
		$route['administrador/probabilidad_exito']="administrador/probabilidad_exito";
		$route['administrador/probabilidad_exito/crear']="administrador/crear_probabilidad_exito";
		$route['administrador/probabilidad_exito/editar']="administrador/editar_probabilidad_exito";
		$route['administrador/probabilidad_exito/editar/(:num)']="administrador/editar_probabilidad_exito/$1";
		$route['administrador/probabilidad_exito/eliminar/(:num)']="administrador/eliminar_probabilidad_exito/$1";
		
		$route['administrador/usuario/crear'] = "administrador/crear_usuario";
		$route['administrador/usuario'] = "administrador/usuarios";  
		
		$route['administrador/comentario'] = "administrador/comentarios";
		$route['administrador/comentario/(:num)'] = "administrador/comentario_detalle/$1";
		$route['administrador/eliminar_comentario/(:num)'] = "administrador/eliminar_comentario/$1";
	
		$route['administrador/graficos'] = "administrador/graficos";
		
		$route['administrador/base_datos/exportar'] = "administrador/exportar_bd";
		$route['administrador/base_datos/importar'] = "administrador/importar_bd";
	
		

// ANDROID

		$route['android/login'] = "android/login";
		$route['android/produccion'] = "android/produccion";
		$route['android/detalle_produccion'] = "android/detalle_produccion";

/* End of file routes.php */
/* Location: ./application/config/routes.php */