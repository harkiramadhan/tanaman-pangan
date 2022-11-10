<?php
class M_Komoditas extends CI_Model {
    function getAll(){
        return $this->db->get('komoditas_pangan');
    }
}