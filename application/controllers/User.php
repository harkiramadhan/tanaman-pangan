<?php

class User extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role',
			'M_User'
		]);

		if($this->session->userdata('masuk') != TRUE){
			redirect('','refresh');
		}
	}
	public function index(){
		$var = [
			'title' => 'Dashboard User',
			'user' => $this->M_User->getById($this->session->userdata('userid'))
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function data(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-data', $var);
		$this->load->view('layout/user/footer', $var);
	}
	
    public function password(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-profil-password', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function kelasku(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-kelasku', $var);
		$this->load->view('layout/user/footer', $var);
	}

	public function galeri(){
        $var['title'] = "Dahboard User Data Pertanian";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/user-galeri', $var);
		$this->load->view('layout/user/footer', $var);
	}
}