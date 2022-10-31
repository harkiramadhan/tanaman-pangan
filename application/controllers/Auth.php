<?php

class Auth extends CI_Controller {
	
	public function index(){
        $var['title'] = "Masuk";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/masuk', $var);
		$this->load->view('layout/user/footer', $var);
	
	}

    public function daftar(){
        $var['title'] = "Daftar";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/daftar', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}