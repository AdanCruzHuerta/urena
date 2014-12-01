<?php 
class Articulos_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function addArticulo($nombre,$descripcion,$alto,$largo,$ancho,$proveedor,$precio){
		$this->db->set('nombre',$nombre)->set('precio',$precio)->set('alto',$alto)->set('largo',$largo)->set('ancho',$ancho)->set('descripcion',$descripcion)->set('provedores_id',$proveedor)->insert('articulos');
		return $this->db->insert_id();
	}
	public function articuloCategoria($categoria,$articulo){
		$this->db->set('categorias_id',$categoria)->set('articulos_id',$articulo)->insert('categorias_has_articulos');
	}
	public function insertImg($id,$ruta){
		$this->db->set('ruta_imagen',$ruta)->where('id',$id)->update('articulos');
	}
	public function getArticulos($id){
		return $this->db->select('a.id as id')
						->select('a.nombre as nombre')
						->from('articulos as a')
						->join('categorias_has_articulos as c_a ','a.id = c_a.articulos_id')
						->where('c_a.categorias_id',$id)
						->get()
						->result();
	}
}