<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('getmenu'));
    }

    public function index()
    {
        if ($this->session->userdata('is_logged')) {
            $vista = $this->load->view('admin/show_user', '', TRUE);  //vista de la tabla de usuarios                        
            $this->getTemplate($vista);
        } else {
            show_404();
        }
    }

    public function getTemplate($view)
    {
        $data['title'] = 'Dashboard';        
        $data['menu'] = main_menu();
        $data = array(
            'head'      => $this->load->view('layout/head', $data, TRUE), //TRUE lo devuelve como cadena, NO como vista   
            'header'    => $this->load->view('layout/header', $data, TRUE), //(ruta/vista, variable/dato a pasar, cadena)
            // 'nav'       => $this->load->view('layout/nav', '', TRUE),
            'nav'       => $view,
            'aside'     => $this->load->view('layout/aside', '', TRUE),
            'content'   => $view,
            'footer'    => $this->load->view('layout/footer', '', TRUE),
        );        
        $this->load->view('dashboard', $data);
    }
}
