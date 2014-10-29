<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admon extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('personas_model');
	}

	public function index(){
		$this->load->view('admon/login');
	}

	public function login(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = md5(sha1($this->input->post('password')));

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
		if($this->session->userdata('nombre') && $this->session->userdata('email')){
			if($this->input->post()){
				$clientes = $this->personas_model->get_clientes();
				if(is_array($clientes)){
					echo json_encode($clientes);
				}
				else{
					echo json_encode(false);
				}
			}
			else{
				echo json_encode(false);
			}
		}
		else{
			echo json_encode(false);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admon');
	}
	
}