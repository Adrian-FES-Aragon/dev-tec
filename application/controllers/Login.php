<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct() //constructor de la funcion 
	{
		parent::__construct();
		$this->load->library(array('form_validation'));	//cargamos la libreria de validacion; la variable de session se carga globalmente
		$this->load->helper(array('auth/login_rules', 'getMenu'));	//cargamos los gelpers que reglas de logueo y de menu
		$this->load->model('Auth');	//cargamos el modelo de autenticacion
	}

	public function index() //construimos la funcion index
	{
		$vista = $this->load->view('login', '', TRUE);
		$this->getTemplate($vista);
		// $data['menu'] = main_menu();	//pasamos la funcion de main menu a un parametro de $data
		// $this->load->view('login', $data); //cargamos la vista de login y le pasamos la variable $data
	}

	public function getTemplate($view)
	{
		$data['title'] = 'Login';
		$data['menu'] = main_menu();
		$data = array(
			'head'      => $this->load->view('layout/head', $data, TRUE), //TRUE lo devuelve como cadena, NO como vista   
			'header'    => $this->load->view('layout/header', $data, TRUE), //(ruta/vista, variable/dato a pasar, cadena)
			'nav'       => $this->load->view('layout/nav', '', TRUE),
			'aside'     => $this->load->view('layout/aside', '', TRUE),
			'content'   => $view,
			'footer'    => $this->load->view('layout/footer', '', TRUE),
		);

		$this->load->view('login', $data);
	}

	public function validate() //construimos la funcion de validacion del usuario
	{
		$this->form_validation->set_error_delimiters('', ''); //modificamos los delimitadores de error para el formulario de validacion
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$rules = getloginRules();	//almacenamos en una variable el motodo de las reglas de logueo
		$this->form_validation->set_rules($rules); //
		if ($this->form_validation->run() === FALSE) { //si detecta campos vacios entra al if
			$this->output->set_status_header(400); //
			$errors = array(	//
				'email' => form_error('email'), //pasamos a form_error para verificar datos
				'password' => form_error('password'),	//
			);
			echo json_encode($errors); //
		} else { //en caso contrario ejecuta esto:
			$usr = $this->input->post('email'); //ya que no esta vacio pasamos por
			$pass = $this->input->post('password'); //post para verificar
			if (!$res = $this->Auth->login($usr, $pass)) {		//
				echo json_encode(array('msg' => 'Verifique sus credenciales.'));
				$this->output->set_status_header(401);		//
				exit;	//
			}
			$data = array(	 //
				'id' => $res->id,
				'rango' => $res->rango,
				'status' => $res->status,
				'nombre_usuario' => $res->nombre_usuario,
				'is_logged' => TRUE,
			);

			$this->session->set_userdata($data);		//
			$this->session->set_flashdata('msg', 'Bienvenido al sistema: ' . $data['nombre_usuario']);		//
			echo json_encode(array('url' => base_url('users')));		//
		}
	}

	public function logout()
	{
		$vars = array('id', 'rango', 'status', 'nombre_usuario', 'is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();
		redirect('login');
	}
}
