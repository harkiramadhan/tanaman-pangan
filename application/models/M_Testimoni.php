<?php
class M_Testimoni extends CI_Model{
    function getAll(){
        return $this->db->get('testimoni');
    }

    function getById($id){
        return $this->db->get_where('testimoni', ['id' => $id])->row();
    }

    function getActive(){
        return $this->db->order_by('id', "DESC")->get_where('testimoni', ['status' => 1]);
    }
}