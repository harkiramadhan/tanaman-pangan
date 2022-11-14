<?php
class M_Kelembagaan extends CI_Model {
    function getAll(){
        return $this->db->get('kelembagaan');
    }
}