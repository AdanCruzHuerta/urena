<?php 
class Proveedor_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function registra_proveedor($proveedor,$municipio,$direccion,$telefono,$email,$responsable,$fecha_inicio){
		return $this->db->set('nombre',$proveedor)
						->set('municipios_id',$municipio)
						->set('direccion',$direccion)
						->set('telefono',$telefono)
						->set('email',$email)
						->set('responsable',$responsable)
						->set('fecha_inicio',$fecha_inicio)
						->insert('proveedores');
	}
	public function proveedores(){
		return $this->db->get('proveedores')->result();
	}
	public function proveedor($id){
		return $this->db->select('proveedores.id as id')
						->select('proveedores.nombre as nombre')
						->select('estados.id as estado')
						->select('municipios.id as municipio')
						->select('proveedores.direccion as direccion')
						->select('proveedores.responsable as responsable')
						->select('proveedores.telefono as telefono')
						->select('proveedores.email as email')
						->from('proveedores')
						->where('proveedores.id',$id)
						->join('municipios','proveedores.municipios_id = municipios.id')
						->join('estados','municipios.estado_id = estados.id')
						->get()
						->row();
	}
	public function actualiza_proveedor($id,$proveedor,$municipio,$direccion,$telefono,$email,$responsable){
		return $this->db->set('nombre',$proveedor)
						->set('municipios_id',$municipio)
						->set('direccion',$direccion)
						->set('telefono',$telefono)
						->set('email',$email)
						->set('responsable',$responsable)
						->where('id',$id)
						->update('proveedores');
	}
}