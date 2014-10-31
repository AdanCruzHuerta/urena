<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admon extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('personas_model');
		$this->load->model('localidad_model');
		$this->load->model('proveedor_model');
	}
	public function index(){
		$this->load->view('admon/login');
	}
	public function verifica_usuario(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$admin = $this->admin_model->valida($email,$password);
			if(is_object($admin)){
				echo json_encode(true);
			} else{
				echo json_encode(false);
			}
		}
	}
	public function login(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//$password = md5(sha1($this->input->post('password')));
			$admin = $this->admin_model->valida($email,$password);
			if(is_object($admin)){
				$this->session->set_userdata('email',$admin->email);
				$this->session->set_userdata('nombre',$admin->nombre);
				$this->session->set_userdata('apellido_p',$admin->apellido_p);
				$this->session->set_userdata('apellido_m',$admin->apellido_m);
				$this->session->set_userdata('rol_id', $admin->roles_id);
				redirect('admon/inicio');
			}else{
				$this->session->sess_destroy();
				redirect('admon');
			}
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admon');
	}
	public function inicio(){
		if($this->session->userdata('nombre') && $this->session->userdata('email')){
			$data = array('contenido'=>'admon/inicio');
			$this->load->view('admon/template',$data);
		}else{
			$this->session->sess_destroy();
			redirect('admon');
		}
	}
	public function clientes(){
		if($this->session->userdata('nombre')){
			$clientes = $this->personas_model->get_clientes();
			$data = array('contenido'=>'admon/clientes',
							'clientes'=>$clientes);
			$this->load->view('admon/template',$data);
		} else{
			redirect('admon');
		}
	}
	public function alta_proveedor(){
		if($this->session->userdata('nombre')){
			$estados = $this->localidad_model->estados();
			$data = array('contenido'=>'admon/proveedor_alta','estados'=>$estados);
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	public function municipios(){
		if ($this->input->post()) {
			$municipios = $this->localidad_model->municipios($this->input->post('estado'));
			echo json_encode($municipios);
		}
	}
	public function registra_proveedor(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$proveedor = $this->input->post('proveedor');
				$municipio = $this->input->post('municipio');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$fecha_inicio =  date("Y-m-d");
				$this->proveedor_model->registra_proveedor($proveedor,$municipio,$direccion,$telefono,$email,$responsable,$fecha_inicio);
				echo json_encode(array("resp"=>true,"mensaje"=>"El proveedor se registro correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al registrar a proveedor"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function proveedores(){
		if($this->session->userdata('nombre')){
			$proveedores = $this->proveedor_model->proveedores();
			$data = array('contenido'=>'admon/proveedores','proveedores'=>$proveedores);
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	public function proveedor(){
		if($this->session->userdata('nombre')){
			if ($this->input->post()) {
				$estados = $this->localidad_model->estados();
				$proveedor = $this->proveedor_model->proveedor($this->input->post('id'));
				$data = array('contenido'=>'admon/proveedor','proveedor'=>$proveedor,'estados'=>$estados);
				$this->load->view('admon/template',$data);
			}else{
				redirect('admon/proveedores');
			}
		}else{
			redirect('admon');
		}
	}
	public function actualiza_proveedor(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$id = $this->input->post('id');
				$proveedor = $this->input->post('proveedor');
				$municipio = $this->input->post('municipio');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$this->proveedor_model->actualiza_proveedor($id,$proveedor,$municipio,$direccion,$telefono,$email,$responsable);
				echo json_encode(array("resp"=>true,"mensaje"=>"El proveedor se modifico correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al modificar a proveedor"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
}