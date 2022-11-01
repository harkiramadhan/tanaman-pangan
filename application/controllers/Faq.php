<?php

class Faq extends CI_Controller {
	
	public function index(){
        $var['title'] = "Pertanyaan Umum";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/faq', $var);
		$this->load->view('layout/user/footer', $var);
	
	}
}