<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		
		@session_start();
		
	}

	public function identificar($usuario , $clave)
	{
		$comp = array('usuario' => $usuario , 'clave' => $clave);
		$query = $this->db->get_where('usuarios', $comp );
		 
		if ( $query->num_rows() > 0 ){
			
			$res = $query->row_array();
			if($res['status']==1){
				$_SESSION['usuario'] = $res['usuario'];
				$_SESSION['tipo'] = $res['tipo'];
				$_SESSION['id'] = $res['id']; 
				
				if( $res['tipo'] == 1 ){
					
					$query2 = $this->db->get_where('productores', array('id_usuario' => $res['id']) );
					
					if ( $query2->num_rows() > 0 ){
					
						$res2 = $query2->row_array();
						
						$_SESSION['nombre'] = $res2['nombre'];
						$_SESSION['id_productor'] = $res2['id'];
						if($res2['imagen']){
							$_SESSION['imagen'] = $res2['imagen'];
						}else{
							$_SESSION['imagen'] = 'img/back-end/default-user.png';						
						}
						
					}else{
						
						return false;
						//$_SESSION['nombre'] = $res['usuario'];
						//$_SESSION['imagen'] = 'img/back-end/default-user.png';
						
					}
					return $res['tipo'];
					
				}else if( $res['tipo'] == 2 ){
					
					$query2 = $this->db->get_where('coordinadores', array('id_usuario' => $res['id']) );
					
					if ( $query2->num_rows() > 0 ){
					
						$res2 = $query2->row_array();
						
						$_SESSION['nombre'] = $res2['nombre'];
						$_SESSION['id_coordinador'] = $res2['id']; 
						$_SESSION['id_municipio'] = $res2['id_municipio']; 
						$_SESSION['id_estado'] = $res2['id_estado'];  
						$_SESSION['tipo_coord'] = $res2['tipo'];  
						$_SESSION['imagen'] = 'img/back-end/default-user.png';
						
					}else{
						
						return false;
						//$_SESSION['nombre'] = $res['usuario'];
						//$_SESSION['imagen'] = 'img/back-end/default-user.png';
						
					}
					return $res['tipo'];
					
				}else{
					
					$_SESSION['nombre'] = $res['usuario'];
					$_SESSION['imagen'] = 'img/back-end/default-user.png';
					return $res['tipo'];
					
				}
			}else{ 
				header("Location: ".base_url()."culminacion_registro/".$res['usuario']);
				
				exit;
			}
		}else{
		
			return false;
		
		}
	}
	
	public function solicitar_usuario($where=NULL)
	{
		if ($where)
		{	
			$query = $this->db->get_where('usuarios', $where);
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('usuarios');
		
		return $query->result_array();		
	}

	public function crear_cuentas($usuario,$clave,$tipo,$fecha,$status) {

		$data = array(

		'usuario' => $usuario,
		'clave' => $clave,
		'tipo' => $tipo,
		'fecha' => $fecha,
		'status' => $status
		);

		$this->db->insert('usuarios',$data);
		return 'ok';

	}
	
	public function cambiar_correo ( $usuario, $id_usuario, $clave ){
	
		$query = $this->db->get_where('usuarios', array('id' => $id_usuario));
		
		foreach ($query->result_array() as $row){
			
			if($row['clave'] === $clave){
			
				$data = array(
					'usuario' => $usuario,
					'status' => 0
				);	
				
				$this->db->where('id', $row['id']);
				return $this->db->update('usuarios', $data);
				
			}
		}
		
	}
	
	public function cambiar_clave ( $usuario, $cod_conf, $clave ){
	 
		$data = array(
			'clave' => $clave, 
		);	
		
		$this->db->where('usuario', $usuario); 
		$this->db->where('cod_conf', $cod_conf); 
		return $this->db->update('usuarios', $data);
		
	}
	
	public function actualizar_cod_conf( $usuario, $cod_conf ){
		
		$data = array(
			'cod_conf' => $cod_conf
		);	
		
		$this->db->where('usuario', $usuario);
		return $this->db->update('usuarios', $data);
			
	}
	
	public function verificar_cod_conf($usuario, $cod_conf){
	
		$query = $this->db->get_where('usuarios', array('usuario' => $usuario , 'cod_conf' => $cod_conf));
		
		if ( $query->num_rows() > 0 ){
			
			return $query->row_array();	
		
		}else{
			return false;	
		}
	}
	
	public function activar_usuario( $usuario ){
		 
		$query = $this->db->get_where('usuarios', array('usuario' => $usuario) );
		
		if ( $query->num_rows() > 0 ){
			
			$res = $query->row_array();
			
			if($res['status']==0){
				
				$data = array(
					'status' => 1
				);	
				
				$this->db->where('usuario', $usuario);
				$this->db->update('usuarios', $data);
				
				@session_start();
				$_SESSION['usuario'] = $res['usuario'];
				$_SESSION['tipo'] = $res['tipo'];
				$_SESSION['id'] = $res['id']; 
				 
				$query2 = $this->db->get_where('productores', array('id_usuario' => $res['id']) );
				 
				$res2 = $query2->row_array();
				
				$_SESSION['nombre'] = $res2['nombre'];
				$_SESSION['id_productor'] = $res2['id'];
				if($res2['imagen']){
					$_SESSION['imagen'] = $res2['imagen'];
				}else{
					$_SESSION['imagen'] = 'img/back-end/default-user.png';						
				}
				
				return TRUE;			
				
			}else{
				
				return FALSE;
				
			}
		}
			
	}
	
	
}


