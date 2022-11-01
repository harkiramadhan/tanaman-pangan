<?php

class Publikasi extends CI_Controller {
	
	public function index(){
        $var['title'] = "Pertanyaan Umum";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}