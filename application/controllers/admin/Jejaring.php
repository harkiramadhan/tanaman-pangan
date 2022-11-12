<?php

class Jejaring extends CI_Controller {
	public function index(){
        $var['title'] = "Beranda Jejaring";
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

