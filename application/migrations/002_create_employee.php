<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_employee extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'TINYINT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nombre' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'apellido' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'area' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'cedula' => array(
                'type' => 'VARCHAR',  
                'constraint' => '100',              
                'null' => TRUE,
            ),
            'especialidad' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'rango' => array(
                'type' => 'TINYINT',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'id_usuario' => array(
                'type' => 'TINYINT',
                'constraint' => '200',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('Empleados');
    }

    public function down()
    {
        $this->dbforge->drop_table('Empleados');
    }
}
