<?php

class Tanitrainer extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}
	
	public function index(){
        $var = [
			'title' => "Admin Tanitrainer"
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail(){
        $var = [
			'title' => "Detail Tanitrainer"
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/tanitrainer-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

	