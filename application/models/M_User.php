<?php
class M_User extends CI_Model{
    function getAll(){
        return $this->db->get('user');
    }

    function getById($userid){
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->where([
                            'u.id' => $userid
                        ])->get()->row();
    }

    function getByHp($hp){
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->where([
                            'u.hp' => $hp
                        ])->get()->row();
    }
}