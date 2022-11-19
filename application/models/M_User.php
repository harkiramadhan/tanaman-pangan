<?php
class M_User extends CI_Model{
    function getAll(){
        return $this->db->get('user');
    }

    function getById($userid){
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->select('p.prov_name provinsi, c.city_name kota, d.dis_name kabupaten, s.subdis_name kelurahan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->join('provinces p', 'u.prov = p.prov_id', "LEFT")
                        ->join('cities c', 'u.kab_kota = c.city_id', "LEFT")
                        ->join('districts d', 'u.kec = d.dis_id', "LEFT")
                        ->join('subdistricts s', 'u.desa_kel = s.subdis_id', "LEFT")
                        ->where([
                            'u.id' => $userid
                        ])->get()->row();
    }

    function getByHp($hp){
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->where([
                            'u.hp' => $hp
                        ])->get()->row();
    }

    function getByRole($roleid){
        return $this->db->select('u.*, r.role, k.kelembagaan')
                        ->from('user u')
                        ->join('role r', 'u.role_id = r.id')
                        ->join('kelembagaan k', 'u.kelembagaan_id = k.id', "LEFT")
                        ->where([
                            'u.role_id' => $roleid
                        ])->get();
    }
}