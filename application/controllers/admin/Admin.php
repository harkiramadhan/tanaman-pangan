<?php

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}

	public function index(){
        $var = [
			'title' => 'Beranda Admin'
		];
		
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/beranda', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

