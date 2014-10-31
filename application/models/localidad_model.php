<?php 
class Localidad_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function estados(){
		return $this->db->get('estados')->result();
	}
	public function municipios($id){
		return $this->db->where('estado_id',$id)->get('municipios')->result();
	}
}
