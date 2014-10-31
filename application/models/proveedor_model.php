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
}