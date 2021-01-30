<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'pagination'));
        $this->load->helper(array('users/users_rules', 'string', 'getmenu'));
        $this->load->model(array('ModelsUsers'));
    }

    public function index($offset = 0) //cargamos las vistas en la funcion 
    {
        $data = $this->ModelsUsers->getUsers();

        $config['base_url'] = base_url('users/index');
        $config['per_page'] = 4;
        $config['total_rows'] = count($data);

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        if ($this->session->userdata('is_logged')) {
            $this->pagination->initialize($config);
            $page = $this->ModelsUsers->getPaginate($config['per_page'], $offset);
            $this->getTemplate($this->load->view('admin/show_user', array('data' => $page), true)); // cargamos los registros de la tabla
        } else {
            show_404();
        }
    }

    public function create()
    {
        $vista = $this->load->view('admin/create_user', '', TRUE);  //vista de la tabla de usuarios                        
        $this->getTemplate($vista);
    }

    public function getTemplate($view)
    {
        $data['title'] = 'Usuarios';
        $data['menu'] = main_menu();
        $data = array(
            'head'      => $this->load->view('layout/head', $data, TRUE), //TRUE lo devuelve como cadena, NO como vista   
            'header'    => $this->load->view('layout/header', $data, TRUE), //(ruta/vista, variable/dato a pasar, cadena)
            'nav'       => $this->load->view('layout/nav', '', TRUE),  //vista de la tabla de usuarios    
            'aside'     => $this->load->view('layout/aside', '', TRUE),
            'content'   => $view,
            'footer'    => $this->load->view('layout/footer', '', TRUE),
        );
        $this->load->view('dashboard', $data);
    }

    public function update()
    {
        $_id = $this->input->post('_id');
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $cedula = $this->input->post('cedula');
        $especialidad = $this->input->post('especialidad');
        $area = $this->input->post('area');

        $username = $this->input->post('username');

        $this->form_validation->set_rules(getUpdateUserRules());
        if ($this->form_validation->run() === FALSE) {
            $view = $this->load->view('admin/edit_user', '', true);
            $this->getTemplate($view);
        } else {
            # actualizar
            // show_404();
            $data = array(
                'nombre' => $nombre,
                'apellido' => $apellidos,
                'cedula' => $cedula,
                'especialidad' => $especialidad,
                'area' => $area,
            );
            $this->ModelsUsers->updateUser($_id, $data);
            $this->session->set_flashdata('msg', 'El usuario ' . $username . ' fue actualizado correctamente');
            redirect('users');
        }
    }

    public function store()     //llegan los datos y los valida  con form_validation
    {
        $user =     $this->input->post('user'); //$this->input->post('user'); para obtener los datos del formulario
        $correo =   $this->input->post('correo');
        $range =    $this->input->post('range');
        $name =     $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $area =     $this->input->post('area');
        $especialidad = $this->input->post('especialidad');
        $cedula =   $this->input->post('cedula');

        $this->form_validation->set_rules(getCreateUserRules());

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header(400);
        } else {
            /////seteamos los valores manualmente con la funcion save al modelo para que los guarde en la base de datos
            $user = array(
                'nombre_usuario' => $user,
                'contrasena' => random_string('alnum', 8),
                'correo' => $correo,
                'rango' => $range,
                'status' => '1',
            );

            $user_info = array(
                'nombre' => $name,
                'apellido' => $lastname,
                'cedula' => $cedula,
                'especialidad' => $especialidad,
                'area' => $area,
            );

            if (!$this->ModelsUsers->save($user, $user_info)) {
                $this->output->set_status_header(500);
            } else {        
                $this->sendEmail($user); //si no hubo errores redirecciona y envia el email
                $this->session->set_flashdata('msg', 'Usuario registrado exitosamente');
                redirect(base_url('users'));
            }
        }

        $vista = $this->load->view('admin/create_user', '', TRUE);
        $this->getTemplate($vista);
    }

    public function delete($id = 0)
    {
        $_id = $this->input->post('id', true);
        if (empty($_id)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('msg' => 'El id no puede ser vacio')));
        } else {
            $this->ModelsUsers->deleteUser($_id);
            $this->output
                ->set_status_header(200);
        }
    }

    public function edit($id = 0)
    {
        $user = $this->ModelsUsers->getUser($id);
        $view = $this->load->view('admin/edit_user', array('user' => $user), true);
        $this->getTemplate($view);
    }

    public function sendEmail($data)
    {
        $this->email->from('sistema@tecdev.com', 'Tecdev'); //el correo del sistema de la empresa
        $this->email->to($data['correo']);  //el correo de a quien se lo enviamos usando el parametro de la variable        
        $this->email->subject('¡Datos de tu cuenta nueva!');
        $vista = $this->load->view('emails/welcome', $data, TRUE);
        $this->email->message($vista);
        $this->email->send();
    }
}
