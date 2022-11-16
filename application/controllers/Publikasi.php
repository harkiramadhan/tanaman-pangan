<?php

class Publikasi extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
		]);
	}

	public function index(){
        $var = [
			'title' =>"Pertanyaan Umum",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];

		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

	public function detail(){
        $var = [
			'title' => "Detail Publikasi",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/publikasi-detail', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}