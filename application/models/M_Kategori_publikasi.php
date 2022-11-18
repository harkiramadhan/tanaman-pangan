<?php
class M_Kategori_publikasi extends CI_Model{
    function getAll(){
        return $this->db->get('kategori_publikasi');
    }
}