<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportar extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
	}

	public function inventario($type , $id){
		
		$data['id']=$id;
		$data['fecha']= date("d/m/Y");
			
		if(strcmp ( $type , 'pdf' )==0){		
			$data['var']='';
			$data['html']='';
			$data['ruta']='';
			$this->load->view('templates/exportar/inventario/pdf', $data);
			
		}else{
		
			$this->load->view('templates/exportar/inventario/excel', $data);
		}
	}
	
	public function produccion($type , $id, $produccion){
		
		$data['id']=$id;
		$data['idproduccion']=$produccion;
		$data['fecha']= date("d/m/Y");
			
		if(strcmp ( $type , 'pdf' )==0){		
			$data['var']='';
			$data['html']='';
			$data['ruta']='';
			$this->load->view('templates/exportar/produccion/pdf', $data);
			
		}else{
		
			$this->load->view('templates/exportar/produccion/excel', $data);
		}
	}
	
	
}