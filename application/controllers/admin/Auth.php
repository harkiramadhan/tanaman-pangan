<?php

class Auth extends CI_Controller {
	public function index(){
        // $var['title'] = "Beranda Admin";
		$this->load->view('admin/login');
	}
}

