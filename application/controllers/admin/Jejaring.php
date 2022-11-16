<?php

class Jejaring extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Jejaring'
		]);
		if($this->session->userdata('admin') != TRUE){
			redirect('admin/auth','refresh');
		}
	}
	
	public function index(){
        $var = [
			'title' => 'Beranda Jejaring',
			'jejaring' => $this->M_Jejaring->getAll()
		];

		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring', $var);
		$this->load->view('layout/admin/footer', $var);
	}

	public function detail(){
        $var = [
			'title' => 'Detail Jejaring'
		];
		$this->load->view('layout/admin/header', $var);
		$this->load->view('admin/jejaring-detail', $var);
		$this->load->view('layout/admin/footer', $var);
	}
}

	