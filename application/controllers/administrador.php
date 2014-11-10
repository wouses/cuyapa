<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->model('administrador_model');
		$this->load->model('usuarios');
		$this->load->model('varios');
		
		@session_start();

		if ( !$_SESSION['id'] ){

			header('Location: '.base_url());

		}else{		
			if($_SESSION['tipo']!=3){
				
				switch($_SESSION['tipo']){
					case 1: header('Location: '.base_url().'productor'); 
					break;	
					
					case 2: header('Location: '.base_url().'coordinador'); 
					break;
				}
			}
		}
	}

	public function index()
	{
		$data['titulo'] = " Cuyapa - Panel";
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/panel_principal.php',$data);
	}
	
	public function guia()
	{
		$data['titulo'] = " Cuyapa - Gu&iacute;as";
		
		$data['guias'] = $this->administrador_model->cargar_guias();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/guias.php',$data);
		
	}
	
	public function crear_guia()
	{
		
		$data['titulo'] = " Cuyapa - Crear Gu&iacute;a";
		
		$data['rubros'] = $this->administrador_model->cargar_rubros();
	
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre');
			$data['id_producto'] = $this->input->post('id_producto');
			$data['tipo'] = $this->input->post('tipo');
			
			$data['nombre_doc'] = $_FILES['docfile']['name'];
			$data['tipo_doc'] = $_FILES['docfile']['type'];
			$data['tamano_doc'] = $_FILES['docfile']['size'];
			$data['tmp_name'] = $_FILES['docfile']['tmp_name'];
			
			if( $data['nombre'] && $data['id_producto'] && $data['tipo']){
				
				if($data['nombre_doc']){
					
					$mime_filter = array(
  						'application/pdf'
					);
					
					if(in_array($data['tipo_doc'] , $mime_filter)) {
						
						$dir = 'uploads/guias/';
						$fecha = date("d/m/Y");
					
						if(move_uploaded_file($data['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'cuyapa/'.$dir.$data['nombre_doc'])){
							
							$this->administrador_model->insertar_guia($data['nombre'], $data['id_producto'], $data['tipo'], $fecha, $dir.$data['nombre_doc']);
							header("Location: ".base_url()."administrador/guia?alert=1");
							
						
						}else{
							
							header("Location: ".base_url()."administrador/guia?alert=2");
							
						}
					}else{
						
						$data['error'] = 3;
						$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);
						
					}
				}else{
					
					$data['error'] = 2;
					$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);
				}
				
			}else{
				
				$data['error'] = 1;
				$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);
				
				
			}
			
		}
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_guia.php',$data);
	
	}
	
	public function editar_guia($id=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Gu&iacute;a";
			
			$data['guias'] = $this->administrador_model->cargar_guias($id);
			
			$data['rubros'] = $this->administrador_model->cargar_rubros();
			$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['guias']['id_producto']);
							
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_guia.php',$data);
		
		}else{
			
			$nombre = $this->input->post('nombre');
			$id_producto = $this->input->post('id_producto');
			$tipo = $this->input->post('tipo');
			$idguia = $this->input->post('idguia');
			
			$nombre_doc = $_FILES['docfile']['name'];
			$tipo_doc = $_FILES['docfile']['type'];
			$tamano_doc = $_FILES['docfile']['size'];
			
			$dir = 'uploads/guias/';
			
			$guia = $this->administrador_model->cargar_guias($idguia);
			
			if(!$nombre_doc){
			
				$this->administrador_model->editar_guia($idguia , $nombre, $id_producto, $tipo);
				
				header("Location: ".base_url()."administrador/guia?alert=3");
				
			}else{
				
				$mime_filter = array(
  						'application/pdf'
					);
					
				if(in_array($tipo_doc , $mime_filter)) {

				
					if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		
						@unlink($_SERVER['DOCUMENT_ROOT'].$guia['archivo']);
		
					}
		
					else{
		
						@unlink($_SERVER['DOCUMENT_ROOT']."cuyapa/".$guia['archivo']);
		
					}
					
					if(move_uploaded_file($_FILES['docfile']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'cuyapa/'.$dir.$nombre_doc)){
					
						$this->administrador_model->editar_guia($idguia , $nombre, $id_producto, $tipo, $dir.$nombre_doc);
						
						header("Location: ".base_url()."administrador/guia?alert=3");
					
					}else{
					
						header("Location: ".base_url()."administrador/guia?alert=4");
						
					}
					
				}else{
					
					$data['error'] = 3; 
					 
					$data['titulo'] = " Cuyapa - Editar Gu&iacute;a";
			
					$data['guias'] = $this->administrador_model->cargar_guias($id);
					
					$data['rubros'] = $this->administrador_model->cargar_rubros();
					$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['guias']['id_producto']);
								
					$this->load->view('templates/header.php',$data);
					$this->load->view('pages/administrador/editar_guia.php',$data);				
					
				}
				
			}
			
		}
		
	}
	
	public function eliminar_guia($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Gu&iacute;a";
		
		$guia = $this->administrador_model->cargar_guias($id);
		
		if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	
			@unlink($_SERVER['DOCUMENT_ROOT'].$guia['imagen']);

		}

		else{

			@unlink($_SERVER['DOCUMENT_ROOT']."cuyapa/".$guia['imagen']);

		}
		
		$this->administrador_model->eliminar_guia($id);
	
		header("Location: ".base_url()."administrador/guia?alert=5");
		
	
	}
	
	public function categoria()
	{
		$data['titulo'] = " Cuyapa - Categor&iacute;as";
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/categorias.php',$data);
		
	}
	
	public function crear_categoria()
	{
		$data['titulo'] = " Cuyapa - Crear Categor&iacute;a";
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$nombre = $this->input->post('nombre');
			
			if($nombre){
			
				$res = $this->administrador_model->insertar_categoria($nombre);
				
				if($res == true){
					
					header("Location: ".base_url()."administrador/categoria?alert=1");
					
				}else{
					
					header("Location: ".base_url()."administrador/categoria?alert=2");
					
				}
			
			}else{
				
				$data['error']=1;
				
			}
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_categoria.php',$data);
			
	}
	
	
	public function eliminar_categoria($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Categor&iacute;a";
		
		$this->load->model('administrador_model');
		$this->administrador_model->eliminar_categoria($id);
	
		header("Location: ".base_url()."administrador/categoria?alert=5");
		
	
	}
	
	public function editar_categoria($id=NULL , $nombre=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Categor&iacute;a";
			
			$this->load->model('administrador_model');
			$data['categoria'] = $this->administrador_model->cargar_categorias($id);
			
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_categoria.php',$data);
		
		}else{
			
			$nombre = $this->input->post('nombre');
			$id = $this->input->post('id');
			
			$this->load->model('administrador_model');
			$this->administrador_model->editar_categoria($id , $nombre);
			
			header("Location: ".base_url()."administrador/categoria?alert=3");
		
		}
	
		
	}
	
	
	public function rubro()
	{
		$data['titulo'] = " Cuyapa - Rubros";
		
		$this->load->model('administrador_model');
		$data['rubros'] = $this->administrador_model->cargar_rubros();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/rubro.php',$data);
		
	}
	
	public function crear_rubro()
	{
		
		$data['titulo'] = " Cuyapa - Crear Rubro";
		
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		
		$data['usos'] = $this->administrador_model->cargar_usos();
		
		$data['modalidades'] = $this->administrador_model->cargar_modalidades();
		
		$enviar = $this->input->post('enviar');
		if($enviar){
			
			$data['nombre'] = $this->input->post('nombre');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_random'] = $this->input->post('id_random');
			
			$data['nombre_img'] = $_FILES['imagefile']['name'];
			$data['tipo_img'] = $_FILES['imagefile']['type'];
			$data['tamano_img'] = $_FILES['imagefile']['size'];
			$data['tmp_name'] = $_FILES['imagefile']['tmp_name'];
					
			$data['cant_mod_uso'] = $this->administrador_model->contar_modalidad_uso_temp($data['id_random']);
			
			if( $data['nombre'] && $data['id_categoria'] ){
				
				if($data['cant_mod_uso']){
	
					if($data['nombre_img']){
						
						$mime_filter = array(
							'image/gif',
							'image/jpeg',
							'image/png'
						);
						
						if(in_array($data['tipo_img'] , $mime_filter)) {
							$dir = 'uploads/rubros/';
						
							if(move_uploaded_file($data['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'cuyapa/'.$dir.$data['nombre_img'])){
								
								$res = $this->administrador_model->insertar_rubro($data['nombre'], $data['id_categoria'],$data['id_random'], $dir.$data['nombre_img']);
								
								if($res == false){
									
									header("Location: ".base_url()."administrador/rubro?alert=6");
								}else{
							 
									header("Location: ".base_url()."administrador/rubro?alert=1");
								
								}
							}else{
							 
								header("Location: ".base_url()."administrador/rubro?alert=2");
								
							}
						}else{
							
							$data['error'] = 4;
							if($data['id_categoria']!=''){
								$data['categorias_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
							}
						}
					}else{
						 
						$res = $this->administrador_model->insertar_rubro($data['nombre'], $data['id_categoria'], $data['id_random']);
						
						if($res == false){
							
							header("Location: ".base_url()."administrador/rubro?alert=6");
						}else{
					 
							header("Location: ".base_url()."administrador/rubro?alert=1");
						
						} 
						
					}
				}else{
					
					$data['error'] = 2;
					if($data['id_categoria']!=''){
						$data['categorias_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
					}
					
				}
				
			}else{
				
				$data['error'] = 1;
				if($data['id_categoria']!=''){
					$data['categorias_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
				}
				
			}
			
		}
		
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_rubro.php',$data);
	
	}
	
	
	public function eliminar_rubro($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Rubro";
		
		$rubro = $this->administrador_model->cargar_rubros($id);
		
		if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
	
			@unlink($_SERVER['DOCUMENT_ROOT'].$rubro['imagen']);

		}

		else{

			@unlink($_SERVER['DOCUMENT_ROOT']."cuyapa/".$rubro['imagen']);

		}
		
		$this->administrador_model->eliminar_rubro($id);
	
		header("Location: ".base_url()."administrador/rubro?alert=5");
		
	
	}
	
	public function editar_rubro($id=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Rubro";
			
			$data['rubros'] = $this->administrador_model->cargar_rubros($id);
				
			$data['categorias'] = $this->administrador_model->cargar_categorias();
			
			$data['usos'] = $this->administrador_model->cargar_usos();
			
			$data['modalidades'] = $this->administrador_model->cargar_modalidades();
				
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_rubro.php',$data);
		
		}else{
			
			$nombre = $this->input->post('nombre');
			$id_categoria = $this->input->post('id_categoria');
			$id_uso = $this->input->post('id_uso');
			$id_modalidad = $this->input->post('id_modalidad');
			$rendimiento = $this->input->post('rendimiento');
			$idproducto = $this->input->post('idproducto');
			
			@$nombre_img = $_FILES['imagefile']['name'];
			@$tipo_img = $_FILES['imagefile']['type'];
			@$tamano_img = $_FILES['imagefile']['size'];
			
			$dir = 'uploads/rubros/';
			
			$rubro = $this->administrador_model->cargar_rubros($idproducto);
			
			if(!$nombre_img){
			
				$this->administrador_model->editar_rubro($idproducto , $nombre, $id_categoria, $id_uso, $id_modalidad, $rendimiento);
				
				header("Location: ".base_url()."administrador/rubro?alert=3");
				
			}else{
				
				$mime_filter = array(
  						'image/gif',
						'image/jpeg',
						'image/png'
					);
					
				if(in_array($tipo_img , $mime_filter)) {

				
					if ( strpos($_SERVER['DOCUMENT_ROOT'],'wamp') == false ) {
		
						@unlink($_SERVER['DOCUMENT_ROOT'].$rubro['imagen']);
		
					}
		
					else{
		
						@unlink($_SERVER['DOCUMENT_ROOT']."cuyapa/".$rubro['imagen']);
		
					}
					
					if(move_uploaded_file($_FILES['imagefile']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'cuyapa/'.$dir.$nombre_img)){
					
						$this->administrador_model->editar_rubro($idproducto , $nombre, $id_categoria, $id_uso, $id_modalidad, $rendimiento, $dir.$nombre_img);
						
						header("Location: ".base_url()."administrador/rubro?alert=3");
					
					}else{
					
						header("Location: ".base_url()."administrador/rubro?alert=4");
						
					}
					
				}else{
					
					$data['error'] = 3; 
					 
					$data['titulo'] = " Cuyapa - Editar Rubro";
			
					$data['rubros'] = $this->administrador_model->cargar_rubros($idproducto);
						
					$data['categorias'] = $this->administrador_model->cargar_categorias();
					
					$data['usos'] = $this->administrador_model->cargar_usos();
					
					$data['usos_sel'] = $id_uso;
					
					$data['modalidades'] = $this->administrador_model->cargar_modalidades();
					
					$data['modalidades_sel'] = $id_modalidad;
						
					$this->load->view('templates/header.php',$data);
					$this->load->view('pages/administrador/editar_rubro.php',$data);				
					
				}
				
			}
			
		}
		
	}
	
	public function usos()
	{
		$data['titulo'] = " Cuyapa - Usos";
		
		$data['usos'] = $this->administrador_model->cargar_usos();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/usos.php',$data);
		
	}

	public function crear_uso()
	{
		$data['titulo'] = " Cuyapa - Crear Uso";
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$nombre = $this->input->post('nombre');
			
			$this->administrador_model->insertar_usos($nombre);
			
			header("Location: ".base_url()."administrador/usos?alert=1");
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_uso.php',$data);
			
	}

	public function editar_uso($id=NULL , $nombre=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Uso";
			
			$data['uso'] = $this->administrador_model->cargar_usos($id);
			
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_uso.php',$data);
		
		}else{
			
			$nombre = $this->input->post('nombre');
			$id = $this->input->post('id');
			
			$this->administrador_model->editar_uso($id , $nombre);
			
			header("Location: ".base_url()."administrador/usos?alert=3");
		
		}
	
		
	}

	public function eliminar_uso($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Uso";
		
		$this->administrador_model->eliminar_uso($id);
	
		header("Location: ".base_url()."administrador/usos?alert=5");
		
	
	}

	public function modalidad()
	{
		$data['titulo'] = " Cuyapa - Variedad";
		
		$data['modalidades'] = $this->administrador_model->cargar_modalidades();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/modalidad.php',$data);
		
	}

	public function crear_modalidad()
	{
		$data['titulo'] = " Cuyapa - Crear Variedad";
		
		$enviar = $this->input->post('enviar');
		
		if($enviar){
			
			$nombre = $this->input->post('nombre');
			
			if($nombre){
			
				$res = $this->administrador_model->insertar_modalidades($nombre);
				
				if($res == true){
					
					header("Location: ".base_url()."administrador/variedad?alert=1");
					
				}else{
					
					header("Location: ".base_url()."administrador/variedad?alert=2");
					
				}
			
			}else{
				
				$data['error']=1;
				
			} 
			
		}
		
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_modalidad.php',$data);
			
	}

	public function editar_modalidad($id=NULL , $nombre=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Variedad";
			
			$data['modalidad'] = $this->administrador_model->cargar_modalidades($id);
			
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_modalidad.php',$data);
		
		}else{
			
			$nombre = $this->input->post('nombre');
			$id = $this->input->post('id');
			
			$this->administrador_model->editar_modalidades($id , $nombre);
			
			header("Location: ".base_url()."administrador/variedad?alert=3");
		
		}
	
		
	}

	public function eliminar_modalidad($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Variedad";
		
		$this->administrador_model->eliminar_modalidad($id);
	
		header("Location: ".base_url()."administrador/variedad?alert=5");
		
	
	}
	
	public function probabilidad_exito()
	{
		$data['titulo'] = " Cuyapa - Probabilidad de Éxito";
		
		$data['probabilidades'] = $this->administrador_model->probabilidad_exito();
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/probabilidad_exito.php',$data);
		
	}
	
	public function crear_probabilidad_exito()
	{
		$data['titulo'] = " Cuyapa - Crear Probabilidad de Éxito";
		
		$this->load->model('varios');
		$data['estados'] = $this->varios->cargar_estados();
		
		$this->load->model('productor_model');
		$data['categorias'] = $this->administrador_model->cargar_categorias();
		
		$data['probabilidades'] = $this->administrador_model->probabilidad_exito();
		
		$enviar = $this->input->post('enviar');
		if($enviar){
			
			$data['id_estado'] = $this->input->post('id_estado');
			$data['id_municipio'] = $this->input->post('id_municipio');
			$data['fecha_inicio'] = $this->input->post('fecha_inicio');
			$data['fecha_final'] = $this->input->post('fecha_final');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_producto'] = $this->input->post('id_producto');
			
			if( $data['id_estado'] && $data['id_municipio'] && $data['fecha_inicio'] && $data['fecha_final'] && $data['id_categoria'] && $data['id_producto']){
				
				if($data['fecha_inicio']>=$data['fecha_final']){
				
					$data['error'] = 2;
				
					if($data['id_estado']){
				
						$data['estado_sel'] = $this->varios->cargar_estados(array('id' => $data['id_estado']));
						
						if($data['id_municipio']){
							$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['id_municipio']));
							
							$data['municipios'] = $this->varios->municipio_rest($data['id_estado']);
						}
					}
					if($data['id_categoria']){
						$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
						$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
						if($data['id_producto']){
							$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);	
						}
					}
				
				}else{
					
					$this->administrador_model->insertar_probabilidad_exito($data['id_estado'],$data['id_municipio'],$data['fecha_inicio'],$data['fecha_final'],$data['id_producto']);
			
					header("Location: ".base_url()."administrador/probabilidad_exito?alert=1");
					
				}
				
			}else{
				
				$data['error'] = 1;
				
				if($data['id_estado']){
			
					$data['estado_sel'] = $this->varios->cargar_estados(array('id' => $data['id_estado']));
					
					if($data['id_municipio']){
						$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['id_municipio']));
						
						$data['municipios'] = $this->varios->municipio_rest($data['id_estado']);
					}
				}
				if($data['id_categoria']){
					$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
					$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
					if($data['id_producto']){
						$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);	
					}
				}
					
			}
			
		}
	
		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_probabilidad_exito.php',$data);
		
	}
	
	public function editar_probabilidad_exito($id=NULL)
	{
		
		if($id){
		
			$data['titulo'] = " Cuyapa - Editar Probabilidad de Éxito";
			
			$data['probabilidad'] = $this->administrador_model->probabilidad_exito($id);
			
			$this->load->model('varios');
			$data['estados'] = $this->varios->cargar_estados();
			
			$this->load->model('productor_model');
			$data['categorias'] = $this->administrador_model->cargar_categorias();
			
			$data['estado_sel'] = $this->varios->cargar_estados(array('id' => $data['probabilidad']['id_estado']));
			
			$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['probabilidad']['id_municipio']));
						
			$data['municipios'] = $this->varios->municipio_rest($data['probabilidad']['id_estado']);
			
			$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['probabilidad']['id_producto']);
			
			$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['rubro_sel']['id_categoria']);
					
			$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['rubro_sel']['id_categoria']);
				
			
			$data['fecha_inicio']  = $data['probabilidad']['fecha_inicio'];
			
			$data['fecha_final']  = $data['probabilidad']['fecha_final'];
			
			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/editar_probabilidad_exito.php',$data);
		
		}else{
			
			$data['id_estado'] = $this->input->post('id_estado');
			$data['id_municipio'] = $this->input->post('id_municipio');
			$data['fecha_inicio'] = $this->input->post('fecha_inicio');
			$data['fecha_final'] = $this->input->post('fecha_final');
			$data['id_categoria'] = $this->input->post('id_categoria');
			$data['id_producto'] = $this->input->post('id_producto');
			$data['idprobabilidad'] = $this->input->post('idprobabilidad');
			
			if( $data['id_estado'] && $data['id_municipio'] && $data['fecha_inicio'] && $data['fecha_final'] && $data['id_categoria'] && $data['id_producto']){
				
				if($data['fecha_inicio']>=$data['fecha_final']){
				
					$data['error'] = 2;
				
					if($data['id_estado']){
				
						$data['estado_sel'] = $this->varios->cargar_estados(array('id' => $data['id_estado']));
						
						if($data['id_municipio']){
							$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['id_municipio']));
							
							$data['municipios'] = $this->varios->municipio_rest($data['id_estado']);
						}
					}
					if($data['id_categoria']){
						$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
						$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
						if($data['id_producto']){
							$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);	
						}
					}
					
					
					$data['fecha_inicio']  = $data['probabilidad']['fecha_inicio'];
					
					$data['fecha_final']  = $data['probabilidad']['fecha_final'];
						
					
					$this->load->view('templates/header.php',$data);
					$this->load->view('pages/administrador/editar_probabilidad_exito.php',$data);
			
				}else{
					
					
					$this->administrador_model->editar_probabilidad_exito($data['idprobabilidad'], $data['id_estado'],$data['id_municipio'],$data['fecha_inicio'],$data['fecha_final'],$data['id_producto']);
					
					header("Location: ".base_url()."administrador/probabilidad_exito?alert=3");
					
				}
			}else{
				
				$data['error'] = 1;
				
				if($data['id_estado']){
			
					$data['estado_sel'] = $this->varios->cargar_estados(array('id' => $data['id_estado']));
					
					if($data['id_municipio']){
						$data['municipio_sel'] = $this->varios->cargar_municipios(array('id' => $data['id_municipio']));
						
						$data['municipios'] = $this->varios->municipio_rest($data['id_estado']);
					}
				}
				if($data['id_categoria']){
					$data['categoria_sel'] = $this->administrador_model->cargar_categorias($data['id_categoria']);
					$data['rubros'] = $this->administrador_model->cargar_rubros_categoria($data['id_categoria']);
					if($data['id_producto']){
						$data['rubro_sel'] = $this->administrador_model->cargar_rubros($data['id_producto']);	
					}
				}
				
				
				$data['fecha_inicio']  = $data['probabilidad']['fecha_inicio'];
				
				$data['fecha_final']  = $data['probabilidad']['fecha_final'];
					
				
				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/administrador/editar_probabilidad_exito.php',$data);
					
			}
		}
	
		
	}
	
	public function eliminar_probabilidad_exito($id)
	{
		
		$data['titulo'] = " Cuyapa - Eliminar Probabilidad Éxito";
		
		$this->administrador_model->eliminar_probabilidad_exito($id);
	
		header("Location: ".base_url()."administrador/probabilidad_exito?alert=5");
		
	
	}
	
	function usuarios() {


		$data['titulo'] = "Cuyapa - Usuarios";
		
		$data['usuarios'] = $this->usuarios->solicitar_usuario();

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/usuarios.php',$data);

	}

	function crear_usuario() { 

		$data['titulo'] = "Cuyapa - Crear Cuenta";
		
		$data['estados'] = $this->varios->cargar_estados();
		
		$enviar = $this->input->post('enviar');
		
		if($enviar==1){
			
			echo 'asd';
		}

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/crear_usuario.php',$data);

	}
	
	public function comentarios(){
		
		$data['titulo'] = "Cuyapa - Comentarios";
		
		$data['comentarios'] = $this->administrador_model->cargar_comentarios();

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/comentarios.php',$data);

	}
	
	public function comentario_detalle( $id ){
		
		$data['titulo'] = "Cuyapa - Comentarios";
		
		$data['comentario'] = $this->administrador_model->cargar_comentarios( $id );

		$this->load->view('templates/header.php',$data);
		$this->load->view('pages/administrador/comentario_detalle.php',$data);

	}
	
	public function eliminar_comentario($id){
		
		$this->administrador_model->eliminar_comentario($id); 
		
		header('Location: '.base_url().'administrador/comentario?alert=1');
		
	}

	function graficos() {

		$data['titulo'] = "Cuyapa - Graficos y Proyecciones";

		$this->load->model('administrador_model');

		$data['municipios'] = $this->administrador_model->cargar_municipios_graficos();

		$data['var']='';

		$this->load->view('templates/header.php',$data);
		$this->load->view('graficos');

	}
	
	public function exportar_bd(){
		$this->load->dbutil();
		
		$prefs = array(  
                'format'      => '.txt',             // gzip, zip, txt 
                'add_drop'    => TRUE,              // Agregar o no la sentencia DROP TABLE al archivo de respaldo
                'add_insert'  => TRUE,              // Agregar o no datos de INSERT al archivo de respaldo
                'newline'     => "\n"               // Caracter de nueva línea usado en el archivo de respaldo
              );
 
		$copia_de_seguridad =& $this->dbutil->backup($prefs); 
		
		$this->load->helper('download');
		force_download('copia_de_seguridad.sql', $copia_de_seguridad);
		
	}
	
	public function importar_bd(){ 
	
		$this->load->helper('file');
		
		$string = read_file( $_FILES['archivo']['tmp_name']); 
		
		$this->administrador_model->restaurar_bd($string);
		
		header('Location: '.base_url().'cerrar_sesion');
	}
}
