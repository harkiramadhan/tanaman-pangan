<?php
class M_Gallery extends CI_Model{
    function getAll($userid){
        return $this->db->get_where('user_gallery', [
            'user_id' => $userid
        ]);
    }

    function getById($id){
        return $this->db->get_where('user_gallery', [
            'id' => $id
        ]);
    }
}