<?php
class M_Kegiatan extends CI_Model{
    function getAll(){
        return $this->db->select('k.*, kp.kategori')
                        ->from('kegiatan k')
                        ->join('kategori_publikasi kp', 'k.kategori_id = kp.id')
                        ->get();
    }

    function getById($id){
        return $this->db->select('k.*, kp.kategori')
                        ->from('kegiatan k')
                        ->join('kategori_publikasi kp', 'k.kategori_id = kp.id')
                        ->where('k.id', $id)->get()->row();
    }

    function getActive(){
        return $this->db->select('k.*, kp.kategori')
                        ->from('kegiatan k')
                        ->join('kategori_publikasi kp', 'k.kategori_id = kp.id')
                        ->where('k.status', 1)->get();
    }
}