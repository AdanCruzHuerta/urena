<?php 
class Usuario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function verifica($email){
		return $this->db->where('email',$email)
						->get('usuarios')
						->row();
	}

	public function insert_user($email,$password){
		$this->db->set('email',$email)
				 ->set('password',$password)
				 //->set('roles_id',$rol)
				 ->insert('usuarios');
				
			return $this->db->insert_id();
	}

	public function insert_persona($nombre,$apellido_p,$apellido_m,$usuario){
		return $this->db->set('nombre',$nombre)
						->set('apellido_p',$apellido_p)
						->set('apellido_m',$apellido_m)
						->set('usuarios_id',$usuario)
						->insert('personas');
	}
}