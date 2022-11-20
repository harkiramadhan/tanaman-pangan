<?php

class Landingpage extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Role',
			'M_User'
		]);
		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}

	public function index(){
        $var = [
			'title' => 'Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function banner(){
        $var = [
			'title' => 'Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-banners', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function patner(){
        $var = [
			'title' => 'Patner Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-patner', $var);
		$this->load->view('layout/admin/footer', $var);
	}
	
	public function komoditas(){
        $var = [
			'title' => 'Komoditas Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-komoditas', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function publikasi(){
        $var = [
			'title' => 'Publikasi Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-publikasi', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function testimoni(){
        $var = [
			'title' => 'Testimoni Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-testimoni', $var);
		$this->load->view('layout/admin/footer', $var);
	}
	
	public function kegiatan(){
        $var = [
			'title' => 'Kegiatan Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-kegiatan', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

