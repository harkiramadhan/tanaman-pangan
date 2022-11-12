<?php
class M_Wilayah extends CI_Model {
    function getProvinsi(){
        return $this->db->get('provinces');
    }

    function getKotaByProv($provid){
        return $this->db->get_where('cities', ['prov_id' => $provid]);
    }

    function getKabupatenByKota($kotaid){
        return $this->db->get_where('districts', ['city_id' => $kotaid]);
    }

    function getKecamatanByKab($kabid){
        return $this->db->get_where('subdistricts', ['dis_id' => $kabid]);
    }
}