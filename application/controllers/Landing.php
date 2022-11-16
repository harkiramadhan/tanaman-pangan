<?php

class Landing extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role',
			'M_User',
			'M_Wilayah',
			'M_Kelembagaan',
			'M_Penjualan',
			'M_Kategori_olahan',
			'M_Ketertarikan'
		]);
	}
	
	public function index(){
        $var = [
			'title' => "Landing Page",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/landing', $var);
		$this->load->view('layout/user/footer', $var);
	}
}