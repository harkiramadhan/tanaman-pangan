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

    function getById($id){
        return $this->db->select('')
                        ->from('user_tanitrainer ut')
                        ->join('tanitrainer t', 't.id = ut.tanitrainer_id')
                        ->where([
                            't.id' => $id
                        ])->get()->row();
    }

    function getLaporan($userid, $kelasid){
        return $this->db->get_where('user_laporan', [
                            'user_id' => $userid,
                            'tanitrainer_id' => $kelasid
                        ]);
    }

    function getDetailById($id){
        return $this->db->get_where('user_laporan', ['id' => $id])->row();
    }
}