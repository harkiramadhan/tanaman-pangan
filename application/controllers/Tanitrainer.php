<?php

class Tanitrainer extends CI_Controller {
	
	public function index(){
        $var['title'] = "Tani Trainer";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer', $var);
		$this->load->view('layout/user/footer', $var);
	}

    public function detail(){
        $var['title'] = "Tani Trainer";
		$this->load->view('layout/user/header', $var);
		$this->load->view('user/tanitrainer-detail', $var);
		$this->load->view('layout/user/footer', $var);
	}
}