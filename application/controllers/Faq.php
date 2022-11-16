<?php

class Faq extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User'
		]);
	}
	
	public function index(){
        $var = [
			'title' => "Pertanyaan Umum",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/faq', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}