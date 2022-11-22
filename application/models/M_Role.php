<?php
class M_Role extends CI_Model {
    function getAll(){
        return $this->db->get('role');
    }

    function countByRole($roleid){
        return $this->db->select('u.id')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->where([
                            'u.role_id' => $roleid
                        ])->get()->num_rows();
    }
}