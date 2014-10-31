<?php 
class Fleteras_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_fleteras(){
		return $this->db->get('fleteras')->result();
	}
}
