<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admon extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('personas_model');
		$this->load->model('localidad_model');
		$this->load->model('proveedor_model');
		$this->load->model('fleteras_model');
		$this->load->model('pagina_model');
		$this->load->model('categorias_model');
		$this->load->model('articulos_model');
	}
	public function index(){
		$this->load->view('admon/login');
	}
	public function verifica_usuario(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$admin = $this->admin_model->valida($email,$password);
			if(is_object($admin)){
				echo json_encode(true);
			} else{
				echo json_encode(false);
			}
		}
	}
	public function login(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//$password = md5(sha1($this->input->post('password')));
			$admin = $this->admin_model->valida($email,$password);
			if(is_object($admin)){
				$this->session->set_userdata('email',$admin->email);
				$this->session->set_userdata('nombre',$admin->nombre);
				$this->session->set_userdata('apellido_p',$admin->apellido_p);
				$this->session->set_userdata('apellido_m',$admin->apellido_m);
				$this->session->set_userdata('rol_id', $admin->roles_id);
				$this->session->set_userdata('img_perfil', $admin->imagen);
				redirect('admon/inicio');
			}else{
				$this->session->sess_destroy();
				redirect('admon');
			}
		}
	}
	public function perfil(){
		if($this->session->userdata('nombre')){
			$data = array('contenido'=>'admon/perfil');
			$this->load->view('admon/template',$data);
		}else{
			$this->session->sess_destroy();
			redirect('admon');
		}
	}
	public function inicio(){
		if($this->session->userdata('nombre') && $this->session->userdata('email')){
			$data = array('contenido'=>'admon/inicio');
			$this->load->view('admon/template',$data);
		}else{
			$this->session->sess_destroy();
			redirect('admon');
		}
	}
	public function pagina(){
		if($this->session->userdata('nombre')){
			$slider = $this->pagina_model->getSlider();
			$data = array('contenido'=>'admon/pagina', 'slider'=>$slider);
			$this->load->view('admon/template',$data);
		} else{
			redirect('admon');
		}
	}
	public function visivilidad_slider(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$slider = $this->pagina_model->getSliderInicio();
				$slider = count($slider);
				if($slider > 1 || $this->input->post('status') == 0){
					$status = $this->pagina_model->getStaus($this->input->post('id'));
					if($status->status == 1){
						$actualiza = $this->pagina_model->actStaus($this->input->post('id'),0);
					}else{
						$actualiza = $this->pagina_model->actStaus($this->input->post('id'),1);
					}
					if($actualiza){
						echo json_encode(array("resp"=>true,"mensaje"=>"El cambio fue realizado"));
					}else{
						echo json_encode(array("resp"=>false,"mensaje"=>"Error al hacer el cambio"));
					}
				}else{
					echo json_encode(array("resp"=>false,"mensaje"=>"Debe de haber por lo menos 1 imagen visible"));
				}
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al enviar los datos"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function clientes(){
		if($this->session->userdata('nombre')){
			$clientes = $this->personas_model->get_clientes();
			$data = array('contenido'=>'admon/clientes',
							'clientes'=>$clientes);
			$this->load->view('admon/template',$data);
		} else{
			redirect('admon');
		}
	}
	public function alta_proveedor(){
		if($this->session->userdata('nombre')){
			$estados = $this->localidad_model->estados();
			$data = array('contenido'=>'admon/proveedor_alta','estados'=>$estados);
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	public function municipios(){
		if ($this->input->post()) {
			$municipios = $this->localidad_model->municipios($this->input->post('estado'));
			echo json_encode($municipios);
		}
	}
	public function registra_proveedor(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$proveedor = $this->input->post('proveedor');
				$municipio = $this->input->post('municipio');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$fecha_inicio =  date("Y-m-d");
				$this->proveedor_model->registra_proveedor($proveedor,$municipio,$direccion,$telefono,$email,$responsable,$fecha_inicio);
				echo json_encode(array("resp"=>true,"mensaje"=>"El proveedor se registro correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al registrar a proveedor"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function fleteras(){
		if($this->session->userdata('nombre')){
			$fleteras = $this->fleteras_model->get_fleteras();
			$data['fleteras'] = $fleteras;
			$data['contenido'] = 'admon/fleteras';
			$this->load->view('admon/template',$data); 
		}else{
			redirect('admon');
		}
	}
	public function alta_fletera(){
		if($this->session->userdata('nombre')){
			$estados = $this->localidad_model->estados();
			$data['contenido'] = 'admon/fletera_alta';
			$data['estados'] = $estados;
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	public function registra_fletera(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$fletera = $this->input->post('fletera');
				$municipio = $this->input->post('municipio');
				$ciudad = $this->input->post('ciudad');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$this->fleteras_model->registra_fletera($fletera,$municipio,$ciudad,$direccion,$telefono,$email,$responsable);
				echo json_encode(array("resp"=>true,"mensaje"=>"La fletera se registro correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al registrar la fletera"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function fletera(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$estados = $this->localidad_model->estados();
				$fletera = $this->fleteras_model->fletera($this->input->post('id'));
				$data['contenido'] = 'admon/fletera';
				$data['fletera'] = $fletera;
				$data['estados'] = $estados;
				$this->load->view('admon/template',$data);
			}else{
				redirect('admon/fleteras');
			}
		}else{
			redirect('admon');
		}
	}
	public function actualiza_fletera(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$id = $this->input->post('id');
				$proveedor = $this->input->post('fletera');
				$municipio = $this->input->post('municipio');
				$ciudad = $this->input->post('ciudad');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$this->fleteras_model->actualiza_fletera($id,$proveedor,$municipio,$ciudad,$direccion,$telefono,$email,$responsable);
				echo json_encode(array("resp"=>true,"mensaje"=>"El proveedor se modifico correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al modificar a proveedor"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function proveedores(){
		if($this->session->userdata('nombre')){
			$proveedores = $this->proveedor_model->proveedores();
			$data = array('contenido'=>'admon/proveedores','proveedores'=>$proveedores);
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	public function proveedor(){
		if($this->session->userdata('nombre')){
			if ($this->input->post()) {
				$estados = $this->localidad_model->estados();
				$proveedor = $this->proveedor_model->proveedor($this->input->post('id'));
				$data = array('contenido'=>'admon/proveedor','proveedor'=>$proveedor,'estados'=>$estados);
				$this->load->view('admon/template',$data);
			}else{
				redirect('admon/proveedores');
			}
		}else{
			redirect('admon');
		}
	}
	public function actualiza_proveedor(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$id = $this->input->post('id');
				$proveedor = $this->input->post('proveedor');
				$municipio = $this->input->post('municipio');
				$direccion = $this->input->post('direccion');
				$telefono = $this->input->post('telefono');
				$email = $this->input->post('email');
				$responsable = $this->input->post('responsable');
				$this->proveedor_model->actualiza_proveedor($id,$proveedor,$municipio,$direccion,$telefono,$email,$responsable);
				echo json_encode(array("resp"=>true,"mensaje"=>"El proveedor se modifico correctamente"));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al modificar a proveedor"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function categorias(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				//$data_model['id'] = $this->input->post('id_categoria');
				$data_model['nombre'] = $this->input->post('nombre');
				$categorias_id1 = $this->categorias_model->add_categoria($data_model);
				$data_model2['categorias_id']  = $this->input->post('id_categoria');
				$data_model2['categorias_id1'] = $categorias_id1;
				$this->categorias_model->add_categorias_categorias($data_model2);
				$data['resp'] = true;
				$data['mensaje'] = "La categoria ha sido creada";
				echo json_encode($data);
			}else{
				$categorias = $this->categorias_model->get_categorias(1);
				$data = array('contenido'=>'admon/categorias','categorias'=> $categorias);
				$this->load->view('admon/template',$data);
			}
		}else{
			redirect('admon');
		}
	}
	public function categoria(){
		if($this->session->userdata('nombre')){
			$data = array('contenido'=>'admon/categoria');
			$this->load->view('admon/template',$data);
		}else{
			redirect('admon');
		}
	}
	protected function categoriasYarticulos($id){
		$data['categorias'] = $this->categorias_model->get_categorias($id);
		$data['articulos'] = $this->articulos_model->getArticulos($id);
		return $data;
	}
	public function subcategorias(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$data = $this->categoriasYarticulos($this->input->post('id'));
				echo json_encode($data);
				#echo json_encode(array("resp"=>true,"mensaje"=>$subcategorias));
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al consultar categoria"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function categoriaAnterior(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$anterior = $this->categorias_model->anterior($this->input->post('id'));
				echo json_encode($anterior->categorias_id);
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al consultar categoria"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function categoria_renombrar(){
		if($this->session->userdata('nombre')){
			if($this->input->post()){
				$data_model['id'] = $this->input->post('id_categoria');
				$data_model['nombre'] = $this->input->post('nombre');
				$nombre = $this->categorias_model->categoria_renombrar($data_model);
				echo json_encode(array("resp"=>true,"mensaje"=>"El nombre ha sido cambiado","nombre"=>$nombre));
			}else{
				echo json_encode(array("resp" => false, "mensaje" => "Error al modificar el nombre de la categoria"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function agregarArticulo(){
		if($this->session->userdata('nombre')){
			#die(var_dump($_FILES));
			if(isset($_FILES)){
				$file_element_name = 'userfile';
				$articulo = $this->articulos_model->addArticulo($this->input->get('nombre'),$this->input->get('descripcion'),$this->input->get('alto'),$this->input->get('largo'),$this->input->get('ancho'),$this->input->get('proveedor'),$this->input->get('precio'));
				#die(var_dump($articulo));
				$ext = explode('/',$_FILES[0]['type']);
				if(copy($_FILES[0]['tmp_name'], "articulos/".$articulo.".".$ext[1])){
					$this->articulos_model->articuloCategoria($this->input->get('id_categoria'),$articulo);
					$this->articulos_model->insertImg($articulo,"articulos/".$articulo.".".$ext[1]);
					echo json_encode(array("resp"=>true,"mensaje"=>"El articulo se guardo correctamente"));
				}else{
					echo json_encode(array("resp"=>false,"mensaje"=>"Error al guardar la imagen"));
				}
			}else{
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al enviar la informacion"));
			}
		}else{
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
	}
	public function datosArticulo(){
		if ($this->session->userdata('nombre')) {
			if ($this->input->post()) {
				$articulo = $this->articulos_model->getArticulo($this->input->post('id'));
				echo json_encode(array("resp"=>true,"articulo"=>$articulo));
			} else {
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al consultar la informacion"));
			}
		} else {
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
		
	}
	public function editarArticulo(){
		if ($this->session->userdata('nombre')) {
			if ($this->input->post()) {
				$articulo = $this->articulos_model->getArticulo($this->input->post('id'));
				echo json_encode(array("resp"=>true,"articulo"=>$articulo));
			} else {
				echo json_encode(array("resp"=>false,"mensaje"=>"Error al enviar la informacion"));
			}
		} else {
			echo json_encode(array("resp"=>false,"mensaje"=>"Su sesión se ha cerrado, Inicie sesión nuevamente"));
		}
		
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admon');
	}
}