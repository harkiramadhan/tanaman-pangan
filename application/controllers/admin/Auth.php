<?php

class Auth extends CI_Controller {
	public function index(){
		$this->load->view('admin/login');
	}

	function login(){
		$cekAdmin = $this->db->get_where('admin', [
			'email' => $this->input->post('email', TRUE),
			'password' => $this->input->post('password', TRUE)
		]);

		if($cekAdmin->num_rows() > 0){
			$admin = $cekAdmin->row();

			$this->session->set_userdata('admin', TRUE);
			$this->session->set_userdata('email', $admin->email);
			
			
			redirect('admin','refresh');
		}else{
			$this->session->set_flashdata('error', "User Tidak Di Temukan!");
			
			redirect($_SERVER['HTTP_REFERER'],'refresh');
		}
	}
}

