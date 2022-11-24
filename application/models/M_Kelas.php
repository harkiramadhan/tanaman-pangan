<?php
class M_Kelas extends CI_Model{
    function getByUser($userid){
        return $this->db->select('')
                        ->from('user_tanitrainer ut')
                        ->join('tanitrainer t', 't.id = ut.tanitrainer_id')
                        ->where([
                            'ut.user_id' => $userid
                        ])->get();
    }
}