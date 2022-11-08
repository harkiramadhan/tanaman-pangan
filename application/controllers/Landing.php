<?php

class Landing extends CI_Controller {
	public function index(){
        $var['title'] = "Landing Page";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/landing', $var);
		$this->load->view('layout/user/footer', $var);
	}
}