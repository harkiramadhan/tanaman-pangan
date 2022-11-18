<?php
class M_Publikasi extends CI_Model{
    function getAll(){
        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->order_by('id', "DESC")->get();
    }

    function getById($id){
        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->where('p.id', $id)->get()->row();
    }
}