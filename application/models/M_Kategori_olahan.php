<?php 
class M_Kategori_olahan extends CI_Model {
    function getAll(){
        return $this->db->get('kategori_olahan');
    }
}