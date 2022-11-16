<?php
class M_Komoditas extends CI_Model {
    function getAll(){
        return $this->db->get('komoditas_pangan');
    }

    function getByUser($userid){
        return $this->db->select('k.*')
                        ->from('user_komoditas uk')
                        ->join('komoditas_pangan k', 'uk.komoditas_id = k.id')
                        ->where([
                            'uk.user_id' => $userid
                        ])->get();
    }
}