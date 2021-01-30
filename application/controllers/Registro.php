<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('getmenu')); //cargamos helper 'menu'
        $this->load->model('Users');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $vista = $this->load->view('registro', '', TRUE);

        $this->getTemplate($vista);
    }

    public function getTemplate($view)
    {
        $data['title'] = 'Home';
        $data['menu'] = main_menu();
        $data = array(
            'head'      => $this->load->view('layout/head', $data, TRUE), //TRUE lo devuelve como cadena, NO como vista   
            'header'    => $this->load->view('layout/header', $data, TRUE), //(ruta/vista, variable/dato a pasar, cadena)
            'nav'       => $this->load->view('layout/nav', '', TRUE),
            'aside'     => $this->load->view('layout/aside', '', TRUE),
            'content'   => $view,
            'footer'    => $this->load->view('layout/footer', '', TRUE),
        );

        $this->load->view('home', $data);
    }

    public function create()
    {                                               //inputs asignados a variables y comprobacion concatenada
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $password_c = $this->input->post('password_confirm');

        $config = array(
            array(
                'field' => 'username',
                'label' => 'Nombre de usuario',
                'rules' => 'required|alpha_numeric'
            ),
            array(
                'field' => 'email',
                'label' => 'Correo electrónico',
                'rules' => 'required|valid_email',
                'errors' => array(
                    'required' => 'El  %s es invalido.'
                ),
            ),
            array(
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'La  %s es invalida.'
                ),
            ),

        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $data['menu'] = main_menu();
            echo 'error';
            $this->load->view('registro', $data);
        } else {
            $datos = array(
                'nombre_usuario' => $username,
                'correo' => $email,
                'contrasena' => $password,
            );
            $data['menu'] = main_menu();
            echo 'hecho';
            if (!$this->Users->create($datos)) {
                $data['msg'] = 'Ocurrio un error al ingresar los datos, intente más tarde :(';
                $this->load->view('registro', $data);
            }
            $data['msg'] = 'Registrado correctamente! :D';
            $this->load->view('registro', $data);
        }
    }
}