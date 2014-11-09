<?php 
class Pagina_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function getSlider(){
		return $this->db->get('slider')->result();
	}
	public function getSliderInicio(){
		return $this->db->where('status',1)->get('slider')->result();
	}
	public function getStaus($id){
		return $this->db->select('status')->where('id',$id)->from('slider')->get()->row();;
	}
	public function actStaus($id,$status){
		return $this->db->set('status',$status)->where('id',$id)->update('slider');
	}
	public function cuentaSlider(){
		return $this->db->select('select count(ruta)')->where('status',1)->from('slider')->get();
	}
}