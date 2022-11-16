<?php 
class M_Kategori_olahan extends CI_Model {
    function getAll(){
        return $this->db->get('kategori_olahan');
    }

    function getByUser($userid){
        return $this->db->select('k.*')
                        ->from('user_kategori_olahan uk')
                        ->join('kategori_olahan k', 'uk.kategori_olahan_id = k.id')
                        ->where([
                            'uk.user_id' => $userid
                        ])->get();
    }
}