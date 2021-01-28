<?php
function main_menu()
{
    return array(
        array(
            'title' => 'Inicio',
            'url' => base_url(),
        ),
        array(
            'title' => 'About',
            'url' => base_url('/about'),
        ),
        array(
            'title' => 'Login', //Controlador
            'url' => base_url('/login'), //vista
        ),
        // array(
        //     'title' => 'Registro', //Controlador
        //     'url' => base_url('/registro'), //vista
        // ),
    );
}
