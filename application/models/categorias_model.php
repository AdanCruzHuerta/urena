<?php 
class Categorias_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_categorias($id){
		return $this->db->select('c2.id as id')
						->select('c2.nombre as nombre')
						->select('c_c.categorias_id as anterior')
						->from('categorias as c')
						->join('categorias_has_categorias as c_c ','c.id = c_c.categorias_id')
						->join('categorias as c2','c_c.categorias_id1 = c2.id')
						->where('c_c.categorias_id',$id)
						->get()
						->result();
	}
	public function add_categoria($data_model){
		$this->db->insert('categorias', $data_model);
		return $this->db->insert_id();
	}
	public function add_categorias_categorias($data_model2){
		return $this->db->insert('categorias_has_categorias', $data_model2);
	}
	public function anterior($id){
		return $this->db->where('categorias_id1',$id)->get('categorias_has_categorias')->row();
	}
	/*
	select c2.nombre	
	from categorias as c join categorias_has_categorias as c_c on c.id = c_c.categorias_id 
	join categorias as c2 on c_c.categorias_id1 = c2.id
	where c_c.categorias_id = 1;
	*/
}
