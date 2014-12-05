<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('pagina_model');
		$this->load->library('email');
		$this->load->model('categorias_model');
		$this->load->model('articulos_model');
	}
	public function index(){
		$slider = $this->pagina_model->getSliderInicio();
		$data = array('contenido'=>'home/inicio','slider'=>$slider);
		$this->load->view('home/template',$data);
	}
	public function nosotros() {
		$data = array('contenido'=>'home/nosotros');
		$this->load->view('home/template',$data);
	}
	public function productos() {
		$categorias = $this->categorias_model->get_categorias(1);
		$array = array();
		foreach ($categorias as $row) {
			$subcategorias = $this->categorias_model->get_categorias($row->id);
			$subarray = array();
			foreach ($subcategorias as $sub) {
				$subcategorias3 = $this->categorias_model->get_categorias($sub->id);
				$subarray3 = array();
				foreach ($subcategorias3 as $sub3) {
					$subarray3[] = array('id'=>$sub3->id,'nombre'=>$sub3->nombre);
				}
				$subarray[] = array('id'=>$sub->id,'nombre'=>$sub->nombre,'subcategorias'=>$subarray3);
			}
			$array[] = array('id'=>$row->id,'nombre'=>$row->nombre,
							'subcategorias'=> $subarray);
		}
		$data = array('contenido'=>'home/productos','categorias'=>$array);
		$this->load->view('home/template',$data);
	}
	public function getProductos(){
		if ($this->input->post()) {
			$subcategorias1 = $this->categorias_model->getSubcategorias($this->input->post('id'));
			#echo print_r($subcategorias1);
			$productos = array();
			if(count($subcategorias1) > 0){

				foreach($subcategorias1 as $sub1){
					
					$articulos1 = $this->articulos_model->getArticulosHome($sub1->categorias_id1);
					if(count($articulos1) > 0){
						foreach ($articulos1 as $art1) {
							$productos[] = array('id' => $art1->id, 'nombre' => $art1->nombre, 'imagen' => $art1->imagen);
						}
					}

					$subcategorias2 = $this->categorias_model->getSubcategorias($sub1->categorias_id1);
					if(count($subcategorias2) > 0){
						foreach ($subcategorias2 as $sub2) {
							$articulos2 = $this->articulos_model->getArticulosHome($sub2->categorias_id1);
							if(count($articulos2) > 0){
								foreach ($articulos2 as $art2) {
									$productos[] = array('id' => $art2->id, 'nombre' => $art2->nombre, 'imagen' => $art2->imagen);
								}
							}
						}
					}
					#die(print_r($subcategorias2));
					
					
				}
			} else{
				$articulos1 = $this->articulos_model->getArticulosHome($this->input->post('id'));
					if(count($articulos1) > 0){
						foreach ($articulos1 as $art1) {
							$productos[] = array('id' => $art1->id, 'nombre' => $art1->nombre, 'imagen' => $art1->imagen);
						}
					}
			}
			#echo print_r($productos);
			
			echo json_encode($productos);
		} else {
			echo json_encode(false);
		}
	}
	public function datosArticulo(){
		if ($this->input->post()) {
			$articulo = $this->articulos_model->getArticulo($this->input->post('id'));
			echo json_encode(array("resp"=>true,"articulo"=>$articulo));
		} else {
			echo json_encode(array("resp"=>false,"mensaje"=>"Error al consultar la informacion"));
		}
	}
	public function contacto() {
		$data = array('contenido'=>'home/contacto');
		$this->load->view('home/template',$data);
	}
	public function valida_correo(){
		if($this->input->post()) {
			$email = $this->input->post("email");
			$existe = $this->usuario_model->verifica($email);
			if(is_object($existe)){
				echo json_encode(array("resp"=>true,"mensaje"=>"El correo ingresado ya existe, intenta uno diferente"));
			}else{
				echo json_encode(array("resp"=>false));
			}	
		}
	}
	public function registra_cliente(){
		if($this->input->post()){
			$email      = $this->input->post("email");
			$password   = $this->input->post("password");
			$nombre     = $this->input->post("nombre");
			$apellido_p = $this->input->post("ap_paterno");
			$apellido_m = $this->input->post("ap_materno");			
			$usuario_id = $this->usuario_model->insert_user($email,sha1(md5($password)));
			$persona = $this->usuario_model->insert_persona($nombre,$apellido_p,$apellido_m,$usuario_id);

			if($persona){
				#---------Mandamos mail con datos de acceso al cliente--------------------------- 
				$de       = "09460322@itcolima.edu.mx";
				$para     = "$email";
				$asunto   = "MUEBLERIA UREÑA ONLINE";
				$mensaje  = "<div style='font-size:17px; background: #CCCABA; border-radius:5px;width:700px;height: auto; padding:5px;'>";
				$mensaje .= "<center><b>BIENVENIDO A MUEBLERIA UREÑA ONLINE</b></center><br/>";
				$mensaje .= "<center>DATOS DE ACCESO A LA TIENDA EN LINEA</center><br/></br>";
				$mensaje .= "<center>Tu Email es: <b>$email</b></center><br>";
				$mensaje .= "<center>Tu contraseña es: <b>$password</b></center><br/><br/>";
				$mensaje .= "<center>VISITA NUESTRO SITIO MUEBLERIA UREÑA ONLINE</center> <br/>";
				$mensaje .= "<center><a href='http://urena.sharksoft.com.mx'>Ir a Sitio Web</a></center></div>";

				$cabeceras  = "MIME-Version: 1.0\r\n";
				$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$cabeceras .= "From: $de\r\n";

				mail($para,$asunto,$mensaje,$cabeceras);
				//-------------------------------------------------------------------------------
				echo json_encode(array("resp"=>true,"mensaje"=>"Tu usuario ha sido registrado, revisa tu email"));
			}else{
				echo json_encode(array("resp"=>false));
			}	
		}
	}
	public function tienda(){
		$data['contenido'] = 'home/tienda';
		$this->load->view('home/template',$data);
	}	
}