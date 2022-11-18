<?php

class Publikasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}
	
	public function index(){
        $var = [
			'title' => "Admin Publikasi"
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function add(){
        $var = [
			'title' => "Tambah Publikasi"
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail(){
        $var = [
			'title' => "Detail Publikasi"
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/publikasi-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

	