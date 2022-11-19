<?php
class M_Tanitrainer extends CI_Model{
    function getAll(){
        return $this->db->get('tanitrainer');
    }

    function getById($id){
        return $this->db->get_where('tanitrainer', ['id' => $id])->row();
    }

    function getByFlag($flag, $id=false){
        if($id){
            $this->db->where('id !=', $id);
        }
        return $this->db->get_where('tanitrainer', [
            'flag' => $flag
        ])->row();
    }
}