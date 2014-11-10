<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Android extends CI_Controller {
	
	public function __construct(){
		parent::__construct();  
		 
	}

	public function login(){
		
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		
		if ( strlen($email) > 0 && strlen($password) > 0 ){
		 
			$this->load->model('android_model');
			$arr =$this->android_model->login($email , $password);
		 
			echo json_encode($arr);
			
		}
	}
	
	public function produccion(){
		
		$id = $this->input->post('id'); 
		 
		$this->load->model('android_model');
		$arr =$this->android_model->produccion($id);
	 
		echo json_encode($arr);
		 
	}
	
	public function detalle_produccion(){
		
		$id = $this->input->get('id'); 
		 
		$this->load->model('android_model');
		$arr =$this->android_model->detalle_produccion($id);
	 
		echo json_encode($arr);
		 
	}
	

	
}
