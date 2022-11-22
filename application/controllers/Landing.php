<?php

class Landing extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
			'M_Banners',
			'M_Partner',
			'M_Role',
			'M_Komoditas',
			'M_Tanitrainer',
			'M_Kategori_publikasi',
			'M_Publikasi',
			'M_Kegiatan',
			'M_Faq'
		]);
	}
	
	public function index(){
        $var = [
			'title' => "Landing Page",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
			'banners' => $this->M_Banners->getActive(),
			'partner' => $this->M_Partner->getActive(),
			'role' => $this->M_Role->getAll(),
			'komoditas' => $this->M_Komoditas->getAll(),
			'tanitrainer' => $this->M_Tanitrainer->getPaginate(1, 10),
			'kategoriPublikasi' => $this->M_Kategori_publikasi->getAll(),
			'kegiatan' => $this->M_Kegiatan->getActive(),
			'faq' => $this->M_Faq->getActive()
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/landing', $var);
		$this->load->view('layout/user/footer', $var);
	}
}