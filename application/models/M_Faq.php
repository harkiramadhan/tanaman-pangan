<?php
class M_Faq extends CI_Model {
    function getAll(){
        return $this->db->get('faq');
    }

    function getActive(){
        return $this->db->get_where('faq', ['status' => 1]);
    }

    function getById($id){
        return $this->db->get_where('faq', ['id' => $id])->row();
    }
}