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

	public function header(){
        $var = [
			'title' => 'Landing Page',
			'role' => $this->M_Role->getAll()
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/landingpage-header', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

