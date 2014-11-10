<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productor extends CI_Controller {
	
	public function __construct(){
		parent::__construct(); 
		
		$this->load->model('varios');
		$this->load->model('productor_model');
		$this->load->model('administrador_model');
		
		session_start();
		

		if ( !$_SESSION['id'] ){

			header('Location: '.base_url());

		}else{		
			if($_SESSION['tipo']!=1){
				
				switch($_SESSION['tipo']){
					case 2: header('Location: '.base_url().'coordinador'); 
					break;	
					
					case 3: header('Location: '.base_url().'administrador'); 
					break;
				}
			}
		}
	}

	public function index()
	{
		$data['titulo'] = " Cuyapa - Panel";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);

		$data['productor'] = $this->productor_model->cargar_productores($_SESSION['id']);

		$data['productor'] = $data['productor'][0]; 
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/panel_principal.php',$data);
	}
	
	public function cuatro_cero_cuatro()
	{ 
		
		$data['titulo'] = "Cuyapa | No existe la página";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/404.php',$data);  
	}
	
	public function produccion()
	{
		$data['titulo'] = " Cuyapa - Producciones";
		
		$data['producciones'] = $this->productor_model->cargar_produccion($_SESSION['id_productor']);
		 
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/produccion.php',$data);
		
	}
	
	public function crear_produccion()
	{
		$data['titulo'] = " Cuyapa - Crear Producci&oacute;n";
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_producto'] = $this->input->post('id_producto');
			$data['id_modalidad'] = $this->input->post('id_modalidad');
			$data['id_uso'] = $this->input->post('id_uso');
			$productor = $this->input->post('productor');
			
			if($data['nombre'] && $data['id_categoria'] && $data['id_producto'] && $data['id_modalidad'] && $data['id_uso'] ){
				
				$res = $this->productor_model->insertar_produccion($productor, $data['nombre'], $data['id_producto'], $data['id_modalidad'], $data['id_uso']);
				
				if($res == false){
					
					header("Location: ".base_url()."productor/produccion?alert=4");
				}else{
			 
					header("Location: ".base_url()."productor/produccion?alert=1");
				
				}
				
			}else{
				
				
				$data['error']=1;
				if($data['id_categoria']){
					
					$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
					$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
					
					if($data['id_producto']){
						
						$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);
						$data['modalidades'] = $this->administrador_model->cargar_modalidades_producto($data['id_producto']);
						
						if($data['id_modalidad']){
							$data['modalidad_sel'] = $this->administrador_model->cargar_modalidades($data['id_modalidad']);
							$data['usos'] = $this->administrador_model->cargar_usos_modalidad($data['id_modalidad'] , $data['id_producto'] );
							if($data['id_uso']){
								$data['uso_sel'] = $this->administrador_model->cargar_usos($data['id_uso']);
							}
						}
					}
				}
				
				
			}
		
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/crear_produccion.php',$data);
			
	}
	
	public function editar_produccion($id)
	{
		$data['titulo'] = " Cuyapa - Editar Producci&oacute;n";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$data['produccion'] = $this->productor_model->cargar_produccion($_SESSION['id_productor'],$id);
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_producto'] = $this->input->post('id_producto');
			$data['id_modalidad'] = $this->input->post('id_modalidad');
			$data['id_uso'] = $this->input->post('id_uso');
			$productor = $this->input->post('productor');
			
			if($data['nombre'] && $data['id_categoria'] && $data['id_producto'] && $data['id_modalidad'] && $data['id_uso'] ){
				
				$res = $this->productor_model->insertar_produccion($productor, $data['nombre'], $data['id_producto'], $data['id_modalidad'], $data['id_uso']);
				
				if($res == false){
					
					header("Location: ".base_url()."productor/produccion?alert=4");
				}else{
			 
					header("Location: ".base_url()."productor/produccion?alert=1");
				
				}
				
			}else{
				
				
				$data['error']=1;
				if($data['id_categoria']){
					
					$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
					$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
					
					if($data['id_producto']){
						
						$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);
						$data['modalidades'] = $this->administrador_model->cargar_modalidades_producto($data['id_producto']);
						
						if($data['id_modalidad']){
							$data['modalidad_sel'] = $this->administrador_model->cargar_modalidades($data['id_modalidad']);
							$data['usos'] = $this->administrador_model->cargar_usos_modalidad($data['id_modalidad'] , $data['id_producto'] );
							if($data['id_uso']){
								$data['uso_sel'] = $this->administrador_model->cargar_usos($data['id_uso']);
							}
						}
					}
				}
				
				
			}
		
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/editar_produccion.php',$data);
			
	}
	
	public function detalle_produccion($id)
	{ 
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$data['produccion'] = $this->productor_model->cargar_produccion($_SESSION['id_productor'],$id);
		
		$data['siembras'] = $this->productor_model->cargar_siembras($id);
		
		$data['cosechas'] = $this->productor_model->cargar_cosechas($id);
		
		$data['suma']=0;
		$data['metros']=0;
		$data['porcentaje']=0;
		$data['cantidad']=0;
		 
		
		$data['titulo'] = " Cuyapa - Producciones - ".$data['produccion']['nombre_produccion'];
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/detalle_produccion.php',$data);
	}
	
	public function eliminar_produccion($id){
		
		
		$this->productor_model->eliminar_produccion($id);
	
		header("Location: ".base_url()."productor/produccion?alert=3");
			
	}
	
	
	public function insertar_siembra()	{
		
		$cantidad_terreno = $this->input->post('cantidad_terreno');
		$medida_terreno = $this->input->post('medida_terreno');
		$tipo_financiamiento = $this->input->post('tipo_financiamiento');
		$id_produccion = $this->input->post('id_produccion');
		
		$cant = $cantidad_terreno;
		if(strcmp($medida_terreno, 'ha')==0){
		
			$cantidad_terreno=$cantidad_terreno*10000;
			
		}
		
		$this->productor_model->insertar_siembra( $id_produccion, $cantidad_terreno, $tipo_financiamiento );
		
		if((strcmp($medida_terreno, 'ha')==0) || ($cant<10000)){
			
			header("Location: ".base_url()."productor/produccion/".$id_produccion);
		}else {
			
			header("Location: ".base_url()."productor/produccion/".$id_produccion."?alert=1");
		}
	}
	
	
	public function insertar_cosecha(){

		$cantidad_terreno = $this->input->post('cantidad_terreno_cn');
		$medida_terreno = $this->input->post('medida_terreno_cn');
		$id_produccion = $this->input->post('id_produccion');
		$id_random = $this->input->post('id_random_cn');
		
		if(strcmp($medida_terreno, 'ha')==0){
		
			$cantidad_terreno=$cantidad_terreno*10000;
			
		}
		 		
		$this->productor_model->insertar_cosecha( $id_produccion, $id_random, $cantidad_terreno );
		
		header("Location: ".base_url()."productor/produccion/".$id_produccion);
	}
	
	
	public function buscar_guias() {

		$data['titulo'] = " Cuyapa - Herramientas - Gu&iacute;as";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);

		$data['guias'] = $this->administrador_model->cargar_guias();
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/herramientas/guias.php',$data);


	}
	
	public function contactos_interes(){

		$data['titulo'] = " Cuyapa - Herramientas - Contactos de Interes";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);

		$data['contactos'] = $this->productor_model->cargar_contactos();
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/herramientas/contactos_interes.php',$data);


	}	
	
	public function detalle_contactos_interes($id,$titulo){

		$data['titulo'] = " Cuyapa - Herramientas - Contactos de Interes - ".$titulo;
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		 
		$data['contacto'] = $this->productor_model->cargar_contactos($id);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/herramientas/detalle_contacto.php',$data);


	}	
	
	public function inventario(){
		
		$data['titulo'] = "Cuyapa - Inventario";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$data['inventarios'] = $this->productor_model->cargar_inventario($_SESSION['id_productor']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/inventario.php',$data);
		
	}
	
	public function editar_perfil(){
		
		$data['titulo'] = "Cuyapa - Editar Perfil";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$nubi = $this->input->get('nubi'); 
		
		if($this->input->post('enviar')){ 
			 $data['enviar'] = $this->input->post('enviar');  
		 		
			if($data['enviar']==1){ 
				
				$data['nombre'] = $this->input->post('nombre');
				$data['tipo_cedula_rif'] = $this->input->post('tipo_cedula_rif');
				$data['cedula_rif'] = $this->input->post('cedula_rif');
				$data['descripcion'] = $this->input->post('descripcion');
				$data['codigo_telefono'] = $this->input->post('codigo_telefono');
				$data['telefono'] = $this->input->post('telefono');
				$data['direccion'] = $this->input->post('direccion');
				
				if(isset($_FILES['imagefile'])){
					$data['nombre_logo'] = $_FILES['imagefile']['name'];
					$data['tipo_logo'] = $_FILES['imagefile']['type'];
					$data['tamano_logo'] = $_FILES['imagefile']['size'];
					$data['tmp_name_logo'] = $_FILES['imagefile']['tmp_name'];
				}else{ 
					$data['nombre_logo'] = '';
					$data['tipo_logo'] = '';
					$data['tamano_logo'] = '';
					$data['tmp_name_logo'] = '';
				}
				
				if(isset($_FILES['imagefile2'])){
					$data['nombre_portada'] = $_FILES['imagefile2']['name'];
					$data['tipo_portada'] = $_FILES['imagefile2']['type'];
					$data['tamano_portada'] = $_FILES['imagefile2']['size'];
					$data['tmp_name_portada'] = $_FILES['imagefile2']['tmp_name'];
				}else{ 
					$data['nombre_portada'] = '';
					$data['tipo_portada'] = '';
					$data['tamano_portada'] = '';
					$data['tmp_name_portada'] = '';
				}
				
				$dir = 'uploads/usuarios/';
				
				if(($data['nombre_logo']) && ($data['nombre_portada'])){
				 
					if((move_uploaded_file($data['tmp_name_logo'],$_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$dir.$data['nombre_logo'])) && (move_uploaded_file($data['tmp_name_portada'],$_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$dir.$data['nombre_portada']))){
										
						$res = $this->productor_model->editar_perfil_general($_SESSION['id'], $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['descripcion'], $data['codigo_telefono'].'-'.$data['telefono'], $data['direccion'], $dir.$data['nombre_logo'], $dir.$data['nombre_portada']);
						
						 
						$data['error']=1;
						$data['productor'] = $this->productor_model->solicitar_productor_id($_SESSION['id']);
						
						$_SESSION['imagen'] = $dir.$data['nombre_logo'];
						$_SESSION['nombre'] = $data['nombre'];
						
					}else{
					 
						//mostrar error de que hubo un error con la imagen
						
					}
				}else if($data['nombre_logo']){
					
					if(move_uploaded_file($data['tmp_name_logo'],$_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$dir.$data['nombre_logo'])){
										
						$res = $this->productor_model->editar_perfil_general($_SESSION['id'], $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['descripcion'], $data['codigo_telefono'].'-'.$data['telefono'], $data['direccion'], $dir.$data['nombre_logo'],'');
						
						
						$data['error']=1;
						$data['productor'] = $this->productor_model->solicitar_productor_id($_SESSION['id']);
						
						$_SESSION['imagen'] = $dir.$data['nombre_logo'];
						$_SESSION['nombre'] = $data['nombre'];
						
					}else{
					 
						//mostrar error de que hubo un error con la imagen
						
					}
					
				}else if($data['nombre_portada']){
					
					if(move_uploaded_file($data['tmp_name_portada'],$_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$dir.$data['nombre_portada'])){
										
						$res = $this->productor_model->editar_perfil_general($_SESSION['id'], $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['descripcion'], $data['codigo_telefono'].'-'.$data['telefono'], $data['direccion'], '', $dir.$data['nombre_portada'] );
						
						
						$data['error']=1;
						$data['productor'] = $this->productor_model->solicitar_productor_id($_SESSION['id']);
						
						$_SESSION['nombre'] = $data['nombre'];
						
					}else{
					 
						//mostrar error de que hubo un error con la imagen
						
					}
					
				}else{
					
					$res = $this->productor_model->editar_perfil_general($_SESSION['id'], $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['descripcion'], $data['codigo_telefono'].'-'.$data['telefono'], $data['direccion']); 
					
					$data['error']=1;
					$data['productor'] = $this->productor_model->solicitar_productor_id($_SESSION['id']);
					 
					$_SESSION['nombre'] = $data['nombre'];
					 
				}
			}else if($data['enviar']==2){
				 
				$data['id_producto'] = $this->input->post('id_producto');
				
				$res = $this->productor_model->insertar_producto_productor($data['id_producto'], $_SESSION['id']);
					
				if($res == false){
					
					$data['error']=3;
					
				}else{
					
					$data['error']=2;
					
					$data['productos'] = $this->productor_model->cargar_productos_productores($_SESSION['id']);
				
				}
				
				
			}else if($data['enviar']==21){
				
				$data['id'] = $this->input->post('id');
				
				$res = $this->productor_model->eliminar_producto_productor($data['id']);	
				
				$data['productos'] = $this->productor_model->cargar_productos_productores($_SESSION['id']);
				
				$data['error']=4;
				$data['enviar']=2;
				
			}else if($data['enviar']==3){
				
				$data['estado'] = $this->input->post('estado');
				$data['municipio'] = $this->input->post('municipio');
				$data['parroquia'] = $this->input->post('parroquia');
				$data['sector'] = $this->input->post('sector');
				$data['cantidad_terreno'] = $this->input->post('cantidad_terreno');
				$data['medida_terreno'] = $this->input->post('medida_terreno');
				$data['ubicacion'] = $this->input->post('ubicacion');
				
				if($data['medida_terreno'] == 'ha'){
					
					$data['cantidad_terreno'] = $data['cantidad_terreno']*10000;
					
				}  

				$data['estado_sel'] = $this->varios->cargar_estados(array('id' => 4));
				$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => 40));
				$data['parroquia_sel'] = $this->varios->cargar_parroquias(array('id' => $data['parroquia']));
				$data['sector_sel'] = $this->varios->cargar_sectores(array('id' => $data['sector']));
			
				$this->load->library('geocoder');
				$address_details = $this->geocoder->geocode($data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela');
				 
				  
				$this->productor_model->modificar_ubicacion($data['estado'],$data['municipio'],$data['parroquia'],$data['sector'],$data['cantidad_terreno'],$data['ubicacion'], $address_details['lat'], $address_details['lng'], $_SESSION['id']);	
				
				$data['error']=6;
				
			}else if($data['enviar']==4){
				
				$data['url_facebook'] = $this->input->post('url_facebook');
				$data['url_twitter'] = $this->input->post('url_twitter');
				$data['url_google'] = $this->input->post('url_google');
				
				$this->productor_model->insertar_redes_sociales_productor($data['url_facebook'],$data['url_twitter'],$data['url_google'],$_SESSION['id']);	
				
				$data['redes_sociales'] = $this->productor_model->cargar_redes_sociales_productor($_SESSION['id']);
				
				$data['error']=5;
				$data['enviar']=4;
			}
		}
		if(isset($nubi)){
			if($nubi==1){
				
				$data['enviar'] = 3;
			
			}else if($nubi==2){
				
				$data['error']=7;
				$data['enviar'] = 3;
			
			}else if($nubi==3){
				 
				$data['error']=8;
				$data['enviar'] = 3;
			
			}
		}
		 
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($_SESSION['id_productor']);
		 		 
		$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['productor']['id_municipio']));
		
		//$data['municipios'] = $this->varios->municipio_rest($data['productor']['id_estado']);
		
		$data['parroquia_sel'] = $this->varios->cargar_parroquias(array('id' => $data['productor']['id_parroquia']));
		
		$data['parroquias'] = $this->varios->parroquia_rest($data['productor']['id_municipio']);
		
		$data['sector_sel'] = $this->varios->cargar_sectores(array('id' => $data['productor']['id_sector']));
		
		$data['sectores'] = $this->varios->sector_rest($data['productor']['id_parroquia']);
		
		$data['productos'] = $this->productor_model->cargar_productos_productores($_SESSION['id']);
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		
		$data['redes_sociales'] = $this->productor_model->cargar_redes_sociales_productor($_SESSION['id']);
		
		if($data['productor']['cantidad_terreno']>=10000){
		
			$data['cantidad_terreno'] = $data['productor']['cantidad_terreno']/10000;	
			$data['medida_terreno'] = 'ha';
		
		}else{
		
			$data['cantidad_terreno'] = $data['productor']['cantidad_terreno'];	
			$data['medida_terreno'] = 'mts';
		
		} 
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/editar_perfil.php',$data);
		
	}
	
	public function editar_perfil_ubicacion(){
		
		$data['titulo'] = "Cuyapa - Editar Perfil - Especificar Ubicación";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($_SESSION['id_productor']); 
		
		$status = $this->input->post('status');
		$ubicacion = $this->input->post('ubicacion');
		$lat_lon = $this->input->post('ubicacion_lat_lon');
		
		if($status){
			
			if($status==1){
				
				$datos = split(',',$lat_lon);
				
				$this->productor_model->especificar_ubicacion($ubicacion, $datos[0], $datos[1], $_SESSION['id']);
				
				header('Location: '.base_url().'productor/editar_perfil?nubi=3');
				
			}else{
				
				header('Location: '.base_url().'productor/editar_perfil?nubi=2');
				
			}
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/editar_perfil_ubicacion.php',$data);
	}
	
	public function estadisticas(){
		
		$data['titulo'] = "Cuyapa - Estadísticas";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/herramientas/estadisticas.php',$data);
		
	}
	
	public function mensaje(){
		
		$data['titulo'] = "Cuyapa - Centro de Mensajes";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$data['mensajes'] = $this->varios->cargar_mensajes($_SESSION['id']); 
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/mensajes.php',$data);
		
	}
	
	public function mensaje_detalle( $id ){
		
		$data['titulo'] = "Cuyapa - Centro de Mensajes - Detalle"; 
		
		$data['mensaje'] = $this->varios->cargar_mensajes($_SESSION['id'], $id); 
		 
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/mensaje_detalle.php',$data);
		
	}
	
	public function eliminar_mensaje($id){
		
		$this->varios->eliminar_mensaje($id); 
		
		header('Location: '.base_url().'productor/mensaje?alert=1');
		
	}
	
	public function distribucion(){
		
		$data['titulo'] = "Cuyapa - Distribución";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$data['clientes'] = $this->productor_model->cargar_clientes($_SESSION['id_productor']);
		$data['distribuciones'] = $this->productor_model->cargar_distribucion($_SESSION['id_productor']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/distribucion.php',$data);
		
	}
	
	public function crear_distribucion()
	{
		$data['titulo'] = " Cuyapa - Crear Distribución";
		
		$data['inventarios'] = $this->productor_model->cargar_inventario_distribucion($_SESSION['id_productor']);
		$data['clientes'] = $this->productor_model->cargar_clientes($_SESSION['id_productor']);
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['dist'] = $this->input->post('dist');
			$data['cliente'] = $this->input->post('cliente');
			$data['cant'] = $this->input->post('cant');
			
			if( $data['dist'] && $data['cliente'] ){
							
				$res = $this->productor_model->insertar_distribucion($_SESSION['id_productor'], $data['cliente'], $data['dist'], $data['cant']);
				 
				header("Location: ".base_url()."productor/distribucion?alert=1");
				
			}else{ 
				$data['error']=1;
			}
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/crear_distribucion.php',$data);
			
	}
	
	public function detalle_distribucion($id){
		
		$data['titulo'] = "Cuyapa - Detalle Distribución";
		 
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$data['clientes'] = $this->productor_model->cargar_clientes($_SESSION['id_productor']);
		$data['distribucion'] = $this->productor_model->cargar_distribucion($_SESSION['id_productor'],$id);
		$data['productos_distribucion'] = $this->productor_model->cargar_productos_distribucion($data['distribucion']['id_distribucion']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/detalle_distribucion.php',$data);
		
	}
	
	public function cliente(){
		
		$data['titulo'] = "Cuyapa - Clientes";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$data['clientes'] = $this->productor_model->cargar_clientes($_SESSION['id_productor']);
		$data['distribuciones'] = $this->productor_model->cargar_distribucion($_SESSION['id_productor']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/clientes.php',$data);
		
	}
	
	public function crear_cliente(){
		
		$data['titulo'] = "Cuyapa - Crear Cliente";
		
		echo $enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre_cli');
			$data['tipo_cedula_rif'] = $this->input->post('tipo_cedula_rif_cli');
			$data['cedula_rif'] = $this->input->post('cedula_rif_cli');
			$data['direccion'] = $this->input->post('direccion_cli'); 
			 
			if($data['nombre'] && $data['tipo_cedula_rif'] && $data['cedula_rif'] ){
				 
				$res = $this->productor_model->insertar_cliente_distribucion($_SESSION['id_productor'], $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['direccion']);
				
				if($res == false){
					
					header("Location: ".base_url()."productor/otros/clientes?alert=2");
				}else{
			 
					header("Location: ".base_url()."productor/otros/clientes?alert=1");
				
				}
				
			}else{ 
				$data['error']=1;
				
				
			}
		
			
		}
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/crear_cliente_distribucion.php',$data);
		
	}
	
	public function editar_cliente($id=NULL)
	{
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Cliente";
			
			$this->load->model('productor_model');
			$data['clientes'] = $this->productor_model->cargar_clientes($_SESSION['id_productor'], $id);
			
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/editar_cliente.php',$data);
		
		}else{
			
			$tipo_cedula_rif = $this->input->post('tipo_cedula_rif');
			$cedula_rif = $this->input->post('cedula_rif');
			$nombre = $this->input->post('nombre');
			$direccion = $this->input->post('direccion'); 
			$id = $this->input->post('id');
			
			$this->load->model('productor_model');
			$this->productor_model->editar_cliente($id , $tipo_cedula_rif, $cedula_rif, $nombre, $direccion);
			
			header("Location: ".base_url()."productor/otros/clientes?alert=3");
		
		}
	
		
	}

	
}
