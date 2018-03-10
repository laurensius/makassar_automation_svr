<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_sensor extends CI_Model {

    function save_data($data){
        $this->db->insert('t_sensor',$data);
        return $this->db->affected_rows();
    }
    
    
}