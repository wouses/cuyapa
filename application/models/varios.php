<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Varios extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		
	}

	public function cargar_productos($id_categoria=NULL)
	{
		if($id_categoria){
			
			
			$query = $this->db->get_where('productos',  array('id_categoria' => $id_categoria));
		
			return $query-> result_array();
		
		}else{
			
			$query = $this->db->get_where('productos');
		
			return $query->result_array();
			
		}
	}
	
	public function cargar_estados($where=NULL)
	{
		if ($where)
		{	
			
			$query = $this->db->get_where('estados', $where);
			
			return $query->row_array();
		
		}
		
		$this->db->order_by('nombre');
		$query = $this->db->get_where('estados');
		
		return $query->result_array();		
	}
	
	public function cargar_municipios($where=NULL)
	{
		if ($where)
		{	
		
			$query = $this->db->get_where('municipios', $where);
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('municipios');
		
		return $query->result_array();		
	}
	
	public function municipio_rest($id_estado){
		
		$query = $this->db->get_where('municipios',  array('id_estado' => $id_estado));
		
		return $query-> result_array();
	}
	
	public function cargar_parroquias($where=NULL)
	{
		if ($where)
		{	
		
			$query = $this->db->get_where('parroquias', $where);
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('parroquias');
		
		return $query->result_array();		
	}
	
	public function parroquia_rest($id_municipio){
		
		$query = $this->db->get_where('parroquias',  array('id_municipio' => $id_municipio));
		
		return $query-> result_array();
	}
	
	public function cargar_sectores($where=NULL)
	{
		if ($where)
		{	
		
			$query = $this->db->get_where('sectores', $where);
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('sectores');
		
		return $query->result_array();		
	}
	
	public function sector_rest($id_parroquia){
		
		$query = $this->db->get_where('sectores',  array('id_parroquia' => $id_parroquia));
		
		return $query-> result_array();
	}
	
	public function cargar_parcelamientos($where=NULL)
	{
		if ($where)
		{	
		
			$query = $this->db->get_where('parcelamientos', $where);
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('parcelamientos');
		
		return $query->result_array();		
	}
	
	public function parcelamiento_rest($id_sector){
		
		$query = $this->db->get_where('parcelamientos',  array('id_sector' => $id_sector));
		
		return $query-> result_array();
	}
	
	
	
	public function insertar_anuncio($titulo, $texto, $telefono, $url, $imagen, $estado, $municipio, $direccion)
	{
				
			$params = array(
				'titulo' => $titulo,
				'texto' => $texto,
				'telefono' => $telefono,
				'url' => $url,
				'imagen' => $imagen,
				'id_estado' => $estado,
				'id_municipio' => $municipio,
				'direccion' => $direccion,
				'status' => 1
			);
			
			$this->db->insert('anunciantes',$params);	
			
			return "ok";
	
	
	}
	
	public function cargar_categorias_completa( ){
		
		 
		
		$this->db->group_by('categorias.id');
		$this->db->order_by('categorias.nombre');
		$this->db->select('*'); 
		$this->db->select('categorias.id as id'); 
		$this->db->select('categorias.nombre as nombre'); 
		$this->db->from('categorias');
		$query = $this->db->get();

		return $query->result_array();	
	}
	
	public function cargar_categorias($categoria=NULL){
		
		if(!$categoria){
			
			$this->db->group_by('categorias.id');
			$this->db->order_by('categorias.nombre');
			$this->db->select('*'); 
			$this->db->select('categorias.id as id');
			$this->db->select("count(productos.id) as contador"); 
			$this->db->select('categorias.nombre as nombre'); 
			$this->db->from('categorias');
			$this->db->join('productos', 'categorias.id = productos.id_categoria');
			$this->db->join('productos_productores', 'productos_productores.id_producto = productos.id');
			$this->db->join('productores', 'productos_productores.id_productor = productores.id');
			$query = $this->db->get();
	
			return $query->result_array();	
		}else{
			
			$query = $this->db->get_where('categorias',  array('nombre' => $categoria));
		
			return $query-> row_array();
			
		}
	}
	
	public function cargar_productos_categoria($id_categoria)
	{ 
			$this->db->group_by('productos.id');
			$this->db->order_by('productos.rubro');
			$this->db->select('productos.*');   
			$this->db->select("count(productos_productores.id_producto) as contador"); 
			$this->db->from('productos');
			$this->db->where('productos.id_categoria',$id_categoria );
			$this->db->join('productos_productores', 'productos_productores.id_producto = productos.id');
			$this->db->join('productores', 'productos_productores.id_productor = productores.id','left');
			$query = $this->db->get();
	  
			return $query-> result_array();
		
		 
	}
	
	public function cargar_productos_nombre($producto)
	{ 
			$this->db->group_by('productos.id');
			$this->db->order_by('productos.rubro');
			$this->db->select('productos.*');    
			$this->db->from('productos'); 
			$this->db->where('productos.rubro',$producto );
			$query = $this->db->get();
	  
			return $query-> row_array();
		
		 
	}
	
	public function cargar_productores_producto($id_producto, $paginacion, $segmento)
	{ 
			$this->db->group_by('productores.id'); 
			$this->db->limit($paginacion, $segmento); 
			$this->db->select('productores.*');
			$this->db->select('productores.id as id');  
			$this->db->select('productores.nombre as nombre');            
			$this->db->select('estados.nombre as estado');    
			$this->db->select('municipios.nombre as municipio'); 
			$this->db->from('productos'); 
			$this->db->where('productos.id',$id_producto );
			$this->db->join('productos_productores', 'productos_productores.id_producto = productos.id');
			$this->db->join('productores', 'productos_productores.id_productor = productores.id_usuario');
			$this->db->join('estados', 'productores.id_estado = estados.id');
			$this->db->join('municipios', 'productores.id_municipio = municipios.id');
			$query = $this->db->get();
	  
			return $query-> result_array();
		
		 
	}
	
	public function contar_productores_producto($id_producto)
	{ 
			$this->db->group_by('productores.id');        
			$this->db->from('productores'); 
			$this->db->join('productos_productores', 'productos_productores.id_producto = '.$id_producto);
			
			return $this->db->count_all('productores');
		
		 
	}
	
	public function cargar_productores($id_usuario=NULL)
	{
		if($id_usuario){ 
		
			$this->db->limit(9);
			$this->db->order_by("productores.id", "random"); 
			$this->db->select('productores.*');                  
			$this->db->select('estados.nombre as estado');    
			$this->db->select('municipios.nombre as municipio'); 
			$this->db->from('productores'); 
			$this->db->where('productores.id_usuario',$id_usuario );
			$this->db->where('productores.status =', 1 );
			$this->db->join('estados', 'productores.id_estado = estados.id');
			$this->db->join('municipios', 'productores.id_municipio = municipios.id');
			$query = $this->db->get();
			return $query-> result_array();
		
		}else{
			
			$this->db->limit(9);
			$this->db->order_by("productores.id", "random");  
			$this->db->select('productores.*');         
			$this->db->select('estados.nombre as estado');    
			$this->db->select('municipios.nombre as municipio'); 
			$this->db->from('productores');  
			$this->db->where('productores.status =', 1 );
			$this->db->join('estados', 'productores.id_estado = estados.id');
			$this->db->join('municipios', 'productores.id_municipio = municipios.id');
			$query = $this->db->get();
		
			return $query->result_array();
			
		}
	}
	
	public function buscar_productores($municipio, $rubro ){
		   
		$this->db->select('productores.*');                  
		$this->db->select('estados.nombre as estado');    
		$this->db->select('municipios.nombre as municipio'); 
		$this->db->from('productores');  
		$this->db->where('productores.id_municipio', $municipio ); 
		$this->db->where('productos_productores.id_producto', $rubro ); 
		$this->db->join('estados', 'productores.id_estado = estados.id');
		$this->db->join('municipios', 'productores.id_municipio = municipios.id');
		$this->db->join('productos_productores', 'productos_productores.id_productor = productores.id_usuario');
		$query = $this->db->get();
		return $query-> result_array();
		
	}
	
	public function cargar_vp_mensajes($id_usuario )
	{
		 
		$this->db->order_by('id','desc');
		$query = $this->db->get_where('mensajes_productor',  array('id_usuario' => $id_usuario, 'status' => 0));
	
		return $query->result_array();
		
	 
	}
	
	public function contar_vp_mensajes($id_usuario)
	{  
	
		$this->db->where('status',0); 
		$this->db->where('id_usuario',$id_usuario); 
		$this->db->from('mensajes_productor');
		return $this->db->count_all_results(); 
	 
	}
	
	public function cargar_mensajes($id_usuario, $id_mensaje=NULL)
	{
		if($id_mensaje){
			
			$data = array(
               'status' => 1,
            );
	
			$this->db->where('id', $id_mensaje);
			$this->db->update('mensajes_productor', $data);
		
			$query = $this->db->get_where('mensajes_productor',  array('id_usuario' => $id_usuario , 'id' => $id_mensaje));
		
			return $query-> row_array();
		
		}else{
			
			$this->db->order_by('id','desc');
			$query = $this->db->get_where('mensajes_productor',  array('id_usuario' => $id_usuario));
		
			return $query->result_array();
			
		}
	}
	
	public function eliminar_mensaje($id)
	{
		return $this->db->delete('mensajes_productor', array('id' => $id)); 
		
	}
	
		
	
}
