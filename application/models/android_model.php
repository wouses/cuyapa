<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		
	}
	
	public function login($email, $password){
		
		$this->db->select('u.usuario, u.id as id, p.nombre, p.imagen');
		$this->db->from('usuarios u, productores p');
		$this->db->where('u.usuario = "'.$email.'" AND u.clave = "'.$password.'" AND u.status = 1 AND u.id = p.id_usuario');
		$query = $this->db->get();
		
		$num = $query->num_rows();
		
		if($num){
			
			foreach ($query->result_array() as $datos){
				
				$arr = array();
				$arr['id'] = $datos['id'];
				$arr['name'] = $datos['nombre'];
				$arr['email'] = $datos['usuario'];
				$arr['image'] = $datos['imagen']; 
				
				
				
			}
			
			return $arr;
		} 
		
	}
	
	public function produccion($id_productor){
		
		$this->db->select('prod.id as id, prod.nombre as nombre, p.rubro, m.nombre as modalidad, u.nombre as uso');
		$this->db->from('producciones prod, productos p, modalidades m, usos u');
		$this->db->where('prod.id_productor = '.$id_productor.' AND prod.id_producto = p.id AND prod.id_modalidad = m.id AND prod.id_uso = u.id');
		$this->db->group_by('prod.id');
		$this->db->order_by('prod.id');
		$query = $this->db->get();
		
		$num = $query->num_rows();
		
		if($num){ 
		
			$arr = array();
	
			foreach ($query->result_array() as $datos){
			
				$arr2 = array();
				$arr2['id'] = $datos['id'];
				$arr2['nombre'] = $datos['nombre'];
				$arr2['rubro'] = $datos['rubro'];
				$arr2['modalidad'] = $datos['modalidad'];
				$arr2['uso'] = $datos['uso'];
				
				$arr[] = $arr2;
			}
			
			return $arr;
			
		} 
		
	}
	
	public function detalle_produccion($id_produccion){
		
		$this->db->select('prod.id as id, prod.nombre as nombre, prod.fecha as fecha, p.rubro, m.nombre as modalidad, u.nombre as uso');
		$this->db->from('producciones prod, productos p, modalidades m, usos u');
		$this->db->where('prod.id = '.$id_produccion.' AND prod.id_producto = p.id AND prod.id_modalidad = m.id AND prod.id_uso = u.id');
		$query = $this->db->get();
		
		$num = $query->num_rows();
		
		if($num){  
		
			foreach ($query->result_array() as $datos){
			
				$arr = array();
				$arr['id'] = $datos['id'];
				$arr['nombre'] = $datos['nombre'];
				$arr['rubro'] = $datos['rubro'];
				$arr['modalidad'] = $datos['modalidad'];
				$arr['uso'] = $datos['uso'];
				$arr['fecha'] = $datos['fecha'];
				
				$consulta_siembras = $this->db->get_where('producciones_siembras', array('id_produccion' => $datos['id']));
				
				$arr_siembra = array();
				
				foreach ($consulta_siembras->result_array() as $siembra){
					
					$arr2 = array();
					$arr2['cantidad_terreno'] = $siembra['cantidad_terreno'];
					$arr2['tipo_financiamiento'] = $siembra['tipo_financiamiento'];
					$arr2['fecha'] = $siembra['fecha'];
					
					$arr_siembra[] = $arr2;
				}
				
				$arr['siembra'] = $arr_siembra;
				
				$consulta_cosechas = $this->db->get_where('producciones_cosechas', array('id_produccion' => $datos['id']));
				
				$arr_cosecha = array();
				
				foreach ($consulta_cosechas->result_array() as $cosecha){
					
					$arr3 = array();
					$arr3['cantidad_terreno'] = $cosecha['cantidad_terreno'];
					$arr3['fecha'] = $cosecha['fecha'];
					
					$consulta_calidad_cosechas = $this->db->get_where('calidad_cosechas', array('id_produccion_cosecha' => $cosecha['id']));
					
					$arr_cant_cal = array();
					
					foreach ($consulta_calidad_cosechas->result_array() as $calidad_cantidad){
						
						$arr4 = array();
						$arr4['calidad'] = $calidad_cantidad['calidad'];
						$arr4['cantidad'] = $calidad_cantidad['cantidad'];
						
						$arr_cant_cal[] = $arr4;
					}
					
					
					$arr3['calidad_cantidad'] = $arr_cant_cal;
					
					$arr_cosecha[] = $arr3;
					
					
				}
				
				$arr['cosecha'] = $arr_cosecha;
			}
			
			return $arr;
			
		} 
		
	}
	
}
