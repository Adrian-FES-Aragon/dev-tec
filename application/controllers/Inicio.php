<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('getmenu'));
    }

    public function index()
    {
        $vista = $this->load->view('inicio', '', TRUE);
        $this->getTemplate($vista);
    }

    public function getTemplate($view)
    {
        $data['title'] = 'Inicio';
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
}