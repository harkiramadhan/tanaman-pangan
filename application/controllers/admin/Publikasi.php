<?php

class Publikasi extends CI_Controller {
	public function index(){
        $var['title'] = "Admin Publikasi";
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail(){
        $var['title'] = "Detail Publikasi";
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

	