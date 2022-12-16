<?php
class Language extends CI_Controller{
    function index(){
        $now = $this->session->userdata('lang');
        if($now == 'ID' || $now == NULL){
            $this->session->set_userdata('lang', 'EN');
            $this->session->set_flashdata('success', 'Successfully Changed Language');
        }else{
            $this->session->set_userdata('lang', "ID");
            $this->session->set_flashdata('success', 'Berhasil Merubah Bahasa');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}