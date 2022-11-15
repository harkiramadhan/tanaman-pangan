<?php
class M_Penjualan extends CI_Model {
    function getAll(){
        return $this->db->get('penjualan');
    }
}