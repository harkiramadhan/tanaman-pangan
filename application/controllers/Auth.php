<?php

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->model([
			'M_Komoditas',
			'M_Role'
		]);
	}
	public function index(){
        $var['title'] = "Masuk";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/masuk', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

    public function daftar(){
		$var = [
			'title' => "Daftar",
			'komoditas' => $this->M_Komoditas->getAll(),
			'role' => $this->M_Role->getAll()
		];
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/daftar', $var);
		$this->load->view('layout/user/footer', $var);
	}

	/* Action Here */
	function register(){
		$dataInsert = [
			'nama' => $this->input->post('nama', TRUE),
			'nohp' => $this->input->post('nohp', TRUE),
			'password' => $this->input->post('password', TRUE),
			'role_id' => $this->input->post('role_id', TRUE),
		];
		
		$this->output->set_content_type('application/json')->set_output(json_encode($this->input->post()));
	}
}