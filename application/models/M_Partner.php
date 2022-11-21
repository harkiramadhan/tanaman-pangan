<?php
class M_Partner extends CI_Model{
    function getAll(){
        return $this->db->get('partner');
    }

    function getById($id){
        return $this->db->get_where('partner', ['id' => $id])->row();
    }

    function getActive(){
        return $this->db->get_where('partner', ['status' => 1]);
    }
}