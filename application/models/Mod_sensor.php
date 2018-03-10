<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_sensor extends CI_Model {

    function save_data($data){
        $this->db->insert('t_sensor',$data);
        return $this->db->affected_rows();
    }
    
    function get_recent(){
        $this->db->select('*');
        $this->db->from('t_sensor');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
}