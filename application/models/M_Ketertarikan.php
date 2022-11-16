<?php
class M_Ketertarikan extends CI_Model {
    function getAll(){
        return $this->db->get('ketertarikan');
    }

    function getByUser($userid){
        return $this->db->select('k.*')
                        ->from('user_tertarik uk')
                        ->join('ketertarikan k', 'uk.ketertarikan_id = k.id')
                        ->where([
                            'uk.user_id' =>$userid
                        ])->get();
    }
}