<?php
class M_Jejaring extends CI_Model {
    function getAll($where=false){
        if($where != NULL){
            foreach($where as $row){
                if($row['column'] == 'komoditas_id'){
                    $this->db->join('user_komoditas uk', 'uk.user_id = u.id');
                    $this->db->where('uk.komoditas_id', $row['value']);
                    $this->db->group_by('uk.user_id');
                }else{
                    $this->db->where($row['column'], $row['value']);
                }
            }
        }
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->select('p.prov_name provinsi, c.city_name kota, d.dis_name kabupaten, s.subdis_name kelurahan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->join('provinces p', 'u.prov = p.prov_id', "LEFT")
                        ->join('cities c', 'u.kab_kota = c.city_id', "LEFT")
                        ->join('districts d', 'u.kec = d.dis_id', "LEFT")
                        ->join('subdistricts s', 'u.desa_kel = s.subdis_id', "LEFT")
                        ->order_by('u.created_at', "DESC")->get();
    }

    function getPaginate($rowno,$rowperpage,$where=false){
        if($where != NULL){
            foreach($where as $row){
                if($row['column'] == 'komoditas_id'){
                    $this->db->join('user_komoditas uk', 'uk.user_id = u.id');
                    $this->db->where('uk.komoditas_id', $row['value']);
                    $this->db->group_by('uk.user_id');
                }else{
                    $this->db->where($row['column'], $row['value']);
                }
            }
        }
        return $this->db->select('u.*, r.role, r.role_en, k.kelembagaan')
                        ->select('p.prov_name provinsi, c.city_name kota, d.dis_name kecamatan, s.subdis_name kelurahan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->join('provinces p', 'u.prov = p.prov_id', "LEFT")
                        ->join('cities c', 'u.kab_kota = c.city_id', "LEFT")
                        ->join('districts d', 'u.kec = d.dis_id', "LEFT")
                        ->join('subdistricts s', 'u.desa_kel = s.subdis_id', "LEFT")
                        ->limit($rowperpage, $rowno)
                        ->order_by('u.id', "ASC")->get();
    }

    function getByUserid($userid){
        return $this->db->select('u.*, r.role, r.role_en, k.kelembagaan')
                        ->select('p.prov_name provinsi, c.city_name kota, d.dis_name kecamatan, s.subdis_name kelurahan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->join('provinces p', 'u.prov = p.prov_id', "LEFT")
                        ->join('cities c', 'u.kab_kota = c.city_id', "LEFT")
                        ->join('districts d', 'u.kec = d.dis_id', "LEFT")
                        ->join('subdistricts s', 'u.desa_kel = s.subdis_id', "LEFT")
                        ->where([
                            'u.id' => $userid
                        ])->order_by('u.id', "ASC")->get()->row();
    }
}