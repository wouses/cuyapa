<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productor_model extends CI_Model {
	
	public function __construct(){
		$this->load->database();
		parent::__construct();
		
	}
	
	public function insertar_productor($usuario, $clave, $nombre, $tipo_cedula_rif, $cedula_rif, $codigo_telefono, $telefono, $cantidad_terreno, $ubicacion, $lat, $long, $estado, $municipio, $parroquia, $sector, $direccion ,$imagen=NULL )
	{
		$this->db->where('usuario',$usuario);
		$query = $this->db->get('usuarios');
		
		if ( $query->num_rows() > 0 ){
			
			return "1";
		
		}else{
		
			$params = array(
				'usuario' => $usuario,
				'clave' => $clave,
				'tipo' => 1,
				'fecha' => time(),
				'status' => 0
			);
			
			$this->db->insert('usuarios',$params);	
			
			$id_usuario = mysql_insert_id();
			
			$this->db->where('tipo_cedula_rif',$tipo_cedula_rif);
			$this->db->where('cedula_rif',$cedula_rif);
			$query = $this->db->get('productores');
			
			if ( $query->num_rows() > 0 ){
				
				return "2";
			
			}else{
				 
				if($imagen){
					
				$params = array(
					'id_usuario' => $id_usuario,
					'nombre' => $nombre,
					'tipo_cedula_rif' => $tipo_cedula_rif,
					'cedula_rif' => $cedula_rif, 
					'telefono' => $codigo_telefono.'-'.$telefono,
					'cantidad_terreno' => $cantidad_terreno, 
					'ubicacion' => $ubicacion, 
					'ubicacion_lat' => $lat,
					'ubicacion_long' => $long,
					'id_estado' => $estado,
					'id_municipio' => $municipio,
					'id_parroquia' => $parroquia,
					'id_sector' => $sector, 
					'direccion' => $direccion,
					'tipo_productor' => 1,
					'imagen' => $imagen,
					'activo' => 0,
					'status' => 0
				);
				
				}else{
					
				$params = array(
					'id_usuario' => $id_usuario,
					'nombre' => $nombre,
					'tipo_cedula_rif' => $tipo_cedula_rif,
					'cedula_rif' => $cedula_rif, 
					'telefono' => $codigo_telefono.'-'.$telefono,
					'cantidad_terreno' => $cantidad_terreno, 
					'ubicacion' => $ubicacion, 
					'ubicacion_lat' => $lat,
					'ubicacion_long' => $long,
					'id_estado' => $estado,
					'id_municipio' => $municipio,
					'id_parroquia' => $parroquia,
					'id_sector' => $sector,
					'direccion' => $direccion,
					'tipo_productor' => 1,
					'activo' => 0,
					'status' => 0
				);	
					
				}
				
				
				$this->db->insert('productores',$params);	
				
				return "3";
			
			}
		
		
		}		
	
	}
	
	public function insertar_productor_coordinador($nombre, $tipo_cedula_rif, $cedula_rif, $codigo_telefono, $telefono, $cantidad_terreno, $ubicacion, $lat, $long, $estado, $municipio, $parroquia, $sector, $direccion )
	{
		  
		$this->db->where('tipo_cedula_rif',$tipo_cedula_rif);
		$this->db->where('cedula_rif',$cedula_rif);
		$query = $this->db->get('productores');
		
		if ( $query->num_rows() > 0 ){
			
			return "1";
		
		}else{
								
			$params = array( 
				'nombre' => $nombre,
				'tipo_cedula_rif' => $tipo_cedula_rif,
				'cedula_rif' => $cedula_rif, 
				'telefono' => $codigo_telefono.'-'.$telefono,
				'cantidad_terreno' => $cantidad_terreno, 
				'ubicacion' => $ubicacion, 
				'ubicacion_lat' => $lat,
				'ubicacion_long' => $long,
				'id_estado' => $estado,
				'id_municipio' => $municipio,
				'id_parroquia' => $parroquia,
				'id_sector' => $sector, 
				'direccion' => $direccion,
				'tipo_productor' => 1,
				'activo' => 1,
				'status' => 0
			);	 
			
			$this->db->insert('productores',$params);	
			
			return "2";
		
		} 		
	
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
			$this->db->join('estados', 'productores.id_estado = estados.id');
			$this->db->join('municipios', 'productores.id_municipio = municipios.id');
			$query = $this->db->get();
		
			return $query->result_array();
			
		}
	}
	
	
	public function solicitar_productor($tipo_cedula_rif, $cedula_rif)
	{
		if ($tipo_cedula_rif && $cedula_rif)
		{	
			$this->db->where('tipo_cedula_rif',$tipo_cedula_rif);
			$this->db->where('cedula_rif',$cedula_rif);
			$query = $this->db->get('productores');
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('productores');
		
		return $query->result_array();		
	}
	
	public function solicitar_productor_id($id)
	{
		
		$this->db->select('productores.*');
		$this->db->where('productores.id_usuario',$id);
		$this->db->select('usuarios.usuario as correo');
		$this->db->select('estados.nombre as estado');
		$this->db->select('municipios.nombre as municipio');
		$this->db->select('parroquias.nombre as parroquia');
		$this->db->select('sectores.nombre as sector'); 
		$this->db->from('productores');
		$this->db->join('usuarios', 'productores.id_usuario = usuarios.id'); 
		$this->db->join('estados', 'productores.id_estado = estados.id');
		$this->db->join('municipios', 'productores.id_municipio = municipios.id');
		$this->db->join('parroquias', 'productores.id_parroquia = parroquias.id');
		$this->db->join('sectores', 'productores.id_sector = sectores.id'); 
		$query = $this->db->get();
		
		return $query->row_array();

	}
	
	public function solicitar_productor_id_productor($id)
	{
		
		$this->db->select('productores.*');
		$this->db->where('productores.id',$id);
		$this->db->select('productores.id_usuario as id_usuario');
		$this->db->select('usuarios.usuario as correo');
		$this->db->select('estados.nombre as estado');
		$this->db->select('municipios.nombre as municipio');
		$this->db->from('productores');
		$this->db->join('usuarios', 'productores.id_usuario = usuarios.id','left'); 
		$this->db->join('estados', 'productores.id_estado = estados.id');
		$this->db->join('municipios', 'productores.id_municipio = municipios.id');
		$query = $this->db->get();
		
		return $query->row_array();

	}
	
	public function cargar_produccion($productor, $id=NULL)
	{
		if($id)
		{
		 
			$this->db->select('*');
			$this->db->select('producciones.nombre as nombre_produccion');
			$this->db->select('producciones.id as idproduccion');
			$this->db->select('usos.nombre as uso');
			$this->db->select('modalidades.nombre as modalidad');
			$this->db->select('categorias.nombre as categoria');
			$this->db->from('producciones');
			$this->db->where('id_productor',$productor);
			$this->db->where('producciones.id',$id);
			$this->db->where('producciones.status',0);
			$this->db->join('productos', 'productos.id = producciones.id_producto');
			$this->db->join('usos', 'usos.id = producciones.id_uso');
			$this->db->join('modalidades', 'modalidades.id = producciones.id_modalidad');
			$this->db->join('categorias', 'productos.id_categoria = categorias.id'); 
			$query = $this->db->get();

	
			return $query->row_array();
		
		}
		
		$this->db->group_by('producciones.id');
		$this->db->order_by("producciones.id", "desc");
		$this->db->select('*');
		$this->db->select('producciones.nombre as nombre_produccion');
		$this->db->select('producciones.id as idproduccion');
		$this->db->select('usos.nombre as uso');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->select('categorias.nombre as categoria');
		$this->db->from('producciones');
		$this->db->where('id_productor',$productor);
		$this->db->where('producciones.status',0);
		$this->db->join('productos', 'productos.id = producciones.id_producto');
		$this->db->join('usos', 'usos.id = producciones.id_uso');
		$this->db->join('modalidades', 'modalidades.id = producciones.id_modalidad');
		$this->db->join('categorias', 'productos.id_categoria = categorias.id'); 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function cargar_produccion_id_produccion($produccion)
	{
		 
		
		$this->db->group_by('producciones.id');
		$this->db->order_by("producciones.id", "desc");
		$this->db->select('*');
		$this->db->select('producciones.nombre as nombre_produccion');
		$this->db->select('producciones.id as idproduccion');
		$this->db->select('usos.nombre as uso');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->select('categorias.nombre as categoria');
		$this->db->from('producciones');
		$this->db->where('producciones.id',$produccion);
		$this->db->where('producciones.status',0);
		$this->db->join('productos', 'productos.id = producciones.id_producto');
		$this->db->join('usos', 'usos.id = producciones.id_uso');
		$this->db->join('modalidades', 'modalidades.id = producciones.id_modalidad');
		$this->db->join('categorias', 'productos.id_categoria = categorias.id'); 
		$query = $this->db->get();

		return $query->row_array();		
		
	}

	public function insertar_produccion($productor, $nombre, $id_producto, $id_modalidad, $id_uso)
	{
		$this->db->where('id_productor',$productor);
		$this->db->where('nombre',$nombre); 
		$this->db->where('id_producto',$id_producto);
		$this->db->where('id_modalidad',$id_modalidad);
		$this->db->where('id_uso',$id_uso);
		$query = $this->db->get('producciones');
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'nombre' => $nombre,
			'id_productor' => $productor,
			'id_producto' => $id_producto,
			'id_modalidad' => $id_modalidad,
			'id_uso' => $id_uso,
			'fecha' => time(),
			'status' => 0
		);
		
		return $this->db->insert('producciones',$params);	
	}
	
	public function cargar_siembras($id=NULL)
	{
		if ($id)
		{	
			
			$query = $this->db->get_where('producciones_siembras', array('id_produccion' => $id));
			
			return $query->result_array();
		
		}
		
		$query = $this->db->get_where('producciones_siembras');
		
		return $query->result_array();				
		
	}
	
	public function cargar_siembras_id_siembra($id=NULL)
	{ 	
		
		$query = $this->db->get_where('producciones_siembras', array('id' => $id));
		
		return $query->row_array();
				
		
	}
	
	public function insertar_siembra($id_produccion, $cantidad_terreno , $tipo_financiamiento)
	{
		
		$params = array(
			'id_produccion' => $id_produccion,
			'cantidad_terreno' => $cantidad_terreno,
			'tipo_financiamiento' => $tipo_financiamiento,
			'fecha' => time(),
			'status' => 0
		);
		
		return $this->db->insert('producciones_siembras',$params);	
	}
	
	
	public function cargar_cosechas($id=NULL)
	{
		if ($id)
		{	
			
			$this->db->group_by('producciones_cosechas.id');
			$this->db->select('*');
			$this->db->select('calidad_cosechas.cantidad as cantidad');
			$this->db->select('producciones_cosechas.id as id');
			$this->db->from('producciones_cosechas');
			$this->db->where('id_produccion',$id);
			$this->db->join('calidad_cosechas', 'producciones_cosechas.id = calidad_cosechas.id_produccion_cosecha');
			$query = $this->db->get();
			
			return $query->result_array();
		
		}
		
		$query = $this->db->get_where('producciones_cosechas');
		
		return $query->result_array();				
		
	}
	
	public function cargar_cosechas_id_cosecha($id)
	{
	 
		$this->db->group_by('producciones_cosechas.id');
		$this->db->select('*');
		$this->db->select('calidad_cosechas.cantidad as cantidad');
		$this->db->select('producciones_cosechas.id as id');
		$this->db->from('producciones_cosechas');
		$this->db->where('producciones_cosechas.id',$id);
		$this->db->join('calidad_cosechas', 'producciones_cosechas.id = calidad_cosechas.id_produccion_cosecha');
		$query = $this->db->get();
		
		return $query->row_array();
				
		
	}
	
	public function seleccionar_calidad_cosecha($id_produccion, $id=NULL){
		
		if ($id)
		{	
			
			$query = $this->db->get_where('calidad_cosechas', array('id' => $id, 'id_produccion_cosecha' => $id_produccion));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('calidad_cosechas', array('id_produccion_cosecha' => $id_produccion));
		
		return $query->result_array();	
		
	}
	
	public function insertar_cosecha($id_produccion, $id_random, $cantidad_terreno){
		
		$params = array(
			'id_produccion' => $id_produccion,
			'cantidad_terreno' => $cantidad_terreno,
			'fecha' => time(),
			'status' => 0
		);
	
		$this->db->insert('producciones_cosechas',$params);
		
		$id_produccion_cosecha = mysql_insert_id();
		
		$query = $this->db->get_where('calidad_cosechas_temp', array('id_random' => $id_random, 'id_produccion' => $id_produccion)); 
		
		foreach ($query->result_array() as $row)
		{
		   $params = array(
				'id_produccion_cosecha' => $id_produccion_cosecha,
				'cantidad' => $row['cantidad'],
				'calidad' => $row['calidad'],
				'status' => 0
			);
		
		 	$this->db->insert('calidad_cosechas',$params);
			
			$consulta_produccion = $this->db->get_where('producciones', array('id' => $id_produccion));
			 
			foreach ($consulta_produccion->result_array() as $prod){
				
				$consulta_inventario = $this->db->get_where('inventario', array('id_productor' => $prod['id_productor'],  'id_producto' => $prod['id_producto'], 'id_modalidad' => $prod['id_modalidad'], 'id_uso' => $prod['id_uso'], 'calidad' => $row['calidad']));
				$num_inv = $consulta_inventario->num_rows();
				
				if($num_inv){
					
					foreach ($consulta_inventario->result_array() as $inventario){
					
						$nueva_cantidad = $row['cantidad'] + $inventario['cantidad'];
						
						$params2 = array( 
							'cantidad' => $nueva_cantidad 
						);
					
						$this->db->where('id', $inventario['id']);
						$this->db->update('inventario',$params2);
					
					}
					
				}else{
				
					$params2 = array(
						'id_productor' => $prod['id_productor'],
						'id_producto' => $prod['id_producto'],
						'id_modalidad' => $prod['id_modalidad'],
						'id_uso' => $prod['id_uso'],
						'cantidad' => $row['cantidad'],
						'calidad' => $row['calidad'],
						'status' => 0
					);
				
					$this->db->insert('inventario',$params2);	
							
				} 
				
			}
			
		}
		
		return;
		
		
		
	}
	
	public function cargar_inventario($productor)
	{
		$this->db->group_by('inventario.id_producto, inventario.id_modalidad, inventario.id_uso');
		$this->db->select('*');
		$this->db->from('inventario'); 
		$this->db->select('productos.id as id_producto');
		$this->db->select('usos.id as id_uso');
		$this->db->select('usos.nombre as uso');
		$this->db->select('modalidades.id as id_modalidad');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->where('id_productor',$productor); 
		$this->db->join('productos', 'productos.id = inventario.id_producto');
		$this->db->join('usos', 'usos.id = inventario.id_uso');
		$this->db->join('modalidades', 'modalidades.id = inventario.id_modalidad');
		$this->db->select_sum('inventario.cantidad');
		 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	
	public function editar_perfil_general($id_productor, $nombre, $tipo_cedula_rif, $cedula_rif, $descripcion, $telefono, $direccion, $ruta_logo=NULL, $ruta_portada=NULL )
	{
		if(($ruta_logo) && ($ruta_portada)){
			$params = array(
				'nombre' => $nombre,
				'tipo_cedula_rif' => $tipo_cedula_rif,
				'cedula_rif' => $cedula_rif,
				'descripcion' => $descripcion,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'imagen' => $ruta_logo,
				'imagen_portada' => $ruta_portada,
				'status' => 1
			);
			
			$this->db->where('id_usuario', $id_productor);
			return $this->db->update('productores', $params); 
			
		}else if($ruta_logo){
			
			$params = array(
				'nombre' => $nombre,
				'tipo_cedula_rif' => $tipo_cedula_rif,
				'cedula_rif' => $cedula_rif,
				'descripcion' => $descripcion,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'imagen' => $ruta_logo,
				'status' => 1
			);
			
			$this->db->where('id_usuario', $id_productor);
			return $this->db->update('productores', $params); 
			
		}else if($ruta_portada){
			
			$params = array(
				'nombre' => $nombre,
				'tipo_cedula_rif' => $tipo_cedula_rif,
				'cedula_rif' => $cedula_rif,
				'descripcion' => $descripcion,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'imagen_portada' => $ruta_portada,
				'status' => 1
			);
			
			$this->db->where('id_usuario', $id_productor);
			return $this->db->update('productores', $params); 
			
		}else{
			
			$params = array(
				'nombre' => $nombre,
				'tipo_cedula_rif' => $tipo_cedula_rif,
				'cedula_rif' => $cedula_rif,
				'descripcion' => $descripcion,
				'telefono' => $telefono,
				'direccion' => $direccion,
				'status' => 1
			);
			
			$this->db->where('id_usuario', $id_productor);
			return $this->db->update('productores', $params); 
			
		}
		
	}
	
	public function cargar_productos_productores($productor)
	{
		
		$this->db->select('*');
		$this->db->order_by('categorias.nombre');
		$this->db->select('productos_productores.id as id');
		$this->db->select('productos.rubro as rubro');
		$this->db->select('categorias.nombre as categoria');
		$this->db->from('productos_productores');
		$this->db->where('id_productor',$productor);
		$this->db->join('productos','productos.id = productos_productores.id_producto');
		$this->db->join('categorias','categorias.id = productos.id_categoria');
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function insertar_producto_productor($id_producto, $id_productor)
	{
		$query = $this->db->get_where('productos_productores', array('id_producto' => $id_producto , 'id_productor' => $id_productor) );
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array(
			'id_producto' => $id_producto,
			'id_productor' => $id_productor,
			'status' => 0
		);
	
		$this->db->insert('productos_productores',$params);
		
		return true;
		
	}
	
	public function eliminar_producto_productor($id)
	{
		return $this->db->delete('productos_productores', array('id' => $id)); 
		
	}
	
	public function modificar_ubicacion($estado, $municipio, $parroquia, $sector, $cantidad_terreno, $ubicacion, $lat, $long, $id)
	{
		$data = array(
               'id_estado' => $estado, 
               'id_municipio' => $municipio, 
               'id_parroquia' => $parroquia, 
               'id_sector' => $sector, 
               'cantidad_terreno' => $cantidad_terreno, 
               'ubicacion' => $ubicacion,
               'ubicacion_lat' => $lat,
               'ubicacion_long' => $long
            );

		$this->db->where('id_usuario', $id);
		$this->db->update('productores', $data);
		
		return "ok";
		
	}
	
	public function insertar_redes_sociales_productor($facebook, $twitter, $google, $id_productor)
	{
		$this->db->delete('redes_sociales_productores', array('id_productor' => $id_productor)); 
		
		
		$params = array(
			'id_productor' => $id_productor,
			'red_social' => 1,
			'url' => $facebook,
			'status' => 0
		);
	
		$this->db->insert('redes_sociales_productores',$params);
		
		$params = array(
			'id_productor' => $id_productor,
			'red_social' => 2,
			'url' => $twitter,
			'status' => 0
		);
	
		$this->db->insert('redes_sociales_productores',$params);
		
		$params = array(
			'id_productor' => $id_productor,
			'red_social' => 3,
			'url' => $google,
			'status' => 0
		);
	
		$this->db->insert('redes_sociales_productores',$params);
		
		return true;
		
	}
	
	public function cargar_redes_sociales_productor($id_productor)
	{
		
		$this->db->select('*'); 
		$this->db->from('redes_sociales_productores');
		$this->db->where('id_productor',$id_productor);
		$query = $this->db->get(); 
		
		foreach($query -> result_array() as $row) {
			
			switch($row['red_social']){
				case '1' : $red_social['facebook'] = $row['url']; break;
				case '2' : $red_social['twitter'] = $row['url']; break;	
				case '3' : $red_social['google'] = $row['url']; break;		
			}
			 
		}
		
		if(isset($red_social)){
				
		return $red_social;	
		}
		
	}
	
	public function cargar_contactos($id=NULL)
	{
		if ($id)
		{	
			
			$this->db->select('anunciantes.*');
			$this->db->select('estados.nombre as estado');
			$this->db->select('municipios.nombre as municipio');
			$this->db->select('categorias.nombre as categoria');
			$this->db->select('productos.rubro as nombre');
			$this->db->from('anunciantes');
			$this->db->where('anunciantes.id',$id);
			$this->db->join('estados','estados.id = anunciantes.id_estado');
			$this->db->join('municipios','municipios.id = anunciantes.id_municipio');
			$this->db->join('categorias','categorias.id = anunciantes.id_categoria','left');
			$this->db->join('productos','productos.id = anunciantes.id_producto','left');
			$query = $this->db->get(); 
			
			return $query->row_array();
		
		}
		
		$this->db->select('anunciantes.*');
		$this->db->select('estados.nombre as estado');
		$this->db->select('municipios.nombre as municipio');
		$this->db->select('categorias.nombre as categoria'); 
		$this->db->from('anunciantes'); 
		$this->db->join('estados','estados.id = anunciantes.id_estado');
		$this->db->join('municipios','municipios.id = anunciantes.id_municipio');
		$this->db->join('categorias','categorias.id = anunciantes.id_categoria','left');
		$this->db->join('productos','productos.id = anunciantes.id_producto','left');
		$query = $this->db->get(); 
		
		return $query->result_array();				
		
	}
	
	public function especificar_ubicacion($ubicacion, $lat, $lon, $id)
	{ 
		$data = array(
               'ubicacion' => $ubicacion,
			   'ubicacion_lat' => $lat,
			   'ubicacion_long' => $lon,
            );

		$this->db->where('id_usuario', $id);
		$this->db->update('productores', $data);
		
		return "ok"; 
	}
	
	public function cargar_clientes($id_productor, $id=NULL)
	{
		if ($id)
		{	
			
			$query = $this->db->get_where('clientes_distribucion', array('id' => $id , 'id_productor' => $id_productor));
			
			return $query->row_array();
		
		}
		
		$query = $this->db->get_where('clientes_distribucion', array('id_productor' => $id_productor));
		
		return $query->result_array();				
		
	}
	
	public function insertar_cliente_distribucion($id_productor, $nombre, $tipo_cedula_rif, $cedula_rif, $direccion)
	{
		$query = $this->db->get_where('clientes_distribucion', array('tipo_cedula_rif' => $tipo_cedula_rif , 'cedula_rif' => $cedula_rif) );
		
		if ( $query->num_rows() > 0 ){
			return false;
		}
		
		$params = array( 
			'id_productor' => $id_productor,
			'tipo_cedula_rif' => $tipo_cedula_rif,
			'cedula_rif' => $cedula_rif, 
			'nombre' => $nombre,
			'direccion' => $direccion,
			'status' => 0
		);
	
		$this->db->insert('clientes_distribucion',$params);
		
		return true;
		
	}
	
	
	public function editar_cliente($id, $tipo_cedula_rif, $cedula_rif, $nombre, $direccion)
	{
		$data = array(
               'tipo_cedula_rif' => $tipo_cedula_rif,
               'cedula_rif' => $cedula_rif,
               'nombre' => $nombre,
               'direccion' => $direccion
            );

		$this->db->where('id', $id);
		$this->db->update('clientes_distribucion', $data);
		
		return "ok";
		
	}
	
	public function cargar_distribucion($id_productor, $id=NULL)
	{
		if ($id)
		{	
			
			$this->db->select('distribuciones.*');
			$this->db->select('clientes_distribucion.*');
			$this->db->select('distribuciones.id as id_distribucion'); 
			$this->db->from('distribuciones');
			$this->db->where('distribuciones.id',$id);
			$this->db->join('clientes_distribucion','clientes_distribucion.id = distribuciones.id_cliente_distribucion'); 
			$query = $this->db->get(); 
			
			return $query->row_array();
		
		}
		
		$this->db->select('distribuciones.*'); 
		$this->db->select('distribuciones.id  as id_distribucion'); 
		$this->db->select('clientes_distribucion.*'); 
		$this->db->from('distribuciones'); 
		$this->db->where('distribuciones.id_productor', $id_productor);
		$this->db->join('clientes_distribucion','clientes_distribucion.id = distribuciones.id_cliente_distribucion'); 
		$query = $this->db->get();  
		
		return $query->result_array();				
		
	}
	
	public function cargar_productos_distribucion($distribucion)
	{
		$this->db->group_by('productos_distribucion.id_producto, productos_distribucion.id_modalidad, productos_distribucion.id_uso');
		$this->db->select('*');
		$this->db->from('productos_distribucion'); 
		$this->db->select('productos_distribucion.id as id');
		$this->db->select('productos_distribucion.cantidad as cantidad');
		$this->db->select('productos_distribucion.calidad as calidad');
		$this->db->select('productos.id as id_producto');
		$this->db->select('usos.id as id_uso');
		$this->db->select('usos.nombre as uso');
		$this->db->select('modalidades.id as id_modalidad');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->where('id_distribucion',$distribucion); 
		$this->db->join('productos', 'productos.id = productos_distribucion.id_producto');
		$this->db->join('usos', 'usos.id = productos_distribucion.id_uso');
		$this->db->join('modalidades', 'modalidades.id = productos_distribucion.id_modalidad'); 
		 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function cargar_inventario_distribucion($productor)
	{
		$this->db->group_by('inventario.id_producto, inventario.id_modalidad, inventario.id_uso, inventario.calidad');
		$this->db->select('*');
		$this->db->from('inventario'); 
		$this->db->select('inventario.id as id');
		$this->db->select('productos.id as id_producto');
		$this->db->select('usos.id as id_uso');
		$this->db->select('usos.nombre as uso');
		$this->db->select('modalidades.id as id_modalidad');
		$this->db->select('modalidades.nombre as modalidad');
		$this->db->where('id_productor',$productor); 
		$this->db->join('productos', 'productos.id = inventario.id_producto');
		$this->db->join('usos', 'usos.id = inventario.id_uso');
		$this->db->join('modalidades', 'modalidades.id = inventario.id_modalidad');
		$this->db->select_sum('inventario.cantidad');
		 
		$query = $this->db->get();

		return $query->result_array();		
		
	}
	
	public function insertar_distribucion($id_productor, $cliente, $distribucion, $cant)
	{
		$params = array( 
			'id_productor' => $id_productor,
			'id_cliente_distribucion' => $cliente,
			'fecha' => time(),
			'status' => 0
		);
	
		$this->db->insert('distribuciones',$params);
		
		$id = mysql_insert_id();
		
		$dist_dato = explode(',',$distribucion);
		
		$j=0;
		for($i=0 ; $i<$cant ; $i++){
			
		$this->db->select('*'); 
		$this->db->from('inventario');
		$this->db->where('id',$dist_dato[$j]);
		$query = $this->db->get(); 
		
		foreach($query -> result_array() as $row) {
			
			if(strcmp($dist_dato[$j+2], 'ton')==0){
				$cant_pro = $dist_dato[$j+1]*1000;
			}else{
				$cant_pro = $dist_dato[$j+1];
			}
			
			$params = array(
				'id_distribucion' => $id,
				'id_producto' => $row['id_producto'],
				'id_modalidad' => $row['id_modalidad'],
				'id_uso' => $row['id_uso'],
				'cantidad' => $cant_pro,
				'calidad' => $row['calidad'],
				'status' => 0
			);
			
			$this->db->insert('productos_distribucion',$params);
			
			$nueva_cantidad = $row['cantidad'] - $cant_pro;
						
			$params2 = array( 
				'cantidad' => $nueva_cantidad 
			);
		
			$this->db->where('id', $dist_dato[$j]);
			$this->db->update('inventario',$params2);
			 
		} 
			
			$j=$j+3;
		}
		
		
		return true;
		
	}
	

	
	
	
}
