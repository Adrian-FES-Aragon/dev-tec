<?php
if (!function_exists('getReportRules')) {

    function getCreateReportRules()
    {
        return array(
            array(
                'field' => 'employ',
                'label' => 'Empleado',
                'rules' => 'required|max_length[100]',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'max_length' => 'El nombre de %s es demasiado grande.',
                ),
            ),
            array(
                'field' => 'area',
                'label' => 'Area',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                    'valid_email' => 'El %s es invalido.', //%s -> wild card?
                ),
            ),
            array(
                'field' => 'equipo',
                'label' => 'Equipo',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                ),
            ),
            array(
                'field' => 'caract',
                'label' => 'Caracteristicas',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Las %s son requeridas.',
                ),
            ),
            array(
                'field' => 'proc',
                'label' => 'Procedimiento',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El %s es requerido.',
                ),
            ),
        );
    }
}
