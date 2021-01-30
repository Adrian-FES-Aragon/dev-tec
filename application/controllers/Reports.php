<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'email', 'pagination'));
        $this->load->helper(array('users/report_rules', 'string', 'getmenu'));
        $this->load->model(array('Altas'));
    }

    public function index()
    {
        $data = $this->ModelsUsers->getUsers($offset = 0);

        $config['base_url'] = base_url('reports/index');
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
            $page = $this->Altas->getPaginate($config['per_page'], $offset);
            $this->getTemplate($this->load->view('users/all_reports', array('data' => $page), true)); // cargamos los registros de la tabla
        } else {
            show_404();
        }
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

        $this->load->view('dashboard', $data);
    }


    public function reportes()
    {
        if ($this->session->userdata('is_logged')) {
            $vista = $this->load->view('users/all_reports', '', TRUE);  //vista de la tabla de usuarios                        
            $this->getTemplate($vista);
        } else {
            show_404();
        }
    }

    public function alta()
    {
        if ($this->session->userdata('is_logged')) {
            $vista = $this->load->view('users/new_report', '', TRUE);  //vista de la tabla de usuarios                        
            $this->getTemplate($vista);
        } else {
            show_404();
        }
    }

    public function store()
    {
        $employ = $this->input->post('employ');
        $area = $this->input->post('area');
        $equipo = $this->input->post('equipo');
        $caract = $this->input->post('caract');
        $proc = $this->input->post('proc');

        $this->form_validation->set_rules(getCreateReportRules());
        
        if ($this->form_validation->run() == FALSE) {
            $this->output->set_status_header(400);
        } else {
            $report = array(
                'eploy' => $employ,
                'area' => $area,
                'equipo' => $equipo,
                'caract' => $caract,
                'proct' => $proc,
            );

            if (!$this->ModelsUsers->save($report)) {
                $this->output->set_status_header(500);
            } else {
                // $this->sendEmail($user); //si no hubo errores redirecciona y envia el email
                $this->session->set_flashdata('msg', 'Usuario registrado exitosamente');
                redirect(base_url('reports/reportes'));
            }
            $vista = $this->load->view('users/new_report', '', TRUE);
            $this->getTemplate($vista);
        }
    }
}
