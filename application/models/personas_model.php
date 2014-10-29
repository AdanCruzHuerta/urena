<?php
class Personas_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_clientes(){
		return $this->db->select('personas.id as id')
						->select('personas.nombre as nombre')
						->select('personas.apellido_p as apellido_p')
						->select('personas.apellido_m as apellido_m')
						->select('personas.telefono as telefono')
						->select('personas.ciudad as ciudad')
						->select('usuarios.email as email')
						->from('personas')
						->join('usuarios','personas.usuarios_id = usuarios.id')
						->get()
						->result();
	}
}