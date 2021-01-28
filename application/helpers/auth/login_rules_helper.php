<?php
function getLoginRules()
{
    return array(
        array(
            'field' => 'email',
            'label' => 'Correo electrónico',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'El %s es requerido.',
                'valid_email' => 'El formato del %s es incorrecto.',
            ),
        ),
        array(
            'field' => 'password',
            'label' => 'Contraseña',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'La %s es requerida.',
            ),
        ),
    );
}
