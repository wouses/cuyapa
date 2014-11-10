<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coordinador_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		 
	}
	
	public function cargar_categoria($id=NULL)
	{
		if ($id)
		{	
			$query = $this->db->get_where('categorias', array('id' => $id));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('categorias');
		
		return $query->result_array();		
	}
	
	public function cargar_rubro($id=NULL)
	{
		if ($id)
		{	
			$this->db->select('*');
			$this->db->select('productos.id as idproducto');
			$this->db->select('productos.rubro as rubro');
			$this->db->select('categorias.nombre as categoria');
			$this->db->select('categorias.id as id_categoria');
			$this->db->select('modalidades.nombre as modalidad');
			$this->db->select('modalidades.id as id_modalidad');
			$this->db->select('usos.nombre as uso');
			$this->db->select('usos.id as id_uso');
			$this->db->from('productos');
			$this->db->where('productos.id',$id);
			$this->db->join('categorias', 'categorias.id = productos.id_categoria');
			$this->db->join('modalidad_uso_productos', 'modalidad_uso_productos.id_producto = productos.id');
			$this->db->join('modalidades', 'modalidad_uso_productos.id_modalidad = modalidades.id');
			$this->db->join('usos', 'modalidad_uso_productos.id_uso = usos.id');
			
			$query = $this->db->get();
	
			return $query->row_array();	
		
		}
		
		$this->db->group_by('productos.rubro');
		$this->db->select('*');
		$this->db->select('productos.id as idproducto');
		$this->db->select('productos.rubro as rubro');
		$this->db->select('categorias.nombre as categoria');
		$this->db->select('categorias.id as id_categoria');
		$this->db->select('modalidades.id as id_modalidad'); 
		$this->db->select('usos.id as id_uso');
		$this->db->from('productos');
		$this->db->where('productores.id_municipio = '.$_SESSION['id_municipio']);
		$this->db->join('categorias', 'categorias.id = productos.id_categoria');
		$this->db->join('modalidad_uso_productos', 'modalidad_uso_productos.id_producto = productos.id');
		$this->db->join('modalidades', 'modalidad_uso_productos.id_modalidad = modalidades.id');
		$this->db->join('usos', 'modalidad_uso_productos.id_uso = usos.id');
		$this->db->join('producciones', 'producciones.id_producto = productos.id');
		$this->db->join('productores', 'productores.id = producciones.id_productor');
		$query = $this->db->get();

		return $query->result_array();		
	}
	  
	
	public function cargar_productor($id)
	{
		if ($tipo_cedula_rif && $cedula_rif)
		{	 
			$this->db->where('id',$id);
			$query = $this->db->get('productores');
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('productores');
		
		return $query->result_array();		
	}
	
	
	public function cargar_productor_zona($municipio)
	{
		$this->db->group_by('productores.id'); 
		$this->db->from('productores');  
		$this->db->select('SUM(producciones_siembras.cantidad_terreno) as sembrado'); 
		$this->db->select('productores.*'); 
		$this->db->where('productores.id_municipio',$municipio); 
		$this->db->where('productores.activo',1); 
		$this->db->join('producciones', 'producciones.id_productor = productores.id','left');
		$this->db->join('producciones_siembras', 'producciones_siembras.id_produccion = producciones.id','left'); 
		 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function cargar_productor_inactivo($municipio)
	{
		$this->db->group_by('productores.id'); 
		$this->db->from('productores');   
		$this->db->select('productores.*'); 
		$this->db->select('usuarios.status as status_u'); 
		$this->db->select('estados.nombre as estado');
		$this->db->select('municipios.nombre as municipio');
		$this->db->select('parroquias.nombre as parroquia');
		$this->db->select('sectores.nombre as sector'); 
		$this->db->where('productores.id_municipio',$municipio); 
		$this->db->where('usuarios.status',0); 
		$this->db->join('usuarios', 'usuarios.id = productores.id_usuario');  
		$this->db->join('estados', 'productores.id_estado = estados.id');
		$this->db->join('municipios', 'productores.id_municipio = municipios.id');
		$this->db->join('parroquias', 'productores.id_parroquia = parroquias.id');
		$this->db->join('sectores', 'productores.id_sector = sectores.id'); 
		 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function eliminar_siembra( $id ){
		return $this->db->delete('producciones_siembras', array('id' => $id)); 	
	}
	
	public function eliminar_cosecha( $id ){
		return $this->db->delete('producciones_cosechas', array('id' => $id)); 	
	}
	
	public function eliminar_productor_usuario($id)
	{
		$this->db->delete('usuarios', array('id' => $id)); 
		$this->db->delete('productores', array('id_usuario' => $id)); 
		
		return;
		
	}
	
	public function activar_productor_usuario($id)
	{
		$params = array( 
			'activo' => 1
		);
	
		$this->db->where('id_usuario', $id);
		$this->db->update('productores',$params);
		
		$params2 = array( 
			'status' => 1
		);
	
		$this->db->where('id', $id);
		$this->db->update('usuarios',$params2);
		
	}
	
	public function asignar_usuario_productor($id_productor, $id_usuario)
	{
		$params = array( 
			'id_usuario' => $id_usuario
		);
	
		$this->db->where('id', $id_productor);
		$this->db->update('productores',$params);
	}
}

