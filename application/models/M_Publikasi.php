<?php
class M_Publikasi extends CI_Model{
    function getAll(){
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

    function getPaginate($rowno,$rowperpage){
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
}