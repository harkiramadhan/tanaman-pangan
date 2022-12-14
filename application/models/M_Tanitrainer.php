<?php
class M_Tanitrainer extends CI_Model{
    function getAll($whereRole = FALSE, $where = FALSE){
        if($where != NULL){
            $this->db->where('t.status', 1);
            foreach($where as $row){
                $this->db->where($row['column'], $row['value']);
            }
        }

        if($whereRole != NULL){
            $this->db->or_where_in('tr.role_id', $whereRole);
        }

        return $this->db->select('t.*')
                        ->from('tanitrainer t')
                        ->join('tanitrainer_role tr', 't.id = tr.tanitrainer_id', "LEFT")
                        ->group_by('tr.tanitrainer_id')->get();
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

    function getPaginate($rowno, $rowperpage, $flag = false, $whereRole = FALSE, $where = FALSE){
        if($flag){
            $this->db->where('t.flag !=', $flag);
        }

        if($where != NULL){
            foreach($where as $row){
                $this->db->where($row['column'], $row['value']);
            }
        }

        if($whereRole != NULL){
            $this->db->or_where_in('tr.role_id', $whereRole);
        }

        return $this->db->select('t.*')
                        ->from('tanitrainer t')
                        ->join('tanitrainer_role tr', 't.id = tr.tanitrainer_id', "LEFT")
                        ->where([
                            't.status' => 1
                        ])->limit($rowperpage, $rowno)->order_by('tanggal DESC, id DESC')->group_by('tr.tanitrainer_id')->get();
    }

    function checkUser($userid, $id){
        return $this->db->get_where('user_tanitrainer', [
            'user_id' => $userid,
            'tanitrainer_id' => $id
        ]);
    }

    function getUserByClass($id){
        return $this->db->get_where('user_tanitrainer', [
                            'tanitrainer_id' => $id
                        ]);
    }
}