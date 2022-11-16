<?php
class M_Jejaring extends CI_Model {
    function getAll(){
        return $this->db->select('u.*, r.role')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->get();
    }
}