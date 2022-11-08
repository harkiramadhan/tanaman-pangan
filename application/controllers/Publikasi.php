<?php

class Publikasi extends CI_Controller {
	public function index(){
        $var['title'] = "Pertanyaan Umum";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

	public function detail(){
        $var['title'] = "Detail Publikasi";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi-detail', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}