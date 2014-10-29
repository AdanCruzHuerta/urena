
<?php 
class Admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function valida($email,$password){
		return $this->db->where('email',$email)
						->where('password',$password)
						->get('administrador')
						->row();
	}
}
?>