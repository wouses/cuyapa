<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coordinador extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('varios');
		$this->load->model('usuarios');
		$this->load->model('coordinador_model');
		$this->load->model('productor_model');
		$this->load->model('administrador_model');
		
		@session_start();

		if ( !$_SESSION['id'] ){

			header('Location: '.base_url());

		}else{		
			if($_SESSION['tipo']!=2){
				
				switch($_SESSION['tipo']){
					case 1: header('Location: '.base_url().'productor'); 
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
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		$data['categorias'] = $this->coordinador_model->cargar_categoria();
		
		$data['productores_aprobar'] = count($this->coordinador_model->cargar_productor_inactivo($_SESSION['id_municipio']));
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/panel_principal.php',$data);
	}
	
	public function cuatro_cero_cuatro()
	{ 
		
		$data['titulo'] = "Cuyapa | No existe la página";
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/404.php',$data);  
	}
	
	public function registrar_productor(){
		
		$this->load->model('productor_model');
		
		$data['titulo'] = "Cuyapa - Crear Productor"; 
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		$enviar = $this->input->post('enviar');
		
		if($enviar==1){
			 
			$data['nombre'] = $this->input->post('nombre');
			$data['tipo_cedula_rif'] = $this->input->post('tipo_cedula_rif');
			$data['cedula_rif'] = $this->input->post('cedula_rif');
			$data['codigo_telefono'] = $this->input->post('codigo_telefono');
			$data['telefono'] = $this->input->post('telefono');
			$data['cantidad_terreno'] = $this->input->post('cantidad_terreno');
			$data['medida_terreno'] = $this->input->post('medida_terreno');  
			$data['municipio'] = $this->input->post('municipio');
			$data['parroquia'] = $this->input->post('parroquia');
			$data['sector'] = $this->input->post('sector'); 
			$data['direccion'] = $this->input->post('direccion');
			
			if($data['medida_terreno'] == 'ha'){
				
				$data['cantidad_terreno'] = $data['cantidad_terreno']*10000;
				
				$data['medida_terreno'] = 'm2';
				
			}
					  
			$data['estado_sel'] = $this->varios->cargar_estados(array('id' => 4));
			$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['municipio']));
			$data['parroquia_sel'] = $this->varios->cargar_parroquias(array('id' => $data['parroquia']));
			$data['sector_sel'] = $this->varios->cargar_sectores(array('id' => $data['sector']));
		
			$this->load->library('geocoder');
			$address_details = $this->geocoder->geocode($data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela');
			
			$inserto = $this->productor_model->insertar_productor_coordinador($data['nombre'], $data['tipo_cedula_rif'], $data['cedula_rif'], $data['codigo_telefono'], $data['telefono'], $data['cantidad_terreno'],$data['parroquia_sel']['nombre'].', '.$data['estado_sel']['nombre'].', Venezuela', $address_details['lat'], $address_details['lng'], 4, $data['municipio'], $data['parroquia'], $data['sector'], $data['direccion']);	 
				 
			if(isset($inserto)){
				switch($inserto)
				{
				
					case 1:{
					
					$data['error']=1;
						
					} break;
					
					case 2:{
					
					header("Location: ".base_url()."coordinador/productores_zona?alert=4");			
						
					} break; 
				
				}
			}
				 
		}

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/registrar_productor.php',$data);
	}
	
	public function editar_productor($id){
		
		$this->load->model('productor_model');
		
		$data['titulo'] = "Cuyapa - Crear Productor"; 

		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($id);
		
		if($data['productor']['id_municipio'] != $_SESSION['id_municipio']){ 
			header("Location: ".base_url()."coordinador/404"); 
		}

		if($data['productor']['cantidad_terreno']>=10000){
		
			$data['cantidad_terreno'] = $data['productor']['cantidad_terreno']/10000;	
			$data['medida_terreno'] = 'ha';
		
		}else{
		
			$data['cantidad_terreno'] = $data['productor']['cantidad_terreno'];	
			$data['medida_terreno'] = 'mts';
		
		} 
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));



		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/editar_productor.php',$data);
	}

	public function asignar_usuario_productor($id=NULL){
	 
		$data['titulo'] = "Cuyapa - Asignar Usuario a Productor";
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		if($id){ 
			$data['id_productor'] = $id;
		}
		$enviar = $this->input->post('enviar');
		
		if($enviar==1){
			$fecha = time();
			$this->usuarios->crear_cuentas($this->input->post('correo'), $this->input->post('clave'), 1, $fecha, 1);
			
			$id_usuario = mysql_insert_id();
			
			$this->coordinador_model->asignar_usuario_productor($this->input->post('id_productor'), $id_usuario);
			
			header("Location: ".base_url()."coordinador/productores_zona?alert=3");	
		}
		 
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/asignar_usuario_productor.php',$data);
	}
	
	public function activar_productor_listado(){
		
		
		$data['titulo'] = "Cuyapa - Aprobar Productor"; 
		
		$data['productores'] = $this->coordinador_model->cargar_productor_inactivo($_SESSION['id_municipio']);
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/activar_productor.php',$data);
	}
	
	public function activar_productor_detalle($id){
	
		$data['productor'] = $this->productor_model->solicitar_productor_id($id);
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
	
		$data['titulo'] = "Cuyapa - Aprobar Productor - ".ucwords($data['productor']['nombre']); 
		 
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/activar_productor_detalle.php',$data);
	}
	
	public function activar_eliminar_productor($id, $accion){
	
		if($accion==1){
			$this->coordinador_model->activar_productor_usuario($id);
			
			//ENVIO CORREO CONFIRMACION					
			$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> FALSE,
			'mailtype' => 'html'
			);
			
			$data['productor'] = $this->productor_model->solicitar_productor_id($id);
			$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
			
			$this->load->library('email');
			
			$this->email->initialize($config);
			
			$mesg = $this->load->view('templates/email/cuenta_activada',$data, TRUE);	
			
			$this->email->from('cuentas@cuyapa.com', 'Cuyapa');
			$this->email->to($data['productor']['correo']);  
			
			$this->email->subject('Cuenta Activada');
			$this->email->message($mesg);	
			
			$this->email->send();
			//FIN ENVIO CORREO CONFIRMACION
				 
			header("Location: ".base_url()."coordinador/activar_productor?alert=1"); 			
		}else{
			
			//ENVIO CORREO CONFIRMACION					
			$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> FALSE,
			'mailtype' => 'html'
			);
			
			$data['productor'] = $this->productor_model->solicitar_productor_id($id);
			
			$this->load->library('email');
			
			$this->email->initialize($config);
			
			$mesg = $this->load->view('templates/email/cuenta_eliminada',$data, TRUE);	
			
			$this->email->from('cuentas@cuyapa.com', 'Cuyapa');
			$this->email->to($data['productor']['correo']);  
			
			$this->email->subject('Cuenta Activada');
			$this->email->message($mesg);	
			
			$this->email->send();
			//FIN ENVIO CORREO CONFIRMACION
			
			$this->coordinador_model->eliminar_productor_usuario($id);
			
			header("Location: ".base_url()."coordinador/activar_productor?alert=2"); 
		}
		
		
	}
	
	public function productores_zona(){
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		$data['titulo'] = " Cuyapa - Productores  de ".$data['municipio']['nombre'];
		
		$data['productores'] = $this->coordinador_model->cargar_productor_zona($_SESSION['id_municipio']);
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/productores_zona.php',$data);
	}
	
	public function detalles_productor_zona($id){
		
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($id);
		
		if($data['productor']['id_municipio'] != $_SESSION['id_municipio']){ 
			header("Location: ".base_url()."coordinador/404"); 
		}
		
	 	$data['producciones'] = $this->productor_model->cargar_produccion($data['productor']['id']);
		$data['inventarios'] = $this->productor_model->cargar_inventario($data['productor']['id']);
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		$data['parroquia'] = $this->varios->cargar_parroquias(array('id' => $data['productor']['id_parroquia']));
		$data['sector'] = $this->varios->cargar_sectores(array('id' => $data['productor']['id_sector'])); 
		
		$data['titulo'] = " Cuyapa - Productores  de ".$data['municipio']['nombre']." - ".$data['productor']['nombre'];
		
	 
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/detalles_productor_zona.php',$data);
	} 
	
	public function crear_produccion($id)
	{
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($id);
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		if($data['productor']['id_municipio'] != $_SESSION['id_municipio']){ 
			header("Location: ".base_url()."coordinador/404"); 
		} 
		
		$data['titulo'] = " Cuyapa - Productores  de ".$data['municipio']['nombre']." - ".$data['productor']['nombre']." - Crear Producci&oacute;n";
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		 		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_producto'] = $this->input->post('id_producto');
			$data['id_modalidad'] = $this->input->post('id_modalidad');
			$data['id_uso'] = $this->input->post('id_uso');
			$productor = $this->input->post('productor');
			
			$nombre_url = str_replace(' ','_',$data['productor']['nombre']);
			$nombre_url = strtolower($nombre_url); 
			
			if($data['nombre'] && $data['id_categoria'] && $data['id_producto'] && $data['id_modalidad'] && $data['id_uso'] ){
				
				$res = $this->productor_model->insertar_produccion($productor, $data['nombre'], $data['id_producto'], $data['id_modalidad'], $data['id_uso']);
				
				if($res == false){
					
					header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."?alert=4");
				}else{
			 
					header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."?alert=1");
				
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
		$this->load->view('pages/coordinador/crear_produccion.php',$data);
			
	}
	
	public function detalle_produccion($id_productor , $id_produccion)
	{   
		$data['produccion'] = $this->productor_model->cargar_produccion($id_productor,$id_produccion);
		
		if(!$data['produccion']){ 
			header("Location: ".base_url()."coordinador/404"); 
		} 
		
		$data['siembras'] = $this->productor_model->cargar_siembras($id_produccion);
		
		$data['cosechas'] = $this->productor_model->cargar_cosechas($id_produccion);
		
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($id_productor);
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		$data['suma']=0;
		$data['metros']=0;
		$data['porcentaje']=0;
		$data['cantidad']=0;
		 
		
		$data['titulo'] = " Cuyapa - Productores  de ".$data['municipio']['nombre']." - ".$data['productor']['nombre']." - ".$data['produccion']['nombre_produccion'];
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/detalle_produccion.php',$data);
	}
	
	public function insertar_siembra()	{
		
		$cantidad_terreno = $this->input->post('cantidad_terreno');
		$medida_terreno = $this->input->post('medida_terreno');
		$tipo_financiamiento = $this->input->post('tipo_financiamiento');
		$id_produccion = $this->input->post('id_produccion');
		
		$data['produccion'] = $this->productor_model->cargar_produccion_id_produccion($id_produccion);
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($data['produccion']['id_productor']);
		
		$nombre_url = str_replace(' ','_',$data['productor']['nombre']);
		$nombre_url = strtolower($nombre_url); 
		
		$cant = $cantidad_terreno;
		if(strcmp($medida_terreno, 'ha')==0){
		
			$cantidad_terreno=$cantidad_terreno*10000;
			
		}
		
		$this->productor_model->insertar_siembra( $id_produccion, $cantidad_terreno, $tipo_financiamiento );
		
		if((strcmp($medida_terreno, 'ha')==0) || ($cant<10000)){
			
			header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."/produccion/".$id_produccion); 
		}else {
			
			header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."/produccion/".$id_produccion."?alert=1");
		}
	}
	
	
	public function insertar_cosecha(){

		$cantidad_terreno = $this->input->post('cantidad_terreno_cn');
		$medida_terreno = $this->input->post('medida_terreno_cn');
		$id_produccion = $this->input->post('id_produccion');
		$id_random = $this->input->post('id_random_cn');
		
		$data['produccion'] = $this->productor_model->cargar_produccion_id_produccion($id_produccion);
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($data['produccion']['id_productor']);
		
		$nombre_url = str_replace(' ','_',$data['productor']['nombre']);
		$nombre_url = strtolower($nombre_url); 
		
		if(strcmp($medida_terreno, 'ha')==0){
		
			$cantidad_terreno=$cantidad_terreno*10000;
			
		}
		 		
		$this->productor_model->insertar_cosecha( $id_produccion, $id_random, $cantidad_terreno ); 
		
		header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."/produccion/".$id_produccion);
	}
	
	public function eliminar_siembra($id){
		
		$data['siembra'] = $this->productor_model->cargar_siembras_id_siembra( $id);  
		$data['produccion'] = $this->productor_model->cargar_produccion_id_produccion($data['siembra']['id_produccion']);
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($data['produccion']['id_productor']);
		
		$nombre_url = str_replace(' ','_',$data['productor']['nombre']);
		$nombre_url = strtolower($nombre_url); 
		
		$this->coordinador_model->eliminar_siembra( $id ); 
		
		header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."/produccion/".$data['siembra']['id_produccion']);
		
	}
	
	public function eliminar_cosecha($id){
		
		$data['cosecha'] = $this->productor_model->cargar_cosechas_id_cosecha( $id);  
		$data['produccion'] = $this->productor_model->cargar_produccion_id_produccion($data['cosecha']['id_produccion']);
		$data['productor'] = $this->productor_model->solicitar_productor_id_productor($data['produccion']['id_productor']);
		
		$nombre_url = str_replace(' ','_',$data['productor']['nombre']);
		$nombre_url = strtolower($nombre_url); 
		
		$this->coordinador_model->eliminar_cosecha( $id ); 
		
		header("Location: ".base_url()."coordinador/productores_zona/".$data['productor']['id']."/".$nombre_url."/produccion/".$data['cosecha']['id_produccion']);
		
	}
	
	public function rubros_zona(){
		
		$data['municipio'] = $this->varios->cargar_municipios(array('id' => $_SESSION['id_municipio']));
		
		$data['titulo'] = " Cuyapa - Rubros de ".$data['municipio']['nombre'];
		
		$data['rubros'] = $this->coordinador_model->cargar_rubro();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/coordinador/rubro_zona.php',$data);
	}
	
	 
	
}
