<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
	
	public function __construct(){
		parent::__construct(); 
		
		@session_start();
		$this->load->model('usuarios');
		$this->load->model('varios');
	}

	public function identificar_usuario()
	{
		$usuario = $this->input->post('usuario');
		$clave = md5($this->input->post('clave'));
		 
		if ($usuario and $clave){ 
		 	
			$nivel = $this->usuarios->identificar($usuario, $clave);
			
			switch( $nivel ){
			
			case 1: header('Location: '.base_url().'productor'); break;
			case 2: header('Location: '.base_url().'coordinador'); break;
			case 3:header('Location: '.base_url().'administrador'); break;
			
			default: header('Location: '.base_url().'acceso?err=0'); break;
			
			}
		
		}else{
		
			header('Location: '.base_url().'acceso?err=0');	
		
		}
	}
	
	public function cerrar_sesion(){

		if ( $_SESSION['usuario'] ){
			session_destroy();
			@session_start();
		}
		
		header('Location: '.base_url());
	}

	function configurar_cuenta() { 
		if ( !$_SESSION['id'] ){

			header('Location: '.base_url());

		}
		
		
		$data['vp_mensajes'] = $this->varios->cargar_vp_mensajes($_SESSION['id']);
		$data['contar_mensajes'] = $this->varios->contar_vp_mensajes($_SESSION['id']);

		$data['titulo'] = "Cuyapa - Usuario - Configurar Cuenta"; 
		$data['usuario'] = $this->usuarios->solicitar_usuario(array('id' => $_SESSION['id']));

		$this->load->view('templates/header.php',$data);
		
		switch($_SESSION['tipo']){
			case '1' : $this->load->view('pages/configurar_cuenta_productor.php',$data); break;	
			case '2' : $this->load->view('pages/coordinador/configurar_cuenta_coordinador.php',$data); break;	
			case '3' : $this->load->view('pages/administrador/configurar_cuenta_administrador.php',$data); break;	
		} 


	}

	public function crear_cuenta() {

		$send = $this->input->post('send');
		$usuario = $data['usuario'] = $this->input->post('usuario');
		$clave = $data['clave'] = $this->input->post('password');
		$clave2 = $data['clave2'] = $this->input->post('password2');
		$tipo = $data['tipo_usu'] = $this->input->post('tipo_usu');
		$fecha = $data['fecha'] = date('d/m/Y');
		$status = $data['status'] = 0;
			
			//la variable send me indica si vengo del formulario
		if($send){
			
			//verifico tener todos los datos
			if( ($data['usuario']) && ($data['clave']) && ($data['clave2']) && ($data['tipo_usu']) && ($data['fecha']) ){	
				
					$existe_u = $this->usuarios->solicitar_usuario(array('usuario' => $usuario));		
					
					//verifico si no existe este correo y sigo
					if(!$existe_u){
					
						//si las claves  coinciden sigo al proximo paso
						if( $clave === $clave2){
 
							$guardar = $this->usuarios->crear_cuentas($usuario,$clave,$tipo,$fecha,$status);

							?>

							<script type="text/javascript">
							alert('<?php echo base_url();?>administrador/crear_usuario');

							location.href="<?php echo base_url();?>administrador/crear_usuario";
							</script>

							<?php
						
						//sino devuelvo y muestro error
						}else{
							
							$data['titulo'] = "Cuyapa - Crear Cuenta";
							$data['error']=1;	
							$this->load->view('templates/header.php',$data);			
							$this->load->view('pages/administrador/crear_usuario.php',$data);
							
						}
					
					//si existe el usuario devuelvo y muestro error
					}else{
						
						$data['error']=2;
						$this->load->view('templates/header.php',$data);
						$this->load->view('pages/administrador/crear_usuario.php',$data);
						
					}
				
			//si no vienen todos los datos devuelvo y muestro error
			}else{
				
				$data['error']=3;
				$this->load->view('templates/header.php',$data);
				$this->load->view('pages/administrador/crear_usuario.php',$data);
				
			}
		//sino vengo del formulario quiere decir que vengo por primera vez, muestro pantalla de registro limpia	
		}else{

			$this->load->view('templates/header.php',$data);
			$this->load->view('pages/administrador/crear_usuario.php');
			
		}

	}
	
	public function cambiar_correo(){
		 
		$usuario = $this->input->post('usuario_nuevo');
		$clave = md5($this->input->post('clave'));
		 
		$res = $this->usuarios->cambiar_correo( $usuario, $_SESSION['id'], $clave );
		
		$this->load->model('usuarios');
		$existe_u = $this->usuarios->solicitar_usuario(array('id' => $_SESSION['id']));	
		  
		if($res == false){
			
			echo 'error-Clave invalida.';
			
		}else{ 
			
			session_destroy(); 
			
		}
	}
	
	
}
