<?php
class M_Tanitrainer extends CI_Model{
    function getAll(){
        return $this->db->get('tanitrainer');
    }

    function getById($id){
        return $this->db->get_where('tanitrainer', ['id' => $id])->row();
    }

    function getByFlag($flag, $id=false){
        if($id){
            $this->db->where('id !=', $id);
        }
        return $this->db->get_where('tanitrainer', [
            'flag' => $flag
        ])->row();
    }

    function getPaginate($rowno,$rowperpage, $flag=false){
        if($flag){
            $this->db->where('t.flag !=', $flag);
        }
        return $this->db->select('t.*')
                        ->from('tanitrainer t')
                        ->where([
                            't.status' => 1
                        ])->limit($rowperpage, $rowno)->order_by('tanggal DESC, id DESC')->get();
    }
}