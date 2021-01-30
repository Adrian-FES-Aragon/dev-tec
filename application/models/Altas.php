<?php
class Altas extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    // public function getReport()
    // {
    //     $sql = $this->db->order_by('id', 'DESC')->get('employ');
    //     return $sql->result();
    // }

    public function save($report)
    {
        $this->db->trans_start();
        $this->db->insert('reportes', $report);
        // $user_info[''] = $this->db->insert_id();        
        $this->db->trans_complete();
        return !$this->db->trans_status() ? false : true;
    }




}