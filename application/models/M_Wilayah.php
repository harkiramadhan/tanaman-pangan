<?php
class M_Wilayah extends CI_Model {
    function getProvinsi(){
        return $this->db->get('provinces');
    }

    function getKabupatenByProv($provid){
        /* Cities as Kabupaten/Kota */
        return $this->db->get_where('cities', ['prov_id' => $provid]);
    }

    function getKecamatanByKab($kotaid){
        /* Districts as Kecamatan */
        return $this->db->get_where('districts', ['city_id' => $kotaid]);
    }

    function getKabupatenByKec($kabid){
        /* Sub Districts as Desa/Kelurahan */
        return $this->db->get_where('subdistricts', ['dis_id' => $kabid]);
    }
}