<?php
class M_Publikasi extends CI_Model{
    function getAll($where=FALSE){
        if($where != NULL){
            $this->db->or_where_in('p.kategori_id', $where);
        }

        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->order_by('id', "DESC")->get();
    }

    function getLatest(){
        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->where([
                            'p.status' => 1
                        ])->order_by('tanggal DESC, id DESC')->get()->row();
    }

    function getById($id){
        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->where('p.id', $id)->get()->row();
    }

    function getByFlag($flag, $id=false){
        if($id){
            $this->db->where('p.id !=', $id);
        }
        return $this->db->select('p.*, kp.kategori')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->where('p.flag', $flag)->get()->row();
    }

    function getPaginate($rowno,$rowperpage, $where = FALSE, $order = FALSE){
        if($where != NULL){
            $this->db->or_where_in('p.kategori_id', $where);
        }

        if($order != NULL){
            foreach($order as $row){
                $this->db->order_by($row['column'], $row['order']);
            }
        }

        return $this->db->select('p.*, kp.kategori, kp.icon')
                        ->from('publikasi p')
                        ->join('kategori_publikasi kp', 'p.kategori_id = kp.id')
                        ->where([
                            'p.status' => 1
                        ])->limit($rowperpage, $rowno)->order_by('tanggal DESC, id DESC')->get();
    }

    function countByCategory($kategoriid){
        return $this->db->select('p.id')
                        ->from('publikasi p')
                        ->where([
                            'p.status' => 1,
                            'p.kategori_id' => $kategoriid
                        ])->get()->num_rows();
    }

    function getByCategory($kategoriid, $limit = FALSE){
        if($limit){
            $this->db->limit($limit);
        }
        return $this->db->select('p.*')
                        ->from('publikasi p')
                        ->where([
                            'p.status' => 1,
                            'p.kategori_id' => $kategoriid
                        ])->order_by('tanggal DESC', 'timestamp DESC')->get();
    }
}