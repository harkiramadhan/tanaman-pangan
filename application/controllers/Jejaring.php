<?php

class Jejaring extends CI_Controller {
	
	public function index(){
        $var['title'] = "Temui Sesama Jejaring";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/jejaring', $var);
		$this->load->view('layout/user/footer', $var);
	}
}