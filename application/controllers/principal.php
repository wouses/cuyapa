<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('varios');
		$this->load->model('usuarios');
		$this->load->model('productor_model');
		$this->load->library('pagination');
		
	}
	
	public function validar_clave($clave){
	   if(strlen($clave) < 6){
		  return false;
	   } 
	   if (!preg_match('`[a-z]`',$clave)){ 
		  return false;
	   }
	   if (!preg_match('`[A-Z]`',$clave)){ 
		  return false;
	   }
	   if (!preg_match('`[0-9]`',$clave)){ 
		  return false;
	   } 
	   return true;
	} 

	public function index()
	{
		$data['estados'] = $this->varios->cargar_estados(); 
		$data['categorias'] = $this->varios->cargar_categorias();
		 
		$data['productores'] = $this->varios->cargar_productores(); 
		
		$this->load->view('front-end/principal.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function pre_cuatro_cero_cuatro()
	{ 
		if(isset($_SESSION['tipo'])){
			
			switch($_SESSION['tipo']){
				case 1 : header("Location: ".base_url()."productor/404");
				break;	
				case 2 : header("Location: ".base_url()."coordinador/404");
				break;
				case 3 : header("Location: ".base_url()."administrador/404");
				break;
			}
			
		}else{
			
			header("Location: ".base_url()."404");
			
		}
		
	}
	
	public function cuatro_cero_cuatro()
	{ 
		
		$data['titulo'] = "Cuyapa | No existe la página";
	
		$this->load->view('front-end/404.php',$data); 
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function no_disponible()
	{ 
		
		$data['titulo'] = "Cuyapa | Disponibilidad";
	
		$this->load->view('front-end/no_disponible.php',$data); 
	}
	
	public function acceso()
	{
		$data['titulo'] = "Cuyapa | Ingresa";
		
		$this->load->view('templates/header.php', $data);
		$this->load->view('pages/acceso.php');
	}
	
	public function registro()
	{
		//guardo las variables si vienen de un formulario
		$send = $this->input->post('send');
		$data['nombre'] = $this->input->post('nombre');
		$data['tipo_cedula_rif'] = $this->input->post('tipo_cedula_rif');
		$data['cedula_rif'] = $this->input->post('cedula_rif');
		$data['usuario'] = $this->input->post('usuario');
		$data['clave'] = $this->input->post('clave');
		$data['clave2'] = $this->input->post('clave2');
		
		//la variable send me indica si vengo del formulario
		if($send){
			
			//verifico tener todos los datos
			if( ($data['nombre']) && ($data['tipo_cedula_rif']) && ($data['cedula_rif']) && ($data['usuario']) && ($data['clave']) && ($data['clave2']) ){	
				
				$existe_p = $this->productor_model->solicitar_productor($data['tipo_cedula_rif'], $data['cedula_rif']);	
				
				//verifico si no existe esta cedula y sigo
				if(!$existe_p){
					
					$this->load->model('usuarios');
					$existe_u = $this->usuarios->solicitar_usuario(array('usuario' => $data['usuario']));		
					
					//verifico si no existe este correo y sigo
					if(!$existe_u){
					
						//si las claves  coinciden sigo al proximo paso
						if( strcmp($data['clave'],$data['clave2'])==0 ){
							
							if($this->validar_clave($data['clave'])){ 
							
								$this->load->model('varios');
								//$data['estados'] = $this->varios->cargar_estados();
								$data['parroquias'] = $this->varios->cargar_parroquias();
								
								$this->load->view('front-end/registro_informacion_adicional.php',$data);
								$this->load->view('front-end/templates/footer.php');
								
							}else{
							
								$data['error']=5;				
								$this->load->view('front-end/registro.php',$data);
								$this->load->view('front-end/templates/footer.php');
								
							}
							
						
						//sino devuelvo y muestro error
						}else{
							
							$data['error']=1;				
							$this->load->view('front-end/registro.php',$data);
							$this->load->view('front-end/templates/footer.php');
							
						}
					
					//si existe el usuario devuelvo y muestro error
					}else{
						
						$data['error']=2;
						$this->load->view('front-end/registro.php',$data);
						$this->load->view('front-end/templates/footer.php');
						
					}
				
				//si existe la cedula devuelvo y muestro error 	
				}else{	
				
					$data['error']=3;
					$this->load->view('front-end/registro.php',$data);
					$this->load->view('front-end/templates/footer.php');
				
				}
				
			//si no vienen todos los datos devuelvo y muestro error
			}else{
				
				$data['error']=4;
				$this->load->view('front-end/registro.php',$data);
				$this->load->view('front-end/templates/footer.php');
				
			}
		//sino vengo del formulario quiere decir que vengo por primera vez, muestro pantalla de registro limpia	
		}else{
			
			$this->load->view('front-end/registro.php');
			$this->load->view('front-end/templates/footer.php');
			
		}
	}
	
	public function insertar_productor()
	{
		 
		$data['usuario'] = $this->input->post('usuario');
		$data['clave'] = $this->input->post('clave');
		$data['nombre'] = $this->input->post('nombre');
		$data['tipo_cedula_rif'] = $this->input->post('tipo_cedula_rif');
		$data['cedula_rif'] = $this->input->post('cedula_rif');
		$data['codigo_telefono'] = $this->input->post('codigo_telefono');
		$data['telefono'] = $this->input->post('telefono');
		$data['cantidad_terreno'] = $this->input->post('cantidad_terreno');
		$data['medida_terreno'] = $this->input->post('medida_terreno');   
		$data['parroquia'] = $this->input->post('parroquia');
		$data['sector'] = $this->input->post('sector'); 
		$data['direccion'] = $this->input->post('direccion'); 
		
		if($data['medida_terreno'] == 'ha'){
			
			$data['cantidad_terreno'] = $data['cantidad_terreno']*10000;
			
			$data['medida_terreno'] = 'm2';
			
		}	
		
		$nombre_img = $_FILES['imagefile']['name'];
		$tipo_img = $_FILES['imagefile']['type'];
		$tamano_img = $_FILES['imagefile']['size'];
		
		$dir = 'uploads/usuarios/';
		
		
		if( $data['usuario'] && $data['nombre'] && $data['tipo_cedula_rif'] && $data['cedula_rif'] && $data['codigo_telefono'] && $data['telefono'] && $data['cantidad_terreno'] && $data['medida_terreno'] && $data['parroquia'] && $data['sector'] &&  $data['direccion']){
		
			
			$data['estado_sel'] = $this->varios->cargar_estados(array('id' => 4));
			$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => 40));
			$data['parroquia_sel'] = $this->varios->cargar_parroquias(array('id' => $data['parroquia']));
			$data['sector_sel'] = $this->varios->cargar_sectores(array('id' => $data['sector']));
		
			$this->load->library('geocoder');
			$address_details = $this->geocoder->geocode($data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela');
 			
			if($nombre_img){
				
				$mime_filter = array(
					'image/gif',
					'image/jpeg',
					'image/png'
				);
				
				if(in_array($tipo_img , $mime_filter)) {
				
					if(move_uploaded_file($_FILES['imagefile']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/cuyapa/'.$dir.$nombre_img)){
										
						$inserto = $this->productor_model->insertar_productor($data['usuario'], md5($data['clave']), $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['codigo_telefono'], $data['telefono'], $data['cantidad_terreno'], $data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela', $address_details['lat'], $address_details['lng'], 4, 40, $data['parroquia'], $data['sector'], $data['direccion'] , $dir.$nombre_img);
						 
					}else{
					
						$data['error']=4;
						
					}
				}else{
					
					$data['error']=5;
					
				}
				
			}else{
			
					$inserto = $this->productor_model->insertar_productor($data['usuario'], md5($data['clave']), $data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['codigo_telefono'], $data['telefono'], $data['cantidad_terreno'],$data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela', $address_details['lat'], $address_details['lng'], 4, 40, $data['parroquia'], $data['sector'], $data['direccion']);	 
				
			}
			
			if(isset($inserto)){
				switch($inserto)
				{
				
					case 1:{
					
					$data['error']=1;
						
					} break;
					
					case 2:{
					
					$data['error']=2;
					
						
					} break;
					
					case 3: { 
						header("Location: ".base_url()."culminacion_registro/".$data['usuario']);
					} break;
				
				}
			}
			
		}else{
			
			$data['error']=3;
			
		}
		  
		
		$data['estados'] = $this->varios->cargar_estados();
		
		$data['estado_sel'] = $this->varios->cargar_estados(array('id' => 4));
			
		$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => 40));
		
		$data['municipios'] = $this->varios->municipio_rest($data['estado']);
		 
		if($data['parroquia']){
			
			$data['parroquia_sel'] = $this->varios->cargar_parroquias(array('id' => $data['parroquia']));
			
			$data['parroquias'] = $this->varios->parroquia_rest(40); 
		}
		
		if($data['sector']){
			$data['sector_sel'] = $this->varios->cargar_sectores(array('id' => $data['sector']));
			
			$data['sectores'] = $this->varios->sector_rest($data['parroquia']);
		} 

		$this->load->view('front-end/registro_informacion_adicional.php',$data);
		$this->load->view('front-end/templates/footer.php');
	
	
	}
	
	public function culminacion_registro($correo)
	{
		$data['titulo'] = "Cuyapa | Culminación de Registro";
		
		$data['correo'] = $correo;
		/*
		$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
		srand((double)microtime()*1000000); 
		$i = 0; 
		$pass = '' ; 
	
		while ($i <= 30) { 
			$num = rand() % 33; 
			$tmp = substr($chars, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		} 
			
		$data['cod_conf'] = $pass;	
		$data['correo'] = $correo;
		
		$this->usuarios->actualizar_cod_conf($data['correo'], $data['cod_conf']);
		
		$this->load->library('email');
		
		//ENVIO CORREO CONFIRMACION					
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> FALSE,
		'mailtype' => 'html'
		);
		
		$this->email->initialize($config);
		
		$mesg = $this->load->view('templates/email/confirmar_correo',$data, TRUE);	
		
		$this->email->from('cuentas@cuyapa.com', 'Cuyapa');
		$this->email->to($correo);  
		
		$this->email->subject('Bienvenido a Cuyapa');
		$this->email->message($mesg);	
		
		$this->email->send();
		//FIN ENVIO CORREO CONFIRMACION 
		*/
		
		$this->load->view('front-end/culminacion_registro.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	
	public function confirmacion_cambio_correo($correo)
	{
		$data['titulo'] = "Cuyapa | Cambio de Correo";
		
		
		$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
		srand((double)microtime()*1000000); 
		$i = 0; 
		$pass = '' ; 
	
		while ($i <= 30) { 
			$num = rand() % 33; 
			$tmp = substr($chars, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		} 
			
		$data['cod_conf'] = $pass;	
		$data['correo'] = $correo;
		
		$this->usuarios->actualizar_cod_conf($data['correo'], $data['cod_conf']);
		
		$this->load->library('email');
		
		//ENVIO CORREO CONFIRMACION					
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> FALSE,
		'mailtype' => 'html'
		);
		
		$this->email->initialize($config);
		
		$mesg = $this->load->view('templates/email/confirmar_cambio_correo',$data, TRUE);	
		
		$this->email->from('cuentas@cuyapa.com', 'Cuyapa');
		$this->email->to($correo);  
		
		$this->email->subject('Cambio de correo');
		$this->email->message($mesg);	
		
		$this->email->send();
		//FIN ENVIO CORREO CONFIRMACION
		
		$this->load->view('front-end/confirmacion_correo.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function confirmacion_correo($usuario, $cod_conf){
		 
		$res = $this->usuarios->verificar_cod_conf($usuario, $cod_conf);
		
		if($res==FALSE){
			$data['titulo'] = "Cuyapa | Error Activar Cuenta";
			$this->load->view('front-end/confirmacion_correo_invalida.php',$data);
			$this->load->view('front-end/templates/footer.php');
		}else{
			
			$res = $this->usuarios->activar_usuario($usuario);	
			
			if($res==TRUE){
				
				$data['titulo'] = "Cuyapa | Cuenta Activada";
				$this->load->view('front-end/confirmacion_correo_valida.php',$data);
				$this->load->view('front-end/templates/footer.php');
			}else{
				$data['titulo'] = "Cuyapa | Error Activar Cuenta";
				$this->load->view('front-end/confirmacion_correo_ya_hecha.php',$data);
				$this->load->view('front-end/templates/footer.php'); 
			}
		}
	}	
	
	public function publicidad()
	{
		$data['titulo'] = "Cuyapa | Publicidad";
		$this->load->view('front-end/publicidad.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function crear_anuncio()
	{
		$data['titulo'] = "Cuyapa | Publicidad";
		$this->load->view('front-end/crear_anuncio.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function insertar_anuncio()
	{
		echo $imagefile = $data['imagefile'] = $this->input->post('imagefile');
		echo $titulo = $data['titulo'] = $this->input->post('titulo');
		echo $texto = $data['texto'] = $this->input->post('texto');
		echo $telefono = $data['telefono'] = $this->input->post('telefono');
		echo $url = $data['url'] = $this->input->post('url');
		echo $estado = $data['estado'] = $this->input->post('estado');
		echo $municipio = $data['municipio'] = $this->input->post('municipio');
		echo $direccion = $data['direccion'] = $this->input->post('direccion');

		echo $data['nombre_img'] = $_FILES['imagefile']['name'];
		echo $data['tipo_img'] = $_FILES['imagefile']['type'];
		echo $data['tamano_img'] = $_FILES['imagefile']['size'];
		echo $data['tmp_name'] = $_FILES['imagefile']['tmp_name'];

		if( $data['titulo'] && $data['texto'] && $data['telefono'] && $data['url'] && $data['estado'] && $data['municipio'] && $data['direccion']){
				
				if($data['nombre_img']){
					
					$mime_filter = array(
  						'image/gif',
						'image/jpeg',
						'image/png'
					);
					
					if(in_array($data['tipo_img'] , $mime_filter)) {
						$dir = 'uploads/anunciantes/';
					
						if(move_uploaded_file($data['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'cuyapa/'.$dir.$data['nombre_img'])){

							
							
							$inserto = $this->varios->insertar_anuncio($titulo, $texto, $telefono, $url, $dir.$data['nombre_img'], $estado, $municipio, $direccion);
						 
							header("Location: ".base_url()."principal/publicidad?alert=1");
						}else{
						 
							header("Location: ".base_url()."principal/publicidad?alert=2");
							
						}
					}else{
						
						$data['error'] = 3;
						echo 'error 3';
						
						
					}
				}else{
					
					$data['error'] = 2;
					echo 'error 2';
					
				}
				
			}else{
				
				$data['error'] = 1;
				echo 'error 1';
				
			}
		
		//header("Location: ".base_url());
	
	}
	
	public function nosotros()
	{
		$data['titulo'] = "Cuyapa | Nosotros";
		
		$this->load->view('front-end/nosotros.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function contacto()
	{
		$data['titulo'] = "Cuyapa | Contacto";
		
		$this->load->view('front-end/contacto.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}

	
	public function perfil( $id )
	{
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($id); 
		$data['productos'] = $this->productor_model->cargar_productos_productores($data['productor']['id_usuario']);
		 
		$data['titulo'] = "Cuyapa | ".$data['productor']['nombre'];
			
		$this->load->view('front-end/perfil.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function productores()
	{
		$data['titulo'] = "Cuyapa | Productores"; 
		
		$data['estados'] = $this->varios->cargar_estados(); 
		$data['categorias'] = $this->varios->cargar_categorias_completa();
		 
		$municipio = $this->input->post('municipio');
		$categoria = $this->input->post('categoria');
		$rubro = $this->input->post('rubro');
		
		if(($municipio) && ($categoria) && ($rubro)){
			
			$data['productores'] = $this->varios->buscar_productores($municipio, $rubro); 
			 			
		}else{
			
			$data['productores'] = $this->varios->cargar_productores(); 
			
		}
		
		$this->load->view('front-end/productores.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}	
	
	public function categorias()
	{
		$data['titulo'] = "Cuyapa | Categorías";
		
		$data['categorias'] = $this->varios->cargar_categorias();
		
		$this->load->view('front-end/categorias.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function rubros( $categoria )
	{
		 
		$data['categoria'] = $this->varios->cargar_categorias($categoria); 
		$data['rubros'] = $this->varios->cargar_productos_categoria($data['categoria']['id']);
		
		$data['titulo'] = "Cuyapa | Rubros de ".ucfirst($data['categoria']['nombre']);
		 
		$this->load->view('front-end/rubros.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function productores_rubro( $categoria , $rubro )
	{
		 
		 
		$data['categoria'] = $this->varios->cargar_categorias($categoria); 
		
		$data['rubro'] = $this->varios->cargar_productos_nombre($rubro);
		
		$config['base_url'] = base_url().'productores/'.$categoria.'/'.$rubro;
		$config['total_rows'] = $this->varios->contar_productores_producto($data['rubro']['id']);//obtenemos la cantidad de registros
		$config['per_page'] = 9;  //cantidad de registros por página
		$config['num_links'] = 2; //nro. de enlaces antes y después de la pagina actual
		$config['prev_link'] = 'anterior'; //texto del enlace que nos lleva a la pagina ant.		
		$config['next_link'] = 'siguiente'; //texto del enlace que nos lleva a la sig. página
		$config['uri_segment'] = 4 ;  //segmentos que va a tener nuestra URL
		$config['first_link'] = '<<';  //texto del enlace que nos lleva a la primer página
		$config['cur_tag_open'] = '<li class="active"><a>'; 
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = '>>';   //texto del enlace que nos lleva a la última página
		
		$this->pagination->initialize($config);
		
		$data['categoria'] = $this->varios->cargar_categorias($categoria); 
		
		$data['rubro'] = $this->varios->cargar_productos_nombre($rubro);
		
		$data['productores'] = $this->varios->cargar_productores_producto($data['rubro']['id'],$config['per_page'], $this->uri->segment(4));
		
		$data['titulo'] = "Cuyapa | Productores de ".ucfirst($data['rubro']['rubro']);
		 
		$this->load->view('front-end/productores_rubro.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function preguntas_frecuentes()
	{
		$data['titulo'] = "Cuyapa | Preguntas Frecuentes";
		
		$this->load->view('front-end/preguntas_frecuentes.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function terminos_condiciones()
	{
		$data['titulo'] = "Cuyapa | Terminos y Condiciones";
		
		$this->load->view('front-end/terminos_condiciones.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}
	
	public function privacidad()
	{
		$data['titulo'] = "Cuyapa | Privacidad";
		
		$this->load->view('front-end/privacidad.php',$data);
		$this->load->view('front-end/templates/footer.php');
	}

	public function reinicio_clave( )
	{
		$usuario = $this->input->post('email');
		
		if( $usuario ){
			
			$usu = $this->usuarios->solicitar_usuario(array('usuario' => $usuario) );
			
			if($usu){
				
				$data['correo']=$usu['usuario'];
				$data['cod_conf']=$usu['cod_conf'];
				
				$this->load->library('email');
		
				//ENVIO CORREO CONFIRMACION					
				$config=array(
				'charset'=>'utf-8',
				'wordwrap'=> FALSE,
				'mailtype' => 'html'
				);
				
				$this->email->initialize($config);
				
				$mesg = $this->load->view('templates/email/reinicio_clave',$data, TRUE);	
				
				$this->email->from('cuentas@cuyapa.com', 'Cuyapa');
				$this->email->to($data['correo']);  
				
				$this->email->subject('Reinicio de clave');
				$this->email->message($mesg);	
				
				$this->email->send();
				//FIN ENVIO CORREO CONFIRMACION  
				 
				header("Location: ".base_url()."acceso?cambio_clave=1");
				
			}else{
				$data['err']=1;	
			
				$data['titulo'] = "Cuyapa | Reiniciar Clave";
				$this->load->view('templates/header.php', $data);
				$this->load->view('pages/reiniciar_clave.php');
			}
			
 		}else{
			
			$data['titulo'] = "Cuyapa | Reiniciar Clave";
			$this->load->view('templates/header.php', $data);
			$this->load->view('pages/reiniciar_clave.php');
		}
		
	}
	
	public function cambio_clave( $usuario , $cod_conf)
	{
		$usu = $this->usuarios->solicitar_usuario(array('usuario' => $usuario, 'cod_conf' => $cod_conf) );
		 
			if($usu){
				
				$data['usuario'] = $usu['usuario'];
				$data['cod_conf'] = $usu['cod_conf'];
				
				$data['titulo'] = "Cuyapa | Reiniciar Clave";
				$this->load->view('templates/header.php', $data);
				$this->load->view('pages/cambiar_clave.php');
				//$usu = $this->usuarios->cambiar_clave( $usuario, $cod_conf);
				
				//header("Location: ".base_url()."acceso?cambio_clave=1");
			}else{
				
				header("Location: ".base_url()."404");
				
			}
		
	}
	
	public function nueva_clave()
	{
		$clave = $this->input->post('clave');
		$clave2 = $this->input->post('clave2');
		$email = $this->input->post('email');
		$cod_conf = $this->input->post('cod_conf');
		
		if( strcmp($clave,$clave2)==0 ){
			 
			if( $this->validar_clave($clave) ){
				
				$cc = $this->usuarios->cambiar_clave( $email, $cod_conf, md5($clave) );
			
				header("Location: ".base_url()."acceso?cambio_clave=2");
				
			}else{
				
				header("Location: ".base_url()."reinicio_clave/".$email."/".$cod_conf."?err=2");
				
			}
		
		}else{ 
		
			header("Location: ".base_url()."reinicio_clave/".$email."/".$cod_conf."?err=1");
			
		}	
		
				
	}


}
