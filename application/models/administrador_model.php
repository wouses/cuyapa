<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrador_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		
	}
	
	public function cargar_guias($id=NULL)
	{
		if ($id)
		{	
			$query = $this->db->get_where('guias', array('id' => $id));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('guias');
		
		return $query->result_array();		
	}
	
	public function insertar_guia($nombre, $id_producto, $tipo, $fecha, $archivo)
	{
		$this->db->where('nombre',$nombre); 
		$this->db->where('id_producto',$id_producto); 
		$this->db->where('tipo',$tipo);
		$this->db->where('ruta',$archivo); 
		$query = $this->db->get('guias');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'nombre' => $nombre,
			'id_producto' => $id_producto,
			'tipo' => $tipo,
			'fecha' => $fecha,
			'ruta' => $archivo,
			'status' => 0
		);
		
		return $this->db->insert('guias',$params);	
	}
	
	public function editar_guia($id , $nombre, $id_producto, $tipo, $archivo = NULL)
	{
		if($archivo){
					
			$params = array(
				'nombre' => $nombre,
				'id_producto' => $id_producto,
				'tipo' => $tipo,
				'archivo' => $archivo
			);
			
		}else{
			
			$params = array(
				'nombre' => $nombre,
				'id_producto' => $id_producto,
				'tipo' => $tipo
			);	
							
		}
		
		$this->db->where('id', $id);
		$this->db->update('guias', $params); 
		
	}
	
	public function eliminar_guia($id)
	{
		return $this->db->delete('guias', array('id' => $id)); 
		
	}
	
	public function cargar_categorias($id=NULL)
	{
		if ($id)
		{	
			$query = $this->db->get_where('categorias', array('id' => $id));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('categorias');
		
		return $query->result_array();		
	}
	
	public function insertar_categoria($nombre)
	{
		$this->db->where('nombre',$nombre); 
		$query = $this->db->get('categorias');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'nombre' => $nombre,
			'status' => 0
		);
		
		return $this->db->insert('categorias',$params);	
	}
	
	public function eliminar_categoria($id)
	{
		return $this->db->delete('categorias', array('id' => $id)); 
		
	}
	
	public function editar_categoria($id, $nombre)
	{
		$data = array(
               'nombre' => $nombre
            );

		$this->db->where('id', $id);
		$this->db->update('categorias', $data);
		
		return "ok";
		
	}
	
	public function cargar_rubros_categoria($id)
	{
		
		$this->db->select('*');
		$this->db->select('productos.id as idproducto');
		$this->db->select('productos.rubro as rubro');
		$this->db->select('categorias.nombre as categoria');
		$this->db->select('categorias.id as id_categoria');
		$this->db->from('productos');
		$this->db->where('productos.id_categoria',$id);
		$this->db->join('categorias', 'categorias.id = productos.id_categoria');
		
		$query = $this->db->get();

		return $query->result_array();	
	
	}
	
	public function cargar_rubros($id=NULL)
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
		$this->db->join('categorias', 'categorias.id = productos.id_categoria');
		$this->db->join('modalidad_uso_productos', 'modalidad_uso_productos.id_producto = productos.id');
		$this->db->join('modalidades', 'modalidad_uso_productos.id_modalidad = modalidades.id');
		$this->db->join('usos', 'modalidad_uso_productos.id_uso = usos.id');
		$query = $this->db->get();

		return $query->result_array();		
	}
	
	public function insertar_rubro($nombre, $id_categoria, $id_random, $imagen=NULL)
	{
		if($imagen){
			
			$this->db->where('rubro',$nombre); 
			$this->db->where('id_categoria',$id_categoria); 
			$query = $this->db->get('productos');
			
			if ( $query->num_rows() > 0 ){
				return false;
			}
			
			$params = array(
				'rubro' => $nombre,
				'id_categoria' => $id_categoria, 
				'imagen' => $imagen,
				'status' => 0
			);
			
			$this->db->insert('productos',$params);	
			
		}else{
			
			$this->db->where('rubro',$nombre); 
			$this->db->where('id_categoria',$id_categoria); 
			$query = $this->db->get('productos');
			
			if ( $query->num_rows() > 0 ){
				return false;
			}
			
			$params = array(
				'rubro' => $nombre,
				'id_categoria' => $id_categoria,  
				'status' => 0
			);
			
			$this->db->insert('productos',$params);	
			
		}
		
		$id_producto = mysql_insert_id();
				
		$this->db->where('id_random',$id_random);
		$query = $this->db->get('modalidad_uso_temp');
		$query -> result_array();

		foreach($query -> result_array() as $row) {
			
			$params = array(
				'id_producto' => $id_producto,
				'id_modalidad' => $row['id_modalidad'],
				'id_uso' => $row['id_uso'],
				'status' => 0
			);
			
			$this->db->insert('modalidad_uso_productos',$params);	
		}

		$this->db->empty_table('modalidad_uso_temp');
		
		return true;
	}
	
	
	public function eliminar_rubro($id)
	{
		$this->db->delete('usos_productos', array('id_producto' => $id)); 
		
		$this->db->delete('modalidades_productos', array('id_producto' => $id)); 
		
		return $this->db->delete('productos', array('id' => $id)); 
		
	}
	
	public function editar_rubro($id , $nombre, $id_categoria, $id_uso, $id_modalidad, $rendimiento, $imagen = NULL)
	{
		if($imagen){
					
			$params = array(
				'rubro' => $nombre,
				'id_categoria' => $id_categoria,
				'rendimiento' => $rendimiento,
				'imagen' => $imagen
			);
			
		}else{
			
			$params = array(
				'rubro' => $nombre,
				'id_categoria' => $id_categoria,
				'rendimiento' => $rendimiento
			);	
							
		}
		
		$this->db->where('id', $id);
		$this->db->update('productos', $params); 
		
	}
	
	public function contar_modalidad_uso_temp($id_random)
	{
	
		$query = $this->db->get_where('modalidad_uso_temp', array('id_random' => $id_random));
					
		return $query->num_rows();	
	}
	
	public function cargar_modalidad_uso_temp($id_random)
	{
		
		$query = $this->db->get_where('modalidad_uso_temp');
		
		return $query->result_array();		
	}
	
	public function cargar_usos($id=NULL)
	{
		if ($id)
		{	
			$query = $this->db->get_where('usos', array('id' => $id));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('usos');
		
		return $query->result_array();		
	}
	
	public function cargar_usos_modalidad($id_modalidad , $id_producto)
	{
		$this->db->select('*');
		$this->db->select('usos.nombre as uso');
		$this->db->select('usos.id as id_uso');
		$this->db->from('modalidad_uso_productos');
		$this->db->where('modalidad_uso_productos.id_producto',$id_producto);
		$this->db->where('modalidad_uso_productos.id_modalidad',$id_modalidad);
		$this->db->join('usos', 'modalidad_uso_productos.id_uso = usos.id');
		
		$query = $this->db->get();

		return $query->result_array();		
	}

	public function insertar_usos($nombre)
	{
		$this->db->where('nombre',$nombre); 
		$query = $this->db->get('usos');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'nombre' => $nombre,
			'status' => 1
		);
		
		return $this->db->insert('usos',$params);	
	}

	public function editar_uso($id, $nombre)
	{
		$data = array(
               'nombre' => $nombre
            );

		$this->db->where('id', $id);
		$this->db->update('usos', $data);
		
		return "ok";
		
	}

	public function eliminar_uso($id)
	{
		return $this->db->delete('usos', array('id' => $id)); 
		
	}
	
	public function cargar_modalidades($id=NULL)
	{
		if ($id)
		{	
			$query = $this->db->get_where('modalidades', array('id' => $id));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('modalidades');
		
		return $query->result_array();		
	}
	
	public function cargar_modalidades_producto($id_producto)
	{
		$this->db->select('*');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->select('modalidades.id as id_modalidad');
		$this->db->from('modalidad_uso_productos');
		$this->db->where('modalidad_uso_productos.id_producto',$id_producto);
		$this->db->join('modalidades', 'modalidad_uso_productos.id_modalidad = modalidades.id');
		
		$query = $this->db->get();

		return $query->result_array();		
	}
	
	public function insertar_modalidades($nombre)
	{
		$this->db->where('nombre',$nombre); 
		$query = $this->db->get('modalidades');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'nombre' => $nombre,
			'status' => 1
		);
		
		return $this->db->insert('modalidades',$params);	
	}

	public function editar_modalidades($id, $nombre)
	{
		$data = array(
               'nombre' => $nombre
            );

		$this->db->where('id', $id);
		$this->db->update('modalidades', $data);
		
		return "ok";
		
	}

	public function eliminar_modalidad($id)
	{
		return $this->db->delete('modalidades', array('id' => $id)); 
		
	}
	
	public function probabilidad_exito($id=NULL)
	{
		if ($id)
		{	
			$this->db->select('*');
			$this->db->select('probabilidades_exito.id as idprobabilidad');
			$this->db->select('productos.id as idproducto');
			$this->db->select('productos.rubro as rubro');
			$this->db->select('estados.nombre as estado');
			$this->db->select('municipios.nombre as municipio');
			$this->db->from('probabilidades_exito');
			$this->db->where('probabilidades_exito.id',$id);
			$this->db->join('productos', 'productos.id = probabilidades_exito.id_producto');
			$this->db->join('estados', 'estados.id = probabilidades_exito.id_estado');
			$this->db->join('municipios', 'municipios.id = probabilidades_exito.id_municipio');
			$query = $this->db->get();
			
			return $query->row_array();
		
		}
		
		$this->db->select('*');
		$this->db->select('probabilidades_exito.id as idprobabilidad');
		$this->db->select('productos.id as idproducto');
		$this->db->select('productos.rubro as rubro');
		$this->db->select('estados.nombre as estado');
		$this->db->select('municipios.nombre as municipio');
		$this->db->from('probabilidades_exito');
		$this->db->join('productos', 'productos.id = probabilidades_exito.id_producto');
		$this->db->join('estados', 'estados.id = probabilidades_exito.id_estado');
		$this->db->join('municipios', 'municipios.id = probabilidades_exito.id_municipio');
		$query = $this->db->get();
		
		return $query->result_array();		
	}
	
	public function insertar_probabilidad_exito($id_estado, $id_municipio, $fecha_inicio, $fecha_final, $id_producto)
	{
		$this->db->where('id_estado',$id_estado); 
		$this->db->where('id_municipio',$id_municipio); 
		$this->db->where('fecha_inicio',$fecha_inicio);
		$this->db->where('fecha_final',$fecha_final); 
		$this->db->where('id_producto',$id_producto); 
		$query = $this->db->get('probabilidades_exito');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'id_estado' => $id_estado,
			'id_municipio' => $id_municipio,
			'fecha_inicio' => $fecha_inicio,
			'fecha_final' => $fecha_final,
			'id_producto' => $id_producto,
			'status' => 0
		);
		
		return $this->db->insert('probabilidades_exito',$params);	
	}
	
	public function editar_probabilidad_exito($id, $id_estado, $id_municipio, $fecha_inicio, $fecha_final, $id_producto)
	{
		$params = array(
			'id_estado' => $id_estado,
			'id_municipio' => $id_municipio,
			'fecha_inicio' => $fecha_inicio,
			'fecha_final' => $fecha_final,
			'id_producto' => $id_producto
		);

		$this->db->where('id', $id);
		$this->db->update('probabilidades_exito', $params);
		
		return "ok";
		
	}
	
	public function eliminar_probabilidad_exito($id)
	{
		return $this->db->delete('probabilidades_exito', array('id' => $id)); 
		
	}

	public function cargar_municipios_graficos() {

		$this->db->group_by('idMunicipios');
		$this->db->select('municipios.id as idMunicipios');
		$this->db->select('municipios.nombre as nombreMunicipios');
		//$this->db->select('productores.id_municipio as idProductorMunicipio');
		$this->db->from('municipios');
		$this->db->join('productores', 'productores.id_municipio = municipios.id');
		$query = $this->db->get();
		$query -> result_array();

		foreach($query -> result_array() as $row) {
			//$valor = count($row);
			//echo $valor;
			$this->db->select('id');
			$this->db->from('productores');
			$this->db->where('id_municipio',$row['idMunicipios']);
			$hola[] = "['".$row['nombreMunicipios']."','".$this->db->count_all_results()."']";
			//echo "-".$row['nombreMunicipios'];
			//echo $row['idMunicipios']."-"; 
		}

		return $hola;
	}
	
	public function cargar_comentarios($id=NULL)
	{
		if($id){
			
			$data = array(
               'status' => 1,
            );
	
			$this->db->where('id', $id);
			$this->db->update('comentarios', $data);
		
			$query = $this->db->get_where('comentarios',  array('id' => $id));
		
			return $query-> row_array();
		
		}else{
			
			$this->db->order_by('id','desc');
			$query = $this->db->get_where('comentarios');
		
			return $query->result_array();
			
		}
	}
	
	public function eliminar_comentario($id)
	{
		return $this->db->delete('comentarios', array('id' => $id)); 
		
	}
	
	
	public function restaurar_bd($string){
	
		$query_list = explode(";", $string);
	 		
		$num = count($query_list);
		$i=0;
		foreach($query_list as $query){ 
		
			if($i==$num-1){
				return;	
			}
			
			$this->db->query($query);  			
			$i++;
		} 
	}
}
