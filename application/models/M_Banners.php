<?php
class M_Banners extends CI_Model {
    function getAll(){
        return $this->db->get('banners');
    }

    function getById($id){
        return $this->db->get_where('banners', ['id' => $id])->row();
    }

    function getActive(){
        return $this->db->get_where('banners', ['status' => 1]);
    }
}