<?php
class M_Role extends CI_Model {
    function getAll(){
        return $this->db->get('role');
    }
}