<?php

class Tanitrainer extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_User',
		]);
	}

	public function index(){
        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function detail(){
        $var = [
			'title' => "Tani Trainer",
			'user' => $this->M_User->getById($this->session->userdata('userid')),
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer-detail', $var);
		$this->load->view('layout/user/footer', $var);
	}
}