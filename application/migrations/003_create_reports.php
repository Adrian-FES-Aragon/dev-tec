<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_reports extends CI_Migration
{

    public function up()
    {
        
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',                
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ),
            'employ' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'area' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'date' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'equipo' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'caract' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE,
            ),
            'proc' => array(
                'type' => 'ENUM("Reparacion","Destruccion")',
                'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('reportes');
    }

    public function down()
    {
        $this->dbforge->drop_table('reportes');
    }
}
