<?php

class Admin extends CI_Controller {
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
			'title' => 'Beranda Admin',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/beranda', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

