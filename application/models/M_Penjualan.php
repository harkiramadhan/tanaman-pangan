<?php
class M_Penjualan extends CI_Model {
    function getAll(){
        return $this->db->get('penjualan');
    }

    function getByUser($userid){
        return $this->db->select('p.*')
                        ->from('user_penjualan up')
                        ->join('penjualan p', 'up.penjualan_id = p.id')
                        ->where([
                            'up.user_id' => $userid
                        ])->get();
    }
}