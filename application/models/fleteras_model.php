<?php 
class Fleteras_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_fleteras(){
		return $this->db->get('fleteras')->result();
	}
	public function fletera($id){
		return $this->db->select('fleteras.id as id')
						->select('fleteras.nombre as nombre')
						->select('estados.id as estado')
						->select('municipios.id as municipio')
						->select('fleteras.ciudad as ciudad')
						->select('fleteras.direccion as direccion')
						->select('fleteras.responsable as responsable')
						->select('fleteras.telefono as telefono')
						->select('fleteras.email as email')
						->from('fleteras')
						->where('fleteras.id',$id)
						->join('municipios','fleteras.municipio_id = municipios.id')
						->join('estados','municipios.estado_id = estados.id')
						->get()
						->row();
	}
	public function registra_fletera($fletera,$municipio,$ciudad,$direccion,$telefono,$email,$responsable){
		return $this->db->set('nombre',$fletera)
						->set('municipio_id',$municipio)
						->set('ciudad',$ciudad)
						->set('direccion',$direccion)
						->set('telefono',$telefono)
						->set('email',$email)
						->set('responsable',$responsable)
						->insert('fleteras');
	}
	public function actualiza_fletera($id,$fletera,$municipio,$ciudad,$direccion,$telefono,$email,$responsable){
		return $this->db->set('nombre',$fletera)
						->set('municipio_id',$municipio)
						->set('ciudad',$ciudad)
						->set('direccion',$direccion)
						->set('telefono',$telefono)
						->set('email',$email)
						->set('responsable',$responsable)
						->where('id',$id)
						->update('fleteras');
	}
}
