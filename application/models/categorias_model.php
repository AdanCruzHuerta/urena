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
	public function categoria_renombrar($data_model){
			   $this->db->set('nombre',$data_model['nombre'])
						->where('id',$data_model['id'])
						->update('categorias');
		return $this->db->select('categorias.nombre as nombre')
						->from('categorias')
						->where('id',$data_model['id'])
						->get()
						->row();
	}
	public function getSubcategorias($id){
		return $this->db->where('categorias_id',$id)->get('categorias_has_categorias')->result();
	}
}
