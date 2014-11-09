<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	//constructor
	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('pagina_model');
		$this->load->library('email');
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
		$data = array('contenido'=>'home/productos');
		$this->load->view('home/template',$data);
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
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}	
		}
	}

	public function insert_cliente(){
		if($this->input->post()){
			// roles 1 = cliente, 2 = empleado
			$email      = $this->input->post("email");
			$password   = $this->input->post("password");
			$rol = 1;
			$nombre     = $this->input->post("nombre");
			$apellido_p = $this->input->post("ap_paterno");
			$apellido_m = $this->input->post("ap_materno");
			
			$usuario = $this->usuario_model->insert_user($email,sha1(md5($password)));

			$persona = $this->usuario_model->insert_persona($nombre,$apellido_p,$apellido_m,$usuario);

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

			if($persona){
				echo json_encode(true); 
			}else{
				echo json_encode(false);
			}	
		}
	}


	public function registra_cliente(){
		exit("Hola Mundo");
	}	
}